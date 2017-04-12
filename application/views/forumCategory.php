<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
    $(function(){
    
        $('#newPostForm').click(function(e){
              //e.preventDefault()
              //$.ajax()
        });
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
	color:rgba(255,255,255,1);
}
</style>

<section class="services">
      <div class="row">
      <?php if(!$logged_in):?>
  <h5><a href="<?php echo base_url()."index.php/login"?>" class="push socle">Sign in to post</a></h5>
  <?php  else: ?>
  <h5><a href="<?php echo base_url()."index.php/forum/addPost"?>" class="push socle">Click to post</a></h5>
  <?php endif;?>
<font face="Calibri" style="font-size:16px">
<table width="1330" height="51" border="0" class="table2" style="border:none">
  <tr>
    <td class="tab" width="794"  style="border-bottom:thin; font-size:16px"><b>Forum</b><hr></td>
    <td class="tab" style="border-bottom:thin; font-size:16px"  width="208"><b>Last Post</b><hr></td>
    <td class="tab"  style="border-bottom:thin; font-size:16px" width="103"><b>Threads</b><hr></td>
    <!--<td class="tab" style="border-bottom:thin; font-size:16px"  width="107"><b>Posts</b><hr></td>-->
  </tr>
  <?php foreach ($data as $value):?>
  <tr>
    <td class="tab"><a class="linkk" href="<?php echo base_url()."index.php/view/profile/$value->uid"?>"><?php echo ucwords(strtolower($value->userdata['userData']->username))?></a> :<span style="color:rgba(255,255,0,1)"> <a class="linkk" href="<?php echo base_url()."index.php/forum/viewPost/$value->id"?>"><?php echo $value->title?></span><br><span style="color: white"><?php echo date("g:i a F j, Y ", strtotime($value->timestamp))?></a></span></td>
    <td class="tab" ><a style="color: aqua"href="<?php echo base_url()."index.php/view/profile/$value->uid"?>"><?php echo ucwords(strtolower($value->timestamps->username)).'<br></a><span style="color: white">'.date("g:i a F j, Y ", strtotime($value->timestamps->timestamp))?></span></td>
   <!--<td class="tab" ><a style="color: white" href="<?php echo base_url()."index.php/forum/viewPost/$value->id"?>"></td>--><td class="tab" ><?php echo $value->noofposts?></a></td>
  </tr>
  <?php endforeach;?>
</table> 
    </font>
</div>
</section>

   <script src="javascripts/jquery.foundation.topbar.js"></script>

  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>
  <script src="plugins/jquery.easing.1.3.js"></script>
  <script src="plugins/smoothscroll.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){ 
			
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.scrollup').fadeIn();
				} else {
					$('.scrollup').fadeOut();
				}
			}); 
			
			$('.scrollup').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 800);
				return false;
			});
 
		});
		</script>
  <script src="plugins/initialize.js"></script>
<script src="plugins/jquery.cycle2.min.js"></script>
<script src="plugins/jquery.cycle2.tile.min.js">
</script>