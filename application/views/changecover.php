
<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<link rel="image_src" href="<?php echo base_url("uploads/images")."/".$photoData->location?>" />
<style>
@font-face {
font-family: 'alegreya-regular';
src: url('timeless-webfont.eot');
src: url('timeless-webfont.eot?#iefix') format('embedded-opentype'),
url('timeless-webfont.woff') format('woff'),
url('timeless-webfont.ttf') format('truetype'),
url('timeless-webfont.svg#timeless-webfont') format('svg');
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url()?>stylesheets/design.css">
<link rel="stylesheet" href="<?php echo base_url()?>stylesheets/cycle-slideshow.css">
  <link rel="stylesheet" href="<?php echo base_url()?>javascripts/Rating/jquery.rating.css">
   <script type="text/javascript" src="<?php echo base_url()?>javascripts/Rating/jquery.form.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>javascripts/Rating/jquery.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>javascripts/Rating/jquery.MetaData.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>javascripts/Rating/jquery.rating.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>javascripts/Rating/jquery.rating.pack.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>javascripts/jquery.js"></script>
<title>Red-Eye Photography</title>
<body bgcolor="black">
<h1 align="center" style="padding-top:15px;color:white">Change Cover<br />
    <img src="<?php echo base_url()?>images/highlight.png" /></h1>
<?php echo form_open_multipart('profile/changecover');?>    
    <h4 align="center">

        <input type="file"  name="userfile" class="push socle">Browse</a></h4>
        <h4 align="center">
            <input type="submit" value="Save" class="push socle"></h4>

</form>
<?php  foreach ($pictureData as $pic ):?>

<?php endforeach;?>
</table>
</body>
<script>
    $(document).ready(function(){
    $('.magic').click(function(){
        $.ajax({url:$(this).attr('link')}).done(function(j){
            alert("Cover Picture Changed");
        })
    });
    });
</script>
<style>
    .magic:hover{
        cursor: pointer;
    }
</style>