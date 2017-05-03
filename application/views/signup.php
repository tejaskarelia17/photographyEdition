<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<section class="services">

    <div class="row mt50">

<div class="six mobile-four columns">
    <h4 class="h"><span style="color:black">Sign Up</span></h4>
    <div style="color: #000"><?php if(isset($errors))echo $errors."<br>"?></div><br>
<form action='<?php echo base_url()?>index.php/login/registerfunc' method="post">
  <label style="color:black">Userame :</label>
  <input style="background-color:#EBEDFA;" type="text" name="username" placeholder="Username" />
  <label style="color:black">Password :</label>
  <input style="background-color:#EBEDFA;" type="password" name="password" placeholder="Password" />
  <label style="color:black">Confirm Password :</label>
  <input style="background-color:#EBEDFA;" type="password" name="cpassword" placeholder="Confirm Password" />
  <label style="color:black">E-Mail :</label>
  <input style="background-color:#EBEDFA;" type="text" name="email" placeholder="E-Mail" />
  <label style="color:black">State :</label>
  <input style="background-color:#EBEDFA;" type="text" name="state" placeholder="State" />
  <label style="color:black">City :</label>
  <input style="background-color:#EBEDFA;" type="text" name="city" placeholder="City" /><br>
  <label style="color:black">CAPTCHA :</label><?php echo $image; ?>
  <input style="background-color:#EBEDFA;" type="text" name="cap" placeholder="CAPTCHA" /><br>
  <p style="color:black"><input name="terms" type="checkbox">I Agree to the Terms & Conditions</p>
      <input type="submit" style="width:100px" class="push socle">
</form>

  </div></div>
</section>