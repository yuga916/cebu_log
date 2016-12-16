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


	<link rel="stylesheet" href="/cebu_log/webroot/assets/css/home_css/style.css">

<!-- グリッド関係 -->
	 <link rel="stylesheet" type="text/css" href="/cebu_log/webroot/assets/grid/demo.css" />
			<link rel="stylesheet" type="text/css" href="/cebu_log/webroot/assets/grid/style.css" />
			<link rel="stylesheet" type="text/css" href="/cebu_log/webroot/assets/grid/modal.css" />
			<script type="text/javascript" src="/cebu_log/webroot/js/grid2/modernizr.custom.26633.js"></script>	


	<!-- Modernizr JS -->
	<script src="/cebu_log/webroot/js/modernizr-2.6.2.min.js"></script>


	</head>
	<body>

	<div id="modal_view" class="modal_hidden modal_view">
								<img src="" alt="">
					    	<p><a class="modal-move" href="#">お店ページへ</a></p>
					    	<p><a class="modal-close" href="#">閉じる</a></p>
				  </div>

	
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
						<h2 class="intro-heading">Cebu Log</h2>
						<p><span>You are what you eat. Let's enjoy eating out!</span></p>
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
									<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $this->Counts[0]['cnt']; ?>" data-speed="5000" data-refresh-interval="50"></span>
									<span class="fh5co-counter-label">写真数</span>
								</div>
								<div class="col-md-4 text-center">
									<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $this->Counts[1]['cnt']; ?>" data-speed="5000" data-refresh-interval="50"></span>
									<span class="fh5co-counter-label">お店数</span>
								</div>
								<div class="col-md-4 text-center">
									<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $this->Counts[2]['cnt']; ?>" data-speed="5000" data-refresh-interval="50"></span>
									<span class="fh5co-counter-label">ユーザー数</span>
								</div>
							</div>
						</div>
					</div>
				

				<div id="ri-grid" class="ri-grid animate-box">
					<img class="ri-loading-image" src="/cebu_log/images/loading.gif"/>
					
					<ul>
					<?php foreach($this->viewOptions as $viewOption): ?>
						<li id="/cebu_log/uploads/pictures/<?php echo $viewOption['shop_picture_path']; ?>"><a href="#modal_view" class="modal" id="<?php echo $viewOption['s_id']; ?>"><img src="/cebu_log/uploads/pictures/<?php echo $viewOption['shop_picture_path']; ?>"/></a>


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
				    			<h3>人気のお店から探す</h3>
				    			<hr>
				    		</div>
				    		<div class="col-lg-8"></div><!-- col-lg-8-->
<!--
                  <div class="col-lg-4 goright">
                   
                  </div>
-->
				    	</div>
				    	<div class="row mt">
				    		<?php foreach ($this->viewlikesranks as $viewlikesrank): ?>
				    		<?php $this->i++;  ?>
				    		<div class="col-lg-4">
				    			<p class="capitalize"><?php echo $this->i; ?>位</p>
				    			<?php if (!empty($this->$viewlikesrank['shop_picture_path'])): ?>
				    			<a href="/cebu_log/shops/show/<?php echo $viewlikesrank['s_id']; ?>">
				    			<img src="/cebu_log/uploads/pictures/<?php echo $viewlikesrank['shop_picture_path']; ?>" style="border-radius: 30px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100"></a>			
				    			<?php else: ?>
				    			<img src="/cebu_log/uploads/pictures/sample.jpg" style="border-radius: 30px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100">			
				    			<?php endif; ?>

                  <br>
                  <br>
				    			<a href="/cebu_log/shops/show/<?php echo $viewlikesrank['s_id']; ?>"><h4><?php echo $viewlikesrank['shop_name']; ?></h4></a>
				    			<p><?php echo $viewlikesrank['shop_intro']; ?></p>
				    		</div>	
				    		<?php endforeach ?>
				
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
                 <p><a href="/cebu_log/pictures/realtime"><i class="fa fa-angle-right"></i>リアルタイムで投稿されている写真を見る</a></p>
    </div>
				    	</div>
				    	<div class="row mt">
				    	<?php foreach ($this->viewrealtimepics as $viewrealtimepic): ?>
				    		<div class="col-lg-2">
				    			<a href="/cebu_log/shops/show/<?php echo $viewrealtimepic['s_id']; ?>">
								<img src="/cebu_log/uploads/pictures/<?php echo $viewrealtimepic['shop_picture_path']; ?>" style="border-radius: 10px;
                      												 height: 150px;
                      												 width: 150px;" width="100" height="100"></a>
                  <br>
                  <br>

                  <br>
				    		</div>
				    		
				    	<?php endforeach ?>	
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
	<!-- Magnific Popup -->

	<!-- Main JS (Do not remove) -->
	<script src="/cebu_log/webroot/js/main.js"></script>

	

<!-- グリッド -->
			<script type="text/javascript" src="/cebu_log/webroot/js/grid2/jquery.gridrotator.js"></script>
			<script type="text/javascript" src="/cebu_log/webroot/js/grid2/simpleModalWindow.js"></script>

			<script type="text/javascript">
				$(function() {
					$( '#ri-grid' ).gridrotator( {
						preventClick : false,
						rows		: 3,
						columns		: 8,
						// animType	: 'fadeInOut',
						// animSpeed	: 1000,
						// interval	: 600,
						step		: 1,
						w320		: {
							rows	: 3,
							columns	: 4
						},
						w240		: {
							rows	: 3,
							columns	: 4
						}
					} );
				});
			</script>

			<script type="text/javascript">
				// パネルの中からタップされた画像のidを取得しmodal画面のmodal-moveクラスを持ったaタグにid属性として追加
				function setIdAndImgPath(id, img_path) {
					console.log(id);
					console.log(img_path);
					var target_tag = $("#modal_view").find('.modal-move');
					console.log(target_tag); // id属性を追加する前のaタグ
					target_tag.attr('id', id);
					console.log(target_tag);　// id属性を追加した後のaタグ
					var target_img_tag = $('#modal_view').find('img');
					target_img_tag.attr('src', img_path);
				}
				$(document).ready(function() {
					$('.modal-move').click(function() {
						var id = this.id;
						console.log(id);
						// jsで遷移
						// 遷移先のパスはMVCに合わせて作成
						window.location.href = '/cebu_log/shops/show/' + id;
					});
				});
			</script>


	</body>
</html>

