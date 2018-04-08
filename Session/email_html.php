<?php
$to = "pasquaman3@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
<h3>Per confermare la registrazione clicca qua</h3>
<a href='https://www.google.it'>Conferma Registrazione</a>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>

INSERT INTO `Tusers`(`UserID`, `Username`, `Password`, `Email`, `Cognome`, `Nome`, `RegistrazioneConfermata`, `Token`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])
UPDATE `Tusers` SET `UserID`=[value-1],`Username`=[value-2],`Password`=[value-3],`Email`=[value-4],`Cognome`=[value-5],`Nome`=[value-6],`RegistrazioneConfermata`=[value-7],`Token`=[value-8] WHERE 1
