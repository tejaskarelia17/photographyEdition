<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<style>
    .boxgrid{  
    width: 196px;  
    height: 196px;  
    float:left;  
    overflow: hidden;  
    position: relative;  
    
    background: rgba(10,10,10,1.0);
}  
.boxgrid img{  
    position: absolute;    
    overflow: hidden;  
    padding: 0px;
    top: 0;  
    left: 0;  padding: 10px;
    border: 0;  
} 
.boxcaption{  
    float: left;  
    position: absolute;  margin-left:  10px;
    background: rgba(0,0,0,0.7);
    height: 100px;  
    width: 176px; 
    opacity: 1; 
    z-index: 1;
    /* For IE 5-7 */  
    color:#000;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);  
    /* For IE 8 */  
    -MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";  
    } 
    .boxcaption a h3{
        color:#FFF;
    }
    

.peek{  
        position: absolute;  

   top: 260px;  
    left: 0;  
}  

    </style>
<script type="text/javascript">
    $(function(){
        $('.magic').on('load', function(){
            var self = $(this);
            var width = self.width();
            var height = self.height();
            if(width>height){
                self.css('width', Math.round(212*width/height)+'px');
                self.css('height', '212px');
                
            }
            else{
                self.css('height', (212*height/width)+'px');
                self.css('width', '212px');
                
            }
        });
     $('.boxgrid').hover(function(){  
        $(".peek", this).stop().animate({top:'152px',_cursor: 'hand'},{queue:false,duration:160});  
    }, function() {  
        $(".peek", this).stop().animate({top:'260px',_cursor: 'hand'},{queue:false,duration:160});  
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

    <?php 
    $count=0;
    
    foreach ($images as $img):
        $count++;?>
    <?php if($count==6){
        $count=0;
    }?>
        <title>Red-Eye Photography</title>
<div class="boxgrid">
        <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $img->id?>">
            <img class="magic" src="<?php echo base_url()."uploads/images/thumbs/". $img->location?>" />
        </a>
    <div class="peek boxcaption">  
        <h3><?php echo $img->Title?></h3> 
    </div>  

    </div>
    <?php endforeach;?>
    <?php while($count!=6):
        $count++;?>

    <?php endwhile;?>
