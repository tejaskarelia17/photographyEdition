<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<section class="portfolio recent">
<div class="row">
<br>
<div style="margin-left: 5%">
<?php echo form_open_multipart('buysell/addAd');?>
<table border="0" class="table2" style="border:none" align="center">
<tr>
<td width="25%" align="right">
    <h4 style="color:black">Item:</h4></td>
<td width="75%" style="padding-top:20px" align="left"><input type="text" name="item" size="120"/></td></tr>
    <tr style="background-color:transparent"><td align="right"><h4 style="color:black">Message:</h4></td>
<td style="padding-top:20px" align="left"><textarea name="message" style="width:100%" rows="5" noresize></textarea></td></tr>
   <tr><td align="right"> <h4 style="color:black">Category:</h4></td>
<td style="padding-top:20px" align="left">

<select name="category" style="width:100px" >
<option value='camera'>Camera</option>
<option value='lens'>Lens</option>
<option value='equipment'>Equipment</option>
</select>
</td></tr>
    <tr style="background-color:transparent"><td align="right"><h4 style="color:black">Price</h4></td><td style="padding-top:20px" align="left"><input type="text" name="prange"/></td></tr>
    <tr style="background-color:transparent"><td align="right"><h4 style="color:black">Contact Number</h4></td><td style="padding-top:20px" align="left"><input type="text" name="contact"/></td></tr>
    <tr style="background-color:transparent"><td align="right"><h4 style="color:black">Picture</h4></td><td style="padding-top:20px" align="left"><label for="myfile" style="width:100px" class="push" data-role="button" data-inline="true" data-mini="true" data-corners="false">Browse</label><input type="file" id="myfile" name="userfile" value="Browse" class="file" style="display:hidden;width:90px;opacity: 0.0;" /></td></tr>
    <tr style="background-color:transparent"><td align="right"><h4 style="color:black">Location</h4></td><td style="padding-top:20px" align="left"><input type="text" name="location"/></td></tr>
    <tr style="background-color:transparent"><td></td><td align="right"><input class="push" style="width:100px" type="submit"/><input class="push" style="margin-left:10px; width:100px" type="Reset"/></td></tr>
    </table>

</form>    </div><br><br><br><br>
</div>
</section>
