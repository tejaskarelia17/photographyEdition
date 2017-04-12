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
<table class="table2" style="border:none">
    <?php foreach ($data as $value) {?>
    <tr style="font-size: 2em;width: 100%;table-layout: fixed">
        <td class="tab" ><?php echo $value->Title?> </td>
        <td class="tab" ><?php echo $value->username?></td>
        <td class="tab" ><a class="linkk" href="<?php echo base_url()?>index.php/view/photo/<?php echo $value->pid?>">Link</a></td>        
    </tr>
   <?php }?>
</table>
</div>
</section>