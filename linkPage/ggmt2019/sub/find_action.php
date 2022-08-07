<?
	session_start();
	session_destroy();//session소멸


	require_once("../../function/dbconn.php"); 	
	require_once('../../admin/PHPMailer/class.phpmailer.php');
	require '../../admin/PHPMailer/PHPMailerAutoload.php';
	require '../../admin/PHPMailer/class.smtp.php';

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$random_str =generateRandomString(20);
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?

	
	if ($mode =="find_id") {

	   $query = "select idx, user_id, user_pass,firstname,lastname,email  from  member where firstname='$firstname' and lastname='$lastname' and email='$email'";
		
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);


		if ($row['user_id'] != "") 
		{


$to_email =$row['email'];
$mail = new PHPMailer;

// $mail->SMTPSecure = 'ssl';

 $mail -> SMTPDebug = 4;

//Tell PHPMailer to use SMTP

$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';


//Set the hostname of the mail server

$mail->Host = 'smtp.fmcity.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission

$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
//Whether to use SMTP authentication

$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "admin@nims1.h-internet.co.kr";
//Password to use for SMTP authentication
$mail->Password = "park8948";

$mail_from = "=?UTF-8?B?".base64_encode($mail_from )."?="."\r\n"; 


//Set who the message is to be sent from
$mail->setFrom('admin@nims1.h-internet.co.kr', 'nimsgaw@korea.kr'); //보낸사람 네이버로 연결시는 받는시 네이버

$mail->addAddress($to_email, $userid);  //받는사람

//Set the subject line
$mail->Subject = 'GGMT2019';

// 승인 

$mail_body  ="<b>GGMT 2019</b><br><br>";
$mail_body .="The ID you requested is <b>".$row['user_id']."</b>";


$mail->msgHTML($mail_body, dirname(__FILE__));

$mail->send();

			
		 echo "<script type='text/javascript'> alert('The requested ID has been sent to the registered email.'); location.href='/ggmt2019/index.html';</script>";


		}else{

  		   echo "<script type='text/javascript'> alert('No matching member information'); location.href='/ggmt2019/sub/find_id.html';</script>";

		}


	}else if ($mode =="find_pw") {



	$query = "select idx, user_id, user_pass,firstname,lastname,email from  member where user_id='$user_id' and firstname='$firstname' and lastname='$lastname' and email='$email'";
		
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);


		if ($row['user_id'] != "") 
		{
			

$to_email = $row['email'];
$mail = new PHPMailer;

// $mail->SMTPSecure = 'ssl';

 $mail -> SMTPDebug = 4;

//Tell PHPMailer to use SMTP

$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';


//Set the hostname of the mail server

$mail->Host = 'smtp.fmcity.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission

$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
//Whether to use SMTP authentication

$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "admin@nims1.h-internet.co.kr";
//Password to use for SMTP authentication
$mail->Password = "park8948";

$mail_from = "=?UTF-8?B?".base64_encode($mail_from )."?="."\r\n"; 


//Set who the message is to be sent from
$mail->setFrom('admin@nims1.h-internet.co.kr', 'nimsgaw@korea.kr'); //보낸사람 네이버로 연결시는 받는시 네이버

$mail->addAddress($to_email, $userid);  //받는사람

//Set the subject line
$mail->Subject = 'GGMT2019';

// 승인 

$mail_body  ="<b>GGMT 2019</b><br><br>";
$mail_body .="The Password you requested is <b>".$row['user_pass']."</b>";


$mail->msgHTML($mail_body, dirname(__FILE__));

$mail->send();


		 echo "<script type='text/javascript'> alert('The requested password has been sent to you via registered email.'); location.href='/ggmt2019/index.html';</script>";


		}else{

  		   echo "<script type='text/javascript'> alert('No matching member information'); location.href='/ggmt2019/sub/find_pw.html';</script>";

		}


	}


?>