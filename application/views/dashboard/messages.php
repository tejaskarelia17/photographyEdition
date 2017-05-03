<?php $this -> load -> view('dashboard/header'); ?>
<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>


<div class="row">
	<br>
	<br>
	<br>
	<div class="eight columns" style="border:none; overflow:hidden; background-color: #FFF ; height:750px;">
		<h4><span style="color: #000"><i class="iconz-bubbles-2"></i> Conversation</span></h4>
		<br>
		<br>
		<br>
		<br>
		
		<?php foreach($result as $row) : ?>
			<table class="table2" border="0" cellspacing="0" cellpadding="2" style="border:none;">
				<tr>
					<td width="16.67%" style="float:left">
						<a href="<?php echo base_url() ?>index.php/profile/view/<?php echo $row -> id; ?>">
							<img style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:100px;width:100px" src="<?php echo base_url() ?>uploads/userProfile/<?php echo $row -> profileImage; ?>" >
						</a>
					</td>
					<td width="16.67%" style="float:left;color:black; padding-top:25px">
						<a style="color:rgba(255,255,255,1);text-decoration: none" href="<?php echo base_url() ?>index.php/profile/view/<?php echo $row -> id; ?>">
                        <span style="color: #000">
						<?php echo ucwords(strtolower($row -> username));echo" :" ?></span>
						</a>
					</td>
					<td width="16.67%" style="float:left;color:black; padding-top:25px">
						<a style="color:black;" href="<?php echo base_url() ?>index.php/messaging/getThread/<?php echo $row -> id; ?>">
							<?php echo $row -> message; ?>
						</a>
					</td>				
				</tr>		
			</table>
		<?php endforeach; ?>

		<hr>

	</div>

</div>

<?php $this -> load -> view('dashboard/footer'); ?>