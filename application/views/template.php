<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
		<!-- Set the viewport width to device width for mobile -->
		
<meta name="description" content="A novel platform for budding photographers and photography enthusiasts in India.  We aim to provide all our photography enthusiasts , amateurs and experts alike, the opportunity to have their art displayed at exhibitions at some of India's finest art galleries. ">
		<title>Red-Eye Photography</title>
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
<style type="text/css">
.upload_btn {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
	background-color:#79bbff;
	-webkit-border-top-left-radius:0px;
	-moz-border-radius-topleft:0px;
	border-top-left-radius:0px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:0px;
	-moz-border-radius-bottomright:0px;
	border-bottom-right-radius:0px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	font-style:normal;
	height:36px;
	line-height:36px;
	width:105px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.upload_btn:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff');
	background-color:#378de5;
}.upload_btn:active {
	position:relative;
	top:1px;
}</style>

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

<img src="<?php echo base_url()?>images/logo_top.png" onmouseover="this.src='<?php echo base_url()?>images/Logo_top_hover.png';"
                 onmouseout="this.src='<?php echo base_url()?>images/Logo_top.png';" alt="Red-Eye Photography"></a>
								</li>

								<li style="margin-top:8px;">
									<?php if(!$l ):
									?>
									<a href="<?php echo base_url()?>index.php/login">SIGN UP/LOGIN</a>
                                    <a href="<?php echo base_url()?>index.php">Home</a>
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

								</li><li style="margin-top:8px;">
                                <a href="<?php echo base_url()?>index.php">Home</a>
								<li style="margin-top:8px;">
									<?php if($this->IPEModel->isAdmin($this -> session -> userdata('id'))):?>
									<a href="<?php echo base_url()?>index.php/admin">ADMIN</a>
								</li>
								<?php endif;endif; ?>
								<li class="has-dropdown" style="margin-top:8px;">
									<a href="#">CATEGORIES</a>
									<ul>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">W</span><span style="font-size:11px;">EDDING</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">B</span><span style="font-size:11px;">LACK AND WHITE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">N</span><span style="font-size:11px;">ATURE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">A</span><span style="font-size:11px;">BSTRACT</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">M</span><span style="font-size:11px;">ACRO</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">C</span><span style="font-size:11px;">ULTURE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">F</span><span style="font-size:11px;">ASHION</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">A</span><span style="font-size:11px;">RCHITECTURE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">P</span><span style="font-size:11px;">EOPLE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">C</span><span style="font-size:11px;">UISINE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">S</span><span style="font-size:11px;">PORTS</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">W</span><span style="font-size:11px;">ILDLIFE</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php">><span style="font-size:14px;">T</span><span style="font-size:11px;">RAVEL</span></a>
										</li>
										<li>
										<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">H</span><span style="font-size:11px;">DR</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">J</span><span style="font-size:11px;">OURNALISM</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">L</span><span style="font-size:11px;">ANDSCAPES</span></a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php"><span style="font-size:14px;">O</span><span style="font-size:11px;">THER</span></a>
										</li>
									</ul>
								</li>
								<li class="has-dropdown" style="margin-top:8px;">
									<a href="#">TOWN HALL</a>
									<ul>
										<li>
											<a href="<?php echo base_url()?>index.php">News</a>
										</li>
										<li>
											<a href="<?php echo base_url()?>index.php">Forum</a>
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
									<a href="<?php echo base_url()?>index.php">STORE</a>
								</li>
<li style="margin-top:8px;">
									
									<a href="<?php echo base_url()?>index.php/uploads" class="upload_btn" style="color:white">Upload</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>



<li style="margin-top:8px;">	
									<form action="<?php echo base_url()?>index.php/search" method="get">
										<input type="text" placeholder="Search" name="search" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field"/>
										
									</form>
								</li>



							</ul>
						</section>
					</div>

				</div>
			</div>

		</header>
		<div id="content">
			
            <?php echo $content ?>
		</div>

	</body>
</html>