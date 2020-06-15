<?php
require 'class.phpmailer.php';
	$host = $_POST['host'];
	$port = $_POST['port'];
	$smtpsecure = $_POST['smtpsecure'];
	$email =  $_POST['email'];
	$password =  $_POST['password'];
	$username = $_POST['username'];
	$kepada = $_POST['kepada'];
	$title = $_POST['title'];
	$tujuan = $_POST['tujuan'];
	$tembusan = $_POST['tembusan'];
	$tgl = date('d-m-Y');
	$subject = $_POST['subject'];
	$isi = $_POST['isi'];
	$laporan="<table width='70%' style='border:1px solid gray;' align='center' cellpadding='3' cellspacing='0'>";
	$laporan .="<tr>";
	$laporan .="<td>&nbsp;&nbsp;&nbsp;</td><td align='center' colspan='3'><br></td><td>&nbsp;&nbsp;&nbsp;</td>";
	$laporan .="</tr>";
	$laporan .="<tr>";
	$laporan .="<td>&nbsp;&nbsp;&nbsp;</td><td align='center' colspan='3'><b>MEMO</b></td><td>&nbsp;&nbsp;&nbsp;</td>";
	$laporan .="</tr>";
	$laporan .="<tr>";
	$laporan .="<td>&nbsp;&nbsp;&nbsp;</td><td align='center' colspan='3'><br></td><td>&nbsp;&nbsp;&nbsp;</td>";
	$laporan .="</tr>";
	$laporan .="<tr>";
	$laporan .="<td>&nbsp;&nbsp;&nbsp;</td><td align='left'><b>Tanggal</b></td><td>:</td><td>$tgl</td><td>&nbsp;&nbsp;&nbsp;</td>";
	$laporan .="</tr>";
	$laporan .="<tr>";
	$laporan .="<td>&nbsp;&nbsp;&nbsp;</td><td align='left'><b>Dari</b></td><td>:</td><td>$username</td><td>&nbsp;&nbsp;&nbsp;</td>";
	$laporan .="</tr>";
	$laporan .="<tr>";
	$laporan .="<td>&nbsp;&nbsp;&nbsp;</td><td align='left'><b>Kepada</b></td><td>:</td><td>$title $tujuan</td><td>&nbsp;&nbsp;&nbsp;</td>";
	$laporan .="</tr>";
	$laporan .="<tr>";
	$laporan .="<td>&nbsp;&nbsp;&nbsp;</td><td align='left'><b>Perihal</b></td><td>:</td><td>$subject</td><td>&nbsp;&nbsp;&nbsp;</td>";
	$laporan .="</tr>";
	$laporan .="<tr>";
	$laporan .="<td>&nbsp;&nbsp;&nbsp;</td><td align='left' colspan='3'><br>$isi</td><td>&nbsp;&nbsp;&nbsp;</td>";
	$laporan .="</tr>";
	$laporan .="<tr>";
	$laporan .="<td>&nbsp;&nbsp;&nbsp;</td><td align='center' colspan='3'><br></td><td>&nbsp;&nbsp;&nbsp;</td>";
	$laporan .="</tr>";
	$laporan .="</table>";
	
	try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$body             = $laporan;
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->SMTPSecure = $smtpsecure;
	$mail->Port       = $port;                    // set the SMTP server port
	$mail->Host       = $host; // SMTP server
	$mail->Username   = $email;     // SMTP server username
	$mail->Password   = $password;            // SMTP server password

	//$mail->IsSendmail();  // tell the class to use Sendmail
	$mail->AddReplyTo($email,$username);
	$mail->From       = $email;
	$mail->FromName   = $username;

	$mail->AddAddress($kepada);
	//$mail->AddCC($tembusan);
    
	$mail->Subject  = $subject;

	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	//$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML

	$mail->Send();

} catch (phpmailerException $e) {
	echo $e->errorMessage();
}

echo "<meta http-equiv='refresh' content='0;index.php'>";
?>