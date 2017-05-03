
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<style type="text/css">

a:link {
	color: #41B4D4;
}
a:visited {
	color: #41B4D4;
}
.contentBlock{
    opacity: 0.0;
    transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out; /* FF 4 */
    -webkit-transition: all 0.5s ease-in-out; /* Safari & Chrome */
    -o-transition: all 0.5s ease-in-out; /* Opera */}


</style>
<script type="text/javascript">
    $(function(){
        $('.blockWrapper').mouseover(function(){
            $(this).children('.contentBlock').css('opacity', '1.0');
        });
        $('.blockWrapper').mouseout(function(){
            $(this).children('.contentBlock').css('opacity', '0.0');
        });
    });
    </script>
<style>
#bg {
  position: fixed; 
  /* Preserve aspet ratio */
}
</style>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<style style="text/css">
	#px{
		background: url('<?php echo base_url()?>uploads/landing/<?php echo $this->IPEModel->getLanding(); ?>', sizingMethod='scale') no-repeat center center fixed;
		filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo base_url()?>uploads/landing/<?php echo $this->IPEModel->getLanding(); ?>');
	}
	</style>
<link rel="stylesheet" href="<?php echo base_url()?>stylesheets/footer.css">
<meta name="description" content="A novel platform for budding photographers and photography enthusiasts in India.  We aim to provide all our photography enthusiasts , amateurs and experts alike, the opportunity to have their art displayed at exhibitions at some of India's finest art galleries. ">
<title>Red-Eye Photography</title>
</head>

<body id="home_index" class="welcome-page" style="background-color:#333 !important;" onpageshow="return;">
<div id="is-mobile-div"></div>
<div id="px" style="background-image: url(<?php echo base_url()?>uploads/landing/<?php echo $this->IPEModel->getLanding(); ?>);">
<img src="<?php echo base_url()?>uploads/landing/<?php echo $this->IPEModel->getLanding(); ?>" width=100% height=100%> <!-- Check the code here -->


<font face="Calibri">
<div class="clear"></div>
<div id="first-time-footercontainer">
	<div id="first-time-footer">
		<ul class="nav">
      		<li>&copy; 2013 Red-Eye Photography</li>
<li><a href="<?php echo base_url('index.php/welcome/about') ?>">About</a></li>
<li><a href="#"> |&nbsp;&nbsp;Terms &amp; Conditions</a></li>
<li><a href="#"> |&nbsp;&nbsp;Privacy</a></li>
<li><a href="#" target="_blank"> |&nbsp;&nbsp;Like Us on FB</a></li>
<li><a href="<?php echo base_url('index.php') ?>">|&nbsp;&nbsp;Contact Us</a></li>
		</ul>
		<div class="clear"></div>
	</div>
</div>x
</div>
</font>
</div>
</body>
</html>