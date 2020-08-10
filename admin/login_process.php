<?php
session_start();
include "mysql_connect.php";

if(isset($_POST['login'])){

    $admin_email=htmlspecialchars($_POST['admin_email']);
    $admin_password=md5($_POST['admin_password']);
    
    $adminask=$db->prepare("SELECT * FROM admin WHERE email=? AND password=?");
    $adminask->execute([$admin_email,$admin_password]);
    $admin=$adminask->fetch(PDO::FETCH_ASSOC);
    echo $count=$adminask->rowCount();
    if($count==1){
        $_SESSION['session']=true;
        $_SESSION['fullname']=$admin['full_name'];
        $_SESSION['admin_email']=$admin['email'];
        header("location: index.php");
        exit;
    }else{
        
        header("location: login.php?durum=no");
        echo "Your email or your password is wrong!";
    }

}


?>