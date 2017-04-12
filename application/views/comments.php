<script type="text/javascript">
    $(function(){
        $('#commentForm').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "<?php echo base_url()?>index.php/comments/addComments/<?php echo $pid?>",
                type:"POST",
                data:{
                    comment:$('#addComment').val()
                }
            }).done(function(msg) {
                $('#commentData').html(msg);
            });
        });
    });
</script>
<div class="twelve mobile-four columns">
<h4><span><i class="iconz-bubbles-2"></i>COMMENTS</span></h4>

    <?php foreach($comments as $value):?>
<div class="comment-container">                
    <div class="comment-thumb">        
        <a  href="<?php echo base_url('index.php/view/profile').'/'.$value->userdata->id?>">

        <?php if($value->userdata->profileImage==NULL):?>
        <img src="<?php echo base_url()?>assets/images/productDummy.jpg" alt="" />
        <?php else:?>
        <img src="<?php echo base_url()."uploads/userProfile/".$value->userdata->profileImage;?>" style="margin-top:23px;border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;width:100px;height:100px;" alt="" />
        <?php endif;?></a></div>
        
    <div class="comment-content" style="padding-top:15px;margin-left:125px;border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;width:950px">
        <span class="comment-title">
        
        <?php if($this->session->userdata('id')==$value->uid) :?>
        <a style="margin-left:800px;color:red" href="<?php echo base_url()?>index.php/comments/deleteComment/<?php echo $value->id?>/<?php echo $pid?>"><img src="<?php echo base_url()?>images/del.png"></a>
        <?php endif;?>
        
<a style="color:#CCC" href="<?php echo base_url('index.php/profile/view').'/'.$value->userdata->id?>" title="<?php echo ucwords(strtolower($value->userdata->username))?>"><?php echo ucwords(strtolower($value->userdata->username))?></a></span><br>
    <small style="color:Grey"><?php echo date('F d,Y h:m:s',  strtotime($value->timestamp))?>
        <?php $l=$this->session->userdata('logged_in');
        if(isset($l)):
        $s=$this->session->userdata('id');
        if($s==$value->userdata->id):?>
        <br>
        <br>
        <?php endif;?><?php endif;?>
    </small>
        

<p><?php echo $value->comment?></p>
<br><br>
</div></div><hr style="border-top: 1px solid #999">
    <?php endforeach;?>

<br>
<?php $log=$this->session->userdata('logged_in');?>
<?php if(isset($log)):?>
<?php if($log):?>

<h4><a name="reply" style="color:white"><font face="Calibri">Leave a Reply</font></a></h4>

<form id="commentForm" action="<?php echo base_url()?>index.php/comments/addComments/<?php echo $pid?>" method="POST">
  <textarea id="addComment" style="width:600px;height:170px" cols="5000" rows="10"></textarea>   

<input type="submit" style="width:100px" class="push socle left"></a>
</form>
<?php endif;?>
<?php endif;?>
</div>