<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>


        <title>Red-Eye Photography</title>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="" />
        <meta name="keywords" content=""/>
                <link rel="stylesheet" href="<?php echo base_url()?>css/style.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script src="<?php echo base_url()?>js/cufon-yui.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>js/Quicksand_Book_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('span,p,h1',{
				textShadow: '0px 0px 1px #ffffff'
			});
		</script>
<link rel="stylesheet" href="<?php echo base_url()?>css/reveal.css">

<script src="<?php echo base_url()?>js/jquery.min.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>js/jquery.reveal.js" type="text/javascript"></script>
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
    </head>

    <body>
		<div id="st_main" class="st_main">
                        <?php if($data['userData']->cover_pic!=NULL):?>
			<img src="<?php echo base_url()?>uploads/userProfile/<?php echo $data['userData']->cover_pic?>" alt="" class="st_preview" style="display:none;height:100%;width:100%"/>
                        <?php else:?>
                        <img src="<?php echo base_url()?>images/ipe1.jpg" alt="" class="st_preview" style="display:none;height:100%;width:100%"/>
                        <?php endif;?>
			
			<div id="st_loading" class="st_loading"><span>Loading...</span></div>
			<ul id="st_nav" class="st_navigation">
				<li>
					<span class="st_link">Bio &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="st_arrow_down"></span></span>
					<div class="st_about st_thumbs_wrapper">
						<div class="st_subcontent">
							<p><?php echo $data['userData']->bio?></p>
						</div>
					</div>
				</li>
                 <li><br><br><br><br>
					<span class="st_link"><a href="<?php echo base_url()?>index.php/view/albumgallery/<?php echo $data['userData']->id?>" style="color:rgba(255,255,255,1)">Gallery</a><span class="st_main"></span></span>
					<div class="st_about st_thumbs_wrapper">
						<div class="st_subcontent">
                                                    <p></p>
						</div>
					</div>
				</li>
				<li>
					<span class="st_link"><a href="<?php echo base_url()?>index.php/profile/credits/<?php echo $data['userData']->id?>" style="color:rgba(255,255,255,1)">Credits</a><span class="st_main"></span></span>
					<div class="st_about st_thumbs_wrapper">
						<div class="st_subcontent">
							<p></p>
						</div>
					</div>
				</li>
                <li>
					<span class="st_link">Contact<span class="st_arrow_down"></span></span>
					<div class="st_about st_thumbs_wrapper">
						<div class="st_subcontent">
							<p style="height:60px;margin-top:-60px">
								<h4>Mobile: <a style="color:#fff; text-decoration:none" href="#"><?php echo $data['userData']->contact?></a></h4><br>
                                                                <h4>Facebook: <a style="color:#fff" target="_blank" href="<?php echo $data['userData']->facebook?>"><?php echo $data['userData']->facebook?></a></h4><br>
                                                                <h4>Twitter: <a style="color:#fff" target="_blank" href="<?php echo $data['userData']->twitter?>"><?php echo $data['userData']->twitter?></a></h4><br>
                                                                <h4>Website: <a style="color:#fff" target="_blank" href="http://<?php echo $data['userData']->website?>"> <?php echo $data['userData']->website?></a></h4><br>
							</p>
						</div>
					</div>
				</li>
               
			</ul>
		</div>

        <div>
            <script>
                $(function(){
                    $('#followbtn').click(function(){
                        window.location.replace('<?php echo base_url()?>index.php/follow/addFollower/<?php echo $id?>');
                    });
                    $('#unfollowbtn').click(function(){
                        window.location.replace('<?php echo base_url()?>index.php/follow/removeFollower/<?php echo $id?>');
                    });
                    $('#friendbtn').click(function(){
                       window.location.replace('<?php echo base_url()?>index.php/profile/addFriend/<?php echo $id?>');
                    });
                });
                </script>

	<span class="reference">
            
		<?php if(isset($_SERVER['HTTP_REFERER'])) :?>
	   		<a href="<?php echo $_SERVER['HTTP_REFERER']?>"><span class="panel-title thumb">Back</span></a>
		<?php endif;?>
            
      		<?php if($admin):?>
        		<a href="<?php echo base_url()?>index.php/admin/deleteuser/<?php echo $id?>">Delete User</a>
          	<?php endif;?>               
                
          	
  		<?php if(!$owner && $loggedIn):?>
  		
  			<a href="<?php echo base_url()?>index.php/messaging/getThread/<?php echo $id?>">Message Me</a>
  		
			<?php if($followable):?>
                		<a href="#" id="followbtn">Follow Me</a>
			<?php else:?>
            			<a href="# " id="unfollowbtn">Unfollow Me</a>
                  	<?php endif;?>
                            	
                      	<?php if($friendable):?>
                                <a href="#" id="friendbtn">Add As A Friend</a>
                    	<?php endif;?>
                                
                     	<a href="#" class="small-link" data-reveal-id="myModal">Write Credit</a>
      		<?php endif;?>              
         
        </span>
        </div>
        <div id="myModal" class="reveal-modal">
			<h3 style="color:rgba(0,0,0,1)"><font face="Calibri">Write a Credit</font></h3>
            <form action="<?php echo base_url()?>index.php/profile/addCredit/<?php echo $id?>" method="POST">
            <font face="Calibri"><textarea name="credit" style="height:100px; width:500px;"></textarea></font><br /><input type="submit" class="sbutton" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="sbutton" /></form>
		</div>
