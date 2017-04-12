<?php $this -> load -> view('dashboard/header'); ?>

<div class="row">
	<br>
	<br>
	<br>
	<div class="eight columns" style="border:none; overflow:hidden; background-color:transparent; height:750px;">
		<h4><span><i class="iconz-bubbles-2"></i> Conversation</span></h4>
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
					<td width="16.67%" style="float:left;color:rgba(255,255,255,1); padding-top:25px">
						<a style="color:rgba(255,255,255,1);text-decoration: none" href="<?php echo base_url() ?>index.php/profile/view/<?php echo $row -> id; ?>">
							<?php echo ucwords(strtolower($row -> username));echo" :" ?>
						</a>
					</td>
					<td width="16.67%" style="float:left;color:rgba(255,255,255,1); padding-top:25px">
						<a style="color:rgba(255,255,255,1);" href="<?php echo base_url() ?>index.php/messaging/getThread/<?php echo $row -> id; ?>">
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