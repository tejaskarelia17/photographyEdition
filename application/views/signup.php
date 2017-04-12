<section class="services">

    <div class="row mt50">

<div class="six mobile-four columns">
    <h4 class="h"><span>Sign Up</span></h4>
    <div style="color:rgba(255,255,255,1)"><?php if(isset($errors))echo $errors."<br>"?></div><br>
<form action='<?php echo base_url()?>index.php/login/registerfunc' method="post">
  <label>Userame :</label>
  <input style="background-color:#494949; border-color:#494949;" type="text" name="username" placeholder="Username" />
  <label>Password :</label>
  <input style="background-color:#494949; border-color:#494949;" type="password" name="password" placeholder="Password" />
  <label>Confirm Password :</label>
  <input style="background-color:#494949; border-color:#494949;" type="password" name="cpassword" placeholder="Confirm Password" />
  <label>E-Mail :</label>
  <input style="background-color:#494949; border-color:#494949;" type="text" name="email" placeholder="E-Mail" />
  <label>State :</label>
  <input style="background-color:#494949; border-color:#494949;" type="text" name="state" placeholder="State" />
  <label>City :</label>
  <input style="background-color:#494949; border-color:#494949;" type="text" name="city" placeholder="City" /><br>
  <label>CAPTCHA :</label><?php echo $image; ?>
  <input style="background-color:#494949; border-color:#494949;" type="text" name="cap" placeholder="CAPTCHA" /><br>
  <p style="color:rgba(255,255,255,1)"><input name="terms" type="checkbox">I Agree to the Terms & Conditions</p>
      <input type="submit" style="width:100px" class="push socle">
</form>

  </div></div>
</section>