<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<style type="text/css">
    

.boxgrid{  
    width: 260px;  
    height: 260px;
    margin: 0px;
    float:left;  
    overflow: hidden;  
    position: relative;  
}  
.boxgrid img{  
    position: absolute;    overflow: hidden;  
    top: 0;  
    left: 0;  
    border: 0;  
} 
.boxcaption{  
    float: left;  
    position: absolute;  
    background: rgba(0,0,0,0.7);
    height:60px;  
    width: 260px;  
    opacity: 1; 
    z-index: 1;
    /* For IE 5-7 */  
    color:#FFF;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);  
    /* For IE 8 */  
    -MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";  
    } 
    .boxcaption a h3{
        color:#FFF;
    }
    
    .thumb{
        height:260px;
        width:260px;
        overflow:hidden;
    }

.peek{  
   position: absolute;  
   top: 0; 
   bottom: 0;
    left: 0;  
}  
.peek h3{
    font-size: 1em;
}
body,td,th {
	color: #41B4D4;
}
a:link {
	color:black;
}
a:visited {
	color:rgba(153,153,153,1);
}
.contentBlock{
    opacity: 1.0;
    transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out; /* FF 4 */
    -webkit-transition: all 0.5s ease-in-out; /* Safari & Chrome */
    -o-transition: all 0.5s ease-in-out; /* Opera */}

.blockWrapper{margin: 10px;} 
</style>
  <script type="<?php echo base_url()?>text/javascript" src="javascripts/jquery.js"></script>
<script src="<?php echo base_url()?>plugins/jquery.quicksand.js"></script>
<script src="<?php echo base_url()?>plugins/script.js"></script>
  <script src="<?php echo base_url()?>javascripts/modernizr.foundation.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>stylesheets/foundation.css">
  <link rel="stylesheet" href="<?php echo base_url()?>stylesheets/design.css">
<link rel="stylesheet" href="<?php echo base_url()?>stylesheets/quicksand.css">
<script type="text/javascript">
    $(function(){
        $('.blockWrapper').mouseover(function(){
            $(this).children('.contentBlock').css('opacity', '1.0');
        });
        $('.blockWrapper').mouseout(function(){
            $(this).children('.contentBlock').css('opacity', '0.0');
        });
    });
    </script>



<title>Red-Eye Photography</title>

<section class="recent portfolio" style="background:white">
    
      <div class="row mb20" style="margin-top:20px">
<a href="<?php echo base_url()?>index.php/view/albumgallery/<?php echo $id?>" class="push socle" style="margin-left:10px;color:white">Link to Gallery</a><br><br>
    <?php foreach ($data as $v):?>
  <table width="600" style="background:white;border: none;" cellspacing="0px">

  <tr>
    <td>
               <div class="boxgrid">
        <a href="<?php echo base_url()?>index.php/view/album/<?php echo $v->id?>"><div>
            <img src="<?php echo base_url()?>uploads/images/thumbs/<?php echo $v->photo->location?>" style="width:200px;border-top-left-radius: 15px;-moz-border-top-left-radius: 15px;-webkit-top-left-border-radius: 15px;border-bottom-left-radius: 15px;-moz-border-bottom-left-radius: 15px;-webkit-bottom-left-border-radius: 15px;"></a>
        <div>  
        <h2 style="font-size:1.8em"><?php echo $v->name?></h2> 
    </div>  

    </div> 
    </td>
    <td width="860">
        <table width="600" style="background:white;border: none;" border="0" align="left">
  <tr style="background:#222;border: none;">
    <td width="121" style="color:black;background:white">Album Name:</td>
    <td width="258" style="color:black;background:white"><a href="<?php echo base_url()?>index.php/view/album/<?php echo $v->id?>"><?php echo $v->name?></a></td>
<td height="18" style="color:black;background:white">Created  on:</td>
    <td style="color:black;background:white"><?php echo date('d F, Y',  strtotime($v->time))?></td>

  </tr>
  <tr style="background:white;border: none;">
    <td style="color:black">Total Photos:</td>
    <td style="color:black;"><?php echo $v->albumStuff['count']?></td>
<td colspan="2"><a href="<?php echo base_url()?>index.php/gallery/index/<?php echo $v->id?>" class="push socle" style="color:white">Slideshow</a></td>
  </tr>
  <tr style="background:white;border: none;">
    <td style="color:black;">Total Stars:</td>
    <td style="color:black;"><?php echo $v->albumStuff['stars']?></td><td colspan="2" ><a class="push socle left" href="<?php echo base_url()?>index.php/view/changeAlbumCover/<?php echo $v->id?>" style="color:white">Change Display Pic</a></td>
  </tr>
  <tr style="background:white;border: none; text-align:right;"> 
<td></td><td></td>
    <td colspan="2" align="right"><a class="push socle" href="<?php echo base_url()?>index.php/view/deleteAlbum/<?php echo $v->id?>" style="color:white">Delete Album</a></td>
  </tr>
</table>
	</table>		
    <?php endforeach;?>
        
      </div>
</section>