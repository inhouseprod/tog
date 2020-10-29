<?php

function addslashes_mssql($str){
    if (is_array($str)) {
        foreach($str AS $id => $value) {
            $str[$id] = addslashes_mssql($value);
        }
    } else {
        $str = str_replace("'", "''", $str);   
    }
   
    return $str;
}

function stripslashes_mssql($str){
    if (is_array($str)) {
        foreach($str AS $id => $value) {
            $str[$id] = stripslashes_mssql($value);
        }
    } else {
        $str = str_replace("''", "'", $str);   
    }

    return $str;
}


function getVendors($tab,$wndw) {
	// $tab = name of tab
include "includes/getdb.php";

	$markup = "<h4>Company links</h4>";
	$markup .= "<ul>";
	$qry="select vendor_name,vendor_URL, vendor_ID, vendor_demo, vendor_desc from vendors, vendor_tab, tab where vendor_active=1 and (vendor_ID = vt_vendor_ID and tab_ID = vt_tab_ID) and tab_name='".$tab."' order by vendor_name";
	
	$rows = odbc_exec($conn,$qry);
	
	while(odbc_fetch_row($rows)) {

		$name = odbc_result($rows, 1);
		$U = odbc_result($rows, 2);
		if (strlen($U) > 1) {
			$URL = "href=http://" . $U . " target=_new";
		} else {
			$URL = "";
		}
		$vendor_ID = odbc_result($rows,3);
		$vendor_demo = odbc_result($rows, 4);
		$vendor_desc = odbc_result($rows,5);   ##new
		
		
		$markup .= "<li><a $URL  onmouseover='showContent(infoWndw$wndw,$vendor_ID); return true;'onmouseout='HideContent(infoWndw$wndw); return true;'>$name&nbsp;&nbsp;&nbsp;";
		$markup .= "<div id='" . $vendor_ID . "info' style='display:none'>$vendor_desc</div>";  #new
		if (strlen($U) > 1) {
			$markup .="<img class='ven_icon' src='../images/icon-link.png' title='Company web site' alt='WebSite' />";
		}
		$markup .= "</a>";	
		
		if (strlen($vendor_demo) > 4 && strlen($URL) > 4) {
			$markup .= "&nbsp;&nbsp;&nbsp;<a style='color:#284591;' href=http://$vendor_demo target=_new ><img class='ven_icon' title='Demo' src='../images/icon-gear.png' alt='Demo' />
</a></li>";
		}

	}
	
	$markup .= "</ul>";
	
	echo $markup;
	
	odbc_close($conn);
	
}

function getVendorItem($vendorID) {
$nID = (int) $vendorID;

include "getdb.php";

	$qry="select vendor_logoPath, vendor_desc from vendors where vendor_ID = '". $nID . "'";

	$rows = odbc_exec($conn,$qry);
	
	while(odbc_fetch_row($rows)) {

		$logo = odbc_result($rows, 1);
		$text = html_entity_decode(stripslashes_mssql(odbc_result($rows, 2)));

		$markup = "<img src='/images/vendors/logos".$logo." />" . $text ;

	}
	echo $markup;
	
	
}

function getNewsHead($active, $public, $archive) {
	// $active = 0 (not active) | 1 (active)
	// $public = Public|Private
	// $archive = Yes|No
include "includes/getdb.php";

	$markup = "<ul>";
	
	$qry="select news_headline, news_ID from news where news_access = '". $public ."' and news_active =  '". $active . "'";

	if ($archive=="No") {
		$qry .= "and news_publishdate < GETDATE() and news_archivedate > GETDATE()";
	} else {
		$qry .= "and news_publishdate < GETDATE() and news_archivedate < GETDATE()";
	}
	
	$qry .= "order by news_publishdate, news_ID";

	$rows = odbc_exec($conn,$qry);
	
	$count = 1;
	while(odbc_fetch_row($rows)) {

		$headline = html_entity_decode(stripslashes_mssql(odbc_result($rows, 1)));
		$newsID = odbc_result($rows, 2);
		
		$markup .= "<li><a id='$newsID' href=about.php?nID=$newsID#tabs-3 >$headline</a></li>";
		
	}
	
	echo $markup;
	
	odbc_close($conn);
}

