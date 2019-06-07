<!DOCTYPE html>
<html lang="en">
<head>
  <title>Awaflight | Cheapest flight booking platform</title>
  <meta name="description" content="Book cheap flight to anywhere around the world" />
  <meta name="keywords" content="Flight booking, cheap booking, visa processing, canada, america, best flight" />

  <meta charset="utf-8" /><link rel="icon" href="{{asset('img/favicon.png')}}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('https://code.jquery.com/ui/1.12.1/themes/sunny/jquery-ui.css')}}"> 
  <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('css/idangerous.swiper.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/custom.css')}}" />
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" >
<link rel="stylesheet" href="{{asset('fonts/FontAwesome/font-awesome.css')}}" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<!-- Select 2 -->
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
<!-- Int input -->
<link href="{{ asset('css/intltelinput/intlTelInput.min.css') }}" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway:300,400,500,700' rel='stylesheet' type='text/css'>  
  <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>	
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>
</head>  
<body>  
<!-- // authorize // -->
	<div class="srch-overlay">
		<div class="loader">
			<img src="{{asset('img/loader.gif')}}" />
			<h1><i class="fa fa-search"> </i> Searching for the best deal for you </h1>
		</div>		
	</div>
	<div class="autorize-popup">
		<div class="autorize-tabs">
			<a href="#" class="autorize-tab-a current">Sign in</a>
			<a href="#" class="autorize-tab-b">Register</a>
			<a href="#" class="autorize-close"></a>
			<div class="clear"></div>
		</div>
		<section class="autorize-tab-content">
			<div class="autorize-padding">
				<h6 class="autorize-lbl">Welocome! Login in to Your Accont</h6>
				<input type="text" value="" placeholder="Name">
				<input type="text" value="" placeholder="Password">
				<footer class="autorize-bottom">
					<button class="authorize-btn">Login</button>
					<a href="#" class="authorize-forget-pass">Forgot your password?</a>
					<div class="clear"></div>
				</footer>
			</div>
		</section>
		<section class="autorize-tab-content">
			<div class="autorize-padding">
				<h6 class="autorize-lbl">Register for Your Account</h6>
				<input type="text" value="" placeholder="Name">
				<input type="text" value="" placeholder="Password">
				<footer class="autorize-bottom">
					<button class="authorize-btn">Registration</button>
					<div class="clear"></div>
				</footer>
			</div>
		</section>
	</div>
<header id="top">
		<div class="header-a">
			<div class="wrapper-padding">			
				<div class="header-phone"><a href="tel:+2348120252353">+234 - 812 - 025 - 2353</a></div>
				<div class="header-phone"><a href="tel:+2348117503583">+234 - 811 - 750 - 3583</a></div>
				<div class="header-account">
					<a href="/login" target="_blank">My account</a>
				</div>
					
				<div class="header-lang">
					<a href="#"><img alt="" src="img/ngn.gif"></a>
					<div class="langs-drop">
						<div><a href="#" class="langs-item en">english</a></div>
						<div><a href="#" class="langs-item fr">francais</a></div>
						<div><a href="#" class="langs-item de">deutsch</a></div>
						<div><a href="#" class="langs-item it">italiano</a></div>
					</div>
				</div>
				<div class="header-curency">
					<a href="#"><span>&#8358;</span></a>
					<div class="curency-drop" style="display: none;">
						<div><a href="#"><span>&#8358; </span> NGN</a></div>
						<div><a href="#"><span>&#36; </span> USD</a></div>
						<div><a href="#"><span>&#8364; </span> EURO</a></div>
						<div><a href="#"><span>&#163; </span> GBR</a></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="header-b">
			<!-- // mobile menu // -->
				<div class="mobile-menu" style="display: none;">
					<nav>
						<ul>
								<li><a href="/home">Home</a></li>
								<li><a href="/about">About</a></li>
								<li><a href="/Visa">Visa</a></li>
								<li><a href="/contact">Reach out</a></li>
						</ul>
					</nav>	
				</div>
			<!-- \\ mobile menu \\ -->
				
			<div class="wrapper-padding">
				<div class="header-logo"><a href="/home"><img alt="" src="img/logo3.png"></a></div>
				<div class="header-right">
					<div class="hdr-srch">
						<a href="#" class="hdr-srch-btn"></a>
					</div>
					<div class="hdr-srch-overlay">
						<div class="hdr-srch-overlay-a">
							<input type="text" value="" placeholder="Start typing...">
							<a href="#" class="srch-close"></a>
							<div class="clear"></div>
						</div>
					</div>	
					<div class="hdr-srch-devider"></div>
					<a href="#" class="menu-btn"></a>
					<nav class="header-nav">
						<ul>
							<li><a href="/home">Home</a></li>
							<li><a href="/about">About</a></li>
							<li><a href="/Visa">Visa</a></li>
							<li><a href="/contact">Reach out</a></li>
						</ul>
					</nav>
				</div>
				<div class="clear"></div>
			</div>
		</div>	
	</header>
