<?php include "includes/utilities.php"; 
	$section="Ink and Coatings Data"; ?>
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
                                    <td>Overview<br>&nbsp;</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li><a href="#tabs-2"><table><tr height="25px"><td></td><td>Megami Inks<br>&nbsp;</td></tr></table></a></li>
                    <li>
                        <a href="#tabs-3">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>OG Coatings<br>and Silicone</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-4">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>OG Inks<br>&nbsp;</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-5">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>OG Pressroom<br>Chemistry</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <!--<li>
                        <a href="#tabs-6">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Printers &amp; Scanners</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-7">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Quality Control</td>
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
                    </li>-->
                </ul>
                <div id="tabs-1">
                    <div id="contenttab">
                        <div  id="textcontain" style=" font-size:12pt; width:750px">
                            <p>
                                Megami and Oldham OG inks, coatings and chemicals match a wide range of print requirements. These data sheets outline each product's fit and capabilties. Sample quantities are available for trial. Contact your sales rep, CSR or use the <a href="contactform.php">contact form</a> to arrange a test.
                            </p>
                            <br/>
                        </div>
                        <?php getMoreInfo($section); ?>
                    </div>
                </div>
                <div id="tabs-2">
    	<div id="contenttab">
   			<div id="vendorlist" >
            

    		</div>
    		<div id="dataSheetcontain" style="font-size:12pt">
            	<span><h3>Download Datasheets</h3><br></span>
    			<table id="datasheetTable">
                	<tr ><td width="40"><img src="vendors/Megami Inks/Megami_EG_Series_TDS_020910.jpg" width="25">
</td><td width="300"><a href="vendors/Megami Inks/Megami_EG_Series_TDS_020910.pdf"> Megami EG Series</a></td><td width="50">PDF</td><td wifth="50">126Kb</td></tr>
                	<tr><td><img src="vendors/Megami Inks/Megami_EGK_Series_TDS_072011.jpg" width="25">
</td><td><a href="vendors/Megami Inks/Megami_EGK_Series_TDS_072011.pdf">Megami EGK Series</a></td><td>PDF</td><td>125Kb</td></tr>
                	<tr><td><img src="vendors/Megami Inks/Megami_PST_PMS_TDS_121311.jpg" width="25">
</td><td><a href="vendors/Megami Inks/Megami_PST_PMS_TDS_121311.pdf">Megami PST PMS Series</a></td><td>PDF</td><td>111Kb</td></tr>
                </table>
			</div>
        		<?php //getMoreInfo("Megami"); ?>
       	</div>
    </div>
                <div id="tabs-3">
                    <div id="contenttab">
                        <div id="infoWndw3" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                        </div>
                        <div id="dataSheetcontain" style="font-size:12pt">
                            <span><h3>Download Datasheets</h3><br></span>

                       		CurecoatUV
    						<table id="datasheetTable">
                				<tr><td width="40"><img src="vendors/OG Coatings and Silicone/CurecoatUV-304-pds.jpg" width="25">
</td><td width="300"><a href="vendors/OG Coatings and Silicone/CurecoatUV-304-pds.pdf">CurecoatUV-304</a></td><td width="50">PDF</td><td width="50">40Kb</td></tr>
                				<tr><td><img src="vendors/OG Coatings and Silicone/CurecoatUV-322-pds.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/CurecoatUV-322-pds.pdf">CurecoatUV-322</a></td><td>PDF</td><td>39Kb</td></tr>
                				<tr><td><img src="vendors/OG Coatings and Silicone/CurecoatUV-323-pds.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/CurecoatUV-323-pds.pdf">CurecoatUV-323</a></td><td>PDF</td><td>68Kb</td></tr>
                				<tr><td><img src="vendors/OG Coatings and Silicone/CurecoatUV_Digital_Gloss-304pds.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/CurecoatUV_Digital_Gloss-304pds.pdf">CurecoatUV Digital Gloss 304</a></td><td>PDF</td><td>68Kb</td></tr>
                			</table>
                        	MastercoatAQ
    						<table id="datasheetTable">
                				<tr><td width="40"><img src="vendors/OG Coatings and Silicone/MastercoatAQ-122-pds.jpg" width="25">
