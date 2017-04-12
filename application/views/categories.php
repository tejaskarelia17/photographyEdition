<script type="text/javascript">
    $(function(){
        $('.croppedImage').each(function(){
            var $el = $(this);
            if($el.width() > $el.height()){  // Custom coding here
                $el.css('width',300); 
                $el.css('height','auto');
            }
            else{ 
                $el.css('height',300); 
                $el.css('width','auto');
            }
        });
        });
</script>  

<section class="services">
<div id="contentContainer">
                    <?php for($i=0;$i<count($name);$i++):?>
                     <div style="display:block">
                    <h2 ><?php echo $name[$i];?></h2>
                    <h4 style="float: right;margin-top: -50px" class=""><a href="<?php echo base_url()?>index.php/categories/loadCategory/<?php echo $name[$i]?>"><span>View All</span> <img src="<?php echo base_url()?>assets/images/viewAllIcon.jpg" alt="" /></a></h4>
                    </div>
                    <br><br><br><br>          
                    <div class="blockWrapper" style="display: block;height: 300px">
                    <?php foreach($pictures[$i] as $picture):?>
                            <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $picture->id?>"><img src="<?php echo base_url()?>/uploads/images/thumbs/<?php echo $picture->location?>" class="croppedImage" style="height:auto;margin:6px;width:200px;float:left;"/>
                            <div class="contentBlock">
                                <p><?php echo $picture->username?> <img src="<?php echo base_url()?>assets/images/gallery/blackBullet.jpg" ></p>
                            </div></a>
                    <?php endforeach;?>					
                    </div>
                    <br><br><br>
                    <?php endfor;?>
                </div>
</section>
<footer>
    <div class="row">
      <div class="twelve mobile-four columns text-center">
<div align="center">
<table class="table2" style="border:none;" >
<tr>
<td align="center"><p align="right" class="white">Indian Photography Edition</p><a href="http://www.hostrabbit.in" target="_blank"> <img align="right" src="<?php echo base_url()?>images/IPE_Final.png"></a></td>
<td align="center"><p class="white">Developed and Maintained by </p><a href="http://www.hostrabbit.in" target="_blank"> <img src="<?php echo base_url()?>images/HRlogo_Final.png"></a></td>
</tr></table>
</div>

</div>
</div>
</footer>
</body>
</html>