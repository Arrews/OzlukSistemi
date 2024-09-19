<?php
    $vtabani = new mysqli("localhost", "root", "", "ozluk");
    if ($vtabani-> real_escape_string($_POST['silsayfa']) == "dersler"){
        $id = $vtabani-> real_escape_string($_POST['table_id']);
        $vtabani->execute_query("Delete FROM course where course_id ='".$id."'");
        $vtabani->close();
        echo 'Silme İşlemi Başarılı';
    }
    else if ($vtabani-> real_escape_string($_POST['silsayfa']) == "ogretimgorevlisi"){
        $id = $vtabani-> real_escape_string($_POST['table_id']);
        $vtabani->execute_query("Delete FROM lecturer where lecturer_id ='".$id."'");
        $vtabani->close();
        echo 'Silme İşlemi Başarılı';
    }
    else if ($vtabani-> real_escape_string($_POST['silsayfa']) == "derslik"){
        $id = $vtabani-> real_escape_string($_POST['table_id']);
        $vtabani->execute_query("Delete FROM classroom where classroom_id ='".$id."'");
        $vtabani->close();
        echo 'Silme İşlemi Başarılı';
    }
    else if ($vtabani-> real_escape_string($_POST['silsayfa']) == "program"){
        $id = $vtabani-> real_escape_string($_POST['table_id']);
        $vtabani->execute_query("Delete FROM program where program_id ='".$id."'");
        $vtabani->close();
        echo 'Silme İşlemi Başarılı';
    }
    else{
        $vtabani->close();
        echo 'Silme İşlemi Başarısız';
    }
?>