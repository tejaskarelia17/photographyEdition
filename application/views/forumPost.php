
<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<script>
    $(function(){
        //var category=<?php //echo $post['userData']->category_id?>;
        
        <?php
        $l=$this->session->userdata('logged_in');
        if(isset($l) ):?>
                <?php if($l):?>
        var username='<?php echo $currentudata['userData']->username?>';  
        var joinDate='<?php echo date('m Y', strtotime($currentudata['userData']->join_date))?>';
        var totalPhotos='<?php echo $currentudata['noOfPosts']?>';
        var totalFollowers='<?php echo $currentudata['noOfFollowers']?>';
        var picturesrc='<img src="<?php if($currentudata['userData']->profileImage==NULL):echo base_url()?>assets/images/productDummy.jpg" alt="" /><?php else:?><?php echo base_url()."uploads/userProfile/".$currentudata->profileImage;?>" width="75" alt="" /><?php endif;?>';
        var userid='<?php echo base_url('index.php/view/profile').'/'.$currentudata['userData']->id?>';
        var message="";          
        $('#addToThread').submit(function(e){
           e.preventDefault();
           message=$('#addTextarea').val();
           $.ajax({
               url:"<?php echo base_url()?>index.php/forum/addToThread/<?php echo $post->id?>",
               type: "POST",
               data:{
                   message:$('#addTextarea').val(),
                   category:category
               }
           }).done(function(data){
               $('#forumthread')
               .append('<tr><td><h3 style="color:rgba(51,51,51,1)">'+username+'</h3><a href="'+userid+'">'+picturesrc+'<br>'+'</a></td><td>'+message+'</td></tr><br>Join Date:'+joinDate+'<br>Posts: <br>Total Photos: '+totalPhotos+'<br>Total Followers:'+totalFollowers+'</td>');
               $('#addTextarea').val("")
           }).fail(function(jqXHR, textStatus, errorThrown) {
               
               $('#forumthread')
               .append('<tr><td><h3 style="color:rgba(51,51,51,1)">'+username+'</h3><a href="'+userid+'">'+picturesrc+'<br>'+'</a></td><td>'+message+'</td></tr><br>Join Date:'+joinDate+'<br>Posts: <br>Total Photos: '+totalPhotos+'<br>Total Followers:'+totalFollowers+'</td>');
               $('#addTextarea').val("")
            });
        });
        <?php endif;?>        <?php endif;?>

    });
</script>
<style>
    #forumthread li{
        width:95%;
        margin: auto;
        height:100px;
        background: #eee;
        font-size: 1.8em;
        padding:8px;
        list-style: none;
        margin-bottom: 10px;
    }
    
    #title{
        font-size: 4em;
    }
.tab
{
	background-color:white;
	color:black;
	border:none;
}
.linkk
{
	color:#3E72A8;
}
.linkk:hover
{
	color:rgba(255,255,255,1);
}
</style>

<title>Red-Eye Photography</title>

<br>
<!--<div style="width:96%;margin: auto">
    <a href="<?php echo base_url('index.php/forum/viewCategory').'/'.$category?>"><h2>Back To Category: <?php echo strtoupper($category)?></h2></a>
<h1 id="title"><?php echo $post->title?></h1>-->


<section class="services">

    <h2 style="color:Blue;margin-left:2%"> <?php echo $post->title?></h2><br><br>
             <table width="1300" height="51" border="0" class="table2" style="border:none">
  <tr>
    <td class="tab" width="15%"  style="border-bottom:thin; font-size:16px"><b>Author</b><hr></td>
<td class="tab" width="85%"  style="border-bottom:thin;  font-size:16px"><b>Message</b><hr></td></tr>

//details here...

	


</table>
    <?php foreach ($thread as $value):?>

    <table width="1300" height="51" border="1" align="center" id="forumthread" class="table2" style="border-bottom:thick;margin-top:-15px">
    <tr>
        <td class="tab" width="15%">
        <a style="color:Black" href="<?php echo base_url('index.php/view/profile').'/'.$value->userdata['userData']->id?>" width="150" height="150">
        <h3 style="color:Black"><?php echo $value->userdata['userData']->username?></h3>
        <?php if($value->userdata['userData']->profileImage==NULL):?>
        <img src="<?php echo base_url()?>assets/images/productDummy.jpg" alt="" />
        <?php else:?>
        <img src="<?php echo base_url()."uploads/userProfile/".$value->userdata['userData']->profileImage;?>" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;" width="120px" height="120px" />
        <?php endif;?>
        <br>IPE Pin: <?php echo "ipe".($value->userdata['userData']->id +3000)?>
        <br>Join Date: <?php echo date('m Y', strtotime($value->userdata['userData']->join_date))?><br>Posts: <?php echo $value->userdata['noOfPosts']?><br>Total Photos: <?php echo $value->userdata['noOfPictures']?><br>Total Followers: <?php echo $value->userdata['noOfFollowers']?>
        </a>
        </td>
        <td class="tab">
            <span style="color:black"><?php echo $this->IPEModel->replace_links($value->message)?><br><div align="right" style="padding-top:80px"><a href="#re" class="push">Reply</a><br><br><?php echo date('g:i a F j, Y ', strtotime($value->timestamp))?></div></span>
        </td>
    </tr>
    <?php endforeach;?>
</table>
<br><br>

<?php if($logged_in):?>
<form action="<?php echo base_url()?>index.php/forum/addToThread/<?php echo $post->id?>" method="POST">
    <h4 style="color:black;margin:20px;">Reply To Post:</h4>
    <a name="re"><h5 style="color:black;margin:20px;">Message:</h5><br></a>
    <textarea style="background-color:#EBEDFA; width:98%; height:100px; color:black;font-family:sans-Serif;font-size:16px; margin-left:20px;" id="addTextarea" name="message"></textarea><br>
    <input style="margin-left:20px" class="push socle" type="submit"><input style="margin-left:20px" class="push socle" type="Reset">
</form>
<?php else:?>
<a href="<?php echo base_url()?>index.php/login" class="push" style="margin-left:20px;">Login to Post Reply</a>
<?php endif;?>
</div></section>