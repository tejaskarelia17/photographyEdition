<script>
    $(function(){
        $('.resizer').each(function(){
            if($(this).width() > $(this).height()) { 
                $(this).css('width',80+'px');
                $(this).css('height','auto');
            } else {
                $(this).css('height',80+'px');
                 $(this).css('width','auto');
            }
        });
        $('.resizer').each(function(){
            if($(this).width() > $(this).height()) { 
                $(this).css('width',500+'px');
                $(this).css('height','auto');
            } else {
                $(this).css('height',500+'px');
                 $(this).css('width','auto');
            }
        });
        
            $('#clicktocompete').click(function(){
                                $('#clicktocompete').css('opacity',0);
                $('#imagedisplay').css('opacity', 1);
            });
            $('.resizer').click(function(){
                $(this).attr('matter')
            });
    })
</script>
<title>Red-Eye Photography</title>

<section class="slab pb50">
  <div class="row">
         <div class="twelve mobile-four columns pt20">
            <div class="text-center">
                <h1 class="top"><?php echo $data->name?></h1>

            </div>
         </div>
      </div>

</section>

<section class="services">

<div class="port_head">


</div>
      <div class="row mb20">
        
             <h2><?php echo $data->description?></h2><br>

        <?php if(!empty($winner)):?>
                          <h1>WINNER</h1><br>

                              <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $winner['photoData']->id?>">
                 <img src="<?php echo base_url()?>uploads/images/<?php echo $winner['photoData']->location?>"></a> 
                          <br>
                          By <?php echo $winner['userData']['userData']->username?>
        <?php else:?>
        <?php if($logged_in):?>
             <?php if($isAdmin):?>
             <?php  foreach ($pictureData as $pic ):?>
             <div style="width:100px;height:100px;overflow: hidden;float:left;background: #ffffff;margin: 2px">
                 <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $pic->id?>">
                 <img src="<?php echo base_url()?>uploads/images/thumbs/<?php echo $pic->location?>" class="resizer" matter="<?php echo $pic->id?>"></a>
                 <br>
                 <a href="<?php echo base_url()?>/index.php/contest/setwinner/<?php echo $pic->id.'/'.$data->id?>">Pick as winner</a>
             </div>
       <?php endforeach;?>
             
        <?php else:?>
        <?php if(empty($already)):?>
        <input type="button" class="push socle" value="Compete" id="clicktocompete" style="width:100px">
        <br>
        <div id="imagedisplay" style="opacity:0">
        <?php  foreach ($pictureData as $pic ):?>
             <div style="width:100px;height:100px;overflow: hidden;float:left;background: #ffffff;margin: 2px">
                 <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $pic->id?>">
                 <img src="<?php echo base_url()?>uploads/images/<?php echo $pic->location?>" class="resizer" matter="<?php echo $pic->id?>"></a>
                 <a href="<?php echo base_url()?>index.php/contest/addPictureToContest/<?php echo $pic->id.'/'.$data->id?>">
                     Add in Contest
                 </a>
             </div>
       <?php endforeach;?>
            </div>
        <?php else:?>
        Your Entry:<br>
             <div style="width:100px;height:100px;overflow: hidden;float:left;background: #ffffff;margin: 2px">
                 <img src="<?php echo base_url()?>uploads/images/<?php echo $already->location?>" class="resizer">
             </div>
        <?php endif;?>
        <?php endif?>
        <?php else :?>
                <a class="push socle" href="<?php echo base_url()?>index.php/login" style="width:200px">Login to compete</a>
        <?php endif?>
        <?php endif?>
                

</div>
</section>