function getNews($active, $public, $archive) {
	// $active = 0 (not active) | 1 (active)
	// $public = Public|Private
	// $archive = Yes|No
include "includes/getdb.php";

	$markup = "<ul>";
	
	$qry="select news_headline, news_ID from news where news_access = '". $public ."' and news_active =  '". $active . "'";

	if ($archive=="No") {
		$qry .= "and news_publishdate < GETDATE() and news_archivedate > GETDATE()";
	} else {
		$qry .= "and news_publishdate < GETDATE() and news_archivedate < GETDATE()";
	}
	
	$qry .= "order by news_publishdate, news_ID";

	$rows = odbc_exec($conn,$qry);
	
	$count = 1;
	while(odbc_fetch_row($rows)) {

		$headline = html_entity_decode(stripslashes_mssql(odbc_result($rows, 1)));
		$newsID = odbc_result($rows, 2);
		$newsItem = "";
		
		if ( isset($_GET['nID'])) {
			$id = (int) $_GET['nID'];
			$newsItem = "<script>$('#infonewscontain').load('newsfeed.php', {ID: '$id' })</script>";
		} else if ($count === 1) {
			$newsItem = "<script>$('#infonewscontain').load('newsfeed.php', {ID: '$id' })</script>";
		}
		$markup .= "<li><a id='$newsID' href=# onClick=\"$('#infonewscontain').load('newsfeed.php', {ID: '$newsID'});\">$headline</a></li>";
		$count++;
	}
	
    $markup .= "</div><div id='infonewscontain'></div>";
	$markup .= $newsItem;
			
	echo $markup;
	
	odbc_close($conn);
}


function getNewsItem($newsID) {
$nID = (int) $newsID;

include "includes/getdb.php";

	$qry="select news_headline, news_text from news where news_active = '1' and news_ID = '". $nID . "'";

	$rows = odbc_exec($conn,$qry);
	
	while(odbc_fetch_row($rows)) {

		$headline = html_entity_decode(stripslashes_mssql(odbc_result($rows, 1)));
		$text = html_entity_decode(stripslashes_mssql(odbc_result($rows, 2)));

		$markup = "<h2>".$headline."</h2><p>" . $text . "</p>";

	}
	echo $markup;
	
	
}

function getEvents($active) {
	// $active = 0 (not active) | 1 (active)
	// $public = Public|Private
	// $archive = Yes|No
include "includes/getdb.php";

	$markup = "<ul>";
	
	$qry="select event_name, CONVERT(VARCHAR(12),event_start_date, 107) AS startdate, CONVERT(VARCHAR(12),event_end_date, 107) AS enddate, event_location, event_notes, event_ID from events where event_active =  '". $active . "' and event_end_date > getdate() ";

	$rows = odbc_exec($conn,$qry);
	
	$count = 1;
	
	while(odbc_fetch_row($rows)) {

		$event_name = html_entity_decode(stripslashes_mssql(odbc_result($rows, 1)));
		$start_date = odbc_result($rows, 2);
		$end_date = odbc_result($rows,3);
		$event_location = html_entity_decode(stripslashes_mssql(odbc_result($rows, 4)));
		$event_notes = html_entity_decode(stripslashes_mssql(odbc_result($rows, 5)));
		$eventID = odbc_result($rows,6);

		$markup .= "<li><a onClick=\"$('#eventcontain').load('eventsfeed.php', {ID: $eventID });\">$event_name</a><br/>";
		$markup .= "$start_date to $end_date<br />";
		$markup .= "$event_location<br />";
		$markup .= "$event_notes</li>";
		
		if ($count === 1) {
			$eventItem = "<script>$('#eventcontain').load('eventsfeed.php', {ID: $eventID })</script>";
		
		
		}
		$count++;
	}
	$markup .= "</ul>";
	$markup .= "</div><div id='eventcontain'></div>";
	$markup .= $eventItem;

	echo $markup;
	
	odbc_close($conn);
}


function getEventsItem($eventID) {
	// $active = 0 (not active) | 1 (active)
	// $public = Public|Private
	// $archive = Yes|No
	include "includes/getdb.php";
	$eID = (int) $eventID;

	$qry="select event_logo, event_text, event_url from events where event_ID = '". $eID . "'";

	$rows = odbc_exec($conn,$qry);
	
	while(odbc_fetch_row($rows)) {

		$event_logo = odbc_result($rows, 1);
		$event_text = html_entity_decode(stripslashes_mssql(odbc_result($rows, 2)));
		$event_url = odbc_result($rows, 3);

		$markup = "<a href='http://$event_url' target='_blank'><img src='images/events/$event_logo'></a><br /><br />
                        $event_text";
	
	}
	echo $markup;
	
//	odbc_close($conn);
}

