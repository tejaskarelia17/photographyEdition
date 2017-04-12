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
<style style="text/css">
	#px{
		background: url('<?php echo base_url()?>images/fb.jpg') no-repeat center center fixed;
		filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo base_url()?>images/fb.jpg', sizingMethod='scale');
	}
	</style>
<link rel="stylesheet" href="<?php echo base_url()?>stylesheets/footer.css">
<script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
<meta name="description" content="A novel platform for budding photographers and photography enthusiasts in India.  We aim to provide all our photography enthusiasts , amateurs and experts alike, the opportunity to have their art displayed at exhibitions at some of India's finest art galleries. ">
</head>

<body id="home_index" class="welcome-page" style="background-color:#333 !important;" onpageshow="return;">
<div id="is-mobile-div"></div>
<div id="px" style="background-image: url(<?php echo base_url()?>images/fb.jpg);">


    <!--<div style="display:block">
        <table style="width:100%;margin:0 ;padding: 0">
            <tr>
                <td colspan="2" rowspan="2">
				<div class="blockWrapper">
					<a href="photoView.html"><img src="<?php echo base_url()?>assets/images/gallery/image1.jpg" /></a>
					<div class="contentBlock">
						<p>The Smoke <img src="<?php echo base_url()?>assets/images/gallery/blackBullet.jpg" /><span><a href="Profile.html">Tarun Kumar</a></span></p>
						<div class="countBlock">
							<img src="<?php echo base_url()?>assets/images/blank.png" class="icon1" />
							<p>530</p>
							<img src="<?php echo base_url()?>assets/images/blank.png" class="icon2" />
							<p>8530</p>
						</div>
					</div>
				</div>
                </td>
                <td>                                <div class="blockWrapper">
						<a href="photoView.html"><img src="<?php echo base_url()?>assets/images/gallery/image2.jpg" /></a>
						<div class="contentBlock contentBlock1">
							<p>The Smoke <img src="<?php echo base_url()?>assets/images/gallery/blackBullet.jpg" /><span><a href="Profile.html">Tarun Kumar</a></span></p>
							<div class="countBlock">
								<img src="<?php echo base_url()?>assets/images/blank.png" class="icon1" />
								<p>530</p>
								<img src="<?php echo base_url()?>assets/images/blank.png" class="icon2" />
								<p>8530</p>
							</div>
						</div>
				</div>
                    </td>
				
            <td rowspan="2">  
				<div class="blockWrapper">
					<a href="photoView.html"><img src="<?php echo base_url()?>assets/images/gallery/image4.jpg" /></a>
					<div class="contentBlock contentBlock1">
						<p>The Smoke <img src="<?php echo base_url()?>assets/images/gallery/blackBullet.jpg" /><span><a href="Profile.html">Tarun Kumar</a></span></p>
						<div class="countBlock">
							<img src="<?php echo base_url()?>assets/images/blank.png" class="icon1" />
							<p>530</p>
							<img src="<?php echo base_url()?>assets/images/blank.png" class="icon2" />
							<p>8530</p>
						</div>
					</div>
				</div>
            </td>
            <tr>
                <td>
                <div class="blockWrapper">
			<a href="photoView.html"><img src="<?php echo base_url()?>assets/images/gallery/image3.jpg" /></a>
						<div class="contentBlock contentBlock1">
							<p>The Smoke <img src="<?php echo base_url()?>assets/images/gallery/blackBullet.jpg" /><span><a href="Profile.html">Tarun Kumar</a></span></p>
							<div class="countBlock">
								<img src="<?php echo base_url()?>assets/images/blank.png" class="icon1" />
								<p>530</p>
								<img src="<?php echo base_url()?>assets/images/blank.png" class="icon2" />
								<p>8530</p>
							</div>
						</div>
				</div>
                    </td>
            </tr>
			
	</table>
		<div id="page-nav" class="navigation">
			<a href="./pages/newpage.php?page=1"></a>
		</div>
</div></div>-->

    <div class="row2">

<!--<table class="table2" style="margin-top:490px;border:none">
<tr>
<td width="20%"><a class="white" href="<?php echo base_url('index.php/welcome/about') ?>">| About Us</a></td>
<td width="20%"><a class="white" href="#">| Terms and Conditions</a></td>
<td width="15%"><a class="white" href="<?php echo base_url('index.php/welcome/privacy') ?>">| Privacy Policy</a></td>
<td width="15%"><a class="white" href="#">| Contact Us</a></td>
<td width="30%"><span style="color:grey">Designed and Maintained by</span> <a href="http://www.hostrabbit.in/" target="_blank"><img src="<?php echo base_url()?>images/HRlogo_Final.png" width="30%"></a></td>
</tr>
</table>
</div>
</div>
<div id="footer"><ul id="footerInner"><li class="copy" style="margin-left:-200px">© 2013 Indian Photography Edition</li>
<li class="first" style="margin-left:100px"><a href="<?php echo base_url('index.php/welcome/about') ?>"> &nbsp;&nbsp;About Us</a></li>
<li><a href="<?php echo base_url('index.php/welcome/terms') ?>"> |&nbsp;&nbsp;Terms &amp; Conditions</a></li>
<li><a href="<?php echo base_url('index.php/welcome/privacy') ?>"> |&nbsp;&nbsp;Privacy</a></li>
<li><a href="#">|&nbsp;&nbsp;Contact Us</a></li>
<!--<li class="credit" align="right" style="margin-left:-1000px"><a href="http://www.hostrabbit.in/" target="_blank"><img src="<?php echo base_url()?>images/HRlogo_Final1.png" width="20%" style="position:fixed"  onmouseover="this.src='<?php echo base_url()?>images/HRlogo_Final_hover.png';" onmouseout="this.src='<?php echo base_url()?>images/HRlogo_Final1.png';"></a></li>-->
<li class="credit" align="right" style="margin-left:200px">Designed By <a href="http://www.hostrabbit.in/" target="_blank">HostRabbit.in</a></li>
</ul><div class="clear"> </div></div><div id="fb-root"></div>-->

<font face="Calibri">
<div class="clear"></div>
<div id="first-time-footercontainer">
	<div id="first-time-footer">
		<span id="footer-notes"><a href="http://www.hostrabbit.in/" target="_blank"><img src="<?php echo base_url()?>images/HRlogo_Final1.png" width="8%" style="position:fixed;margin-left:-200px;margin-top:-10px"  onmouseover="this.src='<?php echo base_url()?>images/HRlogo_Final1_hover.png';" onmouseout="this.src='<?php echo base_url()?>images/HRlogo_Final1.png';"></a></span>
		<ul class="nav">
      		<li>&copy; 2013 Indian Photography Edition</li>
<li><a href="<?php echo base_url('index.php/welcome/about') ?>">About</a></li>
<li><a href="<?php echo base_url('index.php/welcome/terms') ?>"> |&nbsp;&nbsp;Terms &amp; Conditions</a></li>
<li><a href="<?php echo base_url('index.php/welcome/privacy') ?>"> |&nbsp;&nbsp;Privacy</a></li>
<li><a href="https://www.facebook.com/pages/Indian-Photography-Edition/1404249313125245" target="_blank"> |&nbsp;&nbsp;Like Us on FB</a></li>
<li><a href="<?php echo base_url('index.php/welcome/contact') ?>">|&nbsp;&nbsp;Contact Us</a></li>
		</ul>
		<div class="clear"></div>
	</div>
</div>
<img id="hack-image" style="display:none" src=""/>
</div>
</font>
</div>
</body>
</html>