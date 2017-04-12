<?php $this -> load -> view('dashboard/header');
$this->load->model('dashboard_model'); ?>

<div class="row">
	<br>
	<br>
	<br>
	<div class="eight columns" style="border:none; overflow:hidden; background-color:transparent; height:750px;">
		<h4 style="font-size:24px">Credits</h4>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<?php foreach ($result as $row) { ?>
		<p class="leadwhite">
			<?php echo $row->testimonial ?>
		</p><h2 style="font-size:18px" class="leadwhite" align="right">- <?php echo $this->dashboard_model->getUsername($row->uid2) ?></h2>
		<br>
		<br>
		<hr>
		<?php } ?>

	</div>

</div>

<?php $this -> load -> view('dashboard/footer'); ?>