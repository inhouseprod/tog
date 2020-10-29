<?PHP
/*
    Contact Form from HTML Form Guide

    This program is free software published under the
    terms of the GNU Lesser General Public License.

This program is distributed in the hope that it will
be useful - WITHOUT ANY WARRANTY; without even the
implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.

@copyright html-form-guide.com 2010
*/
require_once("class.phpmailer.php");

/*
Interface to Captcha handler
*/
class FG_CaptchaHandler
{
    function Validate() { return false;}
    function GetError(){ return '';}
}
/*
FGContactForm is a general purpose contact form class
It supports Captcha, HTML Emails, sending emails
conditionally, File atachments and more.
*/
class FGContactForm
{
    var $receipients;
    var $errors;
    var $error_message;
    var $name;
    var $email;
    var $message;
    var $from_address;
    var $form_random_key;
    var $conditional_field;
    var $arr_conditional_receipients;
    var $fileupload_fields;
    var $captcha_handler;

    var $mailer;

    function FGContactForm()
    {
        $this->receipients = array();
        $this->errors = array();
        $this->form_random_key = 'HTgsjhartag';
        $this->conditional_field='';
        $this->arr_conditional_receipients=array();
        $this->fileupload_fields=array();

        $this->mailer = new PHPMailer();
        $this->mailer->CharSet = 'utf-8';
		$this->replymailer = new PHPMailer();
        $this->replymailer->CharSet = 'utf-8';
		
    }

    function EnableCaptcha($captcha_handler)
    {
        $this->captcha_handler = $captcha_handler;
        session_start();
    }

    function AddRecipient($email,$name="")
    {
        $this->mailer->AddAddress($email,$name);
    }

    function AddReplyRecipient($email,$name="")
    {
        $this->replymailer->AddAddress($email,$name);
    }

function SetFromAddress($from)
    {
        $this->from_address = $from;
    }
    function SetFormRandomKey($key)
    {
        $this->form_random_key = $key;
    }
    function GetSpamTrapInputName()
    {
        return 'sp'.md5('KHGdnbvsgst'.$this->GetKey());
    }

    function GetFormIDInputName()
    {
        $rand = md5('TygshRt'.$this->GetKey());

        $rand = substr($rand,0,20);
        return 'id'.$rand;
    }


    function GetFormIDInputValue()
    {
        return md5('jhgahTsajhg'.$this->GetKey());
    }

    function SetConditionalField($field)
    {
        $this->conditional_field = $field;
    }
    function AddConditionalReceipent($value,$email)
    {
        $this->arr_conditional_receipients[$value] =  $email;
    }

    function AddFileUploadField($file_field_name,$accepted_types,$max_size)
    {

        $this->fileupload_fields[] =
            array("name"=>$file_field_name,
            "file_types"=>$accepted_types,
            "maxsize"=>$max_size);
    }

    function ProcessForm()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
        if(!$this->Validate())
        {
            $this->error_message = implode('<br/>',$this->errors);
            return false;
        }
        $this->CollectData();

        $ret = $this->SendFormSubmission();
		$ret1 = $this->SendReply();

        return $ret;
    }

    function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }

    function GetErrorMessage()
    {
        return $this->error_message;
    }
    function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF']);
    }

    function GetName()
    {
        return $this->name;
    }
    function GetEmail()
    {
        return $this->email;
    }
    function GetMessage()
    {
        return htmlentities($this->message,ENT_QUOTES,"UTF-8");
    }

