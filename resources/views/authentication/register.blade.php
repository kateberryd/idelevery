<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register | iDelivery</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/owl.carousel.css">
    <link rel="stylesheet" href="/dashboard/css/owl.theme.css">
    <link rel="stylesheet" href="/dashboard/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="/dashboard/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/dashboard/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="/dashboard/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="/dashboard/js/vendor/modernizr-2.8.3.min.js"></script>
   <style>


  .primary-button {
      display: inline-block;
      font-size: 14px;
      padding: 10px 28px 10px;
      color: #ffffff;
      text-transform: uppercase;
      font-weight: 700;
      background: #7fad39;
      letter-spacing: 2px;
  }
  .loginbtn{
     background: #7fad39 !important;
     border-color: #7fad39 !important;
  }
  
   </style>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Registration</h3>
				<p>This is the best app ever!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="{{route('user.store')}}" method="post" id="loginForm">
                        @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input class="form-control" name="username">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>First Name</label>
                                    <input class="form-control" name="first_name">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last Name</label>
                                    <input class="form-control" name="last_name">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input class="form-control" name="email">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Phone No.</label>
                                    <input class="form-control" name="phone_number">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control " name="confirm_password">
                                </div>  
                                <div class="form-group col-lg-6">
                                    <label>Address</label>
                                    <input class="form-control" name="address">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>User Type</label>
                                    <select type="password" class="form-control" name="user_role">
                                      <option value="user">user</option>
                                      <option value="vendor">vendor</option>
                                    </select>
                                </div>
                               
<!-- 
                                <div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks" checked> keep me logged in
                                </div> -->
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn">Register</button>
                                <button class="btn btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2020. All rights reserved. Design by <a href="https://colorlib.com/wp/templates/">Savvie </a></p>
			</div>
		</div>   
    </div>
<!-- jquery
		============================================ -->
    <script src="/dashboard/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="/dashboard/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="/dashboard/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="/dashboard/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="/dashboard/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="/dashboard/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="/dashboard/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="/dashboard/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="/dashboard/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/dashboard/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="/dashboard/js/metisMenu/metisMenu.min.js"></script>
    <script src="/dashboard/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="/dashboard/js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="/dashboard/js/icheck/icheck.min.js"></script>
    <script src="/dashboard/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="/dashboard/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="/dashboard/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    
</body>

</html>