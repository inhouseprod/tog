<?php include "includes/utilities.php"; 
	$section="Graphic Arts Equipment"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>The Oldham Group -<?php echo $section; ?></title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link type="text/css" href="css/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.15.custom.min.js"></script>
        <script type="text/javascript" src="js/oldham.js"></script>

    <script>		
	$(document).ready(function() {
		$( "#tabs" ).tabs();
	});
	</script>
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60130712-1', 'auto');
  ga('send', 'pageview');

</script>
    </head>
    <body>


        <?php include "includes/header.php"; ?>
        <div id="pagecontent">
            <div id="tabs">
                <ul>
                    <li>
                        <a href="#tabs-1">
                            <table>
                                <tr height="25px">
                                    <td>&nbsp;</td>
                                    <td>Overview</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-2">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Prepress</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-3">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Printers &amp; Scanners</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-4">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Quality Control</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-5">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Press</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-6">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Postpress
                                        &amp; 
                                        Bindery</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-7">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Digital</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-8">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Used Equipment</td>
                                </tr>
                            </table>
                        </a>
                    </li>

                </ul>
                <div id="tabs-1">
                    <div id="contenttab">
                        <div  id="textcontain" style=" font-size:12pt; width:750px">
                            <p>
                                Oldham Group and our partners feature the most advanced equipment to transition from concept to production.
                            </p>
                            <br/>
                        </div>
                        <?php getMoreInfo($section); ?>
                    </div>
                </div>
                <div id="tabs-2">
                    <div id="contenttab">
                        <div id="infoWndw2" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Prepress","2"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                Full chemistry or processless clean and finish machines
                            </p>
                            <p>
                                Plate bending, plate stacking, plate storage. Oldham can answer your questions and recommend solutions.
                            </p>
                        </div>
                        <?php getMoreInfo("Prepress"); ?>
                    </div>
                </div>
                <div id="tabs-3">
                    <div id="contenttab">
                        <div id="infoWndw3" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Printers & Scanners","3"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                Small....large....extra large and everything in between. Black
                                & 
                                white....color....on all kinds of different stock....The Oldham Group has a printer for your needs.
                            </p>
                            <br />
                            <p>
                                Small to large format scanning with the resolution needed for todays high-quality printing jobs.
                            </p>
                        </div>
                        <?php getMoreInfo("Printers & Scanners"); ?>
                    </div>
                </div>
                <div id="tabs-4">
                    <div id="contenttab">
                        <div id="infoWndw4" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Quality Control","4"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                Is the color right? Do you have the correct tint? Oldham and it's partners offer the finest color viewing systems.
                            </p>
                        </div>
                        <?php getMoreInfo("Quality Control"); ?>
                    </div>
                </div>
                <div id="tabs-5">
                    <div id="contenttab">
                        <div id="infoWndw5" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Press","5"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                Press equipment is a most important purchase. The staff at The Oldham Group knows this and can advise you on that purchase. The line of presses we supply represent the finest in the industry. Big or small there is a press here for your printing requirements.
                            </p>
                        </div>
                        <?php getMoreInfo("Press"); ?>
                    </div>
                </div>
                <div id="tabs-6">
                    <div id="contenttab">
                        <div id="infoWndw6" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Postpress & Bindery","6"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                Jog it...cut it...fold it...bind it...and wrap it for delivery. The equipment choices are numerous. Chances are we have the equipment you need listed, if not, contact us and we will work with you to find the right equipment for the job.
                            </p>
                            <div>
                            <br>
                            <h4>New Product Line</h4>
                            <a title="Authorized Channel Partner Icon" href="http://www.ulsinc.com/cp/en/oldham-group/il/springfield" target="_blank"><img alt="Universal Laser Systems Authorized Channel Partner" border="0" src="http://www.ulsinc.com/channel-partners/images/icon/sm-image-en.jpg" /></a>
                            </div>
                        </div>
                        
                        <?php getMoreInfo("Postpress & Bindery"); ?>
                    </div>
                </div>
                <div id="tabs-7">
                    <div  id="contenttab">
                        <div id="infoWndw7" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Digital","7"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                The advancements in the world of Digital Printing change quickly, The Oldham Group will keep you up-to-date on the progress made in the Digital Printing Industry.
                            </p>
                        </div>
                        <?php getMoreInfo("Digital"); ?>
                    </div>
                </div>

                <div id="tabs-8">
                    <div id="contenttab">
                        
                        <div id="usedcontain" style="font-size:12pt">
                            <p>
                                <?php getUsed(); ?>
                            </p>
                        </div>
                        <?php getMoreInfo("Used Equipment"); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include "includes/footer.php" ?>
    </body>
</html>
