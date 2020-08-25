<?php
include "../mysql_connect.php";

extract($_POST);
//Updating of general settings
if(isset($_POST['genel_ayarlar'])){
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
//Updating of social media settings
if(isset($_POST['sosyal_medya'])){
        if(!$site_twitter || !$site_linkedin || !$site_instagram || !$site_github ){
        header("location: socialmedia.php?update=empty");
        }
        else{
        $settings=$db->prepare("UPDATE ayarlar SET site_twitter=?, site_linkedin=?, site_instagram=?, site_github=?");
        $update=$settings->execute(array($site_twitter,$site_linkedin,$site_instagram,$site_github));
    
            if($update){
                header("location: socialmedia.php?update=yes");
            }
            else{
                header("location: socialmedia.php?update=no");
            }
        }
    }
//Updating of logo & favicon settings
$dosyaturu=array("image/jpeg","image/jpg","image/png","image/x-png");
$dosyauzanti=array("jpeg","jpg","png","x-png");

if(isset($_POST['logo_düzenle'])){
    if($_FILES['site_logo']['size']>0){
   $kaynak=$_FILES['site_logo']['tmp_name'];
   $isim=$_FILES['site_logo']['name'];
   $boyut=$_FILES['site_logo']['size'];
   $turu=$_FILES['site_logo']['type'];
   $uzanti=substr($isim,strpos($isim,".")+1);
   $resimAd=rand()."_".$isim;
   $hedef="../blog/images/".$resimAd;
        if($kaynak){
            if(!in_array($uzanti,$dosyauzanti) && !in_array($turu,$dosyaturu)){
                header("location: logo-favicon.php?update=gecersizuzanti");

            }else if($boyut>1024*1024){
                header("location: logo-favicon.php?update=buyuk");
            }else{
                $sil=$db->prepare("SELECT * FROM ayarlar");
                $sil->execute();
                $eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim['site_logo'];
                unlink("../blog/images/".$eski_resim['site_logo']);
                if(move_uploaded_file($kaynak,$hedef)){
                    $yükle=$db->prepare("UPDATE ayarlar SET site_logo=?");
                    $update=$yükle->execute(array($resimAd));
                    if($update){
                        header("location: logo-favicon.php?update=yes");
                    }
                    else{
                        header("location: logo-favicon.php?update=no");
                    }
                }
            }
        }
    }else{
        header("location: logo-favicon.php?update=empty");
    }
}
$dosyaturu=array("image/jpeg","image/jpg","image/png","image/x-png");
$dosyauzanti=array("jpeg","jpg","png","x-png","ico");
if(isset($_POST['favicon_düzenle'])){
    if($_FILES['site_favicon']['size']>0){
   $kaynak=$_FILES['site_favicon']['tmp_name'];
   $isim=$_FILES['site_favicon']['name'];
   $boyut=$_FILES['site_favicon']['size'];
   $turu=$_FILES['site_favicon']['type'];
   $uzanti=substr($isim,strpos($isim,".")+1);
   $resimAd=rand()."_".$isim;
   $hedef="../blog/images/".$resimAd;
        if($kaynak){
            if(!in_array($uzanti,$dosyauzanti) && !in_array($turu,$dosyaturu)){
                header("location: logo-favicon.php?update=gecersizuzanti");

            }else if($boyut>1024*1024){
                header("location: logo-favicon.php?update=buyuk");
            }else{
                $sil=$db->prepare("SELECT * FROM ayarlar");
                $sil->execute();
                $eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim['site_favicon'];
                unlink("../blog/images/".$eski_resim['site_favicon']);
                if(move_uploaded_file($kaynak,$hedef)){
                    $yükle=$db->prepare("UPDATE ayarlar SET site_favicon=?");
                    $update=$yükle->execute(array($resimAd));
                    if($update){
                        header("location: logo-favicon.php?update=yes");
                    }
                    else{
                        header("location: logo-favicon.php?update=no");
                    }
                }
            }
        }
    }else{
        header("location: logo-favicon.php?update=empty");
    }
}





?>