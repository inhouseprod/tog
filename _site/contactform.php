<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/php-form/php-form-validation.html
*/
header("x-frame-options: SAMEORIGIN");
$section="Information Request"; 
 

if (!empty($tab)) {
		$tab = (int) $_GET['tab'];
		$tab = (int) $_POST['subject'];
}


require_once("./includes/fgcontactform.php");
require_once("./includes/formvalidator.php");
include "includes/utilities.php";

$formproc = new FGContactForm();

//Initialize the contact form
$formproc->AddRecipient('esmith@oldhamgroup.com','Eric Smith'); //<<---Put your email address here
$formproc->SetFormRandomKey('CnRrspl1FyEylUj');
$formproc->SetFromAddress('info@oldhamgroup.com');

$validation_errors='';
if(isset($_POST['submitted']))
{// We need to validate only after the form is submitted

    //Setup Server side Validations
    //Please note that the element name is case sensitive 
    $validator = new FormValidator();
    $validator->addValidation("fname","req","Please fill in your name");
    $validator->addValidation("address","req","Please fill in your address");
    $validator->addValidation("city","req","Please fill in your city");
    $validator->addValidation("state","req","Please fill your state");
    $validator->addValidation("zip","req","Please fill in your zip");
    $validator->addValidation("email","email","The input for Email should be a valid email address");
    $validator->addValidation("email","req","Please fill in your email");
	$validator->addValidation("subject","dontselect=0","Please select an area of interest");	
    $validator->addValidation("name","regexp=/^[[:alpha:]\'\.\" \"\-]{1,}$/","Please provide your name");
    $validator->addValidation("address","regexp=/^[[:alnum:]\'\.\" \"\-\,]{1,}$/","Please correct your address");
    $validator->addValidation("city","alpha, blank","Please correct city");
    $validator->addValidation("state","alpha","Please correct state");
    $validator->addValidation("state","minlen=1","Please correct state");	
    $validator->addValidation("zip","num","Please correct zip");	
    $validator->addValidation("zip","minlen=5","Please correct zip");	
    //$validator->addValidation("details","regexp=/^[[:print:]]{0,}$/","The message contains extra characters. We only accept a-z, 0-9, . , ! ? -");


	$formproc->AddReplyRecipient($_POST['email']); //<<---Put your email address here
	
		if (empty($_POST['subject'])) {
			$badEmail = "True";
		} else {
			$badEmail = "False";
		}

		if (strlen($_POST['ac']) > 3) {
			$badEmail = "True";
		} else {
			$badEmail = "False";
		}

    //Then validate the form
    if($validator->ValidateForm() && $badEmail == "False")
	//If the validations succeeded, proceed with form processing
    {
		include "includes/getdb.php";
		$sub = (int) $_POST['subject'];
	    $stmt    = odbc_exec($conn,"select tab_contactemail from tab where tab_id = '" . $sub  . "' order by tab_name"); 


			$tab_email = odbc_result($stmt, 1);

			$formproc->AddRecipient($tab_email); 
			
		odbc_free_result($stmt);

		$stmt    = odbc_exec($conn,"select tab_name from tab where tab_id = '" . $sub . "'"); 


			$tab_name = odbc_result($stmt, 1);
		
		odbc_free_result($stmt);
		
		$a =  $tab_name;
		$b =  htmlentities($_POST['fname'],ENT_QUOTES,"UTF-8");
		$c =  htmlentities($_POST['company'],ENT_QUOTES,"UTF-8") ;
		$d =  htmlentities($_POST['address'],ENT_QUOTES,"UTF-8");
		$e =  htmlentities($_POST['city'],ENT_QUOTES,"UTF-8");
		$f =  htmlentities($_POST['state'],ENT_QUOTES,"UTF-8");
		$g =  htmlentities($_POST['zip'],ENT_QUOTES,"UTF-8");
		$h =  htmlentities($_POST['ac'],ENT_QUOTES,"UTF-8");
		$i =  htmlentities($_POST['exch'],ENT_QUOTES,"UTF-8");
		$j =  htmlentities($_POST['num'],ENT_QUOTES,"UTF-8");
		$k =  htmlentities($_POST['email'],ENT_QUOTES,"UTF-8");
		$l =  nl2br(htmlentities($_POST['details'],ENT_QUOTES,"UTF-8"));
		
		$today = getdate();
		$m = $today['year'] . "-" . $today['mon'] . "-" . $today['mday'];

	    $stmt    = odbc_exec($conn,"insert into response values ('" . $a . "','" . $b . "','" . $c . "','" . $d . "','" . $e . "','" . $f . "','" . $g . "','" . $h . "','" . $i . "','" . $j . "','" . $k . "','" . $l . "','" . $m ."')"); 
		odbc_close($conn);
	
        if($formproc->ProcessForm())
        {
            $formproc->RedirectToURL("thankyou.php");
        }
		
	
    }
    else
    {
        //Validations failed. Display Errors.
        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
           $validation_errors .= "<p>$inpname : $inp_err</p>\n";
        }        
    }
}//if
$disp_subject = isset($_POST['subject'])?$_POST['subject']:'';
$disp_name  = isset($_POST['fname'])?$_POST['fname']:'';
$disp_company = isset($_POST['company'])?$_POST['company']:'';
$disp_address = isset($_POST['address'])?$_POST['address']:'';
$disp_city = isset($_POST['city'])?$_POST['city']:'';
$disp_state = isset($_POST['state'])?$_POST['state']:'';
$disp_zip = isset($_POST['zip'])?$_POST['zip']:'';
$disp_ac = isset($_POST['ac'])?$_POST['ac']:'';
$disp_exch = isset($_POST['exch'])?$_POST['exch']:'';
$disp_num = isset($_POST['num'])?$_POST['num']:'';
$disp_email = isset($_POST['email'])?$_POST['email']:'';
$disp_details = isset($_POST['details'])?$_POST['details']:'';


