<section class="services">
<div class="row">
  <div class="six mobile-four columns"><font face="Calibri">
    <p style="color:white; font-size:24px">Validate Age</p><br><p style="color:grey;font-size:16px">Inorder to continue with the registration process kindly tell us when you were born</p></font>
<table class="table2" style="border:none">
<tr>
<td>
<form action='<?php echo base_url()?>index.php/login/registertnc' method="post"> 
<input type="hidden" value="<?php echo date('j-M-Y',strtotime('18 years ago')) ?>" name="dob">
<input type="submit" value="Before <?php echo date('j-M-Y',strtotime('18 years ago')) ?>" style="width:200px;align:center;" class="push socle">
</form>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<form action='<?php echo base_url()?>' method="post"> 
<input type="submit" value="After <?php echo date('j-M-Y',strtotime('18 years ago')) ?>" style="width:200px;align:center;" class="push socle">
</form>
</td></tr></table>

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
     