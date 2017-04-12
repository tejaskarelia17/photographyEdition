<?php $this -> load -> view('dashboard/header');
$this -> load -> model('dashboard_model');
$letters = array(); ?>

<div class="ten columns">
	<div style="padding-top:20px;" class="row">
		<h1 style="font-size:24px">Following</h1>
		<br>
		<?php foreach(range('A','Z') as $letter) : ?>
			<?php if($result = $this->dashboard_model->getFollowing($letter)) : ?>
			<table class="table2" border="0" cellspacing="0" cellpadding="2" style="border:none;">
				<tr>
					<a name="<?php echo $letter ?>">
					<div style="color:rgba(255,255,255,1); padding-top:70px; font-size:24px">
						<?php echo $letter ?>
					</div>
					<hr>
					</a>
				<?php array_push($letters,$letter); ?>
				<?php $count=0; ?>
				<?php foreach ($result as $row) : ?>
				<?php if($count%3==0) : ?>
				</tr>
				<tr style="background: none">
				<?php endif; ?>
					
					<td width="16.67%" style="float:left">
						<a href="<?php echo base_url() ?>index.php/profile/view/<?php echo $row -> id; ?>">
							<img style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:100px;width:100px" src="<?php echo base_url() ?>uploads/userProfile/<?php echo $row -> profileImage; ?>">
						</a>
					</td>
					<td width="16.67%" style="float:left;color:rgba(255,255,255,1); padding-top:25px">
						<a style="color:rgba(255,255,255,1);" href="<?php echo base_url() ?>index.php/profile/view/<?php echo $row -> id; ?>">
							<?php echo $row -> username; ?>
						</a>
					</td>
					<td>
						<?php echo "ipe".($row -> id +3000); ?>
					</td>
					<td>
						<?php echo $row -> city; ?>
					</td>
			
				</tr>
				<?php $count++; ?>
				<?php endforeach; ?>					
				
			</table>
			<?php endif; ?>
		<?php endforeach; ?>
		
	</div>
</div>

<div class="two columns" align="right" style="height:750px;">
	<br>
	<div id="navigation-block">
		<ul style="position:fixed;" id="sliding-navigation">
			<?php foreach($letters as $letter) { ?>
			<li class="sliding-element">
				<a href="#<?php echo $letter; ?>"><?php echo $letter; ?></a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>

<?php $this -> load -> view('dashboard/footer'); ?>