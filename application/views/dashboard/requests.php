<?php $this -> load -> view('dashboard/header'); ?>
<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<div class="row">
	<br>
	<br>
	<br>
	<div class="six columns" style="border:none; overflow:hidden; background-color:white;">
		<h4 style="font-size:24px;color:black"><i>Friend Request</h4></i>
		<br>
		
		<?php foreach($friend as $row): ?>
		<br>
		<a href="<?php echo base_url() ?>index.php/view/profile/<?php echo $row -> friend1; ?>">
		<img style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:100px;width:100px;border-top-width: 0px; display: inline; border-left-width: 0px; border-bottom-width: 0px; margin: 0px 10px 0px 0px; border-right-width: 0px" title="" src="<?php echo base_url() ?>uploads/userProfile/<?php echo $row -> profileImage; ?>" border="0" alt="" width="120" height="120" align="left" />
		</a>
		<p style="margin-top:-18px;color:black">
		<a href="<?php echo base_url() ?>index.php/view/profile/<?php echo $row -> friend1; ?>">
		<?php echo $row->username ?>
		</a> wants to be ur friend.
		</p>
			<a style="text-decoration:none" href="<?php echo base_url() ?>index.php/dashboard/accept_friend/<?php echo $row -> id; ?>" class="push">Accept</a>
			<a style="text-decoration:none" href="<?php echo base_url() ?>index.php/dashboard/deny_friend/<?php echo $row -> id; ?>" class="push">Deny</a>
		<br>
		<hr>
		
	<?php endforeach; ?>
	</div>

	<div class="six columns" style="border-left:solid;overflow:hidden; background-color:transparent;">
		<h4 style="font-size:24px;color:black"><i>Credit Request</h4></i>
		<br>
		
		<?php foreach($credit as $row): ?>
		<br>
		<a href="<?php echo base_url() ?>index.php/view/profile/<?php echo $row -> uid2; ?>">
		<img style="border-top-width: 0px; display: inline; border-left-width: 0px; border-bottom-width: 0px; margin: 0px 10px 0px 0px; border-right-width: 0px" title="pc clipart" src="<?php echo base_url() ?>uploads/userProfile/<?php echo $row -> profileImage; ?>" border="0" alt="" width="120" height="120" align="left" />
		</a>
		<p style="color:black">
			<a href="<?php echo base_url() ?>index.php/view/profile/<?php echo $row -> uid2; ?>">
			<?php echo $row->username ?>
			</a> wants to write a credit.
			<br>
			<?php echo $row->testimonial ?> 
		</p>
			<a style="text-decoration:none" href="<?php echo base_url() ?>index.php/dashboard/accept_credit/<?php echo $row -> id; ?>" class="push">Accept</a>
			<a style="text-decoration:none" href="<?php echo base_url() ?>index.php/dashboard/deny_credit/<?php echo $row -> id; ?>" class="push">Deny</a>
		<br>
		<hr>
		<?php endforeach; ?>

	</div>
</div>

<?php $this -> load -> view('dashboard/footer'); ?>