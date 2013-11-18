<?php

if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
//    $email_to = "sevara.ismailova@yahoo.co.uk";
    $email_to = "bridark17@hotmail.com";
    $email_subject = "Contacts (Website)";


    function died($error) {
        // your error code can go here


	?>

	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<html lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>ERROR MESSAGE</title>


	<style type="text/css">
	<!--
	body {margin: 0px; padding: 0px;}
	.List-Paragraph-P
	        {
	        margin:0 0 13px 0; text-align:justify;
	        font-weight:400;
	        }
	.Website-Body-Text-P
	        {
	        margin:0 0 0 0; text-align:left; font-weight:400;
	        }
	.List-Paragraph-C
	        {
	        font-family:"Arial", sans-serif; font-weight:700; font-size:12px;
	        line-height:1.42em; color:#515151;
	        }
	.List-Paragraph-C0
	        {
	        font-family:"Arial", sans-serif; font-size:12px; line-height:1.42em;
	        color:#515151;
	        }
	.Website-Body-Text-C
	        {
	        font-family:"Arial", sans-serif; font-size:12px; line-height:1.25em;
	        color:#023e1a;
	        }
	-->
	</style>

	</head>

	<body link="#142065" vlink="#ff0000" alink="#ff0000" text="#000000" style="background: #ffffff; height:180px;">
	<center><div style="position:relative;width:400px;">
	<div id="txt_41" style="position:absolute; left:15px; top:14px; width:374px; height:66px;-moz-box-sizing:border-box;box-sizing:border-box; overflow:hidden;">
	<P class="List-Paragraph-P"><span class="List-Paragraph-C">Unfortunately, there were error(s) found with the form you submitted.</span></P>
	<P class="List-Paragraph-P"><span class="List-Paragraph-C0">These errors are specified below:</span></P>


	</div>
	</div></center>
	</body >
	</html>

	<?php

       echo "<br /><br /><br /><br /><br />".$error."<br /><br />";

        die();
    }

    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $first_name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= '*     The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= '*     The Name you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= '*     The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";


$headers = "From:mail.delivery@corebusinessltd.co.uk\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html\r\n";

$mail_sent = mail($email_to, $email_subject, $email_message, $headers);


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>YOUR MESSAGE</title>


<style type="text/css">
<!--
body {margin: 0px; padding: 0px;}
.List-Paragraph-P
        {
        margin:0 0 13px 0; text-align:justify;
        font-weight:400;
        }
.Website-Body-Text-P
        {
        margin:0 0 0 0; text-align:left; font-weight:400;
        }
.List-Paragraph-C
        {
        font-family:"Arial", sans-serif; font-weight:700; font-size:12px;
        line-height:1.42em; color:#515151;
        }
.List-Paragraph-C0
        {
        font-family:"Arial", sans-serif; font-size:12px; line-height:1.42em;
        color:#515151;
        }
.Website-Body-Text-C
        {
        font-family:"Arial", sans-serif; font-size:12px; line-height:1.25em;
        color:#023e1a;
        }
-->
</style>

</head>

<body link="#142065" vlink="#ff0000" alink="#ff0000" text="#000000" style="background: #ffffff; height:180px;">
<center><div style="position:relative;width:400px;">
<div id="txt_41" style="position:absolute; left:15px; top:14px; width:374px; height:66px;-moz-box-sizing:border-box;box-sizing:border-box; overflow:hidden;">
<P class="List-Paragraph-P"><span class="List-Paragraph-C">YOU MASSAGE HAS BEEN SENT SUCCESSFULLY</span></P>
<P class="List-Paragraph-P"><span class="List-Paragraph-C0">Thank you for contacting us. We will be in touch with you very soon.</span></P>
</div>

</div></center>
</body>

</html>


<?php

}

?>