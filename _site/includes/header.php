        <div id="contain">
           
                <div >
                <a href="index.html">	<img src="../images/TOG1.png" width="790" height="60" /></a>
				</div>
                <div id="navheader">
                    <div style="float:left; width:11px; vertical-align:top" >
                        <img style="height:271px; width:11px; border:0px; overflow:hidden" src="images/h_leftofnav.gif" alt="image" />
                    </div>
                    <div id="navpanel" style="height:271px">
                        <!--- nav --->
                        <!--<img style="height:30px; width:239px; border:0px" src="images/h_overnav.gif" alt="" />-->
                        <div style="height:24px"></div>
                        <?php getSections(); ?>
                        
                        <!--- /nav --->
                    </div>
                    <?php 
						$imagenum = rand(1,3);
						
						if ($imagenum === 1) {
                    			echo "<div id=contentimage style=background-image:url(images/rotators/dart.PNG);>";
						} elseif ($imagenum === 2 ) {
								echo "<div id=contentimage style=background-image:url(images/rotators/present.PNG);>";
						} elseif ($imagenum === 3 ) {
								echo "<div id=contentimage style=background-image:url(images/rotators/runner.PNG);>";
						}
						unset($imagenum);
						?>
                <!--<div id="logoHeader">
                    <a href="http://www.oldhamgroup.com"><img style="z-index:1000;width:240px" src="images/toglogo15.png" alt="The Oldham Group" /></a>
                </div>-->
                    	<div id="contenttitle">
                        <?php if (empty($section_ID)) { echo $section; } else { $sect=getSection($section_ID);     echo $sect;} ?>
                        </div>
                    </div>
                    
                </div>
                
    </div>
