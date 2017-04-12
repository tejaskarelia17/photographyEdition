<section class="slab pb50">
  <div class="row">
         <div class="twelve mobile-four columns pt20">
            <div class="text-center">
                <h1 class="top">Change Album Cover</h1>

            </div>
         </div>
      </div>

</section>

<section class="services" style="min-height: 600px;">

 <?php  foreach ($pictureData as $pic ):?>
             <div style="width:200px;height:200px;overflow: hidden;float:left;background: #ffffff;margin: 10px">
                 <a href="<?php echo base_url()?>index.php/view/changeAlbumCoverPic/<?php echo $aid.'/'.$pic->picture_id?>">
                 <img src="<?php echo base_url()?>uploads/images/thumbs/<?php echo $pic->location?>" ></a>
                 <br>
                 <a href="<?php echo base_url()?>index.php/view/changeAlbumCoverPic/<?php echo $aid.'/'.$pic->picture_id?>">
                     Make Album Cover
                 </a>
             </div>
       <?php endforeach;?>

    </section>       