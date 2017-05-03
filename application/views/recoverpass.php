<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<section class="slab pb20">
  <div class="row">
         <div class="twelve mobile-four columns pt20">
            <div class="text-center">
               <h1 class="top">Sign Up / Login</h1>
            </div>
         </div>
      </div>
</section>
<section class="services">

<div class="row mt50">

  <div class="six mobile-four columns">
    <h4 style="color:white" class="h"><span>Reset Password</span></h4>
      <form action='<?php echo base_url()?>index.php/login/resetPass?permission=granted&mainhash=AUB82y38bu924B' method="post"> 
          <?php if(!$granted):?>
      <div class="row">
    <div class="two mobile-one columns">
      <label class="right inline">Old Password:</label>
    </div>
    <div class="ten mobile-three columns">
      <input type="Password" name="pass" placeholder="Password" class="eight" />
    </div>
  </div>
          <?php endif;?>
          <div class="row">
    <div class="two mobile-one columns">
      <label class="right inline">New Password:</label>
    </div>
    <div class="ten mobile-three columns">
      <input type="Password" name="pass" placeholder="Password" class="eight" />
    </div>
  </div>
  <div class="row">
    <div class="two mobile-one columns">
      <label class="right inline">Confirm Password:</label>
    </div>
    <div class="ten mobile-three columns">
      <input type="Password" name="conpass" placeholder="Password" class="eight" />
    </div>
  </div>
<input type="submit" value="Reset Password" style="width:100px" class="push socle">
      </form>

  </div>
</div>
    
</section>
<footer>
    <div class="row">
      <div class="twelve mobile-four columns text-center">
<div id="social_links">
<ul>
<li><a class="ico_twitter" href="#"><i class="iconz-twitter"></i></a></li>
<li><a class="ico_facebook" href="#"><i class="iconz-facebook"></i></a></li>

</ul>
</div>
<p class="white">Indian Photography Edition</p>
</div>
</div>
</footer>



    <script src="<?php echo base_url()?>javascripts/jquery.foundation.mediaQueryToggle.js"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.foundation.forms.js"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.event.move.html"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.event.swipe.html"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.foundation.reveal.js"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.foundation.navigation.js"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.foundation.buttons.js"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.foundation.tabs.js"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.foundation.accordion.js"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.placeholder.js"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.foundation.alerts.js"></script>

    <script src="<?php echo base_url()?>javascripts/jquery.foundation.topbar.js"></script>
    <script src="<?php echo base_url()?>javascripts/jquery.foundation.tooltips.js"></script>

  <!-- Initialize JS Plugins -->
  <script src="<?php echo base_url()?>javascripts/app.js"></script>
  <script src="<?php echo base_url()?>plugins/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url()?>plugins/smoothscroll.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){ 
			
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.scrollup').fadeIn();
				} else {
					$('.scrollup').fadeOut();
				}
			}); 
			
			$('.scrollup').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 800);
				return false;
			});
 
		});
		</script>
  <script src="<?php echo base_url()?>plugins/initialize.js"></script>
  <!-- Pretty Print For Code Copy Only -->
  <script src="<?php echo base_url()?>plugins/prettyprint/prettify.js"></script>
  <link type="text/css" rel="stylesheet" href="stylesheets/prettyprint/prettify.css"/>
     
