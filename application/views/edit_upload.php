<script type="text/javascript" src="<?php echo base_url()?>js/jquery.form.js"></script>
<script src="<?php echo base_url()?>/js/crop/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>js/crop/jquery.Jcrop.css" type="text/css" />


<style>
.addimage {
    width: 24px;
    height: 24px;
}




</style>
<script type="text/javascript">
$(function(){
        $.ajax({
           	url: "<?php echo base_url()?>index.php/uploads/displayUserImages"
        }).done(function(data) {
                $('#imageTable').html(data);
        });
        
        $('#albumText').css('display', 'none');
        
        function scroll(){
    		$(".boxtext").css("opacity", "0.0");
    		$(".boxtext").animate({opacity:1.0}, 3000, scroll);
	}
	       
        $("#myfile").change(function (){
            	if (this.value!=='')$('#uploadForm1').submit();
        });
        
        $('#albums').change(function(){
                if($('#albums option').filter(':selected').val()==-1)
                    $('#albumText').css('display', 'block');
                else 
                    $('#albumText').css('display', 'none');
        });
        
        $('#uploadForm').submit(function(e){
            if($("#filename").attr('value')=="")e.preventDefault();
            
        });
        
      	var jcrop_api;
	var obj;
	
	function showCoords(c){       
		$("#cropdata").attr('value',c.x+','+c.y+','+c.x2+','+c.y2);
       	};
        
        function clearCoords(){
            	$("#cropdata").attr('value',0+','+0+','+300+','+300);
        };    

                                        $('.target').Jcrop({
                                            	onChange:   showCoords,
                                            	onSelect:   showCoords,
                                            	onRelease:  clearCoords,
                                            	setSelect:   [ 0, 0, 300, 300 ],
                                            	aspectRatio:1
                                        }); 
                                         
                                        sroll();
                                        if($("#albums").attr("value")==-1){
	                                   	var option = $('<option></option>').attr("value", "option value").text($('#albumText').text());
                                            	$("#albums").append(option);                                            
                                        }      
});
</script>


<section class="services">
<div class="row2" style="margin-top:20px">
    <div class="two mobile-four columns">

      
      
      <form class="custom" method="post" action="<?php echo base_url('index.php/uploads/formsubmit2/'); ?>"  id="uploadForm">
          	<label>Photo Title :</label>
              	<input style="background-color:#494949; border-color:#494949" name="title" type="text" placeholder="Photo Title" value="<?php echo $picture->Title?>"/>
            
              	<label>Description:</label>
              	<textarea style="background-color:#494949; border-color:#494949;width:228px; height:150px;" name="description" placeholder="Description" ros="4" cols="50" style="margin: 0px 78px 5px 0px;"><?php echo $picture->Description?></textarea>
              	
          	<label>Camera :</label>
            	<input style="background-color:#494949;border-color:#494949" type="text" name="camera"  placeholder="Camera" value="<?php echo $picture->camera?>" />
            
            	<label>Albums :</label>
            	<select style="background-color:#494949; border-color:#494949" name="albums" id="albums">
            	<?php foreach ($albums as $value):?>
                <option id="customDropdown" style="background-color:#494949; border-color:#494949; height:25px;" value="<?php echo $value->id?>" <?php if($album_id->album_id==$value->id) echo "selected"; ?>><?php echo $value->name?></option>
            	<?php endforeach;?>
                <option value="-1">Create New Album</option>
            	</select>
            	<br><br>
              	<input style="background-color:#494949; border-color:#494949" type="text" name="albumText" placeholder="New Album Name" id="albumText" style="display:<?php if(count($albums)==0) echo "block";else echo "none"?>"/>

            <label>Category</label>
            <select style="background-color:#494949; border-color:#494949; height:25px;" name="category">
            <?php foreach ($categories as $value):?>            	
                <option style="background-color:#494949; border-color:#494949; height:25px;" value="<?php echo $value->id?>" <?php if($value->id==$picture->category) echo "selected"; ?> ><?php echo $value->name?></option>
            <?php endforeach;?>
            </select>
            <br><br>
              
	      <input style="background-color:#494949; border-color:#494949" type='hidden' value='<?php echo $picture->id ?>' name="picture_id" id="picture_id"/>
              <input style="background-color:#494949; border-color:#494949" type='hidden' value='<?php echo $picture->location ?>' name="filename" id="filename"/>
              <input style="background-color:#494949; border-color:#494949" type='hidden' value='0,0,300,300' name="cropdata" id="cropdata"/>
              
              <br>
            <input type="submit" class="push socle" id="magicsavebtn" style="display: block;width:100px" value="Save"/>
            <div class="error" style="color: #e40000;font-size: 2em">
            </div>

        </form>
  </div>

  <div class="ten mobile-four columns">
                <div style="margin-left:30px;overflow: hidden" id="barge">
               	<h2>Drag to Crop Image</h2>
               	<br><img id='magicImage' class='target' src='<?php echo base_url()?>uploads/images/<?php echo $picture->location ?>'>
  </div>
  <p><label>Recent Uploads</p></label>
<div id="imageTable" style="background:#000" style="width:95%;padding-left:250px">
</div>    
</div>
        

</div>

</section>