
<h2><a href="http://www.google.com">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DASHBOARD<br /></a></h2>


<table align="center" width="1330px" border="0" class="table2">
    
    <img src="<?php echo base_url()?>images/highlight.png" /></h1>
   <?php foreach ($data as $val2):?>
<?php foreach ($val2 as $value):?>
<tr>
    <td align="left" width="100%"><a href="<?php echo $value['link']?>"><h5 style="color:black; padding-bottom:20px;padding-top:15px; margin-right:0px" align="center"> <?php echo $value['stringit']?>  </h5></a>  </td></tr>  <?php endforeach;?>
 <?php endforeach;?>

<?PHP if(count($testimonialrequests)>0):?>
<tr>
    <td align="left" width="100%"><h1 align="center" style="padding-top:15px">TESTIMONIAL REQUESTS<br /> </td></tr>  
    <img src="<?php echo base_url()?>images/highlight.png" /></h1>
<?php foreach ($testimonialrequests as $val2):?>
<tr>
    <td align="right" width="100%"><h2 style="padding-bottom:20px" align="center"> <?php echo $val2->testimonial.'-'.$val2->username?>  </h2></td></tr>
 <tr>
    <td align="left" width="100%">   <a href="<?php echo base_url()?>index.php/profile/confirmcredit/<?php echo $val2->id?>" class=""><h2 style="padding-bottom:20px" align="center"> Confirm</h2></a> </td></tr>
<tr>
    <td align="left" width="100%">    <a href="<?php echo base_url()?>index.php/profile/rejectcredit/<?php echo $val2->id?>" class=""><h2 style="padding-bottom:20px" align="center"> Reject</h2></a></td></tr>
</table>

<?php endforeach;?>
<?php endif;?>

<?PHP if(count($friendrequest)>0):?>
<h1 align="center" style="padding-top:15px">FRIEND REQUESTS<br />
    <img src="<?php echo base_url()?>images/highlight.png" /></h1>
<?php foreach($friendrequest as $val2):?>
<h2 style="padding-bottom:20px" align="center"><?php echo $val2->username?>
    <a href="<?php echo base_url()?>index.php/profile/confirmfriend/<?php echo $val2->id?>" class="">Confirm</a> 
    <a href="<?php echo base_url()?>index.php/profile/rejectfriend/<?php echo $val2->id?>" class="">Reject</a>
</h2>

<?php endforeach; ?>
<?php endif;?>