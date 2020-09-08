<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_POST){
    $gonderen=strip_tags($_POST["gonderen"]);
    $gonderilenmail=strip_tags($_POST["gonderilenmail"]);
    $mesaj=strip_tags($_POST["mesaj"]);

    if(!$gonderen || !$gonderilenmail || !$mesaj){

        echo "bos";
    
    }else{
    
        require("PHPMailer/src/PHPMailer.php");
        require("PHPMailer/src/SMTP.php");
        require("PHPMailer/src/Exception.php");
    
        $mail=new PHPMailer();

            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
            $mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
            $mail->Port = 587; // Guvenli baglanti icin 465 Normal baglanti icin 587
            $mail->Host = 'smtp.gmail.com'; // Mail sunucusuna ismi
            $mail->IsHTML(true);
            $mail->SetLanguage("tr","PHPMailer/language");
            $mail->CharSet  ="UTF-8";
            $mail->Username = ""; // Mail adresimizin kullanicı adi
            $mail->Password = ""; // Mail adresimizin sifresi
            $mail->SetFrom("@gmail.com",$gonderen); // Mail attigimizda gorulecek ismimiz
            $mail->AddAddress($gonderilenmail); // Maili gonderecegimiz kisi yani alici
            $mail->Subject = "Gmail SMTP Örneği"; // Konu basligi
            $mail->Body ="<p>".$mesaj."</p>";// Mailin icerigi
            if(!$mail->Send()){
                echo "Mailer Error: ".$mail->ErrorInfo;
            } else {
                echo "Mesaj gonderildi";
            }
        echo "yes";
    }
}

?>
