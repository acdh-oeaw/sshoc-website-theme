<div class="page-wrapper">
 	

<!--
    <header class="main-header header-style-one">
        <div class="header-upper">
	        <div class="auto-container">
        	<div class="row">
                	
                <div class="col-md-2 logo-outer">
                    <div class="logo"><a href="/"><img src="/sites/all/themes/arcadia/logo.png" alt="" title=""></a></div>
                </div>
                
                <div class="col-md-10">
                    
                    <div class="nav-outer">
                        <nav class="main-menu">
                            <div class="navbar-header"> 	
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-menu-square"></span>
                                </button>
                            </div>
                            
	                        <div class="collapse navbar-collapse show pull-right">
	                          <?php print render($page['globalmenu']); ?>  
                            </div>
                        </nav>
            		</div>
                    
                </div>
            </div>       
            </div>
        </div>     
    </header>
-->
      
   

	<?php include('header.tpl.php'); ?>
        
	<!--Slider Section-->
	<section class="main-slider">
	<?php print render($page['slider']); ?>
	</section>
	<!--End Slider Section-->
    
   
	

    <!--Page Title-->
    <section class="page-title">
    	<div class="auto-container">
	    	<?php if ($title): ?>
        	<h1><?php print $title; ?></h1>
        	<?php endif; ?>
        	<?php print render($page['breadcrumb']); ?>
        </div>
    </section>
    <!--End Page Title-->
    
    <!--About Section-->
    <section class="about-section-two">
    	<div class="auto-container">
	    	

			<div class="row">
				<?php if (!empty($page['sidebar_second'])): ?>
					<div class="main-content col-md-8">
				<?php else: ?>
					<div class="main-content col-md-12">
				<?php endif; ?>
					
					<a id="main-content"></a>
					<?php if ($messages): ?>
					<div id="messages"><div class="section clearfix">
					  <?php print $messages; ?>
					</div></div> <!-- /.section, /#messages -->
					<?php endif; ?>

					<?php if ($tabs): ?>
						<div class="tabs">
						  <?php print render($tabs); ?>
						</div>
					<?php endif; ?>
					
					<?php print render($page['content']); ?>
				</div>
				<?php if (!empty($page['sidebar_second'])): ?>
				<div class="col-md-4 sidebar">
					<?php print render($page['sidebar_second']); ?>
				</div>
				<?php endif; ?>
			</div>


	    	
        </div>
    </section>
    <!--End About Section-->
    
    
        
	<?php include('footer.tpl.php'); ?>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

