<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">

</script>
<style>
    #forumList{
        margin-left: 5%
    }
    #forumList li{
    text-transform:capitalize;
    }
</style>
<br><br>



<section class="services">
<ul id="forumList">
    <?php foreach($data as $val):?>
    <li><a href="<?php echo base_url()."index.php/forum/viewCategory/".($val->name)?>"><h2 style="color:white"><?php echo $val->name?></h2></a></li>
    <?php    endforeach;?>
</ul>
    <br><br>
    <?php if($logged_in):?>
    <a href="<?php echo base_url('index.php')?>/forum/addPost" style="margin-left:5%">
        <input type="button" name="newPost" value="Add Post"/></a>
    <?php else:?>
    <a href="<?php echo base_url()?>index.php/login" style="font-size: 1em;margin-left:5%">Login to Make a Post</a>
    <?php endif;?>
</section>