<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,'http://www.ulsinc.com/cp/channel-partner-tools/icon-code/content/oldham-group-st-louis/il/st-louis/sm');
curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,5);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
if (empty($buffer))
{
print "<img alt=\"Authorized Channel Partner Icon\" border=\"0\" src=\"http://portal.ulsinc.com/Portal/images/sm-image.jpg\" />";
}
else
{
print $buffer;
}
?>

<!--
<a title="Authorized Channel Partner Icon" href="http://www.ulsinc.com/cp/en/oldham-group/il/springfield" target="_blank"><img alt="Universal Laser Systems Authorized Channel Partner" border="0" src="http://www.ulsinc.com/channel-partners/images/icon/sm-image-en.jpg" /></a>

<iframe style="border:0; overflow:visible; height:205px; width:258px" src="http://www.ulsinc.com/cp/channel-part
ner-tools/icon-code/content/oldham-group-st-louis/il/st-louis/sm"></iframe>-->
</body>
</html>