?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>The Oldham Group - <?php echo $section; ?></title>
    
        <link rel="stylesheet" href="css/style.css" type="text/css" />
		<link type="text/css" href="css/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
		<link type="text/css" href="css/contact.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.15.custom.min.js"></script>
		<script type="text/javascript" src="js/gen_validatorv31.js"></script>

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

    
	<?php include "includes/header.php"; 
	$tab = (int) $_GET['tab'];
	?>

<div id="pagecontent">
    <div id="pagecontent" class="ui-widget ui-widget-content ui-corner-all">
    	<div  id="vendorlist" style="font-size:12pt; width:350px; height:450px">
		<h2>How can we help?</h2>

			<p>We'd love to talk to you. If you are looking for a solution we'd love the opportunity to show you how we can shine. We have solutions for every area of the printing business - from prepress through to the pressroom and bindery.

If you'd like, give us a call at 1-800-468-4649 or one of our other customer service numbers. Let us know your area of interest and we'll put you in touch with one of our specialists.

If you'd like, you can also use the form below. Let us know what information you need and we'll be sure to provide you with the best solution possible for your environment.  </p><br/>
<p><b style="color:#F00">*</b> Required</p>
    	</div>
        <div id="textcontain" style="font-size:11pt">
 		<form id="infoRequest" method='post' accept-charset='UTF-8' action="<?php echo $formproc->GetSelfScript(); ?>" name="infoRequest">
		<fieldset>
 			<input type='hidden' name='submitted' id='submitted' value='1'/>
			<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
			<input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />
			<div>
				<span class='error'><?php echo $formproc->GetErrorMessage(); ?></span>
				<span class='error'><?php echo $validation_errors; ?></span>
			</div>
       		<div style=" width:100%; border:0">		
        		<div class='container'><b style="color:#F00">*</b> I'm looking for:<br />
					<select id="formSubject" name="subject" class="forminput">
				 		<option value="0">Choose One
						<?php getTabSelect($tab) ?>
						</option>
            		</select>
         		 </div> 
         		 <div class='container'>
                 	<b style="color:#F00">*</b> Your name<br />
					<input id="formName" type="text" name="fname" size="50" class="forminput" value='<?php echo htmlentities($disp_name) ?>' />
             		<span id='infoRequest_name_errorloc' class='error'></span>
          		</div>
         		 <div class='container'>Your company<br />
					<input id="formCompany" type="text" name="company" size="50" class="forminput"  value='<?php echo htmlentities($disp_company) ?>'/>
             		<span id='infoRequest_company_errorloc' class='error'></span>
          		</div>
          		<div class='container'><b style="color:#F00">* </b>Your address<br />
					<input id="formAddress" type="text" name="address" size="50" class="forminput"  value='<?php echo htmlentities($disp_address) ?>'/><br/>
             		<span id='infoRequest_address_errorloc' class='error'></span>
          		</div>
          		<div class='container'>
                	<table>
                    	<tr>
                        	<td><b style="color:#F00">*</b> City</td><td>State</td><td>Zip</td>
                        </tr>
						<tr>
                        	<td><input id="formCity" type="text" name="city" size="30" class="forminput"  value='<?php echo htmlentities($disp_city) ?>'/></td>
                        	<td><input id="formState" type="text" name="state" size="5" class="forminput"  value='<?php echo htmlentities($disp_state) ?>'/></td>
                        	<td><input id="formZip" type="text" name="zip" size="10" class="forminput"  value='<?php echo htmlentities($disp_zip) ?>'/></td>
                  		</tr>
                        <tr><td><span id='infoRequest_city_errorloc' class='error'></span></td><td>
                        	<span id='infoRequest_state_errorloc' class='error'></span></td><td>
                            <span id='infoRequest_zip_errorloc' class='error'></span></td></tr>
                    </table>
          		</div>
          		<div  class='container'>
                	<table>
                    	<tr>
                        	<td colspan="3">Your phone number</td>
                        </tr>
						<tr>
                        	<td><input id="formAC" type="text" name="ac" size="3" class="forminput"  value='<?php echo htmlentities($disp_ac) ?>'/>&nbsp;&mdash;</td>
                            <td><input id="formExch" type="text" name="exch" size="3" class="forminput"  value='<?php echo htmlentities($disp_exch) ?>'/>&nbsp;&mdash;</td>
                            <td><input id="formNum" type="text" name="num" size="4" class="forminput"  value='<?php echo htmlentities($disp_num) ?>'/></td>
                        </tr>
                        <tr><span id='infoRequest_ac_errorloc' class='error'></span>
                        	<span id='infoRequest_exch_errorloc' class='error'></span>
                            <span id='infoRequest_num_errorloc' class='error'></span></tr>
                    </table>
          		</div>
          		<div  class='container'>
                	<font color="ff0000"><b style="color:#F00">*</b> Your e-mail address </font>
			  		<br />
					<input id="formEmail" type="text" name="email" size="50" class="forminput"  value='<?php echo htmlentities($disp_email) ?>'/><br />
             		<span id='infoRequest_email_errorloc' class='error'></span>
          		</div>
          		<div  class='container'>Please give us some details about what you need<br />
					<textarea id="formDetails" cols="50" rows="8" name="details" class="forminput" style="border:1px solid black; ">
						<?php echo htmlentities($disp_details) ?>
                    </textarea>
             		<span id='infoRequest_details_errorloc' class='error'></span>
          		</div class='container'>
          		<div valign="top"> 
		  			<input id="formSubmit" type="submit" value="submit"  style="border:1px solid black; margin-top:3px" />
          		</div>
			</div>
      </fieldset>
      </form> 
     </div>
	
</div><!-- End demo -->
    </div><?php include "includes/footer.php" ?></body>
</html>


<!-- client-side Form Validations:
Uses the form validation script from JavaScript-coder.com
See: http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
-->
<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("infoRequest");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
	frmvalidator.addValidation("subject","dontselect=0","Please select an area of interest");
	
    frmvalidator.addValidation("fname","req","Please provide your name");


    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("address","req","Please provide your address");


    frmvalidator.addValidation("city","req","Please provide your city");

    frmvalidator.addValidation("city","print","Please correct city");

    frmvalidator.addValidation("state","req","Please provide your state");

    frmvalidator.addValidation("state","alpha","Please correct state");

    frmvalidator.addValidation("state","minlen=2","Please correct zip");
	
    frmvalidator.addValidation("zip","req","Please provide your zip");

    frmvalidator.addValidation("zip","num","Please correct zip");
	
    frmvalidator.addValidation("zip","minlen=5","Please correct zip");
	

    frmvalidator.addValidation("details","maxlen=2048","The message is too long!(more than 2KB!)");
// ]]>
</script>
<!--
Form Code End
Visit html-form-guide.com for more info.
-->

</body>
</html>
