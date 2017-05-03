<script>
function validateForm()
{
	var p = document.myForm.pass.value; 
	var invalid = " ";
	{     
           		if (p==null || p=="")
		{
 			alert("Password cannot be left blank");
			myForm.pass.style.background='#ff2626';
 		 	return false;
		} 
		else if(p.length < 6)
		{
                			alert("Password length should be between 6-10"); 
				myForm.pass.style.background='#ff2626';
				return false;      
		}
		else if(p.length > 10)
		{
                			alert("Password length should be between 6-10"); 
				myForm.pass.style.background='#ff2626';
				return false;      
		}
		else if(p.indexOf(invalid)!=-1)
		{
                			alert("Spaces not allowed in Password ;-)"); 
				myForm.pass.style.background='#ff2626';
			return false;      
		}
		else
		{
			myForm.pass.style.background='white';
		}
	}
	var pass = document.getElementById("pass").value
	var confPass = document.getElementById("c_pass").value
	if(pass != confPass) 
	{
		alert('Password not Matching -_- ');
		myForm.c_pass.style.background='#ff2626';
		return false;
	}
	else
	{
		myForm.c_pass.style.background='white';
	}
}  
</script>
<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<script>

<section class="services">
<div class="row">
  <div class="six mobile-four columns">
    <h4 class="h"><span style="color:black">Reset Password</span></h4>
      <form action='<?php echo base_url()?>index.php/profile/editpass' name="myForm" onSubmit="return validateForm()" method="post"> 
          <div class="row">
    <div class="two mobile-one columns">
      <label style="color:black" class="right inline">Password:</label>
    </div>
    <div class="ten mobile-three columns">
      <input style="background-color:#EBEDFA;" type="password" placeholder="Password" name="pass" class="eight" />
    </div>
<div class="two mobile-one columns">
      <label style="color:black; margin-left:-50px" class="right inline">Confirm Password:</label>
    </div>
    <div class="ten mobile-three columns">
      <input style="background-color:#EBEDFA;" type="password" placeholder="Confirm Password" name="cpass" class="eight" />
    </div>
  </div>
<input type="submit" value="Reset Password" style="width:130px" class="push socle"></td>
     </tr></table></form>

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
     