<style>
	#messagethread li {
		width: 95%;
		margin: auto;
		height: 100px;
		background: #eee;
		font-size: 1.8em;
		padding: 8px;
		list-style: none;
		margin-bottom: 10px;
	}
    </style>

<section class="services">
  <div class="row mt40">
<h4><span><i class="iconz-bubbles-2"></i> Conversation</span></h4>


    <?php foreach ($data as $value) :?>

<div class="comment-reply-container">                
    <div class="comment-thumb">
<a href="<?php echo base_url('index.php/view/profile').'/'.$value->id?>"><?php if($value->profileImage==NULL):?>
        <img src="<?php echo base_url()?>assets/images/productDummy.jpg" alt="" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:100px;width:100px" />
        <?php else: ?>
        <img src="<?php echo base_url() . "uploads/userProfile/" . $value -> profileImage; ?>" style="border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;height:100px;width:100px" />
        <?php endif; ?></a>    </div>
    <div class="comment-content">
<span class="comment-title"><?php echo $value->username?></span><br>
<small style="color:grey"><?php echo date('F d,Y h:m:s',  strtotime($value->timestamp))?></small><br>
<p><?php echo $value->message?></p>
    </div>
</div><br>
    <?php endforeach; ?>
    <li>
        <form action="<?php echo base_url()?>index.php/messaging/send/<?php echo $uid2?>" method="POST">
            <textarea name="message" rows="10" style="width:850px"></textarea><br>
            <input type="submit" class="push socle" style="width:150px" value="Add Message">
        </form>
    </li>
</ul>
</section>