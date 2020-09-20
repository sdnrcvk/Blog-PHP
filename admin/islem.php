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
        header("location: sosyal_medya.php?update=empty");
        }
        else{
        $settings=$db->prepare("UPDATE ayarlar SET site_twitter=?, site_linkedin=?, site_instagram=?, site_github=?");
        $update=$settings->execute(array($site_twitter,$site_linkedin,$site_instagram,$site_github));
    
            if($update){
                header("location: sosyal_medya.php?update=yes");
            }
            else{
                header("location: sosyal_medya.php?update=no");
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
   $hedef="../blog/images/logo-favicon/".$resimAd;
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
                unlink("../blog/images/logo-favicon/".$eski_resim['site_logo']);
                if(move_uploaded_file($kaynak,$hedef)){
                    $yukle=$db->prepare("UPDATE ayarlar SET site_logo=?");
                    $update=$yukle->execute(array($resimAd));
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
   $hedef="../blog/images/logo-favicon/".$resimAd;
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
                unlink("../blog/images/logo-favicon/".$eski_resim['site_favicon']);
                if(move_uploaded_file($kaynak,$hedef)){
                    $yukle=$db->prepare("UPDATE ayarlar SET site_favicon=?");
                    $update=$yukle->execute(array($resimAd));
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

//adding article
if(isset($yazi_ekle)){
    $kaynak=$_FILES['yazi_foto']['tmp_name'];
    $isim=$_FILES['yazi_foto']['name'];
    $boyut=$_FILES['yazi_foto']['size'];
    $turu=$_FILES['yazi_foto']['type'];
    $uzanti=substr($isim,strpos($isim,".")+1);
    $resimAd=rand()."_".$isim;
    $hedef="../blog/images/yazilar/".$resimAd;
    if($kaynak){
        if(!in_array($uzanti,$dosyauzanti) && !in_array($turu,$dosyaturu)){
            header("location: yazilar.php?update=gecersizuzanti");

        }elseif($boyut>1024*1024){
            header("location: yazilar.php?update=buyuk");
        }else{
            if(move_uploaded_file($kaynak,$hedef)){
                $yukle=$db->prepare("INSERT INTO yazilar (yazi_foto,yazi_title,yazi_kategori_id,yazi_icerik) VALUES (?,?,?,?)");
                $insert=$yukle->execute(array($resimAd,$yazi_title,$yazi_kategori,$yazi_icerik,));
                if($insert){
                    header("location: yazilar.php?update=yes");
                }
                else{
                    header("location: yazilar.php?update=no");
                }
            }
        }
    }
}


//editing article
$dosyaturu=array("image/jpeg","image/jpg","image/png","image/x-png");
$dosyauzanti=array("jpeg","jpg","png","x-png");

if(isset($yazi_duzenle)){
    //if you are change photo,it will work.
    $yazi_id=$_GET['yazi_id'];
    if($_FILES['yazi_foto']['size']>0){

    $kaynak=$_FILES['yazi_foto']['tmp_name'];
    $isim=$_FILES['yazi_foto']['name'];
    $boyut=$_FILES['yazi_foto']['size'];
    $turu=$_FILES['yazi_foto']['type'];
    $uzanti=substr($isim,strpos($isim,".")+1);
    $resimAd=rand()."_".$isim;
    $hedef="../blog/images/yazilar/".$resimAd;
        if($kaynak){
            
            if(!in_array($uzanti,$dosyauzanti) && !in_array($turu,$dosyaturu)){
                header("location: yazilar.php?update=gecersizuzanti");

            }elseif($boyut>1024*1024){
                header("location: yazilar.php?update=buyuk");
            }else{
                $sil=$db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
                $sil->execute(array($yazi_id));
                $eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim['yazi_foto'];
                unlink("../blog/images/yazilar/".$eski_resim['yazi_foto']);
                if(move_uploaded_file($kaynak,$hedef)){
                    $yukle=$db->prepare("UPDATE yazilar SET yazi_foto=?, yazi_title=? , yazi_kategori_id=?, yazi_icerik=? WHERE yazi_id=?");
                    $update=$yukle->execute(array($resimAd,$yazi_title,$yazi_kategori,$yazi_icerik,$yazi_id));
                    if($update){
                        header("location: yazilar.php?update=yes");
                    }
                    else{
                        header("location: yazilar.php?update=no");
                    }
                }
            }
        }
    }else{
    
        if(!$yazi_title || !$yazi_icerik || !$yazi_kategori){
            header("location: yazilar.php?update=empty");
        }else{
            $yukle=$db->prepare("UPDATE yazilar SET yazi_title=? , yazi_kategori_id=?, yazi_icerik=? WHERE yazi_id=?");
            $update=$yukle->execute(array($yazi_title,$yazi_kategori,$yazi_icerik,$yazi_id));
            
            if($update){
                header("location: yazilar.php?update=yes");
            }else{
                header("location: yazilar.php?update=no");
            }
        }
    }
}

//deleting article
$yazisil_id=$_GET['yazisil_id'];
if(isset($yazisil_id)){
    //deleting photo on folder
    $sil=$db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
    $sil->execute(array($yazisil_id));
    $eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
    $eski_resim['yazi_foto'];
    unlink("../blog/images/".$eski_resim['yazi_foto']);

    $delete=$db->prepare("DELETE FROM yazilar WHERE yazi_id=?");
    $siliyoruz=$delete->execute(array($yazisil_id));

    if($siliyoruz){
        header("location: yazilar.php?update=yes");
    }else{
        header("location: yazilar.php?update=no");
    }
}

//adding categories
if(isset($_POST['kategori_ekle'])){
    if(!$kategori_title){
    header("location: kategoriler.php?sonuc=empty");
    }
    else{
    $kategoriler=$db->prepare("INSERT INTO kategoriler (kategori_title) VALUES (?) ");
    $insert=$kategoriler->execute(array($kategori_title));

        if($insert){
            header("location: kategoriler.php?update=yes");
        }
        else{
            header("location: kategoriler.php?update=no");
        }
    }
}

//updating categories

if(isset($_POST['kategori_duzenle'])){

    $kategori_id=$_GET['kategori_id'];

    if(!$kategori_title){
    header("location: kategoriler.php?update=empty");
    }
    else{
    $kategoriler=$db->prepare("UPDATE kategoriler SET kategori_title=? WHERE kategori_id=?");
    $update=$kategoriler->execute(array($kategori_title,$kategori_id));

        if($update){
            header("location: kategoriler.php?update=yes");
        }
        else{
            header("location: kategoriler.php?update=no");
        }
    }
}

//deleting categories
$kategorisil_id=$_GET['kategorisil_id'];

if(isset($kategorisil_id)){
    
    $kategoriler=$db->prepare("DELETE FROM kategoriler WHERE kategori_id=?");
    $delete=$kategoriler->execute(array($kategorisil_id));

    if($delete){
        header("location: kategoriler.php?update=yes");
    }
    else{
        header("location: kategoriler.php?update=no");
    }
}

//updating comments
if(isset($_POST['yorum_duzenle'])){

    $yorum_id=$_GET['yorum_id'];

    $yorumlar=$db->prepare("UPDATE yorumlar SET yorum_icerik=?,yorum_durum=? WHERE yorum_id=?");
    $update=$yorumlar->execute(array($yorum_icerik,$yorum_durum,$yorum_id));

        if($update){
            header("location: yorumlar.php?update=yes");
        }
        else{
            header("location: yorumlar.php?update=no");
        }
}

//deleting comments
$yorumsil_id=$_GET['yorumsil_id'];

if(isset($yorumsil_id)){
    
    $yorum=$db->prepare("DELETE FROM yorumlar WHERE yorum_id=?");
    $delete=$yorum->execute(array($yorumsil_id));

    if($delete){
        header("location: yorumlar.php?update=yes");
    }
    else{
        header("location: yorumlar.php?update=no");
    }
} 

//adding answer-comment
if(isset($_POST['yorum_cevapla'])){

    $yorum_id=$_GET['yorum_id'];

    if(!$yorum_icerik || !$yorum_yapan || !$yorum_mail || !$yorum_website){
    header("location: cevaplar.php?sonuc=empty");
    }
    else{
    $yorumlar=$db->prepare("INSERT INTO yorumlar (yorum_yapan,yorum_mail,yorum_website,yorum_yazi_id,yorum_icerik,yorum_durum,yorum_ust) VALUES (?,?,?,?,?,?,?) ");
    $insert=$yorumlar->execute(array($yorum_yapan,$yorum_mail,$yorum_website,$yorum_yazi_id,$yorum_icerik,1,$yorum_id));

        if($insert){
            $db->query("UPDATE yorumlar SET yorum_cevap=1 WHERE yorum_id=".$yorum_id);
            header("location: cevaplar.php?update=yes");
        }
        else{
            header("location: cevaplar.php?update=no");
        }
    }
}

//updating answers
if(isset($_POST['cevap_duzenle'])){

    $yorum_id=$_GET['yorum_id'];

    $yorumlar=$db->prepare("UPDATE yorumlar SET yorum_icerik=?,yorum_durum=? WHERE yorum_id=?");
    $update=$yorumlar->execute(array($yorum_icerik,$yorum_durum,$yorum_id));

        if($update){
            header("location: cevaplar.php?update=yes");
        }
        else{
            header("location: cevaplar.php?update=no");
        }
}

//deleting answers
$cevapsil_id=$_GET['cevapsil_id'];

if(isset($cevapsil_id)){
    
    $yorum=$db->prepare("DELETE FROM yorumlar WHERE yorum_id=?");
    $delete=$yorum->execute(array($cevapsil_id));

    if($delete){
        header("location: cevaplar.php?update=yes");
    }
    else{
        header("location: cevaplar.php?update=no");
    }
} 

//deleting answers
$mesajsil_id=$_GET['mesajsil_id'];

if(isset($mesajsil_id)){
    
    $mesaj=$db->prepare("DELETE FROM mesajlar WHERE mesaj_id=?");
    $delete=$mesaj->execute(array($mesajsil_id));

    if($delete){
        header("location: mesajlar.php?update=yes");
    }
    else{
        header("location: mesajlar.php?update=no");
    }
} 

    
?>