<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    #adlist{
        font-size: 1.4em;
        margin-left: 5%;
    }
    
        #adlist li{
        width:95%;
        margin: auto;
        height:100px;
        background: #eee;
        font-size: 1.8em;
        padding:8px;
        margin-bottom: 10px;
    }
</style>
<br><br>


<section class="portfolio recent" style="background:black">
      <div class="row mb20">
         <div class="four mobile-four columns xp_pink pt20">

				<div class="thumb">
					<a href="<?php echo base_url()?>index.php/buysell/search?search=camera"><img src="<?php echo base_url()?>images/Cameras.jpg"/><span class="icon-link"></span>
					</a>
				</div>

	</div>

         <div class="four mobile-four columns xp_green pt20">

				<div class="thumb">
					<a href="<?php echo base_url()?>index.php/buysell/search?search=lens"><img  src="<?php echo base_url()?>images/Lenses.jpg"/><span class="icon-zoom"></span>
					</a>
				</div>
	</div>

         <div class="four mobile-four columns xp_orange pt20">

				<div class="thumb">
					<a href="<?php echo base_url()?>index.php/buysell/search?search=equipment"><img src="<?php echo base_url()?>images/Equipments.jpg"/><span class="icon-video"></span>
					</a>
				</div>
	</div>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br>

</section>

    <?php if($logged_in):?>


<?php endif;?>