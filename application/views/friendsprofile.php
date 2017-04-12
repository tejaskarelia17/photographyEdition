<h1 align="center" style="padding-top:15px"><?php echo $name?><br />
    <img src="<?php echo base_url()?>images/highlight.png" /></h1>
<table align="center" border="0" cellspacing="0" cellpadding="2" style="margin:auto;width:600px;height:600px;"  >
<?php for($i=0;$i<count($array);$i+=3) :?>
    
    <tr>
        <td  style="width:200px;height:200px;">
        <?php if($array[$i]->profileImage!=NULL):?>
        <img src="<?php echo base_url()."uploads/userProfile/".$array[$i]->profileImage;?>" height="200" width="200" alt="" />
        <?php else:?>
        <img width="300" height="225" src="<?php echo base_url()?>images/avatar.jpg" alt="Edit Profile" style="width:200px;height:200px" alt="" />
        <?php endif;?>	  
         </td>
         <?php if(isset($array[$i+1])):?>
        <td  style="width:200px;height:200px;">
        <?php if($array[$i+1]->profileImage!=NULL):?>
        <img src="<?php echo base_url()."uploads/userProfile/".$array[$i+1]->profileImage;?>" height="200" width="200" alt="" />
        <?php else:?>
        <img width="300" height="225" src="<?php echo base_url()?>images/avatar.jpg" alt="Edit Profile"style="width:200px;height:200px" alt="" />
        <?php endif;?>	
        </td>
        <?php endif;?>
        <?php if(isset($array[$i+2])):?>
        <td  style="width:200px;height:200px;">
        <?php if($array[$i+2]->profileImage!=NULL):?>
        <img src="<?php echo base_url()."uploads/userProfile/".$array[$i+2]->profileImage;?>" height="200" width="200" alt="" />
        <?php else:?>
        <img width="300" height="225" src="<?php echo base_url()?>images/avatar.jpg" alt="Edit Profile" style="width:200px;height:200px" alt="" />
        <?php endif;?>	
        </td>
        <?php endif;?>
        </tr>
    <tr>
        <td  style="width:200px;height:200px;"><?php echo $array[$i]->username;?></td>
        <td  style="width:200px;height:200px;"><?php if(isset($array[$i+1])){echo $array[$i+1]->username;}?></td>
        <td  style="width:200px;height:200px;"><?php if(isset($array[$i+2])){echo $array[$i+2]->username;}?></td>
    </tr>
    
    
    
<?php endfor;?>    
</table>
