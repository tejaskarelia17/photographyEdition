
<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300' rel='stylesheet' type='text/css'>
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="<?php echo base_url()?>stylesheets/foundation.css">
  <link rel="stylesheet" href="<?php echo base_url()?>stylesheets/design.css">
<link rel="stylesheet" href="<?php echo base_url()?>stylesheets/quicksand.css">

<title>Red-Eye Photography</title>

<section class="service">

      <div class="row mb20">

<br><br>
       <nav id="filter"></nav>

        <section id="container">
        	<ul id="stage">
                  <?php foreach ($pictures as $v):?>
                    <li data-tags=<?php echo $v->name?>>      
			<a href="<?php echo base_url()?>index.php/view/photo/<?php echo $v->id?>">

                        <img src="<?php echo base_url()?>uploads/images/thumbs/<?php echo $v->location?>" style="width:auto;height:200px"/>

                        </a>
                </li>
                <?php endforeach;?>

            </ul>
        </section>



</div>
</section>

    <script src="<?php echo base_url()?>javascripts/jquery.foundation.topbar.js"></script>

  <!-- Initialize JS Plugins -->
  <script type="text/javascript" src="<?php echo base_url()?>javascripts/jquery.js"></script>
<script src="<?php echo base_url()?>plugins/jquery.quicksand.js"></script>
<script src="<?php echo base_url()?>plugins/script.js"></script>
  <script src="<?php echo base_url()?>javascripts/modernizr.foundation.js"></script>

  <script src="<?php echo base_url()?>javascripts/app.js"></script>
  <script src="<?php echo base_url()?>plugins/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url()?>plugins/smoothscroll.js"></script>