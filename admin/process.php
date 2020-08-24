<?php
include "../mysql_connect.php";

//Updating of general settings
if(isset($_POST['genel_ayarlar'])){
extract($_POST);
    if(!$site_url || !$site_title || !$site_desc || !$site_keyw){
    header("location: genelayarlar.php?update=empty");
    }
    else{
    $settings=$db->prepare("UPDATE ayarlar SET site_url=?, site_title=?, site_desc=?, site_keyw=?");
    $update=$settings->execute(array($site_url,$site_title,$site_desc,$site_keyw));

        if($update){
            header("location: genelayarlar.php?update=yes");
        }
        else{
            header("location: genelayarlar.php?update=no");
        }
    }
}










?>