<style>
    #forumthread{
       list-style: none;
       
    }
    #forumthread li{
        width:95%;
        margin: auto;
        font-size: 1.8em;
        padding:8px;
        margin-bottom: 10px;
    }
    
    #title{
        font-size: 4em;
    }
</style>
<section class="row" style="margin-left:50px">
<h2 style="color:yellow"><?php echo ucwords(strtolower($postdata->title))?></h2>

<?php if($this->session->userdata('id')==1):?>
	<a href="<?php echo base_url()?>index.php/news/delete/<?php echo $postdata->id?>">DELETE</a>
<?php endif; ?>

<br><br>
<img src="<?php echo base_url()."uploads/news/". $postdata->pic_loc?>" align="left" style="padding-right:10px; margin-top:20px"/>
    <h3 style="font-size:1.3em;color:#CCC;line-height:150%;text-align:justify"> <font face="Calibri">
<?php echo $this->IPEModel->replace_links($postdata->message)?>
        </font></h3>
    <br><br>
</div>