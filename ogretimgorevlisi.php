<?php 
include_once 'permission.php';


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
		<link rel="stylesheet" href="/erlik/css/ogretimgorevlisi.css?v=0.192" />
		<link rel="stylesheet" href="/erlik/css/sidebar.css?v=0.141" />
		<link rel="stylesheet" href="/erlik/css/header.css?v=0.121" />
		<title>Öğretim Görevlileri</title>
	</head>
	<body>
	<?php
		if (check_admin_perm()) {
			echo '
			<div class="input-area" id="ogretimgorevlisiEklemeSayfasi" style="display:none;">
				<div class="input-area-lecturer">
					<div class="title-and-buttons-area">
						<div class="title" id="mainTitle">Öğretim Görevlisi Ekleme</div>
						<div class="buttons">
							<a href="#" onclick="ogretimgorevlisiEklemeSayfasiAc(\'ogretimGorevlisiSayfasiIptal\')">
								<div class="cancel-button">
									<div class="cancel-button-state-layer">
										<div class="cancel-button-icon">
											<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M4 20.5L20 4.5M4 4.5L20 20.5" stroke="#94A8DE" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</div>
										<div class="cancel-button-text">İptal Et</div>
									</div>
								</div>
							</a>
							<a href="#" id="ogretimGorevlisiEkle">
								<div class="save-button">
									<div class="save-button-state-layer">
										<div class="save-button-icon">
											<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M5 2.5C4.20435 2.5 3.44129 2.81607 2.87868 3.37868C2.31607 3.94129 2 4.70435 2 5.5V19.5C2 20.2957 2.31607 21.0587 2.87868 21.6213C3.44129 22.1839 4.20435 22.5 5 22.5H19C19.7957 22.5 20.5587 22.1839 21.1213 21.6213C21.6839 21.0587 22 20.2957 22 19.5V8.5C22 8.23478 21.8946 7.98043 21.7071 7.79289L16.7071 2.79289C16.5196 2.60536 16.2652 2.5 16 2.5H5ZM5 4.5C4.73478 4.5 4.48043 4.60536 4.29289 4.79289C4.10536 4.98043 4 5.23478 4 5.5V19.5C4 19.7652 4.10536 20.0196 4.29289 20.2071C4.48043 20.3946 4.73478 20.5 5 20.5H6V13.5C6 12.9477 6.44772 12.5 7 12.5H17C17.5523 12.5 18 12.9477 18 13.5V20.5H19C19.2652 20.5 19.5196 20.3946 19.7071 20.2071C19.8946 20.0196 20 19.7652 20 19.5V8.91421L15.5858 4.5H8V7.5H15C15.5523 7.5 16 7.94772 16 8.5C16 9.05228 15.5523 9.5 15 9.5H7C6.44772 9.5 6 9.05228 6 8.5V4.5H5ZM8 14.5V20.5H16V14.5H8Z" fill="#FCFAFA"/>
											</svg>
										</div>
										<div class="save-button-text">Kaydet</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="inputs">
						<div class="input-iteams-column">
							<div class="input">
								<div class="input-with-label">
									<div class="input-label">Ad Soyad</div>
									<div class="input-layer">
										<input type="text" class="input-type-text" id="ad"/>
									</div>
								</div>
							</div>
							<div class="input">
								<div class="input-with-label">
									<div class="input-label">E-Mail</div>
									<div class="input-layer">
										<input type="email" class="input-type-text" id="email"/>
									</div>
								</div>
							</div>
						</div>
						<div class="input-iteams-column">
							<div class="input">
								<div class="input-label">Aktif Eğitim Durumu</div>
								<div class="input-radiobutons-layer">
									<div class="input-type-radiobutton-with-text">
										<input type="radio" class="input-type-radiobutton" name="aktiflik" id="devam"/>
										<div class="input-type-radiobutton-text">Devam Eden Eğitmen</div>
									</div>
									<div class="input-type-radiobutton-with-text">
										<input type="radio" class="input-type-radiobutton" name="aktiflik" id="eski"/>
										<div class="input-type-radiobutton-text">Eski Eğitmen</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
		}
	?>

		<div class="retim-grevlileri" id="mainPageAll"> 
			<?php include "header.php";?> 
			<div class="main-container">
			<div class="main-title-placement">
				<div class="main-title">Öğretim Görevlileri Tablosu</div>
				<?php
					if (check_admin_perm()) {
					echo '
						<a href="#" onclick="ogretimgorevlisiEklemeSayfasiAc(\'ekle\')">
						<div class="add-btn">
							<div class="plus">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M4 12H20M12 4V20" stroke="#FCFAFA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							</div>
							<div class="text-wrapper">Ekle</div>
						</div>
						</a>
					';
					} else {
					echo '
						<a href="#" onclick="ogretimgorevlisiEklemeSayfasiAc(\'ekle\')" style="pointer-events: none;">
						<div class="add-btn" style="opacity: 0.5; cursor: not-allowed; transition: none;">
							<div class="plus">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M4 12H20M12 4V20" stroke="#FCFAFA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							</div>
							<div class="text-wrapper">Ekle</div>
						</div>
						</a>
					';
					}
				?>

			</div>
			<div class="table">
				<div class="search-area">
					<div class="search-inputs">
						<input type="text" class="search-text" id="ogrAranan" placeholder="Arama"/>
						<a href="#" class="search-btn" id="ogrArama">
							<div class="search-btn">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M20 20L15.8033 15.8033M18 10.5C18 6.35786 14.6421 3 10.5 3C6.35786 3 3 6.35786 3 10.5C3 14.6421 6.35786 18 10.5 18C14.6421 18 18 14.6421 18 10.5Z" stroke="#61677A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
						</a>
					</div>
					<div class="search-inputs">
						<select class=" search-select" id="aramaSutun">
							<option value="ARAMA">Sütun Seç</option>
							<option value="lecturer_name">Öğretim Görevlisi Adı</option>
							<option value="lecturer_mail">E-mail</option>
							<option value="lecturer_status">Aktif Eğitim Durumu</option>
						</select>
					</div>
				</div>
				<div class="course-table">
					<div class="header-row">
						<div class="cell" style="border: none;">
							<div class="content" ></div>
						</div>
						<div class="content-wrapper" style="border: none;">
							<div class="content">
								<div class="title">Öğretim Görevlisi Adı</div>
								<a href="#">
									<div class="sort-icon">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11.3535 2.64645C11.1583 2.45118 10.8417 2.45118 10.6464 2.64645L7.46444 5.82843C7.26918 6.02369 7.26918 6.34027 7.46444 6.53553C7.6597 6.7308 7.97628 6.7308 8.17155 6.53553L10.5 4.20711V13H11.5V4.20711L13.8284 6.53553C14.0237 6.7308 14.3402 6.7308 14.5355 6.53553C14.7308 6.34027 14.7308 6.02369 14.5355 5.82843L11.3535 2.64645Z" fill="#61677A"/>
											<path d="M5.35353 13.3536L8.53551 10.1716C8.73077 9.97631 8.73077 9.65973 8.53551 9.46447C8.34025 9.2692 8.02366 9.2692 7.8284 9.46447L5.49997 11.7929L5.49997 3L4.49997 3L4.49997 11.7929L2.17155 9.46447C1.97628 9.2692 1.6597 9.2692 1.46444 9.46447C1.26918 9.65973 1.26918 9.97631 1.46444 10.1716L4.64642 13.3536C4.84168 13.5488 5.15826 13.5488 5.35353 13.3536Z" fill="#61677A"/>
										</svg>
									</div>
								</a>
							</div>
						</div>
						<div class="content-wrapper" style="border: none;">
							<div class="content">
								<div class="title">E-Mail</div>
								<a href="#">
									<div class="sort-icon">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11.3535 2.64645C11.1583 2.45118 10.8417 2.45118 10.6464 2.64645L7.46444 5.82843C7.26918 6.02369 7.26918 6.34027 7.46444 6.53553C7.6597 6.7308 7.97628 6.7308 8.17155 6.53553L10.5 4.20711V13H11.5V4.20711L13.8284 6.53553C14.0237 6.7308 14.3402 6.7308 14.5355 6.53553C14.7308 6.34027 14.7308 6.02369 14.5355 5.82843L11.3535 2.64645Z" fill="#61677A"/>
											<path d="M5.35353 13.3536L8.53551 10.1716C8.73077 9.97631 8.73077 9.65973 8.53551 9.46447C8.34025 9.2692 8.02366 9.2692 7.8284 9.46447L5.49997 11.7929L5.49997 3L4.49997 3L4.49997 11.7929L2.17155 9.46447C1.97628 9.2692 1.6597 9.2692 1.46444 9.46447C1.26918 9.65973 1.26918 9.97631 1.46444 10.1716L4.64642 13.3536C4.84168 13.5488 5.15826 13.5488 5.35353 13.3536Z" fill="#61677A"/>
										</svg>
									</div>
								</a>
							</div>
						</div>
						<div class="content-wrapper" style="border: none;">
							<div class="content">
								<div class="title">Aktif Eğitim Durumu</div>
								<a href="#">
									<div class="sort-icon">
										<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11.3535 2.64645C11.1583 2.45118 10.8417 2.45118 10.6464 2.64645L7.46444 5.82843C7.26918 6.02369 7.26918 6.34027 7.46444 6.53553C7.6597 6.7308 7.97628 6.7308 8.17155 6.53553L10.5 4.20711V13H11.5V4.20711L13.8284 6.53553C14.0237 6.7308 14.3402 6.7308 14.5355 6.53553C14.7308 6.34027 14.7308 6.02369 14.5355 5.82843L11.3535 2.64645Z" fill="#61677A"/>
											<path d="M5.35353 13.3536L8.53551 10.1716C8.73077 9.97631 8.73077 9.65973 8.53551 9.46447C8.34025 9.2692 8.02366 9.2692 7.8284 9.46447L5.49997 11.7929L5.49997 3L4.49997 3L4.49997 11.7929L2.17155 9.46447C1.97628 9.2692 1.6597 9.2692 1.46444 9.46447C1.26918 9.65973 1.26918 9.97631 1.46444 10.1716L4.64642 13.3536C4.84168 13.5488 5.15826 13.5488 5.35353 13.3536Z" fill="#61677A"/>
										</svg>
									</div>
								</a>
							</div>
						</div>
						<div class="cell" style="border: none;">
							<div class="content"></div>
						</div>
					</div>
					<div class="table-rows">	
						<?php include "ogretimgorevlisi_tablo.php"; ?>
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
	</div> <?php include "sidebar.php"; ?>
</body>
	<script src="index.js?v=0.01"></script>
	<script src="sidebar.js?v=0.03"></script>
	<script src="ogretimgorevlisi.js?v=0.01"></script>
	<script src="ekle.js?v=0.04"></script>
	<script src="filter.js?v=0.03"></script>
</html>