<div>
            <span class="reference2">
                                REP PIN : REP<?php echo ($data['userData']->id +3000)?>
                                <br>
            		<?php if($owner):?>
				<a href="<?php echo base_url()?>index.php/profile/edit/<?php echo $data['userData']->id?>">Edit Profile</a><br />
                                <a href="<?php echo base_url()?>index.php/profile/cover/<?php echo $data['userData']->id?>">Change Cover Pic</a>
                        <?php endif;?>
            </span>
		</div>

        <!-- The JavaScript -->
        <script type="text/javascript">
            $(function() {
				//the loading image
				var $loader		= $('#st_loading');
				//the ul element 
				var $list		= $('#st_nav');
				//the current image being shown
				var $currImage 	= $('#st_main').children('img:first');
				
				//let's load the current image 
				//and just then display the navigation menu
				$('<img>').load(function(){
					$loader.hide();
					$currImage.fadeIn(3000);
					//slide out the menu
					setTimeout(function(){
						$list.animate({'left':'0px'},500);
					},
					1000);
				}).attr('src',$currImage.attr('src'));
				
				//calculates the width of the div element 
				//where the thumbs are going to be displayed
				buildThumbs();
				
				function buildThumbs(){
					$list.children('li.album').each(function(){
						var $elem 			= $(this);
						var $thumbs_wrapper = $elem.find('.st_thumbs_wrapper');
						var $thumbs 		= $thumbs_wrapper.children(':first');
						//each thumb has 180px and we add 3 of margin
						var finalW 			= $thumbs.find('img').length * 183;
						$thumbs.css('width',finalW + 'px');
						//make this element scrollable
						makeScrollable($thumbs_wrapper,$thumbs);
					});
				}
				
				//clicking on the menu items (up and down arrow)
				//makes the thumbs div appear, and hides the current 
				//opened menu (if any)
				$list.find('.st_arrow_down').live('click',function(){
					var $this = $(this);
					hideThumbs();
					$this.addClass('st_arrow_up').removeClass('st_arrow_down');
					var $elem = $this.closest('li');
					$elem.addClass('current').animate({'height':'170px'},200);
					var $thumbs_wrapper = $this.parent().next();
					$thumbs_wrapper.show(200);
				});
				$list.find('.st_arrow_up').live('click',function(){
					var $this = $(this);
					$this.addClass('st_arrow_down').removeClass('st_arrow_up');
					hideThumbs();
				});
				
				//clicking on a thumb, replaces the large image
				$list.find('.st_thumbs img').bind('click',function(){
					var $this = $(this);
					$loader.show();
					$('<img class="st_preview"/>').load(function(){
						var $this = $(this);
						var $currImage = $('#st_main').children('img:first');
						$this.insertBefore($currImage);
						$loader.hide();
						$currImage.fadeOut(2000,function(){
							$(this).remove();
						});
					}).attr('src',$this.attr('alt'));
				}).bind('mouseenter',function(){
					$(this).stop().animate({'opacity':'1'});
				}).bind('mouseleave',function(){
					$(this).stop().animate({'opacity':'1'});
				});
				
				//function to hide the current opened menu
				function hideThumbs(){
					$list.find('li.current')
						 .animate({'height':'50px'},400,function(){
							$(this).removeClass('current');
						 })
						 .find('.st_thumbs_wrapper')
						 .hide(200)
						 .andSelf()
						 .find('.st_link span')
						 .addClass('st_arrow_down')
						 .removeClass('st_arrow_up');
				}

				//makes the thumbs div scrollable
				//on mouse move the div scrolls automatically
				function makeScrollable($outer, $inner){
					var extra 			= 800;
					//Get menu width
					var divWidth = $outer.width();
					//Remove scrollbars
					$outer.css({
						overflow: 'hidden'
					});
					//Find last image in container
					var lastElem = $inner.find('img:last');
					$outer.scrollLeft(0);
					//When user move mouse over menu
					$outer.unbind('mousemove').bind('mousemove',function(e){
						var containerWidth = lastElem[0].offsetLeft + lastElem.outerWidth() + 2*extra;
						var left = (e.pageX - $outer.offset().left) * (containerWidth-divWidth) / divWidth - extra;
						$outer.scrollLeft(left);
					});
				}
            });
        </script>
    </body>
</html>