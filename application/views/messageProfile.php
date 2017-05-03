<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<h1 align="center" style="padding-top:15px">Messages<br />
    <img src="<?php echo base_url()?>images/highlight.png" /></h1>
<table style="margin: auto;" border="0" cellspacing="0" cellpadding="2">
    <?php foreach ($data as $value):?>
      <tr>
    <td><?php echo $value['userdata']['userData']->username?></td>
    <td></td>
  </tr>
  <tr>
      <td rowspan="3"><img src="<?php echo base_url()?>/images/avatar.jpg" alt="" width="100" height="100" /></td>
  </tr>

  <tr>
    <td colspan="3" valign="top"><?php echo $value['messagedata']->message;?></td>
    <td><a href="<?php echo $value['link']?>">Reply</a></td>
  </tr>
  <tr></tr>
  <?php endforeach;?>
</table>