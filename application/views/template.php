<html class="no-js" lang="en">
	<head>
		

		<!-- Set the viewport width to device width for mobile -->
		
<meta name="description" content="A novel platform for budding photographers and photography enthusiasts in India.  We aim to provide all our photography enthusiasts , amateurs and experts alike, the opportunity to have their art displayed at exhibitions at some of India's finest art galleries. ">
		<title>Indian Photography Edition</title>
		<link rel="stylesheet" href="<?php echo base_url()?>css/css3-gmail-style.css" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300' rel='stylesheet' type='text/css'>
		<!-- Included CSS Files (Compressed) -->
		<link rel="stylesheet" href="<?php echo base_url()?>stylesheets/foundation.css">
		<link rel="stylesheet" href="<?php echo base_url()?>stylesheets/design.css">

		<script type="text/javascript" src="<?php echo base_url()?>javascripts/jquery.js"></script>
		<script src="<?php echo base_url()?>javascripts/modernizr.foundation.js"></script>
<style>
::-webkit-input-placeholder { text-style:bold }
::-moz-placeholder { text-style:bold } /* firefox 19+ */
:-ms-input-placeholder { text-style:bold } /* ie */
input:-moz-placeholder { text-style:bold }
</style>

	</head>
	<body>
		<header>
			<a href="#" class="scrollup">Scroll</a>
			<div class="row2" style="position:fixed; margin-left:-70px;">

				<div class="twelve mobile-four columns">

					<div class="fixed contain-to-grid">

						<section>
							<ul class="left" id="menu">
								<li>

<?php $l=$this->session->userdata('logged_in');
if(!isset($l))$l=FALSE;
if(!$l ): ?>
							<a href="<?php echo base_url()?>index.php">
<?php else: ?>
<a href="<?php echo base_url()?>index.php/dashboard/updates">
<?php endif; ?>

<img src="<?php echo base_url()?>images/logo_top.png" onmouseover="this.src='<?php echo base_url()?>images/logo_top_hover.png';"
                 onmouseout="this.src='<?php echo base_url()?>images/logo_top.png';" alt="Indian Photography Edition"></a>
								</li>

								<li style="margin-top:8px;">
									<?php if(!$l ):
									?>
									<a href="<?php echo base_url()?>index.php/login">SIGN UP/LOGIN</a>
									<?php else: ?>
								<li style="margin-top:8px;" class="has-dropdown">
									<a href="<?php echo base_url()?>index.php/notifications" style="text-transform: uppercase"> <?php echo $this -> session -> userdata('username'); ?>
									<?php $this->load->view('notification'); ?> </a>
									<ul>
										<li>
											<a href="<?php echo base_url()?>index.php/view/profile/<?php echo $this->session->userdata('id')?>">Profile</a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php/follow/following">Following</a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php/follow/followers">Followers</a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php/login/logout/">Sign-Out</a>
										</li>
									</ul>

								</li>
								<li style="margin-top:8px;">
									<?php if($this->IPEModel->isAdmin('id')):?>
									<a href="<?php echo base_url()?>index.php/admin">ADMIN</a>
								</li>
								<?php endif;endif; ?>
								<li class="has-dropdown" style="margin-top:8px;">
									<a href="#">CATEGORIES</a>
									<ul>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Wedding"><span style="font-size:14px;">W</span><span style="font-size:11px;">EDDING</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Black and White"><span style="font-size:14px;">B</span><span style="font-size:11px;">LACK AND WHITE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Nature"><span style="font-size:14px;">N</span><span style="font-size:11px;">ATURE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Abstract"><span style="font-size:14px;">A</span><span style="font-size:11px;">BSTRACT</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Macro"><span style="font-size:14px;">M</span><span style="font-size:11px;">ACRO</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Culture"><span style="font-size:14px;">C</span><span style="font-size:11px;">ULTURE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Fashion"><span style="font-size:14px;">F</span><span style="font-size:11px;">ASHION</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Architecture"><span style="font-size:14px;">A</span><span style="font-size:11px;">RCHITECTURE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/People"><span style="font-size:14px;">P</span><span style="font-size:11px;">EOPLE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Cuisine"><span style="font-size:14px;">C</span><span style="font-size:11px;">UISINE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Sports"><span style="font-size:14px;">S</span><span style="font-size:11px;">PORTS</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Wildlife"><span style="font-size:14px;">W</span><span style="font-size:11px;">ILDLIFE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Travel"><span style="font-size:14px;">T</span><span style="font-size:11px;">RAVEL</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/HDR"><span style="font-size:14px;">H</span><span style="font-size:11px;">DR</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Journalism"><span style="font-size:14px;">J</span><span style="font-size:11px;">OURNALISM</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Landscapes"><span style="font-size:14px;">L</span><span style="font-size:11px;">ANDSCAPES</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/categories/loadCategory')?>/Other"><span style="font-size:14px;">O</span><span style="font-size:11px;">THER</span></a>
										</li>
									</ul>
								</li>
								<li class="has-dropdown" style="margin-top:8px;">
									<a href="#">TOWN HALL</a>
									<ul>
										<!--  <li><a href="polls.html">POLLS</a></li>
										<li><a href="<?php echo base_url()?>index.php/contest">CONTEST</a></li>-->
										<li>
											<a href="<?php echo base_url()?>index.php/news">News</a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php/forum">Forum</a>
										</li>
									</ul>
								</li>
								<?php if($l):
								?>
								<li style="margin-top:8px;" class="has-dropdown">
									<a href="#">ALBUMS</a>
									<ul>
										<li>
											<a href="<?php echo base_url()?>index.php/view/albums/<?php echo $this->session->userdata('id')?>">View</a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php/uploads">Upload</a>
										</li>
									</ul>
								</li>
								<?php endif; ?>

								<li style="margin-top:8px;">
									<a href="<?php echo base_url()?>index.php/buysell">STORE</a>
								</li>
							<li style="margin-left:400px">	<div id="search">
									<form action="<?php echo base_url()?>index.php/search" method="get">
										<input type="text" style="color:grey" placeholder="Search" name="search" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field"/>
										<input type="submit" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn" style="width:180px"  />
									</form>
								</div></li>
<li style="margin-top:6px;margin-left:-35px"><a href="https://www.facebook.com/pages/Indian-Photography-Edition/1404249313125245" target="_blank"><img src="<?php echo base_url()?>images/FB Logo_2.png" style="height:25px;width:25px" title="Like Us on Facebook"></a></li>
							</ul>
						</section>
					</div>

				</div>
			</div>

		</header>
<!--<footer>
    <div class="row2">
      <div class="twelve mobile-four columns">
<table class="table2" style="border:none">
<tr>
<td><a href="#" data-reveal-id="myModal">Click</a></td>
<td><p class="white">Indian Photography Edition</p></td>
<td><p class="white">Indian Photography Edition</p></td>
<td><p class="white">Indian Photography Edition</p></td>
<td><a href="#" data-reveal-id="myModal">Click</a></td>
</tr>
</div>
</div>
</footer>-->
		<div id="content">
			<?= $content ?>
		</div>

	</body>
</html>