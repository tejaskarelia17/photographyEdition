<link rel="icon" type="image/ico" href="images/favicon.ico"/>

<link rel='stylesheet' id='layout-css'  href='<?php echo base_url()?>css/layout.css' type='text/css' media='all' />
<link rel='stylesheet' id='reset-css'  href='<?php echo base_url()?>css/reset.css' type='text/css' media='all' />
<link rel='stylesheet' id='jscrollpane_css-css'  href='<?php echo base_url()?>css/jquery.jscrollpane.css' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo base_url()?>js/l10.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>js/jquery.min.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>js/jquery.metadata.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>js/jquery-ui.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>js/jScrollbar.jquery.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>js/function.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>js/jquery.jscrollpane.min.js'></script>
<script type='text/javascript' src='<?php echo base_url()?>js/jquery.mousewheel.min.js'></script>
<!-- /all in one seo pack -->

<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<style type="text/css">
body{ background:url('<?php echo base_url()?>images/pattern.jpg'); }
</style>
<title>Red-Eye Photography</title>
</head>
<body>
	<div id="masterload">
		<div class="preload-logo">
        </div>
	</div>
<div class="slideshow">
	<div class="sliderContent">
		<div class="item bg">
        </div>
	</div>
</div>	
<div id="left-menu-animation">
	<div id="left-scroll-menu" class="jThumbnailScroller">
		<div class="jTscrollerContainer">
			<div class="jTscroller">
<!-- custom wp menu start here -->
<ul id="left-menu">
    <?php foreach ($data as $val):?>
<li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item">
    <a href="<?php echo base_url()?>index.php/view/album/<?php echo $val->id?>"><span class="panel-title thumb"><?php echo $val->name?></span></a></li>
<?php endforeach;?>
<li id="menu-item" class="menu-item menu-item-type-post_type menu-item-object-page menu-item">
    <a href="<?php echo base_url()?>"><span class="panel-title thumb">Back</span></a>
</li>
</ul>
<!-- custom wp menu end here -->
			</div>
		</div>
	</div>
</div>
	

<div id="wrap">
	<div class="container-top">
		<div class="logo">
        <a href="#"><img src="<?php echo base_url()?>images/highlight2.png" /><h1 style="color:#FFF"><?php echo $name?></h1>
            <img src="<?php echo base_url()?>images/highlight.png" />
        </a>
        </div>
	</div>
	<div class="scroll-container">
		<div class="jScrollbar_mask">
        <a href="#">
        <?php if($profileImage!=NULL):?>
        <img src="<?php echo base_url()."uploads/userProfile/".$profileImage;?>" height="275" width="275" alt="" />
        <?php else:?>
        <img width="300" height="225" src="<?php echo base_url()?>images/avatar.jpg" alt="Edit Profile"/>
        <?php endif;?>	  
        </a>
        <a href="<?php echo base_url()?>index.php/profile/edit/<?php echo $id?>"><h5 align="right" style="color:#FFF">Edit Profile</h5></a>
        <a href="#" id="changecover"><h5 align="right" style="color:#FFF">Change Cover</h5></a>
			<div class="index_thumb caption">
            <img src="<?php echo base_url()?>images/highlight2.png" />
		            <h2 align="left" style="color:#FFF">Total Photos <?php echo $noOfPictures?></h2>
                    <h2 align="left" style="color:#FFF">Total Albums <?php echo $noOfAlbums?></h2>
                    <h2 align="left" style="color:#FFF">Total Followers <?php echo $noOfFollowers?></h2>

	<img src="<?php echo base_url()?>images/highlight2.png" /><br />
    <h2 style="color:#FFF">About Me : </h2><p><?php echo $bio?></p>
    <h2 style="color:#FFF">Contact : </h2>
    <?php echo $site?><?php if($site!="") echo "/<br />"?>
    <?php echo $twitter?><?php if($site!="") echo "/<br />"?>
    <?php echo $facebook?><?php if($site!="") echo "/<br />"?>
    <?php echo $contact?>
            </div>	
		</div>
			<div class="clr">
            </div>
		</div>
<div class="footer">	
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/mobilyslider.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.thumbnailScroller.js"></script>
<script type="text/javascript">
	
			$(function(){
				$(".item").preloadify({ force_icon:true, fadein:1200 }); 
				$(".content").preloadify({ force_icon:true, fadein:5000 }); 
			});
			
</script>		
</div>
</div>
<div class="pat-left">
	<div id="menu-left">
	<ul>
        <li><a href="#" title="Fullscreen">s<span class="fullscreen"></span></a></li>
	<li><a href="#" link="<?php echo base_url()?>index.php/profile/notifications/<?php echo $id?>" id="dashboard" title="Dashboard">s<span class="download"></span></a></li>
	<li><a href="#" link="<?php echo base_url()?>index.php/profile/getMessages/<?php echo $id?>" title="Messages"><span class="download">s</span></a></li>
        <li><a href="#" link="<?php echo base_url()?>index.php/profile/testimonials/<?php echo $id?>" title="Credits">SSS<</a></li>
        <li><a href="#" link="<?php echo base_url()?>index.php/profile/friends/<?php echo $id?>" title="Friends"><span class="download">s</span></a></li>
        <li><a href="#" link="<?php echo base_url()?>index.php/profile/followers/<?php echo $id?>" title="Followers"><span class="download">ss</span></a></li>
        <li><a href="#" link="<?php echo base_url()?>index.php/profile/following/<?php echo $id?>" title="Following"><span class="download">ss</span></a></li>
        <li><a href="#" link="<?php echo base_url()?>index.php/profile/analysis/<?php echo $id?>" title="Analyse"><span class="download">SS</span></a></li>
        <li><a href="#" link="<?php echo base_url()?>index.php/profile/testimonials/<?php echo $id?>" title="View"><span class="download">SS</span></a></li>
	</ul>	
	</div>

    <div id="magicdiv">
</div>
</div>
    <script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-15675824-8']);
		  _gaq.push(['_trackPageview']);

        $(document).ready(function(){
           var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
         getSearchItems('<?php echo base_url()?>index.php/profile/notifications/<?php echo $id?>');
           $("#menu-left ul li a").click(function(e){
            e.preventDefault();
            if($(this).is('[link]'))
            getSearchItems($(this).attr('link'));
            });
            
        $('#editprofile').click(function(e){
            e.preventDefault();
            $.ajax({url:'<?php echo base_url()?>index.php/profile/edit/<?php echo $id?>'})
            .done(function(json){$('#magicdiv').html(json);});
        });
        $('#changecover').click(function(e){
            e.preventDefault();
                        $.ajax({url:'<?php echo base_url()?>index.php/profile/cover/<?php echo $id?>'})
            .done(function(json){$('#magicdiv').html(json);});
        });
        function getSearchItems(link) {
            
            var request =$.ajax({
                 url: link
            });
            request.done(function(json) {
                $('#magicdiv').html(json);
            });
            request.fail(function(jqXHR, textStatus) {alert(jqXHR.message+"" +textStatus);
            });
        }
        });
    </script>