<?php 
include_once 'permission.php';
$vtabani = new mysqli("localhost", "root", "", "ozluk");

if(session_id() == ''){
  session_start();
}
if (!isset($_SESSION['giris'])){
  echo'


<script type="text/javascript">
  document.location.href = "/erlik/giris.php";
  </script>'; 
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
		<link rel="stylesheet" href="/erlik/css/globals.css?v=0.32" />
		<link rel="stylesheet" href="/erlik/css/styleguide.css?v=0.12" />
		<link rel="stylesheet" href="/erlik/css/dersprogrami.css?v=0.43" />
		<link rel="stylesheet" href="/erlik/css/sidebar.css?v=0.141" />
		<link rel="stylesheet" href="/erlik/css/header.css?v=0.121" />
		<title>Ders Programı</title>
	</head>
	<body>
		<div class="izelge" id="mainPageAll">
			<?php include "header.php";?>
			<div class="main-container">
				<div class="periodmenu-area" id="periodmenu">
					<div class="periodmenu">
						<div class="periodmenu-title-area">
							<div class="periodmenu-title">Periyotları Ayarlarma</div>
							<div class="periodmenu-title-exp"> Periyot Sırası - Başlagıç Saati - Bitiş Saati</div>
						</div>
						<div class="periodmenu-inputs">
						<?php
						if (check_admin_perm()) {
							$query = "SELECT period_no, period_start, period_end FROM period";
							$sorgu = $vtabani->query($query);
							foreach($sorgu as $veri){
								$period_no = $veri['period_no'];
								$period_start = $veri['period_start'];
								$period_end = $veri['period_end'];
							echo '
								<div class="periodmenu-input-with-label" id="periodE'.$period_no.'">
									<label class="periodmenu-input-label">1.Periyot: </label>
									<div class="periodmenu-input-group">
										<input class="periodmenu-input" id="'.$period_no.'Start" type="time" name="" value="'.$period_start.'" />
										<span>-</span>
										<input class="periodmenu-input" id="'.$period_no.'End" type="time" name="" value="'.$period_end.'" />
									</div>
								</div>
								';
							}
						}
						?>
						</div>
						<div class="periodmenu-buttons">
								<a id="periodmenu-cancelbutton"> <!--A etiketinin bir anlamı yok ama iptal etme eyleminde belki AJAX gönderirsiniz diye koydum, kullanmayacaksanız kaldırın! -->
									<button class="periodmenu-cancelbutton" onclick="periodMenu(false)">İptal Et</button>
								</a>
								<a id="periodmenu-savebutton">
									<button class="periodmenu-savebutton" onclick="periodEdit()">Kaydet Et</button>
								</a>
						</div>
					</div>
				</div>
				<div class="program-nav">
					<div class="buttons">
						<div class="raporlar" id="raporlar" onclick="dersProgramGorunum('list')">
							<div class="text-wrapper" id="raporlarText">Ders Programı Görüntüleme</div>
						</div>	
						<img class="divider" src="img/divider-2.svg" />
						<?php
							if (check_admin_perm()) {
							echo '
								<div class="kullanclar" id="kullanicilar" onclick="dersProgramGorunum(\'create\')">
								<div class="text-wrapper" id="kullanicilarText">Ders Programı Oluşturma</div>
								</div>
							';
							} else {
							echo '
								<div class="kullanclar" id="kullanicilar" style="opacity: 0.5; cursor: not-allowed; pointer-events: none; transition: none;">
								<div class="text-wrapper" id="kullanicilarText">Ders Programı Oluşturma</div>
								</div>
							';
							}
						?>

					</div>
					<!-- Input create kısmı -->
					<?php
						if (check_admin_perm()) {
							echo '
							<div class="inputs-create" id="inputs-create" style="display:none;">
								<div class="div">
									<div class="column">
										<div class="input">
											<div class="input-state-layer">
												<div class="input-with-label">
													<div class="title">Program</div>
													<div class="input-layer">
														<div class="input-2">
															<select class="text" id="cProgram">
															<option value="EKLEME">Program Seçiniz</option>
															';
																$query = "SELECT program_id, program_name FROM program ORDER BY program_name";
																$sorgu = $vtabani->query($query);
																foreach($sorgu as $veri){
																	$programId = $veri['program_id'];
																	$programName = $veri['program_name'];
																	echo '<option value="'.$programId.'" >'.$programName.'</option>';
																}
															echo '</select>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="input">
											<div class="input-state-layer">
												<div class="input-with-label">
													<div class="title">Derslik</div>
													<div class="input-layer">
														<div class="input-2">
															<select class="text" id="cDerslik">
															<option value="EKLEME">Derslik Seçiniz</option>
															';
																$query = "SELECT classroom_id, classroom_name FROM classroom ORDER BY classroom_name";
																$sorgu = $vtabani->query($query);
																foreach($sorgu as $veri){
																	$classroomId = $veri['classroom_id'];
																	$classroomName = $veri['classroom_name'];
																	echo '<option value="'.$classroomId.'">'.$classroomName.'</option>';
																}
															echo '</select>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="column">
										<div class="input">
											<div class="input-state-layer">
												<div class="input-with-label">
													<div class="title">Ders</div>
													<div class="input-layer">
														<div class="input-2">
															<select class="text" id="cDers">
															<option value="EKLEME">Ders Seçiniz</option>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="input">
											<div class="input-state-layer">
												<div class="input-with-label">
													<div class="title">Öğretim Görevlisi</div>
													<div class="input-layer">
														<div class="input-2">
															<select class="text" id="cOgr">
															<option value="EKLEME">Öğretim Görevlisi Seçiniz</option>
															';
																$query = "SELECT lecturer_id, lecturer_name FROM lecturer ORDER BY lecturer_name";
																$sorgu = $vtabani->query($query);
																foreach($sorgu as $veri){
																	$lecturerId = $veri['lecturer_id'];
																	$lecturerName = $veri['lecturer_name'];
																	echo '<option value="'.$lecturerId.'">'.$lecturerName.'</option>';
																}
															echo '</select>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="column">
										<div class="input">
											<div class="input-state-layer">
												<div class="input-with-label">
													<div class="title">Gün</div>
													<div class="input-layer">
														<div class="input-2">
															<select class="text" id="cDay">
																<option value="EKLEME">Gün Seçiniz</option>
																<option value="Pazartesi">Pazartesi</option>
																<option value="Sali">Sali</option>
																<option value="Carsamba">Carsamba</option>
																<option value="Persembe">Persembe</option>
																<option value="Cuma">Cuma</option>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="input">
											<div class="input-state-layer">
												<div class="input-with-label">
													<div class="title">Ders Aralığı</div>
													<div class="input-state-layer" style="flex-direction: row">
														<div class="input-with-label" style="width: fit-content;">
															<div class="input-layer">
																<select class="text" id="periodStart">
																	<option value="EKLEME">Başlangıç Saatini Seçiniz</option>
																	';
																		$query = "SELECT period_no, period_start FROM period ORDER BY period_no";
																		$sorgu = $vtabani->query($query);
																		foreach($sorgu as $veri){
																			$periodNo = $veri['period_no'];
																			$periodStart = new DateTime($veri['period_start']);
																			echo '<option value="'.$periodNo.'">'.$periodNo.') '.$periodStart->format('H:i').'</option>';
																		}
																	echo '
																</select>
															</div>
														</div>
														<div class="input-with-label" style="width: fit-content;">
															<div class="input-layer">
																<select class="text" id="periodEnd">
																	<option value="EKLEME">Bitiş Saatini Seçiniz</option>
																	';
																		$query = "SELECT period_no, period_end FROM period ORDER BY period_no";
																		$sorgu = $vtabani->query($query);
																		foreach($sorgu as $veri){
																			$periodNo = $veri['period_no'];
																			$periodEnd = new DateTime($veri['period_end']);
																			echo '<option value="'.$periodNo.'">'.$periodNo.') '.$periodEnd->format('H:i').'</option>';
																		}
																	echo '
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<button class="button-2" id="cizelgeEkle">
									<img class="plus" src="img/plus-4.svg" />
									<div class="text-wrapper-2" >Ekle</div>
								</button>
								<button class="button-2" id="cizelgeEdit">
									<img class="plus" src="img/plus-4.svg" />
									<div class="text-wrapper-2" >Düzenle</div>
								</button>
							</div>';
						} ?>
					<div class="inputs-list" id="inputs-list">
						<div class="inputs-2">
							<div class="input-state-layer-wrapper">
								<div class="input-state-layer">
									<div class="input-with-label">
										<div class="title">Görüntüleme Türü</div>
										<div class="input-layer">
											<div class="input-2">
												<select class="text" id="listType">
													<option value="ARAMA">Liste tipi seçiniz</option>
													<option value="program">Program</option>
													<option value="course">Dersler</option>
													<option value="lecturer">Öğretim Görevlisi</option>
													<option value="classroom">Derslikler</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="input-state-layer-wrapper">
								<div class="input-state-layer">
									<div class="input-with-label">
										<div class="title">Tablo Adı</div>
										<div class="input-layer">
											<div class="input-2">
											<select class="text" id="listName">
											</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button class="button-2" id="cizelgeListele">
							<div class="text-wrapper-2">Listele</div>
						</button>
					</div>
				</div>
				<div class="timetable">
				<div class="timeArea"> <!-- space'in içersine button eklendi, periot ayarlama kısmı için --> <!-- 253, 295, 364, 365 ve 377'de html elementlerine style atti'si verildi-->
						<div class="space" style="border-top-left-radius: 8px;">
							<button class="period-btn" onclick="periodMenu(true)" title="Periyot değerlerini ayarlamak için tıkla.">
								<div class="period-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<path d="M10 0C9.72387 0 9.50002 0.223858 9.50002 0.5V3C9.50002 3.27614 9.72387 3.5 10 3.5C10.2762 3.5 10.5 3.27614 10.5 3V1.01389C12.4035 1.11977 14.2292 1.82801 15.7096 3.04291C17.3191 4.36384 18.4209 6.202 18.8271 8.24419C18.9099 8.66058 18.9628 9.08021 18.9861 9.5H17C16.7239 9.5 16.5 9.72386 16.5 10C16.5 10.2761 16.7239 10.5 17 10.5H18.9861C18.9138 11.8001 18.5596 13.0783 17.9373 14.2426C16.9558 16.0789 15.3679 17.5181 13.4442 18.3149C12.5006 18.7058 11.5049 18.9302 10.5 18.9861V17C10.5 16.7239 10.2762 16.5 10 16.5C9.72387 16.5 9.50002 16.7239 9.50002 17V18.9861C8.78817 18.9465 8.07891 18.8222 7.38745 18.6125C5.39491 18.008 3.67359 16.7314 2.51679 15.0001C1.61773 13.6546 1.10288 12.0991 1.0139 10.5H3.00002C3.27616 10.5 3.50002 10.2761 3.50002 10C3.50002 9.72386 3.27616 9.5 3.00002 9.5H1.01391C1.021 9.37264 1.03081 9.24523 1.04335 9.11784C1.24744 7.04567 2.16372 5.10837 3.63606 3.63604C3.83132 3.44077 3.83132 3.12419 3.63606 2.92893C3.44079 2.73367 3.12421 2.73367 2.92895 2.92893C1.29302 4.56486 0.274937 6.71741 0.0481687 9.01983C-0.1786 11.3222 0.399977 13.6321 1.68532 15.5557C2.97066 17.4793 4.88323 18.8978 7.09717 19.5694C9.3111 20.241 11.6894 20.1242 13.8268 19.2388C15.9643 18.3534 17.7286 16.7543 18.8192 14.714C19.9098 12.6736 20.2592 10.3182 19.8079 8.0491C19.3565 5.78 18.1323 3.7376 16.3439 2.2699C14.5555 0.802193 12.3136 0 10 0Z" fill="#61677A"/>
										<path d="M5.35357 4.64645C5.15831 4.45118 4.84172 4.45118 4.64646 4.64645C4.4512 4.84171 4.4512 5.15829 4.64646 5.35355L9.64646 10.3536C9.84172 10.5488 10.1583 10.5488 10.3536 10.3536C10.5488 10.1583 10.5488 9.84171 10.3536 9.64645L5.35357 4.64645Z" fill="#61677A"/>
									</svg>
								</div>
							</button>
						</div>
						<?php
							$periodQuery = "SELECT period_no, period_start, period_end FROM period";
							$periodSorgu = $vtabani->query($periodQuery);
							foreach($periodSorgu as $periodVeri){
								$periodNo = $periodVeri['period_no'];
								$periodStart = new DateTime($periodVeri['period_start']);
								$periodEnd = new DateTime($periodVeri['period_end']);
								
								echo '<div class="time" id="period'.$periodNo.'">
										<div class="timeTitle">'.$periodStart->format('H:i').'</div>
										<div class="timeTitle">'.$periodEnd->format('H:i').'</div>
									</div>';
							}
						?>
					</div>
					<div class="day">
						<div class="dayName">
							<div class="dayTitle">Pazartesi</div>
						</div>
						<div class="dayContent" id="Pazartesi">
							<div class="dayCell" id="Pazartesi1"></div>
							<div class="dayCell" id="Pazartesi2"></div>
							<div class="dayCell" id="Pazartesi3"></div>
							<div class="dayCell" id="Pazartesi4"></div>
							<div class="dayCell" id="Pazartesi5"></div>
							<div class="dayCell" id="Pazartesi6"></div>
							<div class="dayCell" id="Pazartesi7"></div>
							<div class="dayCell" id="Pazartesi8"></div>
							<div class="dayCell" id="Pazartesi9"></div>
						</div>
					</div>
					<div class="day">
						<div class="dayName">
							<div class="dayTitle">Salı</div>
						</div>
						<div class="dayContent" id="Sali">
							<div class="dayCell" id="Sali1"></div>
							<div class="dayCell" id="Sali2"></div>
							<div class="dayCell" id="Sali3"></div>
							<div class="dayCell" id="Sali4"></div>
							<div class="dayCell" id="Sali5"></div>
							<div class="dayCell" id="Sali6"></div>
							<div class="dayCell" id="Sali7"></div>
							<div class="dayCell" id="Sali8"></div>
							<div class="dayCell" id="Sali9"></div>
						</div>
					</div>
					<div class="day">
						<div class="dayName">
							<div class="dayTitle">Çarşamba</div>
						</div>
						<div class="dayContent" id="Carsamba">
							<div class="dayCell" id="Carsamba1"></div>
							<div class="dayCell" id="Carsamba2"></div>
							<div class="dayCell" id="Carsamba3"></div>
							<div class="dayCell" id="Carsamba4"></div>
							<div class="dayCell" id="Carsamba5"></div>
							<div class="dayCell" id="Carsamba6"></div>
							<div class="dayCell" id="Carsamba7"></div>
							<div class="dayCell" id="Carsamba8"></div>
							<div class="dayCell" id="Carsamba9"></div>
						</div>
					</div>
					<div class="day">
						<div class="dayName">
							<div class="dayTitle">Perşembe</div>
						</div>
						<div class="dayContent" id="Persembe">
							<div class="dayCell" id="Persembe1"></div>
							<div class="dayCell" id="Persembe2"></div>
							<div class="dayCell" id="Persembe3"></div>
							<div class="dayCell" id="Persembe4"></div>
							<div class="dayCell" id="Persembe5"></div>
							<div class="dayCell" id="Persembe6"></div>
							<div class="dayCell" id="Persembe7"></div>
							<div class="dayCell" id="Persembe8"></div>
							<div class="dayCell" id="Persembe9"></div>
						</div>
					</div>
					<div class="day">
						<div class="dayName">
							<div class="dayTitle">Cuma</div>
						</div>
						<div class="dayContent" id="Cuma">
							<div class="dayCell" id="Cuma1"></div>
							<div class="dayCell" id="Cuma2"></div>
							<div class="dayCell" id="Cuma3"></div>
							<div class="dayCell" id="Cuma4"></div>
							<div class="dayCell" id="Cuma5"></div>
							<div class="dayCell" id="Cuma6"></div>
							<div class="dayCell" id="Cuma7"></div>
							<div class="dayCell" id="Cuma8"></div>
							<div class="dayCell" id="Cuma9"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="message-box" style="display:none;">
				<div class="main-text">Yapılan değişiklikleri onaylıyor musun?</div>
				<div class="buttons-2">
					<div class="cancel">
						<div class="button-text">Hayır</div>
					</div>
					<div class="ok">
						<div class="button-text-2">Evet</div>
					</div>
				</div>
			</div>
			<div class="alert-bar-divider" id="alertBar" style="display:flex;">
				<div class="alert-bar" id="olumlu-alert" style="display:none;">
					<div class="alert-bar-content">
						<img class="alert-icon" src="img/property-1-successful.svg" />
						<div class="message" id="olumlu-alert-mesaj"></div>
						<a href="#" onClick="bildirimKapat('olumlu')">
							<img class="alert-icon" src="img/alert-rigth-icon.svg" />
						</a>
					</div>
					<div class="alert-bar-progress" id="olumlu-alert-progress"></div>
				</div>
				<div class="alert-bar" id="olumsuz-alert" style="display:none;">
					<div class="alert-bar-content">
						<img class="alert-icon" src="img/property-1-wrong.svg" />
						<div class="message" id="olumsuz-alert-mesaj"></div>
						<a href="#" onClick="bildirimKapat('olumsuz')">
							<img class="alert-icon" src="img/alert-rigth-icon-wrong.svg" />
						</a>
					</div>
					<div class="alert-bar-progress" id="olumsuz-alert-progress"></div>
				</div>
			</div>
		</div>
		<?php include "sidebar.php"; ?>
	</body>
	<script src="index.js?v=0.01"></script>
	<script src="sidebar.js?v=0.03"></script>
	<script src="dersprogrami.js?v=1.20"></script>
</html>