</td><td width="300"><a href="vendors/OG Coatings and Silicone/MastercoatAQ-122-pds.pdf">MastercoatAQ 122</a></td><td width="50">PDF</td><td width="50">40Kb</td></tr>
                				<tr><td><img src="vendors/OG Coatings and Silicone/MastercoatAQ-130-pds.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/MastercoatAQ-130-pds.pdf">MastercoatAQ 130</a></td><td>PDF</td><td>40Kb</td></tr>
                   				<tr><td><img src="vendors/OG Coatings and Silicone/MastercoatAQ-150-pds.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/MastercoatAQ-150-pds.pdf">MastercoatAQ 150</a></td><td>PDF</td><td>39Kb</td></tr>
                				<tr><td><img src="vendors/OG Coatings and Silicone/MastercoatAQ-153-pds.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/MastercoatAQ-153-pds.pdf">MastercoatAQ 153</a></td><td>PDF</td><td>39Kb</td></tr>
                				<tr><td><img src="vendors/OG Coatings and Silicone/MastercoatAQ-163-pds.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/MastercoatAQ-163-pds.pdf">MastercoatAQ 163</a></td><td>PDF</td><td>39Kb</td></tr>
                				<tr><td><img src="vendors/OG Coatings and Silicone/MastercoatAQ-165-pds.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/MastercoatAQ-165-pds.pdf">MastercoatAQ 16</a>5</td><td>PDF</td><td>39Kb</td></tr>
                			</table>
                       		OG
    						<table id="datasheetTable">
                				<tr><td width="40"><img src="vendors/OG Coatings and Silicone/OG-115 30pcSilicone-PDS.jpg" width="25">
</td><td width="300"><a href="vendors/OG Coatings and Silicone/OG-115 30pcSilicone-PDS.pdf">OG 115 30% Silicone</a></td><td width="50">PDF</td><td width="50">40Kb</td></tr>
                				<tr><td><img src="vendors/OG Coatings and Silicone/OG-131 DV-PDS.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/OG-131 DV-PDS.pdf">OG 131 DV</a></td><td>PDF</td><td>42Kb</td></tr>
                				<tr><td><img src="vendors/OG Coatings and Silicone/OG-131 Strike Through System AQ.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/OG-131 Strike Through System AQ.pdf">OG 131 Strike Through System AQ</a></td><td>PDF</td><td>42Kb</td></tr>
                 				<tr><td><img src="vendors/OG Coatings and Silicone/OG-131 Strike Through System UV.jpg" width="25">
</td><td><a href="vendors/OG Coatings and Silicone/OG-131 Strike Through System UV.pdf">OG 131 Strike Through System UV</a></td><td>PDF</td><td>42Kb</td></tr>
               			</table>
                       </div>
                        <?php //getMoreInfo("OG Coatings"); ?>
                    </div>
                </div>
                <div id="tabs-4">
                    <div  id="contenttab">
                        <div id="infoWndw4" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                        </div>
                        <div id="dataSheetcontain" style="font-size:12pt">
                        	<span><h3>Download Datasheets</h3><br></span>
    						<table id="datasheetTable">
                				<tr><td width="40"><img src="vendors/OG Inks/Acclaim_GR_100_Series_TDS_020910.jpg" width="25">
</td><td width="300"><a href="vendors/OG Inks/Acclaim_GR_100_Series_TDS_020910.pdf">Acclaim GR 100 Series</a></td><td width="50">PDF</td><td width="50">123Kb</td></tr>
                				<tr><td><img src="vendors/OG Inks/Extreme_Series_TDS_020910.jpg" width="25">
</td><td><a href="vendors/OG Inks/Extreme_Series_TDS_020910.pdf">Extreme Series</a></td><td>PDF</td><td>119Kb</td></tr>
                				<tr><td><img src="vendors/OG Inks/JetSet_PMS_SFDX_Base_020910.jpg" width="25">
</td><td><a href="vendors/OG Inks/JetSet_PMS_SFDX_Base_020910.pdf">JetSet PMS SFDX Base</a></td><td>PDF</td><td>146Kb</td></tr>
                 				<tr><td><img src="vendors/OG Inks/Latitude_MT_Series_100111.jpg" width="25">
</td><td><a href="vendors/OG Inks/Latitude_MT_Series_100111.pdf">Latitude MT Series</a></td><td>PDF</td><td>110Kb</td></tr>
                 				<tr><td><img src="vendors/OG Inks/MasterCure_HYB_TDS_020910.jpg" width="25">
</td><td><a href="vendors/OG Inks/MasterCure_HYB_TDS_020910.pdf">MasterCure HYB</a></td><td>PDF</td><td>102Kb</td></tr>
                 				<tr><td><img src="vendors/OG Inks/MasterCure_PL_TDS_020910.jpg" width="25">
</td><td><a href="vendors/OG Inks/MasterCure_PL_TDS_020910.pdf">MasterCure P</a>L</td><td>PDF</td><td>114Kb</td></tr>
                 				<tr><td><img src="vendors/OG Inks/MasterCure_PMS_TDS_020910.jpg" width="25">
</td><td><a href="vendors/OG Inks/MasterCure_PMS_TDS_020910.pdf">MasterCure PMS</a></td><td>PDF</td><td>112Kb</td></tr>
                 				<tr><td><img src="vendors/OG Inks/MasterCure_PR_TDS_021010.jpg" width="25">
