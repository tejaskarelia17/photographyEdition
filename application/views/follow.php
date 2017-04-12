

<section class="services">
<?php foreach ($data as $val):?>
  <div class="row">
    <div class="three mobile-four columns text-center">
            <a href="<?php echo base_url('index.php/view/profile').'/'.$val['userData']->id?>">
        <?php if($val['userData']->profileImage==NULL):?>
        <img src="<?php echo base_url()?>assets/images/productDummy.jpg" alt="" />
        <?php else:?>
        <img src="<?php echo base_url()?>assets/images/userProfile/<?php echo $val['userData']->profileImage?>" alt="" />
        <?php endif;;?>
            </a>
</div>
    <div class="nine mobile-four columns">


<p><span class="drop">&ldquo;</span>
<div class="wrapper">
<a href="<?php echo base_url('index.php/view/profile').'/'.$val['userData']->id?>">
<p>Followers (<?php echo $val['noOfFollowers']?>Following (<?php echo $val['noOfFollowing']?>)
 Album (<?php echo $val['noOfAlbums']?>) Photos (<?php echo $val['noOfPictures']?>)</p>
                        

</div></p><cite><?php echo $val['userData']->username?></cite> </a>
</div></div>

      <?php endforeach;?>
</section>

 <!-- Included JS Files (Uncompressed) -->
  <!--
    <script src="javascripts/jquery.js"></script>
    <script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script>
    <script src="javascripts/jquery.foundation.forms.js"></script>
    <script src="javascripts/jquery.event.move.js"></script>
    <script src="javascripts/jquery.event.swipe.js"></script>
    <script src="javascripts/jquery.foundation.reveal.js"></script>
    <script src="javascripts/jquery.foundation.navigation.js"></script>
    <script src="javascripts/jquery.foundation.buttons.js"></script>
    <script src="javascripts/jquery.foundation.tabs.js"></script>
    <script src="javascripts/jquery.foundation.tooltips.js"></script>
    <script src="javascripts/jquery.foundation.accordion.js"></script>
    <script src="javascripts/jquery.placeholder.js"></script>
    <script src="javascripts/jquery.foundation.alerts.js"></script>
    
    -->
    <script src="../javascripts/jquery.foundation.topbar.js"></script>

  <!-- Initialize JS Plugins -->
  <script src="../javascripts/app.js"></script>
  <script src="../plugins/jquery.easing.1.3.js"></script>
  <script src="../plugins/smoothscroll.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){ 
			
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.scrollup').fadeIn();
				} else {
					$('.scrollup').fadeOut();
				}
			}); 
			
			$('.scrollup').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 800);
				return false;
			});
 
		});
		</script>
  <script src="../plugins/initialize.js"></script>
<script src="../plugins/jquery.cycle2.min.js"></script>
<script src="../plugins/jquery.cycle2.tile.min.js"></script>
</body>
</html>
