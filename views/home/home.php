<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Focus &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet"> -->
	
  <!-- Font Awesome -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<!-- Animate.css -->
	<link rel="stylesheet" href="/cebu_log/webroot/assets/css/home_css/animate.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/cebu_log/webroot/assets/css/bootstrap.css">
	<!-- animatedresponsiveImagegrid  -->
	<link rel="stylesheet" href="/cebu_log/webroot/assets/css/home_css/animatedresponsiveImagegrid.css">
	<!-- Magnifoc Popup  -->
	<link rel="stylesheet" href="/cebu_log/webroot/assets/css/home_css/magnific-popup.css">

	<link rel="stylesheet" href="/cebu_log/webroot/assets/css/home_css/style.css">


	<!-- Modernizr JS -->
	<script src="/cebu_log/webroot/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	
	<div id="fh5co-page">
		<header>
			<div class="container">
				<div class="fh5co-navbar-brand">
					<h1 class="text-center"><a class="fh5co-logo" href="index.html"><i class="fa fa-cutlery" aria-hidden="true" fa-fw></i></a></h1>
					<!-- <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a> -->

				</div>
			</div>
		</header>
		<div id="fh5co-intro-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 animate-box text-center">
						<h2 class="intro-heading">Focus leads you for a better Photography site</h2>
						<p><span>Created with <i class="icon-heart3"></i> by the fine folks at <a href="http://freehtml5.co">FreeHTML5.co</a></span></p>
					</div>
				</div>
			</div>
		</div>
		<div id="fh5co-photos-section">
			<div class="container">

				<!-- 写真投稿数のカウント -->
				<div class="fh5co-counters" style="background-image: url(images/hero.jpg);" data-stellar-background-ratio="0.5" id="counter-animate">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 text-center animate-box">
								<div class="heading-section">
									<h2>Fun Facts</h2>
								</div>
							</div>
						</div>
						<div class="fh5co-narrow-content animate-box">
							<div class="row" >
								<div class="col-md-4 text-center">
									<span class="fh5co-counter js-counter" data-from="0" data-to="130" data-speed="5000" data-refresh-interval="50"></span>
									<span class="fh5co-counter-label">Client</span>
								</div>
								<div class="col-md-4 text-center">
									<span class="fh5co-counter js-counter" data-from="0" data-to="1450" data-speed="5000" data-refresh-interval="50"></span>
									<span class="fh5co-counter-label">Photos</span>
								</div>
								<div class="col-md-4 text-center">
									<span class="fh5co-counter js-counter" data-from="0" data-to="7497" data-speed="5000" data-refresh-interval="50"></span>
									<span class="fh5co-counter-label">Pixels</span>
								</div>
							</div>
						</div>
					</div>

				<div id="ri-grid" class="ri-grid animate-box">
					<img class="ri-loading-image" src="../../images/loading.gif"/>
					<ul>

					<?php foreach($this->viewOptions as $viewOption): ?>
						<li>
							<a href="/cebu_log/shops/<?php echo $viewOption['s_id'] ?>">
								<img src="post_img/<?php echo $viewOption['shop_picture_path'] ?>"/>
								<div class="desc">
									<h3>Album<br><span>129 Photos</span></h3>
								</div>
							</a>
						</li>
						
					<?php endforeach; ?>
					

					</ul>
				</div>
			</div>
		</div>

		<div id="fh5co-services-section">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center animate-box ">
						<div class="heading-section">
							<h2>Our Services</h2>
							<p>Cubu Logとはまだ知らない食べたい物、行きたいお店を写真から<br>
							見つけることができるグルメSNSです。<br>
							「これ美味しそう！」というお客様の直感で今日の食事を決めることができます。</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span><i class="fa fa-search" aria-hidden="true"></i></span>
							<br>
							<h3>食べたいものを探してみる</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span><i class="fa fa-hand-o-up" aria-hidden="true"></i></span>
							<br>
							<h3>食べてみる</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span><i class="fa fa-picture-o" aria-hidden="true"></i></span>
							<br>
							<h3>投稿してみる</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

			    <div id="white">
				    <div class="container">
				    	<div class="row mt">
				    		<div class="col-lg-4 col-lg-offset-4 centered">
				    			<h3>グルメなユーザーから探す</h3>
				    			<hr>
				    		</div>
				    		<div class="col-lg-8"></div><!-- col-lg-8-->
                  <div class="col-lg-4 goright">
                   <p><a href="img_all.php"><i class="fa fa-angle-right"></i>ユーザーランキングを見る</a></p>
                  </div>
				    	</div>
				    	<div class="row mt">
				    		<div class="col-lg-4">
				    			<p class="capitalize">1</p>
				    			<img src="images/gurume.jpg" style="border-radius: 30px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100">
                  <br>
                  <br>
				    			<a href="mypage/mypage.php"><h4>グルメ太郎</h4></a>
				    			<p>Built for all levels of expertise, whether you need simple pages or complex ones, creating something incredible with Marco is an effortless and intuitive process.</p>
				    		</div>
				    		<div class="col-lg-4">
				    			<p class="capitalize">2</p>
				    			<h4>Analysis</h4>
				    			<p>We’ve taken great care to ensure that Marco is fully retina-ready. So it’ll look good on any retina display. We use retina.js to ensure the best view.</p>
				    		</div>
				    		<div class="col-lg-4">
				    			<p class="capitalize">3</p>
				    			<h4>Planning</h4>
				    			<p>Marco fits any device handsomely. We tested our theme in major devices and browsers. Check it out and test it before buy it on responsinator.com.</p>
				    		</div>    	
				
				    	</div><!-- /row -->
				    </div><!-- /container -->
			    </div><!-- /white -->

			    <div id="white">
				    <div class="container">
				    	<div class="row mt">
				    		<div class="col-lg-4 col-lg-offset-4 centered">
				    			<h3>リアルタイムで投稿されている写真から探す</h3>
				    			<hr>
				    		</div>
				    		<div class="col-lg-8"></div><!-- col-lg-8-->
                <div class="col-lg-4 goright">
                 <p><a href="img_all.php"><i class="fa fa-angle-right"></i>リアルタイムで投稿されている写真を見る</a></p>
    </div>
				    	</div>
				    	<div class="row mt">
				    		<div class="col-lg-2">
				    			<img src="images/gurume.jpg" style="border-radius: 10px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100">
                  <br>
				    		</div>

				    		<div class="col-lg-2">
				    			<img src="images/gurume.jpg" style="border-radius: 10px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100">
                  <br>
				    		</div>

				    		<div class="col-lg-2">
				    			<img src="images/gurume.jpg" style="border-radius: 10px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100">
                  <br>
				    		</div>

				    		<div class="col-lg-2">
				    			<img src="images/gurume.jpg" style="border-radius: 10px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100">
                  <br>
				    		</div>

				    		<div class="col-lg-2">
				    			<img src="images/gurume.jpg" style="border-radius: 10px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100">
                  <br>
				    		</div>

				    		<div class="col-lg-2">
				    			<img src="images/gurume.jpg" style="border-radius: 10px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100">
                  <br>
				    		</div>

				    		
				
				    	</div><!-- /row -->
				    </div><!-- /container -->
			    </div><!-- /white -->
			    <br>
				    		<br>
				    		<br>
				    		<br>

	
	</div>

	<!-- jQuery -->
	<script src="/cebu_log/webroot/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/cebu_log/webroot/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/cebu_log/webroot/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/cebu_log/webroot/js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="/cebu_log/webroot/js/jquery.countTo.js"></script>
	<!-- gridrotator -->
	<script type="text/javascript" src="/cebu_log/webroot/js/jquery.gridrotator.js"></script>
	<!-- Magnific Popup -->
	<script type="text/javascript" src="/cebu_log/webroot/js/jquery.magnific-popup.min.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="/cebu_log/webroot/js/main.js"></script>

	<script type="text/javascript">	
		$(function() {
		
			$( '#ri-grid' ).gridrotator( {
				rows : 3,
				// number of columns 
				columns : 6,
				w1024 : { rows : 3, columns : 5 },
				w768 : {rows : 3,columns : 4 },
				w480 : {rows : 3,columns : 3 },
				w320 : {rows : 2,columns : 2 },
				w240 : {rows : 1,columns : 1 },
				preventClick : false
			} );
		
		});
	</script>


	</body>
</html>

