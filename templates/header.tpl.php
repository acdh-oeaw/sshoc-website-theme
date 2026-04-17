
 <!-- Main Header / Header Style Four-->
<?php if (drupal_is_front_page()) { ?>
 
    <header class="main-header header-style-four vers2 front">
	
<?php } else {?>

    <header class="main-header header-style-four vers2">
	
<?php } ?>
    
    	<!-- Header Top  Two / Style Two-->
    	<div class="header-top style-two">
	    	<div class="container nopaddingleft">
	    		<div class="row">
					<div class="col-md-8 nopaddingleft">
	                    <!--Top Left-->
	                    <div class="top-left">
	                    	<ul class="links clearfix">
		                    	<?php if (!empty(theme_get_setting('top_header_message'))): ?>
		                    		<li><span><?php print theme_get_setting('top_header_message');?></span></li>
		                    	<?php endif; ?>
		                    	
	                        </ul>
	                    </div>
					</div>
                    
                    <!--Top Right-->
                    <div class="col-md-4">

                    	<?php $block = module_invoke( 'search', 'block_view', 'search'); print render($block); ?>
                   
					</div>
                </div>
	    	</div>
           
        </div>
        <!-- Header Top Two End -->
      
    	<!--Header-Upper-->
    	

	    	
        <div class="header-upper">
        	<div class="auto-container clearfix">
				<div class="row">
					<div class="col-9 col-md-2 col-sm-9">
                    	<div class="logo"><a href="/"><img src="/sites/all/themes/arcadia/logo.png" alt="" title=""></a></div>
                	</div>
                
					<div class="col-3 col-md-8 col-sm-3 pull-right upper-right ">
						<div class="clearfix">
	                        <nav class="main-menu">
	                            <div class="navbar-header">
	                                <!-- Toggle Button -->    	
	                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                                <span class="icon-menu-square"></span>
	                                </button>
	                            </div>
	                            <div class="row">
	                            <div class="collapse navbar-collapse show col-md-12 reduced">

		                            <?php print render($page['globalmenu']); ?>
		                            
																	 
									
									
	                            </div>
								
						
								</div>
								
	                        </nav>
							

	                        
	                        <i id="menumibile" class="fa fa-2x fa-bars" aria-hidden="true"></i>
						</div>

                	</div> 

									<div class="col-md-2">
								<ul class="autentication clearfix">
								<?php global $user; if ($user->uid==0): ?>
	                            <li ><a class="btn-terziario" href="/user" title="Join us">Sign in <i class="fa fa-user"></i></a></li>
								<?php else: ?>
								    <li ><a class="logged" href="/user" title="My Area">My Area</a></li>
									<li class="ml-1"><a class="logged" href="/user/logout" title="Logout"><i class="fa fa-sign-out"></i></a></li>
								<?php endif; ?>
								</ul>
								</div>					
            	</div>
        	</div>
        	
        </div>



        
        <!--End Header Upper-->
    
    </header>
    <!--End Main Header -->

