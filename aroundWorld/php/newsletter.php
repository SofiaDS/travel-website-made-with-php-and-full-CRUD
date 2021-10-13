<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<?php>
if(!empty($_POST['nome'] && !empty($_POST['cognome'] && !empty($_POST['email'])))){
    $nome = $_POST['nome'];
    $cognome =$_POST['cognome'];
    $email =$_POST['email'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $destinatario = $email;
        $oggetto = 'Oggetto';
        $corpo = 'Thanks for subrscibing! You will soon receive offers about our best deals!';
        $headers='From: myWebsite@epicode.test' ."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n" . "X-Mailer:PHP" . phpversion();

        mail($destinatario, $oggetto, $corpo, $headers);
    }else{
        echo 'indirizzo email invalido'
    }
};
?>
</body>
</html>