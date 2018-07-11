<?php session_start();
function __autoload($class){include $class.".php";}
	$connect = mysqli_connect("localhost", "root", "", "vegetable");
	$_SESSION['reg'] = "";

		//details quey call
	function details($connect, $query) {
		$result = mysqli_query($connect, $query);
		$prod = '';
		while($row = mysqli_fetch_array($result)) {
			$prod = $prod.$row['value'];
		}
		return $prod;
	}


	//change pwd
	if ( isset ($_POST['forge'] )) {
		if($_POST['pwd']==$_POST['cpwd']){
			$a = new Validate();
			$a->change($_GET['fir']);
		} else {
			echo '<script>alert("Password not match");';
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Update Password | Foodi</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Big Bucket description" name="description">
  <meta content="Big Bucket keywords" name="keywords">
  <meta content="Big Bucket" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="assets/corporate/img/logos/logo-shop-red.png"type="image/x-icon">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->
  <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END -->

  <!-- Page level plugin styles START -->
  <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="assets/pages/css/components.css" rel="stylesheet">
  <link href="assets/corporate/css/style.css" rel="stylesheet">
  <link href="assets/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="assets/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">

    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
						<li><i class="fa fa-phone"></i><span><?php echo details($connect, "SELECT value FROM `details` where details ='contact'"); ?></span></li>
						<li><?php echo details($connect, "SELECT value FROM `details` where details ='email'"); ?></span></li>
					</ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
						<li><a href="../Customer/shop-Myaccount.php">My Account</a></li>
						<li><a href="shop-signin.php">Sign In</a></li>
						<li><a href="shop-signup.php">Sign Up</a></li>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="../"><img src="assets/corporate/img/logos/logo-shop-red.png" alt="Big Bucket"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
			<a href = "../Customer/shop-Myaccount.php?url=cart" ><i class="fa fa-shopping-cart"></a></i>
        </div>
        <!--END CART -->


          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->

<div class="main" style="width:100%;">
	<div class="container" style="width:100%;">
		<!-- BEGIN CONTENT -->
        <div class="col-md-9 col-sm-7" style="width:100%;">
			<h1>Update Password</h1>
            <div class="content-form-page" style="width:100%;">
				<div id="result" style="width:30%; height:auto; background-color:#00ffbf; align:center;"><?php echo $_SESSION['reg'];?></div>
					<center><h3>OTP is sent to your email | Verify and Enter new Password</h3></center>
					<form method="post" class="form-horizontal form-without-legend">
						<!--start Otp-->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="email">OTP </label>
							<div class="col-lg-8">
								<input type="text" name="otp" id="email" class="form-control" style="width:45%">
							</div>
						</div>
						<!--End OTP-->

						<!--change password-->
						<div class="form-group">
							<label class="col-lg-2 control-label" for="email">New Password </label>
							<div class="col-lg-8">
								<input type="password" name="pwd" id="email" class="form-control" style="width:45%">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label" for="fax">Confirm Password </label>
							<div class="col-lg-8">
								<input type="password" name="cpwd" id="fax" class="form-control" style="width:45%">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
								<button class="btn btn-primary" type="submit" name="forge">Update Password</button>
							</div>
						</div>
						<!--End Password-->
					</form>
			</div>
		</div>
        <!-- END CONTENT -->
	</div>

</div>

<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
	<div class="container" style="width:100%;">
		<div class="row">
			<!-- BEGIN BOTTOM ABOUT BLOCK -->
			<div class="col-md-3 col-sm-6 pre-footer-col" style="color:white;">
				<h2>About us</h2>
				<p style="color:white"><?php echo details($connect, "SELECT value FROM `details` where details ='about'"); ?>. </p>
			</div>
			<!-- END BOTTOM ABOUT BLOCK -->

			<!-- BEGIN BOTTOM INFO BLOCK -->
			<div class="col-md-3 col-sm-6 pre-footer-col" style="width:13%;">
				<h2>Information</h2>
				<ul class="list-unstyled">
					<li><i class="fa fa-angle-right"></i> <a href="">Home</a></li>
					<!--<li><i class="fa fa-angle-right"></i> <a href="shop-faq.html">FAQ</a></li>-->
					<li><i class="fa fa-angle-right"></i> <a href="../shop-contacts.php">Contact Us</a></li>
				</ul>
			</div>
			<!-- END INFO BLOCK -->

			<!-- BEGIN BOTTOM CONTACTS -->
			<div class="col-md-3 col-sm-6 pre-footer-col" >
				<h2>Our Contacts</h2>
				<address class="margin-bottom-40" style="wrap">
					<?php echo details($connect, "SELECT value FROM `details` where details ='address'"); ?>
					Contact: <?php echo details($connect, "SELECT value FROM `details` where details ='contact'"); ?><br>
					Email: <a href="mailto:info@metronic.com"><?php echo details($connect, "SELECT value FROM `details` where details ='email'"); ?></a><br>
				</address>
			</div>
			<!-- END BOTTOM CONTACTS -->

			<!-- BEGIN MAP BLOCK -->
			<div class="col-md-3" >
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227821.93376121653!2d80.80242464318376!3d26.848929331392167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd991f32b16b%3A0x93ccba8909978be7!2sLucknow%2C+Uttar+Pradesh!5e0!3m2!1sen!2sin!4v1507823259776" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<!-- END MAP BLOCK -->
		</div>
        <hr>
	</div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<center>
    <div class="footer">
		<div class="container">
			<div>
				<!-- BEGIN PAYMENTS
				<div class="row">
				<center>
					<div class="col-md-4 col-sm-4" style="margin-left:5%">
						<ul class="list-inline ">
							<li><img src="assets/corporate/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
							<li><img src="assets/corporate/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
							<li><img src="assets/corporate/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
							<li><img src="assets/corporate/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
						</ul>
					</div>
				</center>
				<br><br><br>
				<div class="col-md-4 col-sm-4 padding-top-10" >
				<!-- END PAYMENTS -->

				<!-- BEGIN COPYRIGHT -->

					Foodi © ALL Rights Reserved | <a href="https://www.linkedin.com/in/mritunjay-srivastava-118451106/" target="blank">Design by : Mritunjay Srivastava </a>.
				</div>
				<!-- END COPYRIGHT -->
			</div>
		</div>
    </div>
</center>
<!-- END FOOTER -->


    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initUniform();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
