<?php include "includes/utilities.php"; 
	$section="Industrial Supplies and<br/>Equipment"; ?>
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


        <?php include "includes/header.php";?>
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
                                    <td>Shipping Supplies</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-3">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Facilities Maintenance</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-4">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Janitorial Supplies</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-5">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Warehouse Supplies</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-6">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Safety</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-7">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Material Handling</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                </ul>
                <div id="tabs-1">
                    <div id="contenttab">
                        <div  id="textcontain" style="font-size:12pt; width:750px">
                            <p>
                                The Oldham Group offers a wide range of general industrial supplies and equipment. Staring with a broad line of shipping supplies including specialty and customized solutions, quality janitorial products on through material handling and large automated systems, Oldham has a solution for you.
                            </p>
                            <br/>
                            <p>
                                Our negotiated stocking programs can help you coordinate and consolidate critcal supplies while saving money compared to open ordering or general online options. A single purchase order can cover all of your facility supplies as well as maintain a reliable inventory for easy, fast access.
                            </p>
                        </div>
                        <?php getMoreInfo($section); ?>
                    </div>
                </div>
                <div id="tabs-2">
                    <div id="contenttab">
                        <div id="infoWndw2" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Shipping Supplies","2"); ?>
                            
                                
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>Besides a complete line of standard items, Oldham offers a number of custom and environmentally sensitve products. Options iclude custom printed tapes and labels, custom sized bubble wrap and waste minimizing air cushion and biodegradable packaging materials. And we supply al the equipment you need, from hand tape dispensers to automated sorting and wrapping machines.<br>
                           <table>
                                <tr><td>
                                <ul>
                                <li>Air cushion fill</li> 
                                <li>Edge Protectors</li>
                                <li>Foam-in-place systems</li>
                                <li>Poly and Plastic Bags</li>
                                <li>Strapping</li>
                                <li>Tapes</li>
								</ul>
                                </td><td width="20px">&nbsp;</td><td style="vertical-align:top">
                                <ul>
                                <li>Bubble Wrap</li>
                                <li>Envelopes & Mailers</li>
                                <li>Labels</li>
                                <li>Shrink Wrap</li>
                                <li>Stretch Wrap</li>
                                </ul>
                                </td></tr>
                                </table>  
                        </div>
                        <?php getMoreInfo("Shipping Supplies"); ?>
                    </div>
                </div>
                <div id="tabs-3">
                    <div id="contenttab">
                        <div id="infoWndw3" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Facilities Maintenance","3"); ?>
                            
                               
                            
                        </div>
                        <div id="textcontain" style="font-size:12pt">
			Every business has a long list of minor but important items needed to keep the doors open. Consolidate your orders through Oldham to get the best cost control on all your supplies.<br>
            					 <table>
                                <tr><td>
                                <ul>
                                <li>Batteries</li>
                                <li>Emergency Lights</li>
                                <li>Food Service Products</li>
                                <li>Ladders</li>
                                <li>Mats</li>
                                <li>Smoker Receptacles</li>
                                <li>Trash Cans, Liners and tilt trucks</li>
								</ul>
                                </td></tr>
                                </table>
                        </div>
                        <?php getMoreInfo("Facilities Maintenance"); ?>
                    </div>
                </div>
                <div id="tabs-4">
                    <div  id="contenttab">
                        <div id="infoWndw4" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Janitorial Supplies","4"); ?>
                                
                        </div>
                        <div id="textcontain" style="font-size:12pt">
				It's amazing how quickly the costs can add up for basic sanitation supplies. Combining these items with your other supply orders to Oldham, you can lower your costs and improve your cost management.<br>
                        <table>
                                <tr><td>
                                <ul>
                                <li>Bathroom Supplies</li>
								<li>Brooms</li>
                                <li>Can Liners</li>
                                <li>Cleaning Supplies</li>
                                <li>Mop,Squeegees & Carts</li>
                                <li>Paper Towels & Dispensers</li>
								<li>Sweeping Compound</li>
                                <li>Toilet Paper & Dispensers</li>
								<li>Vacuums & Floor Cleaners</li>
                                <li>Wipes</li>
								</ul>
                                </td></tr>
                                </table>
                         </div>
                        <?php getMoreInfo("Janitorial Supplies"); ?>
                    </div>
                </div>
                <div id="tabs-5">
                    <div id="contenttab">
                        <div id="infoWndw5" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Warehouse Supplies","5"); ?>
                               
                        </div>
                        <div id="textcontain" style="font-size:12pt">
				Every warehouse is different. We have a huge selection of products to help maintain your process organization. Plus more opportunities for cost containment, and we can help find the best options for your operations.  <br>
                				<table>
                                <tr><td>
                                <ul>
                                <li>Dock and Trailer Equipment</li>
                                <li>Fans</li>
                                <li>Job Tickets</li>
                                <li>Knives</li>
                                <li>Markers</li>
                                <li>Scales</li>
                                <li>Staplers & Staples</li>
                                <li>Warehouse Labels</li>
								</ul>
                                </td></tr>
                                </table>
                        </div>
                        <?php getMoreInfo("Warehouse Supplies"); ?>
                    </div>
                </div>
                <div id="tabs-6">
                    <div id="contenttab">
                        <div id="infoWndw6" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Safety","6"); ?>
                                
                        </div>
                        <div id="textcontain" style="font-size:12pt">
			Everything you might need is available. Ordering in bulk from a single vendor can reduce your paperwork burden along with improving cost control.<br>
            					<table>
                                <tr><td>
                                <ul>
                                <li>Back Support Belts</li>
                                <li>Disposable Gloves</li>
                                <li>Dust Mask</li>
                                <li>Eye Wash Stations & Supplies</li>
                                <li>First Aid Kits</li>
                                <li>Gloves</li>
                                <li>Hard Hats</li>
                                <li>Hazards Liquid Storage Containers & Cabinets</li>
                                <li>Hearing Protection</li>
                                <li>Protective Clothing</li>
                                <li>Safety Glasses</li>
								</ul>
                                </td></tr>
                                </table>
                        </div>
                        <?php getMoreInfo("Safety"); ?>
                    </div>
                </div>
                <div id="tabs-7">
                    <div id="contenttab">
                        <div id="infoWndw7" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Material Handling","7"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                        Trust Oldham Group to provide the answers to your material handling needs with products designed to improve worker productivity and safety through the practical application of ergonomics. A broad range of equipment can provide mechanical assistance to  most applications requiring lifting, positioning, tilting, or turning. <br>                               					
                        		<table>
                                <tr><td>
                                <ul>
                                <li>Pallet Trucks</li>
                                <li>Platform Trucks</li>
                                <li>Hand Trucks</li>
                                <li>Carts</li>
								</ul>
                                </td></tr>
                                </table>
 
                        </div>
                        <?php getMoreInfo("Material Handling"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php" ?>
    </body>
</html>
