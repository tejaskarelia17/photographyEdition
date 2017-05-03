<title>Red-Eye Photography</title>

<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<section class="services" style="margin-left:275px;">
<div class="row2 mt50">
  <div class="six mobile-four columns">
  <h2 align="center" style="color:black">Edit Profile</h2>
<?php echo form_open_multipart('profile/editBasicProfile');?>    
  <table class="table2" style="background:transparent;border:none"><tr><td width="25%"><label style="color:black">Name :</label></td>
	<td width="75%"><input style="background-color:#EBEDFA;" type="text" name="username" placeholder="Name" value="<?php echo $data->username?>" /></td></tr>
      <tr style="background:transparent;border:none"><td><label style="color:black">Display Pic :</label></td>
<td><table class="table2" style="background:transparent;border:none">
<tr style="background:transparent;border:none"><td>      <?php if($data->profileImage!=NULL):?>
        <img src="<?php echo base_url()."uploads/userProfile/".$data->profileImage;?>" align="center" height="100px" width="100px" alt="<?php echo $data->username?>"" />
        <?php endif;?>
</td><td><input type="file" id="myfile" name="userfile" value="Browse" class="file" style="display:hidden;width:90px;opacity: 0.0;" />
<label for="myfile" class="push" data-role="button" data-inline="true" data-mini="true" data-corners="false" style="width:90px">Browse</label></td></tr></table></td></tr>

        <tr style="background:transparent;border:none"><td><label style="color:black">About :</label></td><td>
	<textarea cols="50" style="width:510px;height:80px;background-color:#EBEDFA;" name="bio"><?php echo $data->bio?></textarea></td></tr>
	<tr style="background:transparent;border:none"><td><label style="color:black">Facebook :</label></td><td>
	<input style="background-color:#EBEDFA;" type="text" placeholder="Go to your profile and copy the url and paste it!"  name="facebook" value="<?php echo $data->facebook?>"/></td></tr>
	<tr style="background:transparent;border:none"><td><label style="color:black">Twitter :</label></td><td>
	<input style="background-color:#EBEDFA;" type="text" placeholder="Go to your profile and copy the url and paste it!"  name="twitter" value="<?php echo $data->twitter?>"/></td></tr>
	<tr style="background:transparent;border:none"><td><label style="color:black">Website :</label></td><td>
	<input style="background-color:#EBEDFA;" type="text" placeholder="Website" name="site" value="<?php echo $data->website?>"/></td></tr>
	<tr style="background:transparent;border:none"><td><label style="color:black">Email :</label></td><td>
	<input style="background-color:#EBEDFA;" type="text" placeholder="Email" name="email" value="<?php echo $data->email?>"/></td></tr>
	<tr style="background:transparent;border:none"><td><label style="color:black">Phone :</label></td><td>
	<input style="background-color:#EBEDFA;" type="text" placeholder="Phone" name="contact" value="<?php echo $data->contact?>"/></td></tr></table>
<h4 align="center"><input type="submit" value="Save" class="push socle"  href="<?php echo base_url()?>index.php">home</h4>
</form>

           
  </div>
  
<a onclick="myDelete()">DE-REGISTER</a><br>
<a href="<?php echo base_url()?>index.php/profile/password/<?php echo $data->id?>">Change Password</a><br />

</section>
<script>
function myDelete()
{
var x;
var r=confirm("All Photos, Comments, Messages and other related things will be permanently deleted !!!");
if (r==true)
  {
  window.location.replace("<?php echo base_url()."index.php/profile/deleteuser/".$data->id;?>");
  }
}
</script>




    <script src="../javascripts/jquery.foundation.mediaQueryToggle.js"></script>
    <script src="../javascripts/jquery.foundation.forms.js"></script>
    <script src="../javascripts/jquery.event.move.html"></script>
    <script src="../javascripts/jquery.event.swipe.html"></script>
    <script src="../javascripts/jquery.foundation.reveal.js"></script>
    <script src="../javascripts/jquery.foundation.navigation.js"></script>
    <script src="../javascripts/jquery.foundation.buttons.js"></script>
    <script src="../javascripts/jquery.foundation.tabs.js"></script>
    <script src="../javascripts/jquery.foundation.accordion.js"></script>
    <script src="../javascripts/jquery.placeholder.js"></script>
    <script src="../javascripts/jquery.foundation.alerts.js"></script>

    <script src="../javascripts/jquery.foundation.topbar.js"></script>
    <script src="../javascripts/jquery.foundation.tooltips.js"></script>

  <!-- Initialize JS Plugins -->
  <script src="../javascripts/app.js"></script>
  <script src="../plugins/jquery.easing.1.3.js"></script>
  <script src="../plugins/smoothscroll.js"></script>

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
  <script src="../plugins/initialize.js"></script>
  <!-- Pretty Print For Code Copy Only -->
  <script src="../plugins/prettyprint/prettify.js"></script>
  <script>
function myFunction()
{
alert("go to your profile and copy the url and paste it!");
}
</script>
  <link type="text/css" rel="stylesheet" href="../stylesheets/prettyprint/prettify.css"/>
</body>
</html>