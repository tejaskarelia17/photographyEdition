<?php foreach ($data as $value): ?>
<title>Red-Eye Photography</title>


<section class="services">
<div class="row">
<div class="three mobile-four columns text-center">
<a href="<?php echo base_url('index.php/view/profile').'/'.$value['userdata']['userData']->id?>">
<?php if($value['userdata']['userData']->profileImage==NULL):?>
<img src="<?php echo base_url()?>assets/images/productDummy.jpg" alt="" />
<?php else: ?>
<img src="<?php echo base_url() . "uploads/userProfile/" . $value['userdata']['userData'] -> profileImage; ?>" height="75" width="75" alt="" />
<?php endif; ?>

</div>
<div class="nine mobile-four columns">

<p><span class="drop">&ldquo;</span>
<a href="<?php echo $value['link']?>">
<?php echo $value['stringit']?>     </a>
</p>
<!--<cite><?php echo $value['userdata']['userData']->username?></cite>-->
<br>
<cite>
	<?php 
		$time = time()-strtotime($value['timestamp']);
		if($time < 60){
			echo $time." seconds ago"; 
		}elseif($time < (60*60)){
			echo floor($time/60)." minutes ago"; 
		}elseif($time < (60*60*24)){
			echo floor($time/(60*24))." hours ago"; 
		}else{
			echo $value['timestamp'];
		}
	?>
</cite>

</div>
</div>
<?php endforeach; ?>
