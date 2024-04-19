<?php
$name=$_POST['name'];
$SenderEmail=$_POST['SenderEmail'];
$phonenumber=$_POST['phonenumber'];
$RecieverEmail=$_POST['RecieverEmail'];
$msg=$_POST['msgbox'];

if(!empty($RecieverEmail)){
    if(filter_var($RecieverEmail,FILTER_VALIDATE_EMAIL)){
        $reciever=$RecieverEmail;
        $ssubject="From: $name < $SenderEmail >";
        $body="Name : $name \nEmail: $SenderEmail \nPhone: $phonenumber \nMessage: $msg \n\nRegards\n$name";
        $headers = "From: $SenderEmail"; 
        if(mail($reciever,$ssubject,$body,$headers)){
            echo "Your message has been sent ";
        }else{
            echo "Sorry ! failed to send message ";
        }
    }else{
        echo "Enter a Valid Email Address";
    }
}else{
    echo "Reciever Email field is required !!! ";
}

?>