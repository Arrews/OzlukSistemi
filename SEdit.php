<?php
    $vtabani = new mysqli("localhost", "root", "", "ozluk");
    if ($vtabani-> real_escape_string($_POST['editsayfa']) == "dersler"){
        $id = $vtabani-> real_escape_string($_POST['table_id']);
        $ad = $vtabani-> real_escape_string($_POST['ders_adi']);
        $saat = $vtabani-> real_escape_string($_POST['ders_saati']);
        $durum = $vtabani-> real_escape_string($_POST['ders_durumu']);
        $vtabani->execute_query("UPDATE course SET course_name = '".$ad."', course_mandatory = '".$durum."', course_length = '".$saat."' WHERE course_id = '".$id."'");
        $vtabani->close();
        echo 'Düzenleme Başarılı';
        
    }
    else if ($vtabani-> real_escape_string($_POST['editsayfa']) == "ogretimgorevlisi"){
        $id = $vtabani-> real_escape_string($_POST['table_id']);
        $ad = $vtabani-> real_escape_string($_POST['ad']);
        $email = $vtabani-> real_escape_string($_POST['email']);
        $durum = $vtabani-> real_escape_string($_POST['durum']);
        $vtabani->execute_query("UPDATE lecturer SET lecturer_name = '".$ad."', lecturer_status = '".$durum."', lecturer_mail = '".$email."' WHERE lecturer_id = '".$id."'");
        $vtabani->close();
        echo 'Düzenleme Başarılı';
    }
    else if ($vtabani-> real_escape_string($_POST['editsayfa']) == "derslikler"){
        $id = $vtabani-> real_escape_string($_POST['table_id']);
        $ad = $vtabani-> real_escape_string($_POST['ad']);
        $kapasite = $vtabani-> real_escape_string($_POST['kapasite']);
        $turu = $vtabani-> real_escape_string($_POST['tur']);
        $vtabani->execute_query("UPDATE classroom SET classroom_name = '".$ad."', classroom_capacity = '".$kapasite."', classroom_type = '".$turu."' WHERE classroom_id = '".$id."'");
        $vtabani->close();
        echo 'Düzenleme Başarılı';
    }
    else if ($vtabani-> real_escape_string($_POST['editsayfa']) == "program"){
        $id = $vtabani-> real_escape_string($_POST['table_id']);
        $ad = $vtabani-> real_escape_string($_POST['programAdi']);
        $sinifSenesi = $vtabani-> real_escape_string($_POST['sinifSenesi']);
        $ogrenciSayisi = $vtabani-> real_escape_string($_POST['ogrenciSayisi']);
        $vtabani->execute_query("UPDATE program SET program_name = '".$ad."', program_class = '".$sinifSenesi."', program_headcount = '".$ogrenciSayisi."' WHERE program_id = '".$id."'");
        $vtabani->close();
        echo 'Düzenleme Başarılı';
    }
    else{
        $vtabani->close();
        echo 'Düzenleme Başarısız';
    }
?>