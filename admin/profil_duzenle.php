<?php
include "../mysql_connect.php";

extract($_POST);

//changing admin name 
if(isset($_POST['kadi_degistir'])){

    $user_id=$_GET['user_id'];

    if($full_name){
        $adminguncelle=$db->prepare("UPDATE kullanıcılar SET full_name=? WHERE user_id=?");
        $update=$adminguncelle->execute(array($full_name,$user_id));
        $admin=$adminguncelle->fetch(PDO::FETCH_ASSOC);
    }
        if($update){
            header("location: profil.php?update=yes");
        }
        else{
            header("location: profil.php?update=no");
        }
    }else{
        header("location: profil.php?update=empty");
    }

//changing admin password
    if(isset($_POST['sifre_degistir'])){

        $user_id=$_GET['user_id'];
        $eskisifre=md5($_POST['eski_sifre']);
        $yenisifre=md5($_POST['yeni_sifre']);

        $admin=$db->prepare("SELECT * FROM kullanıcılar WHERE password=?");
        $admin->execute(array($eskisifre));
        $say=$admin->rowCount();

        if($say==0){
            header("location: profil.php?update=eskisifrehata&user_id=$user_id");
        }else{
            $adminguncelle=$db->prepare("UPDATE kullanıcılar SET password=? WHERE user_id=?");
            $update=$adminguncelle->execute(array($yenisifre,$user_id));
    
        if($update){
            header("location: profil.php?update=yes&user_id=$user_id");
        }else{
            header("location: profil.php?update=no&user_id=$user_id");
        }
    }
}
?>