/*--------  Private (Internal) Functions -------- */


    function SendFormSubmission()
    {
        $this->CollectConditionalReceipients();

        $this->mailer->CharSet = 'utf-8';
        
        $this->mailer->Subject = "Contact form submission from $this->name";

        $this->mailer->From = $this->GetFromAddress();

        $this->mailer->FromName = $this->name;

        $this->mailer->AddReplyTo($this->email);

        $message = $this->ComposeFormtoEmail();

        $textMsg = trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/s','',$message)));

        $this->mailer->AltBody = $this->html_decode($textMsg,ENT_QUOTES,"UTF-8");
        $this->mailer->MsgHTML($message);

        $this->AttachFiles();

        if(!$this->mailer->Send())
        {
            $this->add_error("Failed sending email!");
            return false;
        }

        return true;
    }

   function SendReply()
    {
        $this->CollectConditionalReceipients();

        $this->replymailer->CharSet = 'utf-8';
        
        $this->replymailer->Subject = "Oldham Group contact form submission from $this->name";

        $this->replymailer->From = $this->GetFromAddress();

        $this->replymailer->FromName = $this->name;

        $this->replymailer->AddReplyTo($this->GetFromAddress());

        $message = $this->ComposeReplytoEmail();

        $textMsg = trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/s','',$message)));

        $this->replymailer->AltBody = $this->html_decode($textMsg,ENT_QUOTES,"UTF-8");
        $this->replymailer->MsgHTML($message);

        if(!$this->replymailer->Send())
        {
            $this->add_error("Failed sending email!");
            return false;
        }

        return true;
    }

    function html_decode($txt)
    {
        if((version_compare( phpversion(), '5.0' ) < 0)) 
        {
            return html_entity_decode($txt);
        } 
        else 
        {
            return html_entity_decode($txt, ENT_COMPAT, 'UTF-8');
        }
    }
    function CollectConditionalReceipients()
    {
        if(count($this->arr_conditional_receipients)>0 &&
          !empty($this->conditional_field) &&
          !empty($_POST[$this->conditional_field]))
        {
            foreach($this->arr_conditional_receipients as $condn => $rec)
            {
                if(strcasecmp($condn,$_POST[$this->conditional_field])==0 &&
                !empty($rec))
                {
                    $this->AddRecipient($rec);
                }
            }
        }
    }

    /*
    Internal variables, that you donot want to appear in the email
    Add those variables in this array.
    */
    function IsInternalVariable($varname)
    {
        $arr_internal_vars = array('scaptcha',
                            'submitted',
                            $this->GetSpamTrapInputName(),
                            $this->GetFormIDInputName()
                            );
        if(in_array($varname,$arr_internal_vars))
        {
            return true;
        }
        return false;
    }

    function FormSubmissionToMail()
    {
        $ret_str='';
		
		$ret_str .= "<div><div class='label'>Subject :&nbsp;</div><div class='value'>" . getTabName(htmlentities($_POST['subject'],ENT_QUOTES,"UTF-8")) . "<br> </div></div>\n";

		$ret_str .= "<div><div class='label'>Name :&nbsp;</div><div class='value'>" . nl2br(htmlentities($_POST['fname'],ENT_QUOTES,"UTF-8")) . " <br></div></div>\n";

		$ret_str .= "<div><div class='label'>Company :&nbsp;</div><div class='value'>" . nl2br(htmlentities($_POST['company'],ENT_QUOTES,"UTF-8")) . " <br> </div></div>\n";
		$ret_str .= "<div><div class='label'>Address :&nbsp;</div><div class='value'>" . nl2br(htmlentities($_POST['address'],ENT_QUOTES,"UTF-8")) . " <br></div></div>\n";
		$ret_str .= "<div><div class='label'>City, State Zip :&nbsp;</div><div class='value'>" . nl2br(htmlentities($_POST['city'],ENT_QUOTES,"UTF-8")). ", " . nl2br(htmlentities($_POST['state'],ENT_QUOTES,"UTF-8")). "  " . nl2br(htmlentities($_POST['zip'],ENT_QUOTES,"UTF-8")) . " <br></div></div>\n";
		$ret_str .= "<div><div class='label'>Phone :&nbsp;</div><div class='value'>" . nl2br(htmlentities($_POST['ac'],ENT_QUOTES,"UTF-8")) . "-" . nl2br(htmlentities($_POST['exch'],ENT_QUOTES,"UTF-8")) . "-" . nl2br(htmlentities($_POST['num'],ENT_QUOTES,"UTF-8")) . " <br></div></div>\n";

		$ret_str .= "<div><div class='label'>Email :&nbsp;</div><div class='value'>" . nl2br(htmlentities($_POST['email'],ENT_QUOTES,"UTF-8")) . " <br></div></div>\n";

		$ret_str .= "<div><div class='label'>Details :&nbsp;</div><div class='details'>";
		$ret_str .= nl2br(htmlentities($_POST['details'],ENT_QUOTES,"UTF-8")) . " </div></div>\n";

		foreach($this->fileupload_fields as $upload_field)
        {
            $field_name = $upload_field["name"];
            $filename = basename($_FILES[$field_name]['name']);

            $ret_str .= "<div class='label'>File upload '$field_name' :</div><div class='value'>$filename </div>\n";
        }
        return $ret_str;
    }

    function ExtraInfoToMail()
    {
        $ret_str='';

        $ip = $_SERVER['REMOTE_ADDR'];
        $ret_str = "<div class='label'>IP address of the submitter:</div><div class='value'>$ip</div>\n";

        return $ret_str;
    }

    function ExtraReplyInfoToMail()
    {
        $ret_str='';

        $ip = $_SERVER['REMOTE_ADDR'];
        $ret_str = "<div class='label'>The information has been sent to $this->mailer->to</div><div class='value'></div>\n";

        return $ret_str;
    }

    function GetMailStyle()
    {
        $retstr = "\n<style>".
        "body,.label,.value { font-family:Arial,Verdana; } ".
        ".label {font-weight:bold; margin-bottom:15px; font-size:0.8em; color:#333; float:left;} ".
        ".value {margin-bottom:15px;font-size:0.8em;margin-left:15px;} ".
		".details {padding-left:30px;font-size:0.8em; width:400px;} ".
		".logo {border:0}".
        "</style>\n";

        return $retstr;
    }
    function GetHTMLHeaderPart()
    {
         $retstr = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">'."\n".
                   '<html><head><title></title>'. header("x-frame-options: SAMEORIGIN") .
                   '<meta http-equiv=Content-Type content="text/html; charset=utf-8">';
         $retstr .= $this->GetMailStyle();
         $retstr .= "</head><body><div class='logo'><a href='http://www.oldhamgroup.com'><img src='http://www.oldhamgroup.com/images/h_hdr.gif' /></a></div>";
         return $retstr;
    }
    function GetHTMLFooterPart()
    {
        $retstr ='</body></html>';
        return $retstr ;
    }
    function ComposeFormtoEmail()
    {
        $header = $this->GetHTMLHeaderPart();
        $formsubmission = $this->FormSubmissionToMail();
        $extra_info = $this->ExtraInfoToMail();
        $footer = $this->GetHTMLFooterPart();

        $message = $header."Submission from web site information request form:<p>$formsubmission</p><hr/>$extra_info".$footer;

        return $message;
    }

    function ComposeReplytoEmail()
    {
        $header = $this->GetHTMLHeaderPart();
        $formsubmission = $this->FormSubmissionToMail();
        $extra_info = $this->ExtraReplyInfoToMail();
        $footer = $this->GetHTMLFooterPart();

        $message = $header."Thanks for your Interest in The Oldham Group.<br/><br/>The following information has been submitted. One of our staff will be in touch with you soon.<p>$formsubmission</p><hr/>$extra_info".$footer;

        return $message;
    }

    function AttachFiles()
    {
        foreach($this->fileupload_fields as $upld_field)
        {
            $field_name = $upld_field["name"];
            $filename =basename($_FILES[$field_name]['name']);

            $this->mailer->AddAttachment($_FILES[$field_name]["tmp_name"],$filename);
        }
    }

    function GetFromAddress()
    {
        if(!empty($this->from_address))
        {
            return $this->from_address;
        }

        $host = $_SERVER['SERVER_NAME'];

        $from ="nobody@$host";
        return $from;
    }

    function Validate()
    {
        $ret = true;
        //security validations
        if(empty($_POST[$this->GetFormIDInputName()]) ||
          $_POST[$this->GetFormIDInputName()] != $this->GetFormIDInputValue() )
        {
            //The proper error is not given intentionally
            $this->add_error("Automated submission prevention: case 1 failed");
            $ret = false;
        }

        //This is a hidden input field. Humans won't fill this field.
        if(!empty($_POST[$this->GetSpamTrapInputName()]) )
        {
            //The proper error is not given intentionally
            $this->add_error("Automated submission prevention: case 2 failed");
            $ret = false;
        }

        //name validations
        if(empty($_POST['fname']))
        {
            $this->add_error("Please provide your name");
            $ret = false;
        }
        else
        if(strlen($_POST['fname'])>50)
        {
            $this->add_error("Name is too big!");
            $ret = false;
        }

        //email validations
        if(empty($_POST['email']))
        {
            $this->add_error("Please provide your email address");
            $ret = false;
        }
        else
        if(strlen($_POST['email'])>50)
        {
            $this->add_error("Email address is too big!");
            $ret = false;
        }
        else
        if(!$this->validate_email($_POST['email']))
        {
            $this->add_error("Please provide a valid email address");
            $ret = false;
        }

        //message validaions
        if(strlen($_POST['details'])>2048)
        {
            $this->add_error("Message is too big!");
            $ret = false;
        }

        //captcha validaions
        if(isset($this->captcha_handler))
        {
            if(!$this->captcha_handler->Validate())
            {
                $this->add_error($this->captcha_handler->GetError());
                $ret = false;
            }
        }
        //file upload validations
        if(!empty($this->fileupload_fields))
        {
         if(!$this->ValidateFileUploads())
         {
            $ret = false;
         }
        }
        return $ret;
    }

    function ValidateFileType($field_name,$valid_filetypes)
    {
        $ret=true;
        $info = pathinfo($_FILES[$field_name]['name']);
        $extn = $info['extension'];
        $extn = strtolower($extn);

        $arr_valid_filetypes= explode(',',$valid_filetypes);
        if(!in_array($extn,$arr_valid_filetypes))
        {
            $this->add_error("Valid file types are: $valid_filetypes");
            $ret=false;
        }
        return $ret;
    }

    function ValidateFileSize($field_name,$max_size)
    {
        $size_of_uploaded_file =
                $_FILES[$field_name]["size"]/1024;//size in KBs
        if($size_of_uploaded_file > $max_size)
        {
            $this->add_error("The file is too big. File size should be less than $max_size KB");
            return false;
        }
        return true;
    }

    function ValidateFileUploads()
    {
        $ret=true;
        foreach($this->fileupload_fields as $upld_field)
        {
            $field_name = $upld_field["name"];

            $valid_filetypes = $upld_field["file_types"];

            if($_FILES[$field_name]["error"] != 0)
            {
                $this->add_error("Error in file upload; Error code:".$_FILES[$field_name]["error"]);
                $ret=false;
            }

            if(!empty($valid_filetypes) &&
             !$this->ValidateFileType($field_name,$valid_filetypes))
            {
                $ret=false;
            }

            if(!empty($upld_field["maxsize"]) &&
            $upld_field["maxsize"]>0)
            {
                if(!$this->ValidateFileSize($field_name,$upld_field["maxsize"]))
                {
                    $ret=false;
                }
            }

        }
        return $ret;
    }

    function StripSlashes($str)
    {
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        return $str;
    }
    /*
    Sanitize() function removes any potential threat from the
    data submitted. Prevents email injections or any other hacker attempts.
    if $remove_nl is true, newline chracters are removed from the input.
    */
    function Sanitize($str,$remove_nl=true)
    {
        $str = $this->StripSlashes($str);

        if($remove_nl)
        {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
            $str = preg_replace($injections,'',$str);
        }

        return $str;
    }

    /*Collects clean data from the $_POST array and keeps in internal variables.*/
    function CollectData()
    {
        $this->fname = $this->Sanitize($_POST['fname']);
        $this->email = $this->Sanitize($_POST['company']);
        $this->email = $this->Sanitize($_POST['address']);
        $this->email = $this->Sanitize($_POST['city']);
        $this->email = $this->Sanitize($_POST['state']);
        $this->email = $this->Sanitize($_POST['zip']);
        $this->email = $this->Sanitize($_POST['ac']);
        $this->email = $this->Sanitize($_POST['exch']);
        $this->email = $this->Sanitize($_POST['num']);
        $this->email = $this->Sanitize($_POST['email']);

        /*newline is OK in the message.*/
        $this->details = $this->StripSlashes($_POST['details']);
    }

    function add_error($error)
    {
        array_push($this->errors,$error);
    }
    function validate_email($email)
    {
        return eregi("^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$", $email);
    }

    function GetKey()
    {
        return $this->form_random_key.$_SERVER['SERVER_NAME'].$_SERVER['REMOTE_ADDR'];
    }

}

?>
