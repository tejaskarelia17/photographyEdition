
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
<meta name="description" content="<?php echo $photoData->Description?>" />
<script type="text/javascript">
    $(function(){
        $.ajax({
            url: "<?php echo base_url()?>index.php/comments/viewComments/<?php echo $photoData->id ?>"
        }).done(function(msg) {
                $('#commentData').html(msg);
        });
        var starred=<?php if($starData['starred'])echo "true"; else echo "false";?>;
        $('#reportabuse').click(function(e){
               $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/view/addReportAbuse/<?php echo $photoData->id ?>"
            }).done(function(msg) {
                alert("Reported.");
             }); 
        });
        
        $('#star0').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/1"})});
        $('#star1').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/2"})});
        $('#star2').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/3"})});
        $('#star3').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/4"})});
        $('#star4').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/5"})});
        $('#star5').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/6"})});
        $('#star6').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/7"})});
        $('#star7').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/8"})});
        $('#star8').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/9"})});
        $('#star9').click(function(){$.ajax({url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>/10"})});       
        $('#starCheckImg').click(function(e){
            if(!starred){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/star/add/<?php echo $photoData->id ?>"
            }).done(function(msg) {
                if(msg!="FALSE"){
                    $('#starCheckImg').attr('src', "<?php echo base_url()?>images/Untitled-4.png");
                    starred=true;
                    $('#noOfStarsDiv').html('Stars :'+msg);
                }
                });
            }
            else{
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/star/remove/<?php echo $photoData->id ?>"
            }).done(function(msg) {
                if(msg!="FALSE"){
                    $('#starCheckImg').attr('src', "<?php echo base_url()?>images/Untitled-5.png");
                    starred=false;
                    $('#noOfStarsDiv').html('Stars :'+msg);
                }
                });
          
            }
    });
    } );
</script>
<style>
    #infodiv p{
       font-size: 2em; 
    }
    
    #starCheckImg:hover{
        cursor: pointer;
    }
    
</style> 

<script>
function disp_confirm()
{
var r=alert("Are you sure you want to delete the photo? Hope you have a Backup!")
}
</script>

<title>Red-Eye Photography</title>

<section class="services" style="background-color:white;">
        <div oncontextmenu="return false;" class="nine columns" style="float:left;margin: 0px">
      	<h4 style="color:black"><span><?php echo $photoData->Title?></span></h4>
      	<?php if($this->IPEModel->isOwnerOfPicture($photoData->id,$this->session->userdata('id'))){ ?>
	<a href="<?php echo base_url()?>index.php/uploads/editImage/<?php echo $photoData->id?>">EDIT PHOTO</a>
	<?php } ?>
         <img src="<?php echo base_url("uploads/images")."/".$photoData->location?>"/>
                        

      <p class="leadwhite">
      <div class="four mobile-two columns">
<h4 style="color:black"><i class="iconz-screen"></i> Views : <?php echo $photoData->views;?></h4>
<h4 style="color:black">Rating:
<form>
<input name="star2" type="radio" id="star0" class="star {split:2}" <?php if($stars>=1)echo 'checked="checked" ';?> <?php if(!$logger)echo 'disabled="disabled"';?>/>
<input name="star2" type="radio" id="star1" class="star {split:2}" <?php if($stars>=2)echo 'checked="checked" ';?> <?php if(!$logger)echo 'disabled="disabled"';?>/>
<input name="star2" type="radio" id="star2" class="star {split:2}" <?php if($stars>=3)echo 'checked="checked" ';?>  <?php if(!$logger)echo 'disabled="disabled"';?>/>
<input name="star2" type="radio" id="star3" class="star {split:2}" <?php if($stars>=4)echo 'checked="checked" ';?>  <?php if(!$logger)echo 'disabled="disabled"';?>/>
<input name="star2" type="radio" id="star4" class="star {split:2}" <?php if($stars>=5)echo 'checked="checked" ';?>  <?php if(!$logger)echo 'disabled="disabled"';?>/>
<input name="star2" type="radio" id="star5" class="star {split:2}" <?php if($stars>=6)echo 'checked="checked" ';?> <?php if(!$logger)echo 'disabled="disabled"';?>/>
<input name="star2" type="radio" id="star6" class="star {split:2}" <?php if($stars>=7)echo 'checked="checked" ';?> <?php if(!$logger)echo 'disabled="disabled"';?>/>
<input name="star2" type="radio" id="star7" class="star {split:2}" <?php if($stars>=8)echo 'checked="checked" ';?>  <?php if(!$logger)echo 'disabled="disabled"';?>/>
<input name="star2" type="radio" id="star8" class="star {split:2}" <?php if($stars>=9)echo 'checked="checked" ';?>  <?php if(!$logger)echo 'disabled="disabled"';?>/>
<input name="star2" type="radio" id="star9" class="star {split:2}" <?php if($stars>=10)echo 'checked="checked" ';?>  <?php if(!$logger)echo 'disabled="disabled"';?>/>

