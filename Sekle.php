<?php 
    $vtabani = new mysqli("localhost", "root", "", "ozluk");

    //ogretim gorevlisi
    if ($vtabani-> real_escape_string($_POST['sayfa']) == "ogretimgorevlisi"){
        $ad = $vtabani-> real_escape_string($_POST['ad']);
        $email = $vtabani-> real_escape_string($_POST['email']);
        $status = $vtabani-> real_escape_string($_POST['status']);
        
        $sorgu = $vtabani->query("Select * FROM lecturer where lecturer_mail ='".$email."'");
        if($sorgu->num_rows<=0){
            $sorgu = 'INSERT INTO lecturer (lecturer_name, lecturer_status, lecturer_mail) VALUES (?,?,?)';
            $hazirla = $vtabani->prepare($sorgu);
            $hazirla->bind_param("sis", $ad, $status, $email);
            $hazirla->execute();
            echo 'Ekleme işlemi tamamlandı.';
            $vtabani->close();
        }
        else{
            echo 'Zaten bu maile sahip bir öğretim görevlisi var.';
            $vtabani->close();
        }
    }


    //ders
    else if ($vtabani-> real_escape_string($_POST['sayfa']) == "dersler"){
        $dersadi = $vtabani-> real_escape_string($_POST['dersadi']);
        $time = $vtabani-> real_escape_string($_POST['time']);
        $zorunluluk = $vtabani-> real_escape_string($_POST['zorunluluk']);
        
        $sorgu = $vtabani->query("Select * FROM course where course_name ='".$dersadi."'");
        if($sorgu->num_rows<=0){
            $sorgu = 'INSERT INTO course (course_name, course_mandatory, course_length) VALUES (?,?,?)';
            $hazirla = $vtabani->prepare($sorgu);
            $hazirla->bind_param("sid", $dersadi, $zorunluluk, $time);
            $hazirla->execute();
            echo 'Ekleme işlemi tamamlandı.';
            $vtabani->close();
        }
        else{
            echo 'Zaten bu ders adına sahip bir ders var.';
            $vtabani->close();
        }
    }

    //derslik
    else if ($vtabani-> real_escape_string($_POST['sayfa']) == "derslikler"){
        $derslikadi = $vtabani-> real_escape_string($_POST['derslikadi']);
        $kapasite = $vtabani-> real_escape_string($_POST['kapasite']);
        $tur = $vtabani-> real_escape_string($_POST['tur']);
        
        $sorgu = $vtabani->query("Select * FROM classroom where classroom_name ='".$derslikadi."'");
        if($sorgu->num_rows<=0){
            $sorgu = 'INSERT INTO classroom (classroom_name, classroom_capacity, classroom_type) VALUES (?,?,?)';
            $hazirla = $vtabani->prepare($sorgu);
            $hazirla->bind_param("sis", $derslikadi, $kapasite, $tur);
            $hazirla->execute();
            echo 'Ekleme işlemi tamamlandı.';
            $vtabani->close();
        }
        else{
            echo 'Zaten bu derslik adına sahip bir derslik var.';
            $vtabani->close();
        }
    }

    else if ($vtabani-> real_escape_string($_POST['sayfa']) == "programlar"){
        $programAdi = $vtabani-> real_escape_string($_POST['programAdi']);
        $sinifSenesi = $vtabani-> real_escape_string($_POST['sinifSenesi']);
        $ogrenciSayisi = $vtabani-> real_escape_string($_POST['ogrenciSayisi']);
        $sorgu = $vtabani->query('Select * FROM program where program_name ="'.$programAdi.'" and program_class = '.$sinifSenesi);
        if($sorgu->num_rows<=0){
            $sorgu = 'INSERT INTO program (program_name, program_class, program_headcount) VALUES (?,?,?)';
            $hazirla = $vtabani->prepare($sorgu);
            $hazirla->bind_param("sii", $programAdi, $sinifSenesi, $ogrenciSayisi);
            $hazirla->execute();
            echo 'Ekleme işlemi tamamlandı.';
            $vtabani->close();
        }
        else{
            echo 'Zaten bu isimde bir program bulunuyor.';
            $vtabani->close();
        }
    }






    else{
        echo "Sayfa hatası";
        $vtabani->close();
    }