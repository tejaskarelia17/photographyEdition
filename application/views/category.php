<style>

    .portfolio{
    }
    .boxgrid{  
    width: 350px;  
    height: 350px;
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
    margin-top:120px;
    position:relative;  
    background: rgba(0,0,0,1);
background: -moz-linear-gradient(45deg, rgba(0,0,0,1) 70%, rgba(255,255,255,0) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(70%, rgba(0,0,0,1)), color-stop(100%, rgba(255,255,255,0)));
background: -webkit-linear-gradient(45deg, rgba(0,0,0,1) 70%, rgba(255,255,255,0) 100%);
background: -o-linear-gradient(45deg, rgba(0,0,0,1) 70%, rgba(255,255,255,0) 100%);
background: -ms-linear-gradient(45deg, rgba(0,0,0,1) 70%, rgba(255,255,255,0) 100%);
background: linear-gradient(45deg, rgba(0,0,0,1) 70%, rgba(255,255,255,0) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='transparent', GradientType=1 );
    height:50px;  
    width: 350px;  
    opacity: 1; 
    z-index: 1;
    /* For IE 5-7 */  
    color:#FFF;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=60);  
    /* For IE 8 */  
    -MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=60)";  
    } 
    .boxcaption a h3{
        color:#FFF;
    }
    
    .thumb{
        height:350px;
        width:350px;
        overflow:hidden;
    }
.boxcaption1{ 
    float: left;
    margin-top:-180px;
    position:fixed;  
    background: -webkit-linear-gradient(left, #000, transparent);

  /* Firefox 3.6+ */
  background: -moz-linear-gradient(left, #2F2727, #1a82f7);

  /* IE 10 */
  background: -ms-linear-gradient(left, #2F2727, #1a82f7);

  /* Opera 11.10+ */
  background: -o-linear-gradient(left, #2F2727, #1a82f7);
    height:25px;  
    width: 350px;  
    opacity: 1; 
    z-index: 1;
    /* For IE 5-7 */  
    color:#FFF;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=60);  
    /* For IE 8 */  
    -MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=60)";  
    } 
    .boxcaption a h3{
        color:#FFF;
    }
    
    .thumb{
        height:350px;
        width:350px;
        overflow:hidden;
    }
.peek{  
   position: absolute;  
   top: 200px; 
   bottom: 0;
    left: 0;  
}  
.peek h3{
    font-size: 1em;
}
.croppedImage{
     width:100px; /* you can use % */
    height: auto;
    opacity:0.5;
    transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out; /* FF 4 */
    -webkit-transition: all 0.5s ease-in-out; /* Safari & Chrome */
    -o-transition: all 0.5s ease-in-out; /* Opera */
}

.croppedImage:hover{
    opacity:1.0;
        cursor: pointer;
    _cursor: hand;
}

.row{
    width:102%;
    margin-left: 1%;
}
.main{
	box-shadow: 0 1px 3px rgba(34,25,25,0.4);
	-moz-box-shadow: 0 1px 3px rgba(34,25,25,0.4);
	-webkit-box-shadow: 0 1px 3px rgba(34,25,25,0.4);
 margin: 0 auto;
background-color:#000000;
border-top:2px solid #333;
margin-bottom:0 !important;
}
    </style>
<script type="text/javascript">
    $(function(){
    

     $('.boxgrid').hover(function(){  
         $(".peeker", this).toggle('slow');
    
    }); 
        
        $('.imageDelete').click(function(){
            var id=    $(this).attr('id');
            id=id.substring(12);
            $.ajax({
                url: "<?php echo base_url()?>index.php/uploads/deleteImage/"+id
            }).done(function(data) {
                $('#imageTable').html(data);
             });
        });
        });
</script>    
<section class="row2 main" style="padding-top:70px;">

<!--<h1><?php echo $page?></h1>-->


<?php $count=0;foreach($images as $img):?>

    <?php if($count%4==0):?>
    <?php if($count>0):?>
</div>
    <?php endif;?>
    
<table class="table2" style="margin-top:-75px;width:1220px; border:none; margin-left:8px" align="center">    
<div class="row mb20">
<tr>
     
    <?php endif;;?>
<td width="25%" align="left">
   <div class="boxgrid three mobile-four columns">
        <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $img->id?>">
            <img class="thumb" src="<?php echo base_url()."uploads/images/thumbs/". $img->location?>" width="280px" height="280px" />
        </a>
<div class="peek boxcaption1">  
    <div style="float:left;font-family:Arial">      
        
        <h2 style="font-size:1.8em;margin-top:-1px"><?php echo ucwords(strtolower(substr($img->Title,0,17)));if(strlen($img->Title)>18)echo "..."?></h2>
    </div>
</div>
    <div class="peek boxcaption">  
    <div style="float:left;">      
        
        <h2 style="font-family:Arial;font-size:1.1em;margin-top:8px; color:grey"><?php echo ucwords(strtolower($img->username));?></h2> 
        
    </div>
    <div style="float:right;margin-right: 8px">
        <h2 class="peeker" style="font-size:1.5em;margin-top:5px"><?php echo $img->stars?></h2>
    </div>
    </div>  
    </div>  
</td>
<?php $count++;?>

 <?php endforeach;?>
</tr>
    </div>
</table>
  <footer>
    <div class="row">
      <div class="twelve mobile-four columns text-center">
<div align="center">

</div>

</div>
</div>
</footer>
</section>

    <script src="<?php echo base_url()?>javascripts/jquery.foundation.topbar.js"></script>

  <!-- Initialize JS Plugins -->
  <script type="text/javascript" src="<?php echo base_url()?>javascripts/jquery.js"></script>
<script src="<?php echo base_url()?>plugins/jquery.quicksand.js"></script>
<script src="<?php echo base_url()?>plugins/script.js"></script>
  <script src="<?php echo base_url()?>javascripts/modernizr.foundation.js"></script>

  <script src="<?php echo base_url()?>javascripts/app.js"></script>
  <script src="<?php echo base_url()?>plugins/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url()?>plugins/smoothscroll.js"></script>