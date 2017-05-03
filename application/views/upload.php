
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
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
        })
        ;
        
        function scroll() {
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
        
        $('#uploadForm1').submit(dosomething);
        $('#uploadForm').submit(function(e){
            if($("#filename").attr('value')=="")e.preventDefault();
            
        });
       var jcrop_api;
var obj;
         function showCoords(c) {       
              
            $("#cropdata").attr('value',c.x+','+c.y+','+c.x2+','+c.y2+','+obj.image_width+','+obj.image_height);
            };
          function clearCoords(){
            $("#cropdata").attr('value',0+','+0+','+300+','+300);
        };    

        function dosomething(e) {
                   var bar = $('.bar');
                    var percent = $('.percent');
                    //var status = $('#status');
                    e.preventDefault();
                    $(this).ajaxSubmit({
                        beforeSubmit: function(formData, jqForm, options) {
                            //status.html();
                            var percentVal = '0%';
                            bar.width(percentVal)
                            percent.html(percentVal);scroll();
                            $('.percent').css('opacity', '1.0')
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                            var percentVal = percentComplete + '%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        success: function(xhr) {
                                if(xhr.substring(0, 1)=="S"){
                                        obj=JSON.parse(xhr.substring(1));
                                        $("#filename").attr('value',obj.file_name);
                                        $("#barge").html("<h2>Drag to Crop Image</h2> <br><img id='magicImage' class='target' src='<?php echo base_url()?>uploads/images/"+obj.file_name+"'>");
                                        $('.target').Jcrop({
                                            onChange:   showCoords,
                                            onSelect:   showCoords,
                                            onRelease:  clearCoords,
                                            trueSize: [obj.image_width,obj.image_height],
                                             setSelect:   [ 0, 0, 300, 300 ],
                                            aspectRatio:1
                                        }); 
                                        $('#magicsavebtn').css('display', 'block');
                                         $("#cropdata").attr('value',0+','+0+','+300+','+300+','+obj.image_width+','+obj.image_height);
                                        sroll();
                                        if($("#albums").attr("value")==-1){
                                            var option = $('<option></option>').attr("value", "option value").text($('#albumText').text());
                                            $("#albums").append(option);
                                            
                                        }
                                        
                                }
                                else{
                                    alert(xhr.substring(1));
                                   $('.error').html(xhr.substring(1));
                                }
                                
                        }
                    });
          
                };

});
    </script>


<section class="services">
<div class="row2" style="margin-top:20px">
    <div class="two mobile-four columns">

      <form class="custom" method="post" action="<?php echo base_url('index.php/uploads/upload/'); ?>" enctype="multipart/form-data" id="uploadForm1">
           
<input type="file" id="myfile" name="userfile" value="Browse" class="file" style="display:hidden;width:90px;opacity: 0.0;" />
<label for="myfile" class="push" data-role="button" data-inline="true" data-mini="true" data-corners="false">Upload</label>

      </form>
      <form class="custom" method="post" action="<?php echo base_url('index.php/uploads/formsubmit/'); ?>"  id="uploadForm">
          <label style="color:black">Photo Title :</label>
              <input style="background-color:#EBEDFA;" name="title" type="text" placeholder="Photo Title"/>
            
              <label style="color:black">Description:</label>
              <textarea style="background-color:#EBEDFA;;width:228px; height:150px;" name="description" placeholder="Description" ros="4" cols="50" style="margin: 0px 78px 5px 0px;"></textarea>
          <label style="color:black">Camera :</label>
            <input style="background-color:#EBEDFA" type="text" name="camera"  placeholder="Camera" />
            <label style="color:black">Albums :</label>
            <select style="background-color:#EBEDFA;border-color:#EBEDFA" name="albums" id="albums">
            <?php foreach ($albums as $value):?>
                <option id="customDropdown" style="background-color:#EBEDFA;; height:25px;" value="<?php echo $value->id?>"><?php echo $value->name?></option>
            <?php endforeach;?>
                <option value="-1">Create New Album</option>
            </select><br><br>
              <input style="background-color:#EBEDFA;border-color:#EBEDFA" type="text" name="albumText" placeholder="New Album Name" id="albumText" style="display:<?php if(count($albums)==0) echo "block";else echo "none"?>"/>

            <label style="color:black">Category</label>
            <select style="background-color:#EBEDFA;border-color:#EBEDFA;height:25px;" name="category">
            <?php foreach ($categories as $value):?>
                <option style="background-color:#EBEDFA;; height:25px;" value="<?php echo $value->id?>"><?php echo $value->name?></option>
            <?php endforeach;?>
            </select>
            <br><br>
              <label style="color:black">Tags :</label>
                <input style="background-color:#EBEDFA;" type="text" placeholder="Tags" name="tags"/>

              <input style="background-color:#EBEDFA;" type='hidden' value='' name="filename" id="filename"/>
              <input style="background-color:#EBEDFA;" type='hidden' value='0,0,300,300' name="cropdata" id="cropdata"/>
              <br>
            <input type="submit" class="push socle" id="magicsavebtn" style="display: none;width:100px" value="Save"/>
            <div class="error" style="color: #e40000;font-size: 2em">
            </div>

        </form>
  </div>

  <div class="ten mobile-four columns">
                 <div style="margin-left:30px;overflow: hidden" id="barge">
                        <div class="bar" style="background:#000"></div >
                <div class="percent" style="font-size:3em;margin-left:45%;color: #000;opacity:0.0">0%</div>
                <img class="target" src="<?php echo base_url().'images/ipe.png'?>" style="width:450px;height:auto;margin-left:27%;opacity:1.0;">
    </div>
  <p><label style="color:black">Recent Uploads</p></label>
<div id="imageTable" style="background:#000" style="width:95%;padding-left:250px">
</div>    
        </div>
        

</div>

</section>