
<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/js/shop/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="<?php echo base_url()?>/js/shop/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url()?>/js/shop/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="<?php echo base_url()?>/js/shop/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url()?>/js/shop/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo base_url()?>/js/shop/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="<?php echo base_url()?>/js/shop/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url()?>/js/shop/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
<style>
.tab
{
	background-color:rgba(0,0,0,1);
	color:rgba(255,255,255,1);
	border:none;
}
.linkk
{
	color:rgba(0,204,255,1);
}
.linkk:hover
{
	color:Black;
}
</style>
<style>
    #adlist{
        font-size: 1.4em;
        margin-left: 5%;
    }
    
        #adlist li{
        width:95%;
        margin: auto;
        height:100px;
        background: #eee;
        font-size: 1.8em;
        padding:8px;
        margin-bottom: 10px;
    }
</style>
<title>Red-Eye Photography</title>
<section class="row2"><div class="row"">
 <form style="padding:5px;margin-top:15px;" action="<?php echo base_url()?>index.php/buysell/search" method="GET">
        <table class="table2" border="1" cellspacing="0" cellpadding="0">
    <tr>
      	<td width="33%">
      		<label style="color:black"> Category :(camera,lens,equipment)</label>
  		<input type="text" placeholder="Item" name="search" value="<?php echo $search?>">
  		<input type="submit" style="width:200px" class="push socle" value="Search"/>
  	</td>
      	<td width="33%">
      		<label style="color:black"> Price(Don't add commas in between) From :</label>
  		<input type="text" placeholder="Minimum" value="<?php echo $min?>" name="minimum"/>
  		<label style="color:black"> Model </label>
      		<input type="text" placeholder="Model" name="model" value="<?php echo $model?>"/>
  	</td>
      	<td width="33%">
<label style="color:black"> To </label>
  		<input type="text" placeholder="Maximum" value="<?php echo $max?>" name="maximum"/>
      		
      		<label style="color:black"> Place </label>
      		<input type="text" placeholder="Place" name="place" value="<?php echo $place?>"/>
      	</td>
    </tr>
  </table></form>
</div>
   <div class="row2">
   
      <?php if(!$logged_in):?>
  <h5><a href="<?php echo base_url()."index.php/login"?>" class="push socle">Sign in to post</a></h5>
  <?php  else: ?>
  <h5><a class="push socle" href="<?php echo base_url()?>index.php/buysell/addAd">Add A New Ad</a></h5>
  <?php endif;?>

<table width="1330" height="51" border="0" class="table2" style="border:none">
  <tr style="border-bottom:thick;border-bottom:rgba(255,255,255,1);">
  <td style="border-bottom:thick;border-bottom:rgba(255,255,255,1);color:black" width="5%">Sr.<hr></td>
  <td style="border-bottom:thick;border-bottom:rgba(255,255,255,1);color:black" width="15%">Image<hr></td>
 <td style="border-bottom:thick;border-bottom:rgba(255,255,255,1);color:black" width="14%">Model<hr></td>
  <td style="border-bottom:thick;border-bottom:rgba(255,255,255,1);color:black" width="27%">Description<hr></td>
  <td style="border-bottom:thick;border-bottom:rgba(255,255,255,1);color:black" width="9%">Owner<hr></td>
  <td style="border-bottom:thick;border-bottom:rgba(255,255,255,1);color:black" width="9%">Date<hr></td>
  <td style="border-bottom:thick;border-bottom:rgba(255,255,255,1);color:black" width="12%">Contact<hr></td>
  <td style="border-bottom:thick;border-bottom:rgba(255,255,255,1);color:black" width="7%">Location<hr></td>
  <td style="border-bottom:thick;border-bottom:rgba(255,255,255,1);color:black" width="15%">Price<hr></td>

  </tr>
  <?php $count=1;foreach ($data as $value):?>
  <tr style="background-color:white;">
      <td style="color:black;"><?php echo $count++?></td>
      <?php if($value->pic_loc!=null):?>
      <td><img src="<?php echo base_url()?>uploads/buysell/<?php echo $value->pic_loc?>" height="200" width="200"></td>
      <?php else:?>
      <td><img src="<?php echo base_url()?>images/avatar.jpg" height="200" width="200"></td>
      <?php endif;?>
      
    <td><a class="linkk" href="<?php echo base_url()."index.php/buysell/viewAd/".$value->id?>"><?php echo $value->item?></a></td>
   <td style="color:black;"><?php echo ucwords(strtolower(substr($value->message,0,150)));if(strlen($value->message)>151) echo "..."?></a></td>
          <td style="color:black;"><a class="linkk" href="<?php echo base_url()."index.php/view/profile/$value->uid"?>"><?php echo $value->username?></a></td>
      <td style="color:black;"><?php echo date("F j, Y ", strtotime($value->timestamp))?></td>
    <td style="color:black;"><?php echo "".$value->contactNo?></a></td>
    <td style="color:black;"><?php echo "".$value->location?></a></td>
    <td style="color:black;"><?php echo "Rs.".$value->pricerange."/-"?></a></td>
  </tr>
  <?php endforeach;?>
</table>
</div>