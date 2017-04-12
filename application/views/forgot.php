<section class="services">
<div class="row">
  <div class="six mobile-four columns">
    <h4 class="h"><span>Forgot Password</span></h4>
      <form action='<?php echo base_url()?>index.php/login/forgotpass' method="post"> 
          <div class="row">
    <div class="two mobile-one columns">
      <label class="right inline">Email:</label>
    </div>
    <div class="ten mobile-three columns">
      <input style="background-color:#494949; border-color:#494949;" type="text" placeholder="Email" name="email" class="eight" />
    </div>
  </div>
<input type="submit" value="Send Email" style="width:100px" class="push socle"></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo base_url()?>index.php/login/register" style="width:100px;align:center;" class="push socle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Register&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td></tr></table></form>

  </div>
</div>
    
</section>



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
     