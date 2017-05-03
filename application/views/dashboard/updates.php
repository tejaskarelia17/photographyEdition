<?php $this -> load -> view('dashboard/header'); ?>
<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>


<div class="row2" style="background-color: #FFF">

<div class="nine columns" style="border:none; overflow:hidden; background-color:transparent;">
	<?php /*
	<?php foreach($result0 as $row):?>
	<br>
		<img style="border-top-width: 0px; display: inline; border-left-width: 0px; border-bottom-width: 0px; margin: 0px 10px 0px 0px; border-right-width: 0px" src="<?php echo base_url() ?>uploads/news/<?php echo $row->pic_loc ?>" border="0" width="180" height="166" align="left" /></noscript></a></p>
		<h2 style="font-size:20px"><?php echo $row->title ?></h2>
		<h4 style="font-size:16px"><?php echo $row->time ?></h4>
		<p class="leadwhite"><?php echo $row->message ?></p>
	<br>
	<hr>
	<?php endforeach; ?>
	*/ ?>
	
	
		<section class="services" style="background-color:#FFF;margin-top:-50px">
			<?php foreach ($data as $value): ?>
			<div class="row">
				<div class="three mobile-four columns text-center" style="margin-left:-80px">

					<a href="<?php echo base_url('index.php/view/profile').'/'.$value['userdata']['userData']->id?>">
					<?php if($value['userdata']['userData']->profileImage==NULL):?>
						<img src="<?php echo base_url()?>assets/images/productDummy.jpg"  alt="" />
					<?php else: ?>
						<img src="<?php echo base_url() . "uploads/userProfile/" . $value['userdata']['userData'] -> profileImage; ?>" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:100px;width:100px" alt="" />
					<?php endif; ?>	
					</a>			
				</div>

			<div class="ten columns">			
				<p>
					<span class="drop" style="margin-left:-40px;">&ldquo;</span>
					<a style="color:black; margin-left:-20px; text-decoration:none" href="<?php echo $value['link']?>">
						<?php echo $value['stringit']?>
					</a>
				</p>
				<!--<cite><?php echo $value['userdata']['userData']->username?></cite>-->
				<br>
				<cite style="margin-left:-40px;">
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
	
</div>

<div id="Updates" class="three columns" style="border:none; overflow:auto; margin-top:50px;background-color:transparent;"><br>
	<?php foreach($result1 as $row):?>
	<br>
	<a style="margin-top:50px;" href="<?php echo base_url()?>index.php/news/newsitem/<?php echo $row->id?>">
		<h2 style="font-size:20px;margin-top:-20px;color:black;"><?php echo $row->title ?></h2>
	</a>
	<p style="color:black; margin-top:40px"><?php echo $this->IPEModel->replace_links(substr($row->message,0,200));if(strlen($row->message)>201)echo "<a href=".base_url()."index.php/news/newsitem/".$row->id."><font color='blue'>...Read More</font></a>"?></p>
	<br>
	<hr style="margin-top:-10px;border-top: 10px solid #000;">
	<?php endforeach; ?>

</div>

<?php $this -> load -> view('dashboard/footer'); ?>