<?php
include "/var/www/html/includes/getdb.php";
include "/var/www/html/includes/utilities.php";
$ID = (int) $_REQUEST['ID'];
    
$qry="SELECT vendor_desc, vendor_logoPath, vendor_demo FROM vendors WHERE vendor_ID = '$ID'";

$info = odbc_exec($conn,$qry);

	odbc_fetch_row($info);

		$vendor_desc = html_entity_decode(stripslashes_mssql(odbc_result($info, 1)));
		$vendor_logoPath = odbc_result($info, 2);
		$vendor_demo = odbc_result($info, 3);
		
		$display = "";
		if (isset($vendor_logoPath) && strlen($vendor_logoPath) > 4) {
		//$display = "---$vendor_logoPath---";
		$display .= "<img src='../images/vendors/logos/" . $vendor_logoPath . "' align='left' width='100px' />";
		}
        $display .="<p>$vendor_desc</p>";
      
        echo $display;
		
    odbc_free_result($info); 