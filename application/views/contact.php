

<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script type="text/javascript">
function myFunction()
{
alert("E-mail Sent!");
}
</script>
<style type="text/css">
<!--
.style1 {font-size: 24px}
.style8 {font-size: 24px; font-weight: bold; }
.style9 {font-size: 24px; font-weight: bold; }
body {
	background-image: url(../../images/db.jpg);
}
-->
</style>
<title>Red-Eye Photography</title>
<section ="row">
<h5>&nbsp;</h5>
<h5>&nbsp;</h5>
<h5>&nbsp;</h5>
<h5>&nbsp;</h5>
<h5>&nbsp;</h5>
<h5>Quick Contact</h5>
<form name="contactform" method="post" action="ContactForm.php">
  <table  width="1231"  >
  
  
<tr>
 <td width="263" valign="center">
  <label for="first_name" style="color:#000">First Name *</label>
 </td>
 <td width="956" valign="center">
  <input  type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="center"">
  <label for="last_name"  style="color:#000">Last Name *</label>
 </td>
 <td valign="center">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="center">
  <label for="email"  style="color:#000">Email Address *</label>
 </td>
 <td valign="center">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="center">
  <label for="telephone"  style="color:#000">Phone</label>
 </td>
 <td valign="center">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="center">
  <label for="comments"  style="color:#000">Comments *</label>
 </td>
 <td valign="center">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
</tr>
<tr>
 <td height="80" colspan="2" style="text-align:left"><input type="submit" class="submit_btn" value="Submit"><input type="reset"class="submit_btn" value="Reset"></a>
 </td>
</tr>
</table>
</form>
</section>