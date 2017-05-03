<title>Red-Eye Photography</title>
<section class="slab pb20">
  <div class="row">
         <div class="twelve mobile-four columns pt20">
            <div class="text-center">
               <h1 class="top">View Contests</h1>
            </div>
         </div>
      </div>
</section>
<section class="services">

    <div class="row mt50">

    <table width="957" height="51" border="1" class="table">
  <tr>
    <td width="690">Name</td>
    <td width="78">Start Date</td>
    <td width="80">End Date</td>
        <td width="80">Winner</td>

  </tr>
  <?php foreach ($data as $v):?>
  <tr>
    <td><a href="<?php echo base_url()?>index.php/contest/view/<?php echo $v->id?>"><?php echo $v->name ?></a></td>
    <td><a href="<?php echo base_url()?>index.php/contest/view/<?php echo $v->id?>"><?php echo $v->startdate?></a></td>
    <td><a href="<?php echo base_url()?>index.php/contest/view/<?php echo $v->id?>"><?php echo $v->enddate?></a></td>
    <td><a href="<?php echo base_url()?>index.php/contest/view/<?php echo $v->id?>">
        <?php if($v->winner_id!=0)
                echo $v->winnerdata['userData']['userData']->username;
            else 
                echo "None";?></a></td>
  </tr>
  <?php endforeach;?>
</table> 
        <?php foreach($data as $v):?>
    
        <?php endforeach;?>
    
  </div>
</section>