<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<?php $this->load->model('IPEModel'); ?>

<?php if($this->IPEModel->getNoOfNotifications($this->session->userdata('id'))!=0):?>
	<?php echo $this->IPEModel->getNoOfNotifications($this->session->userdata('id'))?>
	<title>Red-Eye Photography</title>
	
	<img src="<?php echo base_url()?>images/notification.png" width="15" height="15"/>
<?php endif; ?>