</td><td><a href="vendors/OG Inks/MasterCure_PR_TDS_021010.pdf">MasterCure PR</a></td><td>PDF</td><td>113Kb</td></tr>
                 				<tr><td><img src="vendors/OG Inks/MasterCure_WEB_TDS_020910.jpg" width="25">
</td><td><a href="vendors/OG Inks/MasterCure_WEB_TDS_020910.pdf">MasterCure WEB</a></td><td>PDF</td><td>113Kb</td></tr>
                 				<tr><td><img src="vendors/OG Inks/Overprint_TDS_080210.jpg" width="25">
</td><td><a href="vendors/OG Inks/Overprint_TDS_080210.pdf">Overprint</a></td><td>PDF</td><td>113Kb</td></tr>
               			</table>
                        </div>
                        <?php //getMoreInfo("OG Inks"); ?>
                    </div>
                </div>
                <div id="tabs-5">
                    <div id="contenttab">
                        <div id="infoWndw5" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                        </div>
                        <div id="dataSheetcontain" style="font-size:12pt">
                        	<span><h3>Download Datasheets</h3><br></span>
    						<table id="datasheetTable">
                				<tr><td width="40"><img src="vendors/OG Pressroom Chemistry/OG-615 Plate Cleaner Desensitizer-PDS.jpg" width="25">
</td><td width="300"><a href="vendors/OG Pressroom Chemistry/OG 615 Plate Cleaner Desensitizer-PDS.pdf">OG 615 Plate Cleaner Desensitizer</a></td><td width="50">PDF</td><td width="50">39Kb</td></tr>
                				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-013 Small Press Fast Dry-PDS.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-013 Small Press Fast Dry-PDS.pdf">OG 013 Small Press Fast Dry</a></td><td>PDF</td><td>41Kb</td></tr>
                				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-120 Wash-PDS.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-120 Wash-PDS.pdf">OG 120 Wash</a></td><td>PDF</td><td>42Kb</td></tr>
                 				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-133 FOGRAApprovalSelectWash-PDS.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-133 FOGRAApprovalSelectWash-PDS.pdf">OG 133 FOGRA Approved Select Wash</a></td><td>PDF</td><td>41Kb</td></tr>
                 				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-166 Premium WM Wash.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-166 Premium WM Wash.pdf">OG 166 Premium WM Wash</a></td><td>PDF</td><td>41Kb</td></tr>
                 				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-210 MRCSelect-PDS.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-210 MRCSelect-PDS.pdf">OG 210 MRC Select</a></td><td>PDF</td><td>42Kb</td></tr>
                 				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-240 FastDryMRC-PDS.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-240 FastDryMRC-PDS.pdf">OG 240 Fast Dry MRC</a></td><td>PDF</td><td>40Kb</td></tr>
                 				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-315 Wash-PDS.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-315 Wash-PDS.pdf">OG 315 Wash</a></td><td>PDF</td><td>42Kb</td></tr>
                 				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-371 Step 1 Color Wash-PDS.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-371 Step 1 Color Wash-PDS.pdf">OG 371 Step 1 Color Wash</a></td><td>PDF</td><td>39Kb</td></tr>
                 				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-330 Step 2 Color Wash-PDS.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-330 Step 2 Color Wash-PDS.pdf">OG 330 Step 2 Color Wash</a></td><td>PDF</td><td>41Kb</td></tr>
                  				<tr><td><img src="vendors/OG Pressroom Chemistry/OG-626 Calcium Remover.jpg" width="25">
</td><td><a href="vendors/OG Pressroom Chemistry/OG-626 Calcium Remover.pdf">OG 626 Calcium Remover</a></td><td>PDF</td><td>89Kb</td></tr>
              			</table>
                        </div>
                        <?php //getMoreInfo("OG Pressroom Chemicals"); ?>
                    </div>
                </div>
                <!--<div id="tabs-6">
                    <div id="contenttab">
                        <div id="infoWndw6" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php //getVendors("Printers &<br/>Scanners","6"); ?>
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
                        <?php //getMoreInfo("Printers &<br/>Scanners"); ?>
                    </div>
                </div>
                <div id="tabs-7">
                    <div id="contenttab">
                        <div id="infoWndw7" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php //getVendors("Quality<br/>Control","7"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                Is the color right? Do you have the correct tint? Oldham and it's partners offer the finest color viewing systems.
                            </p>
                        </div>
                        <?php //getMoreInfo("Quality<br/>Control"); ?>
                    </div>
                </div>
                <div id="tabs-8">
                    <div id="contenttab">
                        <div id="vendorlist" >
                            <ul>
                            </ul>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                Check here for a current list of available used and demo equipment.
                            </p>
                        </div>
                        <?php //getMoreInfo("Used<br/>Equipment"); ?>
                    </div>
                </div>-->
            </div>
        </div>
        <?php include "includes/footer.php" ?>
    </body>
</html>