function getFeatured() {
	// $active = 0 (not active) | 1 (active)
	// $public = Public|Private
	// $archive = Yes|No
include "includes/getdb.php";


	
	$qry="select featured_lede, featured_copy, featured_email, vendor_name, vendor_url, featured_image, featured_alttag
	from featured LEFT OUTER JOIN vendors on vendor_ID=featured_vendor_ID where featured_start_date < GETDATE() and featured_end_date >
	GETDATE() and featured_active='1' ";


	$rows = odbc_exec($conn,$qry);
	
	while(odbc_fetch_row($rows)) {

		$featured_lede = html_entity_decode(stripslashes_mssql(odbc_result($rows, 1)));
		$featured_copy = html_entity_decode(stripslashes_mssql(odbc_result($rows,2)));
		$featured_email = odbc_result($rows,3);
		$vendor = odbc_result($rows,4);
		$url = odbc_result($rows,5);
		$featured_image = odbc_result($rows,6);
		$featured_imagealt = odbc_result($rows,7);
		
		if (empty($url)) {
			if ( strlen($featured_image) > 3) {
			$markup = "<img src=images/featured/". $featured_image ." style='width:260px; margin:5px' />";
			} else {
				$markup = "";
			}
		} else {
			$markup = "<a href=http://" . $url . ">";
			$markup .= "<img src=images/featured/". $featured_image ." style='width:260px; margin:5px' alt=". $featured_imagealt. "/></a>";
		}
		$markup .= "<h4 style='color:#334499'>".$featured_lede. "</h4>";
		$markup .= "<p>" . $featured_copy . " <a href='mailto://" . $featured_email . "'>" . $featured_email . "</a></p>";

	}
	echo $markup;
	
	odbc_close($conn);
}

function getSections() {
	include "includes/getdb.php";
	$qry="select section_name, section_page from section order by section_order";
		
	$rows = odbc_exec($conn,$qry);
	
	$markup = "";
	
	while(odbc_fetch_row($rows)) {

		$section = odbc_result($rows, 1);
		$sectionPage = odbc_result($rows, 2);

		$markup .= "<div id='navitem' class='navdiv'>";		
        $markup .= "<a class='topnav' href=" . $sectionPage .">";
        $markup .= $section;
        $markup .= "</a>";
		$markup .= "</div>";
	}
	
	echo $markup;
	
	odbc_close($conn);	
	
}

function getMoreInfo($tab) {
	include "includes/getdb.php";
	
	
	$qry="select tab_ID from tab where tab_name = '$tab'";

	$tabs = odbc_exec($conn,$qry);
	
	odbc_fetch_row($tabs);
	
	$ID = odbc_result($tabs,1);

	echo "<div id='moreinfo'>";
    echo "<a id=getstartedlink href=contactform.php?tab=$ID style=color:#FFFFFF>";
    echo "REQUEST INFORMATION";
    echo "</a></div>";
}

function getTabName($tabID) {
include "includes/getdb.php";
	
	$tb_ID = (int) $tabID;
	
	$qry="select tab_name from tab where tab_ID ='".$tb_ID ."'";

	$rows = odbc_exec($conn,$qry);	

	while(odbc_fetch_row($rows)) {

		$tabname = odbc_result($rows, 1);
	}
	
	return $tabname;
}
	
function getTabs($section_ID) {
		// $active = 0 (not active) | 1 (active)
	// $public = Public|Private
	// $archive = Yes|No
include "includes/getdb.php";

	$markup = "<div id='pagecontent'><div id='tabs'><ul>";
	
	$qry="select tab_ID, tab_name, tab_text from tab,section_tab where st_section_ID ='".$section_ID ."' and tab_ID = st_tab_ID and tab_active = 'yes' order by tab_order";

	$rows = odbc_exec($conn,$qry);
	
	$num = 1;
	$tab_name = array();
	$tab_text = array();
	
	while(odbc_fetch_row($rows)) {

		$tab_ID[$num] = odbc_result($rows, 1);
		$tab_name[$num] = odbc_result($rows, 2);
		$tab_text[$num] = odbc_result($rows, 3);


		$num ++;
	}
	
	for ( $i = 1; $i < $num; $i++ ) {
		$markup .= "<li><a href=#tabs-" . $i . "><table><tr height=25px><td>&nbsp;</td><td>" . $tab_name[$i] . "</td></tr></table></a></li>";
	}
	
	unset($i);
	$markup .=	"</ul>";
	
	for ($i=1; $i< $num; $i++) {	
		$markup .= "<div id=tabs-" . $i . "><div id=contenttab><div  id=textcontain style=font-size:12pt; width:750px>";
		$markup .= $tab_text[$i];
		$markup .= "</div>";
        $markup .= "<div id='moreinfo'>";
        $markup .= "<a id=getstartedlink href=gettingstarted.php?section=" . $tab_ID[$i] . " style=color:#FFFFFF>";
        $markup .= "MORE INFORMATION";
        $markup .= "</a></div>";
		$markup .= "</div></div>";
	}
	
	unset($i);

	echo $markup;
	
	odbc_close($conn);
	unset($num);

	unset($markup);
	unset($rows);
	unset($qry);
}

