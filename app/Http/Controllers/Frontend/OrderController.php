<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
   public function addToCart($product_id)
{
    $product = Product::find($product_id);

    // Check if the product is in stock
    if ($product->stock > 0) {
        $myCart = session()->get('cart');

        // Check if the product has a discount
        if ($product->discount > 0) {
            // Calculate discounted price
            $discountedPrice = $product->selling_price - ($product->selling_price * $product->discount / 100);
        } else {
            // Use original price if no discount
            $discountedPrice = $product->selling_price;
        }

        // Step 1: If cart is empty
        if (empty($myCart)) {
            // Action: Add to cart
            $cartArray[$product->id] = [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'selling_price' => $discountedPrice,  // Ensure selling_price is set
                'quantity' => 1,
                'subtotal' => 1 * $discountedPrice, // Calculate subtotal with discounted price
                'image' => $product->image,
            ];

            session()->put('cart', $cartArray);

            notify()->success('Product added to cart.');
            return redirect()->back();
        } else {
            // Step 2: If product already exists in cart, update quantity and subtotal
            if (array_key_exists($product_id, $myCart)) {
                if ($product->stock > $myCart[$product_id]['quantity']) {
                    // Increase quantity and update subtotal
                    $myCart[$product_id]['quantity']= $myCart[$product_id]['quantity'] + 1;
            $myCart[$product_id]['subtotal']= $myCart[$product_id]['selling_price']  * $myCart[$product_id]['quantity'];

                    session()->put('cart', $myCart);

                    notify()->success('Quantity updated.');
                    return redirect()->back();
                } else {
                    notify()->error('Quantity not available.');
                    return redirect()->back();
                }
            } else {
                // Step 3: Add new product to cart
                $myCart[$product_id] = [
                    'id' => $product->id,
                    'product_name' => $product->product_name,
                    'selling_price' => $discountedPrice, // Ensure discounted price is set
                    'quantity' => 1,
                    'subtotal' => 1 * $discountedPrice, // Calculate subtotal with discounted price
                    'image' => $product->image,
                ];

                session()->put('cart', $myCart);
                notify()->success('Product added to cart.');
                return redirect()->back();
            }
        }
    } else {
        notify()->error('This product is out of stock.');
        return redirect()->back();
    }
}

    

    public function viewCart()
    {
    
        $cartData=Session::get('cart') ?? [];

        return view('frontend.pages.cart-view',compact('cartData'));    
    }

    public function checkout(){

        $cartData=Session::get('cart') ?? [];
        return view('frontend.pages.checkout',compact('cartData'));
    }
public function placeOrder(Request $request)
{
    // dd($request->all());
    // validation
    // order-single data
    $order = Order::create([
        'customer_id' => auth('customerGuard')->user()->id,
        'receiver_name' => $request->receiver_name,
        'receiver_address' => $request->address,
        'receiver_email' => $request->receiver_email,
        'receiver_mobile_no' => $request->mobile_no,
        'payment_type' => $request->payment,
        'sub_total' => $request->subtotal,
        'total_amount' => $request->subtotal + 70,
    ]);

    // Order Details - cart item - multiple
    $myCart = Session()->get('cart');

    foreach ($myCart as $cart) {
        Orderdetails::create([
            'order_id' => $order->id,
            'product_id' => $cart['id'],
            'quanity' => $cart['quantity'],
            'unit_price' => $cart['selling_price'],
            'subtotal' => $cart['subtotal'],
        ]);
        
        // Decrement stock
        $product = Product::find($cart['id']);
        $product->decrement('stock', $cart['quantity']);
    }

    // If customer chooses COD or not
    // If not COD, need to pay through SSL
    if ($request->payment == 'online') {
        // Pay with SSL
        $this->payNow($order);
    }

    session()->forget('cart');
    notify()->success('Order Place Success.');

    return redirect()->route('homepage');
}


    public function payNow($order)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = $order->total_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $order->id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $order->receiver_name;
        $post_data['cus_email'] =  $order->receiver_email;
        $post_data['cus_add1'] =  $order->receiver_address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] =  $order->receiver_mobile_no;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }
    public function cartItemDelete($pId)
    {
        
        $cart=session()->get('cart');

       unset($cart[$pId]);


    
       session()->put('cart',$cart);

       notify()->success('Item remove.');

       return redirect()->back();

  
    }
    public function viewInvoice($id)
    {
        $order=Order::with('orderDetails')->find($id);
        return view('frontend.pages.invoice',compact('order'));
    }

    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart');
        $product = Product::find($id);
    
        // Ensure quantity is at least 1
        $quantity = max(1, $request->quantity);
    
        if ($product->stock >= $quantity) {
            $cart[$id]['quantity'] = $quantity;
            $cart[$id]['subtotal'] = $quantity * $cart[$id]['selling_price'];
    
            session()->put('cart', $cart);
            notify()->success('Cart updated.');
        } else {
            notify()->error('Stock not available');
        }
    
        return redirect()->back();
    }
    



}
