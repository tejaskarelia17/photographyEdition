<script>
    $(function(){
        var category=<?php echo $post->category_id?>;
        $('#addToThread').submit(function(e){
           e.preventDefault();
           $.ajax({
               url:"<?php echo base_url()?>index.php/forum/addToThread/<?php echo $postdata->id?>",
               type: "POST",
               data:{
                   message:$('#addTextarea').val(),
                   category:category
               }
           }).done(function(data){
               alert("SDss");
           }).fail(function(jqXHR, textStatus, errorThrown) {
                    alert( errorThrown+"Request failed: " + textStatus );
            });
        });
    });
</script>
<link rel="stylesheet" href="<?php echo base_url()?>css/reveal.css">

<script src="<?php echo base_url()?>js/shop/jquery-1.4.4.min.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>js/shop/jquery.reveal.js" type="text/javascript"></script>
        <style>
			span.reference{
				font-family:Arial;
				position:fixed;
				left:10px;
				bottom:10px;
				font-size:11px;
			}
			span.reference a{
				color:#aaa;
				text-decoration:none;
				margin-right:20px;
				
			}
			span.reference a:hover{
				color:#ddd;
			}
			span.reference2{
				font-family:Arial;
				position:fixed;
				right:10px;
				top:10px;
				font-size:11px;
			}
			span.reference2 a{
				color:#aaa;
				text-decoration:none;
				margin-right:20px;
				
			}
			span.reference2 a:hover{
				color:#ddd;
			}
		</style>
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
<section class="services">
  <div class="row2">
  <br><br><br>
  <h3 style="font-face:Calibri;color:yellow"><span><?php echo ucwords(strtolower($postdata->item))?></span></h3>  
  
    <div class="ten columns">
<br>
<img style="border-top-width: 0px; display: inline; border-left-width: 0px; border-bottom-width: 0px; margin: 0px 10px 0px 0px; border-right-width: 0px" src="/uploads/buysell/<?php echo $postdata->pic_loc?>" border="0" alt="camera"  align="left" /></noscript></a>

<p class="leadwhite">
<h5 style="color:aqua"> Owner: <span style="color:White"><?php echo ucwords(strtolower($userdata->username))?></span></h5>
<h5 style="color:Aqua"> IPE Pin: <span style="color:White"><?php echo "ipe".($postdata->uid +3000)?> </span></h5>
<h5 style="color:Aqua"> Product Description:<span style="color:White"><p class="leadwhite"><?php echo ucfirst(strtolower($postdata->message))?> </span></h5>
<h5 style="color:Aqua"> Location: <span style="color:White"><?php echo ucwords(strtolower($postdata->location))?> </span></h5>
<h5 style="color:Aqua"> Price: <span style="color:White"><?php echo "Rs. ".$postdata->pricerange."/-"?></span></h5>
<h5 style="color:Aqua"> Contact <img src="/images/phone.png" height="20px" width="20px"> <span style="color:White;"><?php echo $postdata->contactNo?> </span></h5>
</p><br>

  </div>
</section>