function getTabSelect($tab) {
		// $tab = tab number

include "includes/getdb.php";
	
	
	$qry="select tab_ID, tab_name from tab where tab_active = '1' and tab_forProduct = '1' and tab_name not like '%,%' order by tab_name";

	$rows = odbc_exec($conn,$qry);
	$markup = "";
	
	while(odbc_fetch_row($rows)) {

		$tab_ID = odbc_result($rows, 1);
		$tab_name = odbc_result($rows, 2);
		
		$ptn = "/<br.>/";
		$rpltxt = " ";
		$str = preg_replace($ptn, $rpltxt, $tab_name);

		if ($tab_ID == $tab) {
			$markup .= "</option><option value=$tab_ID selected=selected>" . $str;
		} else {
			$markup .= "</option><option value=$tab_ID >" . $str;
		}
		
	}
	
	echo $markup;
	
	odbc_close($conn);

	unset($markup);
	unset($rows);
	unset($qry);
}

function getSection($section_ID) {
	include "includes/getdb.php";
	$qry="select section_name from section where section_ID ='" . $section_ID . "'";
		
	$rows = odbc_exec($conn,$qry);
	
	while(odbc_fetch_row($rows)) {

		$section = odbc_result($rows, 1);
	}
	
	return $section;
}

function getSectionID($num) {
	include "includes/getdb.php";
	$qry="select section_ID from section";
		
	$rows = odbc_exec($conn,$qry);
	
	$i =1;
	
	while(odbc_fetch_row($rows)) {
		$row[$i] = odbc_result($rows, 1);
		
		$i++;
		
	}
	
	if (in_array($num, $row)) {
		return $num;
	} else {
		return "0";
	}
}

function getUsed() {
	
	include "/var/www/html/includes/getdb.php";
	$count="even";
	$markup = "<table id='usedData'><tr id='tableHeader'><td width='120px'>Name</td><td width='100px'>Category</td><td width='100px'>Type</td><td width='300px'>Description</td><td width='100px'>Contact Name</td><td width='120px'>Contact Email</td></tr>";
	
	$qry="select item_Name, item_Category, item_Type, item_Desc, item_Contact_Name, item_Contact_Email from used where item_Active='1' order by item_Category, item_Type";
	
	$rows = odbc_exec($conn,$qry);
	
	while(odbc_fetch_row($rows)) {

		$item_name = odbc_result($rows, 1);
		$item_category = html_entity_decode(stripslashes_mssql(odbc_result($rows, 2)));
		$item_type = html_entity_decode(stripslashes_mssql(odbc_result($rows, 3)));
		$item_desc = odbc_result($rows, 4);
		$item_contact_name = odbc_result($rows, 5);
		$item_contact_email = odbc_result($rows, 6);
		
		if($count == "odd"){
			$count = "even";
		} else {
			$count = "odd";
		}
/*		if (is_file("../images/vendors/logos/".$vendor_logoPath)) {
			$vendor_logo = "<img width='100px' src=../images/vendors/logos/".$vendor_logoPath .  " />";
		} else {
			$vendor_logo = "No Logo";
		}
*/			
		$markup .= "<tr id='" . $count . "'><td valign='top' >$item_name</td><td valign='top'>$item_category</td><td valign='top'>$item_type</td><td valign='top'>$item_desc</td><td valign='top'>$item_contact_name</td><td  valign='top'><a href='mailto://$item_contact_email'>$item_contact_email</a></td></tr>";
	}
	
	$markup .= "</table>";
	
	echo $markup;
	
	odbc_close($conn);
}

function getULS() {
	
                            	
								
                            	
								$curl_handle=curl_init();
								curl_setopt($curl_handle,CURLOPT_URL,'http://www.ulsinc.com/cp/channel-partner-tools/icon-code/content/oldham-group-st-louis/il/st-louis/sm');
								curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,5);
								curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
								$buffer = curl_exec($curl_handle);
								curl_close($curl_handle);
								if (empty($buffer))
								{
									echo "<img alt=\"Authorized Channel Partner Icon\" border=\"0\" src=\"http://portal.ulsinc.com/Portal/images/sm-image.jpg\" />";
								} else {
									echo $buffer;
								}
								
							
}
?>
