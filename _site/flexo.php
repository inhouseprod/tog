<?php include "includes/utilities.php"; 
	$section="Flexo Supplies and Equipment"; ?>
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
                                    <td></td>
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
                                    <td>Ink
                                        &amp; 
                                        Coatings</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-3">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Miscellaneous</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-4">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Pressroom</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-5">
                            <table>
                                <tr height="25px">
                                    <td></td>
                                    <td>Plates &amp; Film</td>
                                </tr>
                            </table>
                        </a>
                    </li>
                </ul>
                <div id="tabs-1">
                    <div id="contenttab">
                        <div  id="textcontain" style="font-size:12pt; width:750px">
                            <p>
                                Since 1951, The Oldham Group has been supplying our customers with quality consumables for the pre-press, press, and post-press areas. We offer an extensive line of products to fit your needs. Now we've expanded to include a full line of flexo supplies featuring the Kodak Flexcel line of products. Whether it's film, plates, chemicals, ink or any other items you are looking for, our experienced staff is here to help you.
                            </p>
                        </div>
                        <?php getMoreInfo(""); ?>
                    </div>
                </div>
                <div id="tabs-2">
                    <div  id="contenttab">
                        <div id="infoWndw2" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Flexo Ink & Coatings","2"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                Process inks, special color match inks, UV curing inks, low migration, inks for special stocks, varnishes and coatings...what ever kind of ink you need for the job...Oldham and our partners can supply what you need. If you are not sure what ink will work best for you, call us. Our staff will listen and recommend the right product for the purpose. Have something truly unusual? We have vendors who will help you develop a product to fit your process.
                            </p>
                        </div>
                        <?php getMoreInfo("Flexo Ink & Coatings"); ?>
                    </div>
                </div>
                <div id="tabs-3">
                    <div id="contenttab">
                        <div id="infoWndw3" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Flexo Miscellaneous","3"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
				Still using film? We've got you covered with stripping and cleaning products. And of course, loupes, rulers and plate storage never go out of style.
                            </p>
                        </div>
                        <?php getMoreInfo("Flexo Miscellaneous"); ?>
                    </div>
                </div>
                <div id="tabs-4">
                    <div id="contenttab">
                        <div id="infoWndw4" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Flexo Pressroom","4"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
				We've got your pressroom covered. From chemicals to tools to parts, we can help you keep the cylinders turning. We have a wide variety of tapes and chemicals, including our own high quality product line, that will help you choose the best price/value option.
                            </p>
                        </div>
                        <?php getMoreInfo("Flexo Pressroom"); ?>
                    </div>
                </div>
                <div id="tabs-5">
                    <div id="contenttab">
                        <div id="infoWndw5" class="infoWndw" style="display:none;"></div>
                        <div id="vendorlist" >
                            <?php getVendors("Flexo Workflows & Plates","5"); ?>
                        </div>
                        <div id="textcontain" style="font-size:12pt">
                            <p>
                                The Oldham Group is proud to support the award winning Kodak Flexcell System including, NX, SRX and Direct options.  We supply all the equipment, plates and supplies you need to enable you to push the boundaries of flexo printing. And we still have film if that's what you need.
                            </p>
                        </div>
                        <?php getMoreInfo("Flexo Workflows & Plates"); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include "includes/footer.php" ?>
    </body>
</html>
