<style>
.push { cursor:pointer;display: inline-block; nowhitespace: afterproperty; margin: 5px; padding: 8px 15px; background: #555; border: 1px solid rgba(0,0,0,0.1); border-radius: 4px; transition: all 0.2s ease-out; box-shadow: inset 0 1px 0 rgba(255,255,255,0.5), 0 2px 2px rgba(0,0,0,0.3), 0 0 4px 1px rgba(0,0,0,0.1); /* Font styles */ color: #FFF; text-decoration: none; ; }
.push:hover { background: #999; color: #FFF; }
.push:active { color: #DDD; -moz-box-shadow: inset 0 0 3px 1px rgba(255,255,255,0.5); -webkit-box-shadow: inset 0 0 3px 1px rgba(255,255,255,0.5); box-shadow: inset 0 0 3px 1px rgba(255,255,255,0.5); border: 1px solid rgba(0,0,0,0.1); }
.socle { position: relative; z-index: 2; }
.socle:after { content: ""; z-index: -1; position: absolute; border-radius: 6px; box-shadow: inset 0 1px 0 rgba(0,0,0,0.15), inset 0 -1px 0 rgba(255,255,255,0.1); top: -6px; bottom: -6px; right: -6px; left: -6px; background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.15)); }
</style>
<?php echo form_open_multipart('profile/editBasicProfile');?>    
<h1 align="center" style="padding-top:15px">EDIT PROILE<br /><img src="<?php echo base_url()?>images/highlight.png" /></h1>
<h2 align="center">Change Display Pic</h2><br>
            <?php if($data->profileImage!=NULL):?>
        <img src="<?php echo base_url()."uploads/userProfile/".$data->profileImage;?>" height="75" width="75" alt="" />
        <?php endif;?>
    <h4 align="center">
        <input type="file"  name="userfile" class="push socle">Browse</a></h4>
<h2 align="center">About Me<br />
<textarea name="bio" cols="50" rows="4" style="width:500px"><?php echo $data->bio?></textarea></h2>
<h2 align="center">Contact</h2>

<h3 align="center">Facebook<br />
<input type="text" placeholder="Facebook" placeholder="Go to your profile and copy the url and paste it!" onclick="myFunction()" name="facebook" value="<?php echo $data->facebook?>"/></h3>
<h3 align="center">Twitter<br />
<input type="text" placeholder="Twitter" onclick="myFunction()" name="twitter" value="<?php echo $data->twitter?>" /></h3>
<h3 align="center">Website<br />
<input type="text" placeholder="Website" name="site" value="<?php echo $data->website?>"/></h3>
<h3 align="center">Username<br />
<input type="text" placeholder="Username" name="email" value="<?php echo $data->email?>"/></h3>
<h3 align="center">Phone<br />
<input type="text" placeholder="Phone" name="contact" value="<?php echo $data->contact?>"/></h3>
<h4 align="center">
    <input type="submit" value="Save" class="push socle"></h4>
</form>
<script>
function myFunction()
{
alert("go to your profile and copy the url and paste it!");
}
</script>