//submit form to 'news/add'
//title
//message
//file
//type
//submit

<section class="portfolio recent">

<br>
<div style="margin-left: 5%">
<?php echo form_open_multipart('news/add');?>

    <h3>Title:</h3><br>
    <input type="text" name="title" style="width:90%" size="120"/><br>
    <h3>News Picture:</h3><br><input class="push" type="file" name="userfile"/><br>
<h3>News Type:</h3><br><select name="type">
  <option value="0">Normal News</option>
  <option value="1">Featured News</option>
</select>
   
    <h3>News Item:</h3><br>
    <textarea name="message" cols="100" rows="10" style="width:90%"></textarea>
    
    <input class="push" type="submit"/>&nbsp;&nbsp;<input class="push" type="reset"/>
    
</form>
    </div>
</section>