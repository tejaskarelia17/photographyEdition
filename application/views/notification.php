<?php $this->load->model('IPEModel'); ?>

<?php if($this->IPEModel->getNoOfNotifications($this->session->userdata('id'))!=0):?>
	<?php echo $this->IPEModel->getNoOfNotifications($this->session->userdata('id'))?>
	<img src="<?php echo base_url()?>images/notification.png" width="15" height="15"/>
<?php endif; ?>