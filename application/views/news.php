<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<div class="row2">
<br><br><br><br><br><br>
<h1 style="font-size:24px;margin-top:2px; margin-left:5px">News</h1>
<div class="nine columns" style="border-right:2px solid #999; overflow:hidden; background-color:transparent;">
	<?php foreach($result0 as $row):?>
	<br>
		<img style="width:200px;height:150px;border-top-width: 0px; display: inline; border-left-width: 0px; border-bottom-width: 0px; margin: 0px 10px 0px 0px; border-right-width: 0px" title="" src="<?php echo base_url() ?>uploads/news/<?php echo $row->pic_loc ?>" border="0" align="left" /></noscript></a></p>
		<a href="<?php echo base_url()?>index.php/news/newsitem/<?php echo $row->id?>">
		<h2 style="font-size:20px;color:#202020; margin-top:-18px;"><b><?php echo ucwords(strtolower($row->title))?></b></h2>
		</a>
		
		<p style="color:grey; width:1000px">
		
		<?php
		echo $this->IPEModel->replace_links(ucwords(strtolower(substr($row->message,0,350))));
		if(strlen($row->message)>351)
			echo "<a href=".base_url()."index.php/news/newsitem/".$row->id."><font color='blue'>...Read More</font></a>"?></p>
	<br>
<h4 style="font-size:16px;margin-top:-10px; color:black" align="right">Published on: <?php echo date('d F, Y',  strtotime($row->time))?></h4>
	<hr style="margin-top:-10px;border-top: 1px solid #999;">
	<?php endforeach; ?>
</div>



<h4 style="margin-top:-20px;margin-left:5px"><span></span></h4>
<div id="Updates" class="three columns" style="overflow:auto; background-color:transparent;"><br>
	<?php foreach($result1 as $row):?>
	<br>
	<a href="<?php echo base_url()?>index.php/news/newsitem/<?php echo $row->id?>">
		<h2 style="font-size:20px;margin-top:-10px;color:#CCC;"><?php echo $row->title ?></h2>
	</a>
	<p class="leadwhite" style="color:#999"><?php echo $this->IPEModel->replace_links(substr($row->message,0,200));if(strlen($row->message)>201)echo "<a href=".base_url()."index.php/news/newsitem/".$row->id."><font color='yellow'>...Read More</font></a>"?></p>
	<br>
	<hr style="margin-top:-10px;border-top: 1px solid #999;">
	<?php endforeach; ?>

</div>