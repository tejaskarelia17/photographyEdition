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
.style1 {font-size: 18px}
.style8 {font-size: 18px; font-weight: bold; }
.style9 {font-size: 16px; font-weight: bold; }
-->
</style>
<section ="row">
<h4>Quick Contact</h4>
                    
<form name="contactform" method="post" action="ContactForm.php">
<table width="450px">
<tr>
 <td valign="top">
  <label for="first_name">First Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top"">
  <label for="last_name">Last Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Email Address *</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Phone</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Comments *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
</tr>
<tr>
 <td height="72" colspan="2" style="text-align:left"><input type="submit" class="submit_btn" value="Submit"><input type="reset"class="submit_btn" value="Reset"></a>
 </td>
</tr>
</table>
</form>
</section>