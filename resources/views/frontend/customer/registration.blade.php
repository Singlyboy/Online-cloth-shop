

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form for Customer</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://colorlib.com/etc/regform/colorlib-regform-16/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://colorlib.com/etc/regform/colorlib-regform-16/vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="https://colorlib.com/etc/regform/colorlib-regform-16/css/style.css">
<meta name="robots" content="noindex, follow">
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="https://colorlib.com/etc/regform/colorlib-regform-16/images/form-img.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>Register now </h2>
                        <p>while seats are available !</p>
                    </div>
                </div>
                <div class="signup-form">
                    <form action="{{route('registration.submit')}}" method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="first_name" class="required">First name</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="Enter your First Name" />
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Enter your Last Name" />
                                </div>
                                
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Enter your Email" />
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="text" name="phone_number" id="phone_number" placeholder="Enter your Phone Number" />
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Address</label>
                                    <input type="text" name="address" id="adress" placeholder="Enter your Address" />
                                </div>
                            </div>
                            <div class="form-group">       
                                <div class="form-input">
                                    <label for="password" class="required">Password</label>
                                    <input type="password" name="password" id="adress" placeholder="Enter your Password" />
                                </div>   
                                <div class="form-input">
                                    <label for="confirm_password" class="required">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="adress" placeholder="Re-type your Password" />
                                </div> 
                                <div>
                                <label for="status">Status</label>
                                 <select name="status" id="" class="form-control">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                </div> 
                                
                                <div class="form-input">
                                    <label for="image" >Image</label>
                                    <input type="file" name="image" id="image" placeholder="Enter your Image" />
                                </div>   
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                 
                            </div>
                        </div>
                       
                        
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="https://colorlib.com/etc/regform/colorlib-regform-16/vendor/jquery/jquery.min.js"></script>
    <script src="https://colorlib.com/etc/regform/colorlib-regform-16/vendor/nouislider/nouislider.min.js"></script>
    <script src="https://colorlib.com/etc/regform/colorlib-regform-16/vendor/wnumb/wNumb.js"></script>
    <script src="https://colorlib.com/etc/regform/colorlib-regform-16/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="https://colorlib.com/etc/regform/colorlib-regform-16/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="https://colorlib.com/etc/regform/colorlib-regform-16/js/main.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8f8f929f7a8fa475","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2024.10.5","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


