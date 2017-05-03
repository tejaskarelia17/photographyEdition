<title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<section class="services">

<div class="row mt50">
  <div class="six mobile-four columns">
    <h4 align="center" style="color:black">Pictures: <?php echo count($array);?></h4>
<table style="border:none" class="table2" cellspacing="0" cellpadding="2">
<?php for($i=0;$i<count($array);$i+=3) :?>
  <tr>
    <td>
        <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $array[$i]->id?>">
        <img src="<?php echo base_url()."uploads/images/thumbs/". $array[$i]->location?>"  style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:175px;width:175px" />
        </a>
    </td>
    <td><?php if(isset($array[$i+1])):?>
        <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $array[$i+1]->id?>">
        <img src="<?php echo base_url()."uploads/images/thumbs/". $array[$i+1]->location?>"  style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:175px;width:175px" />
        </a>
        <?php endif;?>
    </td>
    <td><?php if(isset($array[$i+2])):?>
        <a href="<?php echo base_url()?>index.php/view/photo/<?php echo $array[$i+2]->id?>">
        <img src="<?php echo base_url()."uploads/images/thumbs/". $array[$i+2]->location?>"  style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:175px;width:175px" />
        </a>
        <?php endif;?>
    </td>
  </tr>
  <tr style="background:transparent">
    <td style="color:Aqua" align="center"><?php echo $array[$i]->Title?></td>
    <td style="color:Aqua" align="center"><?php if(isset($array[$i+1])):?><?php echo $array[$i+1]->Title?><?php endif;?></td>
    <td style="color:Aqua" align="center"><?php if(isset($array[$i+2])):?><?php echo $array[$i+2]->Title?><?php endif;?></td>
  </tr>
<?php endfor;?>
</table>


  </div>
  <div class="six mobile-four columns">
    <h4 align="center" style="color:black">Users</h4>
<table style="border:none"  class="table2" cellspacing="0" cellpadding="2">
<?php for($i=0;$i<count($users);$i+=3) :?>
  <tr>
    <td>
        <a href="<?php echo base_url()?>index.php/view/profile/<?php echo $users[$i]->id?>">
        <?php if($users[$i]->profileImage!=NULL):?>
        <img src="<?php echo base_url()."uploads/userProfile/".$users[$i]->profileImage;?>" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:175px;width:175px" alt="" />
        <?php else:?>
        <img src="<?php echo base_url()?>images/avatar.jpg" alt="Edit Profile" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:175px;width:175px" alt="" />
        <?php endif;?>	  
        </a>
    </td>
    <td><?php if(isset($users[$i+1])):?>
        <a href="<?php echo base_url()?>index.php/view/profile/<?php echo $users[$i+1]->id?>">
        <?php if($users[$i+1]->profileImage!=NULL):?>
        <img src="<?php echo base_url()."uploads/userProfile/".$users[$i+1]->profileImage;?>" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:175px;width:175px" alt="" />
        <?php else:?>
        <img width="300" height="225" src="<?php echo base_url()?>images/avatar.jpg" alt="Edit Profile" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:175px;width:175px" alt="" />
        <?php endif;?>	  
        </a>
        <?php endif;?>
    </td>
    <td><?php if(isset($users[$i+2])):?>
        <a href="<?php echo base_url()?>index.php/view/profile/<?php echo $users[$i+2]->id?>">
        <?php if($users[$i+2]->profileImage!=NULL):?>
        <img src="<?php echo base_url()."uploads/userProfile/".$users[$i+2]->profileImage;?>" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:175px;width:175px" alt="" />
        <?php else:?>
        <img width="300" height="225" src="<?php echo base_url()?>images/avatar.jpg" alt="Edit Profile" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:175px;width:175px" alt="" />
        <?php endif;?>	  
        </a>
        <?php endif;?>
    </td>
  </tr>
  <tr style="margin-top:-30px; background:transparent">
    <td style="color:black;" align="center"><?php if(isset($users[$i])): echo ucwords(strtolower($users[$i]->username)); endif;?></td>
    <td style="color:black;" align="center"><?php if(isset($users[$i+1])):echo ucwords(strtolower($users[$i+1]->username)); endif;?></td>
    <td style="color:black;" align="center"><?php if(isset($users[$i+2])):echo ucwords(strtolower($users[$i+2]->username)); endif;?></td>
  </tr>
  <tr style="margin-top:-30px; background:transparent">
    <td style="color: #000;" align="center"><?php if(isset($users[$i])): echo "rep".($users[$i]->id +3000); endif;?></td>
    <td style="color:black;" align="center"><?php if(isset($users[$i+1])):echo "rep".($users[$i+1]->id +3000); endif;?></td>
    <td style="color:black;" align="center"><?php if(isset($users[$i+2])):echo "rep".($users[$i+2]->id +3000); endif;?></td>
  </tr>
  <tr style="margin-top:-30px; background:transparent">
    <td style="color:black;" align="center"><?php if(isset($users[$i])): echo ucwords(strtolower($users[$i]->city)); endif;?></td>
    <td style="color:black;" align="center"><?php if(isset($users[$i+1])):echo ucwords(strtolower($users[$i+1]->city)); endif;?></td>
    <td style="color:black;" align="center"><?php if(isset($users[$i+2])):echo ucwords(strtolower($users[$i+2]->city)); endif;?></td>
  </tr>
  <?php endfor;?>
</table>


  </div></section>
    