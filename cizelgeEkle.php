<?php 
    $vtabani = new mysqli("localhost", "root", "", "ozluk");

    if ($vtabani-> real_escape_string($_POST['sayfa']) == "dersprogrami"){

        $timetable_id = 1; // example value

        $programAdi= $vtabani-> real_escape_string($_POST['programAdi']);;
		$derslikAdi= $vtabani-> real_escape_string($_POST['derslikAdi']);;
		$dersAdi = $vtabani-> real_escape_string($_POST['dersAdi']);;
        $dersZorunlu = $vtabani-> real_escape_string($_POST['dersZorunlu']);;
		$ogrAdi = $vtabani-> real_escape_string($_POST['ogrAdi']);;
        $gunAdi = $vtabani-> real_escape_string($_POST['gunAdi']);;
		$baslangicSaati= $vtabani-> real_escape_string($_POST['baslangicSaati']);;
		$bitisSaati = $vtabani-> real_escape_string($_POST['bitisSaati']);;
        
        
        // Check if the class already exists
        $check_query = "SELECT * FROM courseschedule WHERE course_id = ? AND program_id = ? AND lecturer_id = ? AND classroom_id = ? AND course_start = ? AND course_end = ? AND course_day = ?";
        $check_stmt = $vtabani->prepare($check_query);
        $check_stmt->bind_param("iiiisss", $dersAdi, $programAdi, $ogrAdi, $derslikAdi, $baslangicSaati, $bitisSaati, $gunAdi);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        if ($check_result->num_rows > 0) {
            echo 'Bu ders zaten mevcut.';
        } else {
            // Check for clash with existing courses
            $clash_query = "SELECT * FROM courseschedule AS cs
            JOIN course AS c ON cs.course_id = c.course_id
            WHERE 
                cs.course_day = ? AND (
                    (cs.classroom_id = ? AND 
                    (
                        (cs.course_start >= ? AND cs.course_end <= ?) OR
                        (cs.course_start >= ? AND cs.course_end >= ? AND cs.course_start <= ?) OR
                        (cs.course_start <= ? AND cs.course_end >= ?) OR
                        (cs.course_start <= ? AND cs.course_end <= ? AND cs.course_end >= ?)
                    )) OR 
                    (cs.program_id = ? AND 
                    (
                        (cs.course_start >= ? AND cs.course_end <= ?) OR
                        (cs.course_start >= ? AND cs.course_end >= ? AND cs.course_start <= ?) OR
                        (cs.course_start <= ? AND cs.course_end >= ?) OR
                        (cs.course_start <= ? AND cs.course_end <= ? AND cs.course_end >= ?)
                    )) OR 
                    (cs.lecturer_id = ? AND 
                    (
                        (cs.course_start >= ? AND cs.course_end <= ?) OR
                        (cs.course_start >= ? AND cs.course_end >= ? AND cs.course_start <= ?) OR
                        (cs.course_start <= ? AND cs.course_end >= ?) OR
                        (cs.course_start <= ? AND cs.course_end <= ? AND cs.course_end >= ?)
                    ))
                );
                ";


            $clash_stmt = $vtabani->prepare($clash_query);
            $clash_stmt->bind_param("siiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii", 
                $gunAdi,         // s
                $derslikAdi,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $bitisSaati,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $baslangicSaati, // i  
                $programAdi,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $bitisSaati,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $baslangicSaati, // i  
                $ogrAdi,         // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $bitisSaati,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $baslangicSaati, // i
                $bitisSaati,     // i
                $baslangicSaati, // i  
            );

            $clash_stmt->execute();
            $clash_result = $clash_stmt->get_result();
            if ($clash_result->num_rows > 0) {
                $clash_row = $clash_result->fetch_assoc();
                if ($clash_row['classroom_id'] == $derslikAdi) {
                    echo "Derslik hata";
                } else if ($clash_row['program_id'] == $programAdi) {
                    $mandatory_query = "SELECT course_mandatory FROM course WHERE course_id = ?";
                    $mandatory_stmt = $vtabani->prepare($mandatory_query);
                    $mandatory_stmt->bind_param("i", $dersAdi);
                    $mandatory_stmt->execute(); 
                    $mandatory_stmt->bind_result($course_mandatory);
                    $mandatory_stmt->fetch();
                    $mandatory_stmt->close();
                    if ($course_mandatory == 1 || $dersZorunlu == 'Z') {
                    echo "Program hata";
                    }else{
                        $clash_stmt->close();
                        // Proceed with update
                        $sorgu = 'INSERT INTO courseschedule (timetable_id, course_id, program_id, lecturer_id, classroom_id, course_start, course_end, course_day) VALUES (?,?,?,?,?,?,?,?)';
                        $hazirla = $vtabani->prepare($sorgu);
                        $hazirla->bind_param("iiiiisss", $timetable_id, $dersAdi, $programAdi, $ogrAdi, $derslikAdi, $baslangicSaati, $bitisSaati, $gunAdi);
                        $hazirla->execute();
                        echo 'Ekleme işlemi tamamlandı.';
                    }   
                } else if ($clash_row['lecturer_id'] == $ogrAdi) {
                    echo "Ogr hata";
                }
            } else {
                // Proceed with insertion
                $sorgu = 'INSERT INTO courseschedule (timetable_id, course_id, program_id, lecturer_id, classroom_id, course_start, course_end, course_day) VALUES (?,?,?,?,?,?,?,?)';
                $hazirla = $vtabani->prepare($sorgu);
                $hazirla->bind_param("iiiiisss", $timetable_id, $dersAdi, $programAdi, $ogrAdi, $derslikAdi, $baslangicSaati, $bitisSaati, $gunAdi);
                $hazirla->execute();
                echo 'Ekleme işlemi tamamlandı.';
            }
        }
    } else {
        echo "Sayfa hatası";
    }
    $vtabani->close();
?>

