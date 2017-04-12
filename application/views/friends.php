
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300' rel='stylesheet' type='text/css'>
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="<?php echo base_url()?>stylesheets/foundation.css">
  <link rel="stylesheet" href="<?php echo base_url()?>stylesheets/design.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>stylesheets/fstyles.css" />
<section class="services">

  <div class="row">
  <br><br><br>
  <h4><span>Friends</span></h4>

<div class="ten columns">
<br>
<?php $location=0;?>
<?php $arrayToGoThrough=array();
for($i=0;$i<=9;$i++)
    $arrayToGoThrough[]=$i;
$c=0;
for($j="A";$j<="Z";$j++){
    if($c++==26)break;
    $arrayToGoThrough[]=$j;
}
?>

<?php foreach($arrayToGoThrough as $val):?>
<?php for(;$location<count($friends);$location++):
if($location>=count($friends)  || strnatcmp(strtoupper(substr($friends[$location]->username, 0, 1)),$val)>0)break;?>

<table class="table2" border="1"  class="table" cellspacing="0" cellpadding="2" style="border:none">
<tr>
<a name="<?php echo $val;?>"><div style="color:rgba(255,255,255,1); font-size:24px"><?php echo $val;?></div><hr></a>

<td width="16.67%" width="16.67%"><img src="images/avatar.jpg" width="150" height="150"></td>
<td width="16.67%" style="color:rgba(255,255,255,1); padding-top:75px"><?php echo $friends[$location]->username?></td>

<?php $location++; if($location>=count($friends) || strnatcmp(strtoupper(substr($friends[$location]->username, 0, 1)),$val)>0)break;?>
<td width="16.67%"><img src="images/avatar.jpg" width="150" height="150"></td>
<td width="16.67%" style="color:rgba(255,255,255,1); padding-top:75px"><?php echo $friends[$location]->username?></td>


<?php $location++;if($location>=count($friends) || strnatcmp(strtoupper(substr($friends[$location]->username, 0, 1)),$val)>0)break;?>
<td width="16.67%"><img src="images/avatar.jpg" width="150" height="150"></td>
<td width="16.67%" style="color:rgba(255,255,255,1); padding-top:75px"><?php echo $friends[$location]->username?></td>
</tr> 

<?php endfor;?>
</table>
<?php endforeach;?>
 </div>
  
  
  <div class="two columns" align="right" style="height:750px;"><br><div id="navigation-block">
            <ul id="sliding-navigation">
<?php foreach($arrayToGoThrough as $val):?>
                <li class="sliding-element"><a href="#<?php echo $val?>"><?php echo $val?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
  </div>

</section>

<script src="<?php echo base_url()?>javascripts/jquery.foundation.topbar.js"></script>
  <!-- Initialize JS Plugins -->
<script src="<?php echo base_url()?>plugins/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url()?>plugins/smoothscroll.js"></script>
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

<script src="<?php echo base_url()?>javascripts/app.js"></script>
<script src="<?php echo base_url()?>plugins/jquery.cycle2.min.js"></script>
<script src="<?php echo base_url()?>plugins/jquery.cycle2.tile.min.js"></script>
<script src="<?php echo base_url()?>javascript/jquery.tinyscrollbar.min.js"></script>
