<?php $this->load->view('dashboard/header'); ?>
<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>


<div class="row" style="padding-top:35px; overflow: hidden">

	<table class="table2" width="450px" style="border: none">
		<tr>
			<td width="150px" style="color:black;padding-left:80px;margin-right:-120px;border-right:solid;border-right-style:groove;border-right-color:grey">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOST STARED PICTURE<br><br>
			
			<?php if($mostStaredPicture_id!='-'):?>
			<a href="<?php echo base_url()?>index.php/view/photo/<?php echo $mostStaredPicture_id?>">
					<img style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px" src="<?php echo base_url()?>uploads/images/thumbs/<?php echo $mostStaredPicture_loc?>" alt="" width="200" height="200" />
			</a>
			<?php endif; ?>
			</td>
			<td width="150px" style="color:black;padding-left:80px;margin-right:-150px;border-right:solid;border-right-style:groove;border-right-color:grey">&nbsp;&nbsp;&nbsp;&nbsp;MOST COMMENTED PICTURE<br><br>
			
			<?php if($mostCommentedPicture_id!='-'):?>
			<a  href="<?php echo base_url()?>index.php/view/photo/<?php echo $mostCommentedPicture_id?>">
					<img style="border-width:thin;border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px" src="<?php echo base_url()?>uploads/images/thumbs/<?php echo $mostCommentedPicture_loc?>" alt="" width="200" height="200" />
			</a>
			<?php endif; ?>
			</td>
			<td width="150px" style="color:black;padding-left:80px;margin-right:-150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOST STARED PICTURE<br><br>
			
			<?php if($mostStaredAlbum_id!='-'):?>
			<a href="<?php echo base_url()?>index.php/view/album/<?php echo $mostStaredAlbum_id?>">
					<img style="border-width:thin;border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px" src="<?php echo base_url()?>uploads/images/thumbs/<?php echo $mostStaredAlbum_cover?>" alt="" width="200" height="200" />
			</a>
			<?php endif; ?>
			</td>
			
		</tr>
	</table>
<table class="table2" style="margin-left:450px;border:none">
		<tr>
			<td width="25%" style="color:black; padding-top:15px">NUMBER OF FRIENDS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $friends?></td>
			<td width="25%" style="color:black; padding-top:15px"></td></tr></table>
			<table class="table2" style="margin-left:90px;border:none;margin-left:450px">
		<tr><td width="25%" style="color:black; padding-top:15px">NUMBER OF FOLLOWERS&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $followers?></td>
			<td width="25%" style="color:black; padding-top:15px;"></td>
		</tr>
	</table>
<table class="table2" style="margin-left:450px;border:none">
		<tr>
			<td width="25%" style="color:black; padding-top:15px">NUMBER OF FOLLOWING&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $following?></td>
			<td width="25%" style="color:black; padding-top:15px"></td></tr></table>
			<table class="table2" style="margin-left:90px;border:none;margin-left:450px">
		<tr><td width="25%" style="color:black; padding-top:15px">NUMBER OF CREDITS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $credits?></td>
			<td width="25%" style="color:black; padding-top:15x;"></td>
		</tr>
	</table>	
</div>

<?php $this->load->view('dashboard/footer'); ?>