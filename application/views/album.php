
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<style>
    
    .portfolio{
    }
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
    height:100px;  
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
   top: 190px; 
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


<title>Red-Eye Photography</title>

<section class="portfolio recent">


<?php $count=0;foreach($images as $img):?>
    <?php if($count%5==0):?>
    <?php if($count>0):?>
</div>
    <?php endif;?>
<div class="row mb20">

    <?php endif;;?>

        <div class="boxgrid three mobile-four columns">
        <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $img->id?>">
            <img class="thumb" src="<?php echo base_url()."uploads/images/thumbs/". $img->location?>" width="280" height="280" />
        </a>
    <div class="peek boxcaption">  
    <div style="float:left;font-family:Arial">      
        <h2 style="font-size:1.8em"><?php echo $img->Title?></h2> 
        <h3 style="margin-top:-12px"><?php echo $img->username?></h3>
    </div>
    <div style="float:right;margin-right: 5px">
        <h1 class="peeker" style="margin-top:0px"><?php echo $img->stars?></h1>
    </div>
    </div>  

    </div>  

<?php $count++;?>

 <?php endforeach;?>
    </div>  
</section>
