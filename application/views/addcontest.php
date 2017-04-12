
<section class="slab pb20">
  <div class="row">
         <div class="twelve mobile-four columns pt20">
            <div class="text-center">
               <h1 class="top">CONTEST</h1>
            </div>
         </div>
      </div>
</section>

<section class="services">

<div class="row mt50">
  <div class="six mobile-four columns">
    <h4 class="h"><span>Contest: </span></h4>
      <?php echo $errors?><br>

<form action="<?php echo base_url()?>index.php/admin/addContest" method="post">
  <label>Subject :</label>
  <input type="text" placeholder="Subject" name="title" />
  <label>Description :</label>
  <textarea name="description" rows="10" cols="100"></textarea>
  <label>Start Date:</label><input type="text" name="startdate"/>
  <label>End Date:</label><input type="text" name="enddate"/>
  <input type="submit" placeholder="Upload" class="push socle" style="width:100px"/>
</form>
  </div>
  
</section>