</form></h4>

<div id="fb-root"></div>
<p>
  <script>
window.fbAsyncInit = function() {
FB.init({appId: '694181800596219', status: true, cookie: true,
xfbml: true});
};
(function() {
var e = document.createElement('script'); e.async = true;
e.src = document.location.protocol +
'//connect.facebook.net/en_US/all.js';
document.getElementById('fb-root').appendChild(e);
}());
  </script>
  <script type="text/javascript">
$(document).ready(function(){
$('#share_button').click(function(e){
e.preventDefault();
FB.ui(
{
method: 'feed',
name: '<?php echo $photoData->Title?>',
link: '<?php echo base_url()."index.php/view/photo/".$photoData->id?>', 
picture: '<?php echo base_url("uploads/images")."/".$photoData->location?>',
caption: 'http://www.Redeyephotography.com/',
description: '<?php echo $photoData->Description?>',
message: ''
});
});
});
  </script>
  <!--<img src = "<?php echo base_url()?>/images/fb.png" style="cursor:pointer;height:22px;margin-top:18px;padding-right:15px" id = "share_button">-->
  <?php if($adminData):?>
  <a class="push socle" href="<?php echo base_url()?>index.php/view/deleteImage/<?php echo $photoData->id?>" onclick="disp_confirm()" value="Display a confirm box">Delete</a>
  <?php else:?>
  </p>
<p>&nbsp;</p>
<p><a class="push socle" href="<?php echo base_url()?>index.php/view/reportAbuse/<?php echo $photoData->id?>">Report Abuse</a></p>
<?php endif;?>
  </div>    
		<div class="four mobile-three columns">
        <h5 style="color:black"> Camera : <span style="color:rgba(102,102,102,1)"><?php  echo $photoData->camera?></span></h5>
        <h5 style="color:black"> Category : <span style="color:rgba(102,102,102,1)"><?php echo $categoryData?></span></h5>
        <h5 style="color:black"> Tags : <span style="color:rgba(102,102,102,1)"><?php foreach ($tagsData as $tag)echo $tag->name.' ';?></span></h5>
        <h5 style="color:black"> Uploaded on : <span style="color:rgba(102,102,102,1)"><?php echo date('d-m-Y',  strtotime($photoData->upload_time))?></span> </h5>
        <h5 style="color:black"> Copyrights : <span style="color:rgba(102,102,102,1)"><?php echo ucwords(strtolower($userData['userData']->username))?> </span></h5>
        </div>
        <div class="four mobile-four columns">
      <h5 style="color:black">Description</h5>
       <p><span style="color:rgba(102,102,102,1)"><?php echo $photoData->Description?></span></p>
        </div>
<hr> 
 </div>

        <div class="three columns">
    <br><br><br><br>
    
           <?php if($userData['userData']->profileImage==NULL):?>
        <img src="<?php echo base_url()?>assets/images/productDummy.jpg" alt="" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:100px;width:100px"/>
        <?php else:?>

        <img src="<?php echo base_url()."uploads/userProfile/".$userData['userData']->profileImage;?>" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:100px;width:100px"/>
        <?php endif;?> 
        <a href="<?php echo base_url('index.php/view/profile').'/'.$userData['userData']->id?>">
        <B><h4 style="color:black;font-family:Arial;margin-top:-85px;margin-left: 140px"> <?php echo ucwords(strtolower($userData['userData']->username))?></B> 
        <br><span style="font-size:.7em"><?php echo "REP:".($userData['userData']->id +3000)?></span></h4>
       </a>
        <br><br><br><br><br><br><br><br><br><br><br><br>

<?php for($i=0;$i<count($randomeimages);$i++) :?>
<table class="table2" height="150px" cellpadding="0" cellspacing="0" align="center" style="margin-top:-75px;border:none"><tr>
    <?php if($i<  count($randomeimages)):?>
    <td>    
        <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $randomeimages[$i]->picture_id?>">
            <img class="magic" src="<?php echo base_url()."uploads/images/thumbs/". $randomeimages[$i]->location?>" width="150px" height="150px"/>
        </a>  
    </td>
    <?php    $i++; endif;?>
    <?php if($i<count($randomeimages)):?>
    <td>    
        <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $randomeimages[$i]->picture_id?>">
            <img class="magic" src="<?php echo base_url()."uploads/images/thumbs/". $randomeimages[$i]->location?>" width="150px" height="150px"/>
        </a>  
    </td>
    <?php    $i++; endif;?>
    <?php if($i<count($randomeimages)):?>
    <td>    
        <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $randomeimages[$i]->picture_id?>">
            <img class="magic" src="<?php echo base_url()."uploads/images/thumbs/". $randomeimages[$i]->location?>" width="150px" height="150px"/>
        </a>  
    </td>
    <?php     endif;?>

</tr>
</table>
<?php endfor;?>
        </div>
<div id="commentData" style="">

</div>
<div class="row mt40">

</div>
    </section>