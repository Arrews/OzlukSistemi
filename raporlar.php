<?php include_once 'permission.php'; ?> <!-- bu ne amk -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="stylesheet" href="/erlik/css/globals.css?v=0.32" />
    <link rel="stylesheet" href="/erlik/css/styleguide.css?v=0.12" />
    <link rel="stylesheet" href="/erlik/css/raporlar.css?v=0.003" />
    <link rel="stylesheet" href="/erlik/css/sidebar.css?v=0.141" />
    <link rel="stylesheet" href="/erlik/css/header.css?v=0.121" />
    <title>Raporlar</title>
</head>

<body>
    <div class="raporlar" id="mainPageAll">
        <?php include "header.php"; ?>
        <div class="main-container">
            
            <div class="alert-bar" style="display:none;">
                <img class="img-2" src="img/property-1-successful.svg" />
                <div class="message">Yedek başarıyla alındı.</div>
                <a href='#'><img class="img-2" src="img/alert-rigth-icon.svg" /></a>
            </div>

            <div class="main-title-placement">
                <div class="main-title">Raporlar</div>
                <div class="buttons">
                    <a href="#" onclick="yedekAl()">
                        <div class="bck-btn">
                            <div class="bck">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="30" viewBox="0 0 21 21"
                                    fill="none">
                                    <path
                                        d="M1.60965 2.88202L1.60963 2.88205L1.35752 3.26018L1.35743 3.26031C0.9568 3.8608 0.734871 4.20113 0.61938 4.58257C0.503888 4.96402 0.499762 5.3703 0.500021 6.09217L0.500021 6.09234L0.500042 15.1418C0.500024 16.3514 0.501037 17.2771 0.597541 17.9949C0.696003 18.7273 0.896451 19.2672 1.31465 19.6854C1.73285 20.1036 2.27278 20.304 3.00512 20.4025C3.72291 20.499 4.64858 20.5 5.85827 20.5H15.1417C16.3514 20.5 17.2771 20.499 17.9949 20.4025C18.7272 20.304 19.2672 20.1036 19.6854 19.6854C20.1035 19.2672 20.304 18.7273 20.4025 17.9949C20.499 17.2771 20.5 16.3514 20.5 15.1418L20.5 6.09235V6.09217C20.5002 5.3703 20.4961 4.96402 20.3806 4.58257C20.2651 4.20113 20.0432 3.8608 19.6426 3.26031L19.6425 3.26018L19.3904 2.88206L19.3904 2.88204C19.0187 2.32449 18.7325 1.89613 18.4678 1.56942C18.1969 1.23504 17.9411 0.997612 17.6262 0.829092C17.3113 0.660574 16.9719 0.579456 16.5434 0.539501C16.1247 0.500462 15.6096 0.499991 14.9395 0.5H6.06051C5.39043 0.499991 4.87529 0.500462 4.4566 0.539501C4.02809 0.579456 3.68866 0.660574 3.37378 0.829093M1.60965 2.88202L3.37378 0.829093M1.60965 2.88202C1.98132 2.32449 2.26747 1.89613 2.53219 1.56942C2.80313 1.23504 3.0589 0.997612 3.37378 0.829093M1.60965 2.88202L3.13785 0.388256L3.37378 0.829093M1.31254 7.375H0.812537V7.875V15.0937C0.812537 16.3353 0.812861 17.2512 0.907249 17.9533C1.00107 18.6511 1.18522 19.114 1.53561 19.4644L1.88917 19.1109L1.53562 19.4644C1.88601 19.8148 2.34893 19.999 3.04676 20.0928C3.74882 20.1872 4.6647 20.1875 5.90627 20.1875H15.0937C16.3353 20.1875 17.2512 20.1872 17.9532 20.0928C18.6511 19.999 19.114 19.8148 19.4644 19.4644L19.1108 19.1109L19.4644 19.4644C19.8148 19.114 19.9989 18.6511 20.0928 17.9533C20.1871 17.2512 20.1875 16.3353 20.1875 15.0937V7.875V7.375H19.6875H1.31254ZM0.812537 6.5625V7.0625H1.31254H19.6875H20.1875V6.5625V6.18332C20.1875 5.38793 20.1861 5.01852 20.0815 4.67314C19.977 4.32774 19.7732 4.01963 19.332 3.35782L19.1473 3.08075C18.7643 2.50635 18.4827 2.08417 18.225 1.76615C17.9694 1.45072 17.7443 1.24672 17.4788 1.10462C17.2133 0.962516 16.9186 0.888343 16.5144 0.850651C16.1068 0.812652 15.5993 0.812501 14.909 0.812501H6.09098C5.40065 0.812501 4.89315 0.812652 4.48561 0.850651C4.08138 0.888343 3.78675 0.962516 3.52123 1.10462C3.25572 1.24672 3.03057 1.45072 2.77498 1.76616C2.5173 2.08417 2.23567 2.50635 1.85274 3.08075L1.66803 3.35782L2.08405 3.63517L1.66803 3.35782C1.22682 4.01963 1.02304 4.32775 0.918466 4.67313C0.813891 5.01852 0.812537 5.38793 0.812537 6.18332V6.5625ZM6.56252 10.3438C6.64881 10.3438 6.71876 10.4137 6.71876 10.5C6.71876 11.5028 7.11714 12.4646 7.82626 13.1737C8.53538 13.8829 9.49715 14.2812 10.5 14.2812C11.5028 14.2812 12.4646 13.8829 13.1737 13.1737C13.8829 12.4646 14.2812 11.5028 14.2812 10.5C14.2812 10.4137 14.3512 10.3438 14.4375 10.3438C14.5238 10.3438 14.5937 10.4137 14.5937 10.5C14.5937 11.5857 14.1624 12.627 13.3947 13.3947C12.627 14.1624 11.5857 14.5937 10.5 14.5937C9.41428 14.5937 8.37302 14.1624 7.6053 13.3947C6.83757 12.627 6.40627 11.5857 6.40627 10.5C6.40627 10.4137 6.47623 10.3438 6.56252 10.3438Z"
                                        stroke="#FCFAFA" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="text-wrapper">Yedek Al</div>
                        </div>
                    </a>
                    <a href="#" onclick="">
                        <!-- Diğer Belgelere Göre İmport Etme Kodu Yazılacak DATATABLE, DATAGRIND -->
                        <div class="imp-btn">
                            <div class="docImp">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="30" viewBox="0 0 22 30"
                                    fill="none">
                                    <path
                                        d="M6.58279 4.31582H3.64162C2.86157 4.31582 2.11347 4.63743 1.56189 5.20991C1.01031 5.78239 0.700439 6.55884 0.700439 7.36845V25.6842C0.700439 26.4938 1.01031 27.2703 1.56189 27.8428C2.11347 28.4153 2.86157 28.7369 3.64162 28.7369H12.0196M6.58279 4.31582C6.58279 6.00174 7.8996 7.36845 9.52397 7.36845H12.4651C14.0895 7.36845 15.4063 6.00174 15.4063 4.31582M6.58279 4.31582C6.58279 2.62989 7.8996 1.26318 9.52397 1.26318H12.4651C14.0895 1.26318 15.4063 2.62989 15.4063 4.31582M21.2887 18V7.36845C21.2887 6.55884 20.9788 5.78239 20.4272 5.20991C19.8756 4.63743 19.1275 4.31582 18.3475 4.31582H15.4063M6.58279 13.4737H12.4651M6.58279 19.579H10.9946M14.4946 27.5C14.4946 27.5 12.9946 24 14.4946 22.5C15.9946 21 21.2996 21.5 21.2996 21.5M21.2996 21.5L19 19M21.2996 21.5L19 23.5"
                                        stroke="#FCFAFA" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="text-wrapper">Belgeye Aktar</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="filter-area">
                    <div class="filter-inputs">
                        <div class="filter-input">
                            <div class="filter-title">Arşivlenmiş Dönem</div>
                            <div class="filter-select-area">
                                <select class="filter-select" id="">
                                    <option value="">2023-2024 Bahar</option>
                                    <option value="">2023-2024 Güz</option>
                                    <option value="">2022-2023 Bahar</option>
                                    <option value="">2022-2023 Güz</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-input">
                            <div class="filter-title">Görüntüleme Değerleri</div>
                            <div class="filter-select-area">
                                <select class="filter-select" id="">
                                    <option value="">Ders Programları</option>
                                    <option value="">Dersler Listesi</option>
                                    <option value="">Öğretim Görevlileri Listesi</option>
                                    <option value="">Derslikler Listesi</option>
                                    <option value="">Programlar Listesi</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-input">
                            <div class="filter-title">Görüntüleme Türü</div>
                            <div class="filter-select-area">
                                <select class="filter-select" id="">
                                    <option value="">Program</option>
                                    <option value="">Ders</option>
                                    <option value="">Öğretim Görevlisi</option>
                                    <option value="">Derslik</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-input">
                            <div class="filter-title">Tablo Adı</div>
                            <div class="filter-select-area">
                                <select class="filter-select" id="">
                                    <option value="">1.Tablo</option>
                                    <option value="">2.Tablo</option>
                                    <option value="">3.Tablo</option>
                                    <option value="">4.Tablo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="filter-btn" id="" onclick="">
                        <div class="filter-btn-text">Görüntüle</div>
                    </button>
                </div>
                <div class="data-table">
                    <!--Veriler Buraya Gelicek height geçici-->

                    <div class="course-table">
                        <div class="header-row">
                            <div class="cell" style="border: none;">
                                <div class="content"></div>
                            </div>
                            <div class="content-wrapper" style="border: none;">
                                <div class="content">
                                    <div class="title">Öğretim Görevlisi Adı</div>
                                    <a href="#">
                                        <div class="sort-icon">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.3535 2.64645C11.1583 2.45118 10.8417 2.45118 10.6464 2.64645L7.46444 5.82843C7.26918 6.02369 7.26918 6.34027 7.46444 6.53553C7.6597 6.7308 7.97628 6.7308 8.17155 6.53553L10.5 4.20711V13H11.5V4.20711L13.8284 6.53553C14.0237 6.7308 14.3402 6.7308 14.5355 6.53553C14.7308 6.34027 14.7308 6.02369 14.5355 5.82843L11.3535 2.64645Z"
                                                    fill="#61677A" />
                                                <path
                                                    d="M5.35353 13.3536L8.53551 10.1716C8.73077 9.97631 8.73077 9.65973 8.53551 9.46447C8.34025 9.2692 8.02366 9.2692 7.8284 9.46447L5.49997 11.7929L5.49997 3L4.49997 3L4.49997 11.7929L2.17155 9.46447C1.97628 9.2692 1.6597 9.2692 1.46444 9.46447C1.26918 9.65973 1.26918 9.97631 1.46444 10.1716L4.64642 13.3536C4.84168 13.5488 5.15826 13.5488 5.35353 13.3536Z"
                                                    fill="#61677A" />
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
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.3535 2.64645C11.1583 2.45118 10.8417 2.45118 10.6464 2.64645L7.46444 5.82843C7.26918 6.02369 7.26918 6.34027 7.46444 6.53553C7.6597 6.7308 7.97628 6.7308 8.17155 6.53553L10.5 4.20711V13H11.5V4.20711L13.8284 6.53553C14.0237 6.7308 14.3402 6.7308 14.5355 6.53553C14.7308 6.34027 14.7308 6.02369 14.5355 5.82843L11.3535 2.64645Z"
                                                    fill="#61677A" />
                                                <path
                                                    d="M5.35353 13.3536L8.53551 10.1716C8.73077 9.97631 8.73077 9.65973 8.53551 9.46447C8.34025 9.2692 8.02366 9.2692 7.8284 9.46447L5.49997 11.7929L5.49997 3L4.49997 3L4.49997 11.7929L2.17155 9.46447C1.97628 9.2692 1.6597 9.2692 1.46444 9.46447C1.26918 9.65973 1.26918 9.97631 1.46444 10.1716L4.64642 13.3536C4.84168 13.5488 5.15826 13.5488 5.35353 13.3536Z"
                                                    fill="#61677A" />
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
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.3535 2.64645C11.1583 2.45118 10.8417 2.45118 10.6464 2.64645L7.46444 5.82843C7.26918 6.02369 7.26918 6.34027 7.46444 6.53553C7.6597 6.7308 7.97628 6.7308 8.17155 6.53553L10.5 4.20711V13H11.5V4.20711L13.8284 6.53553C14.0237 6.7308 14.3402 6.7308 14.5355 6.53553C14.7308 6.34027 14.7308 6.02369 14.5355 5.82843L11.3535 2.64645Z"
                                                    fill="#61677A" />
                                                <path
                                                    d="M5.35353 13.3536L8.53551 10.1716C8.73077 9.97631 8.73077 9.65973 8.53551 9.46447C8.34025 9.2692 8.02366 9.2692 7.8284 9.46447L5.49997 11.7929L5.49997 3L4.49997 3L4.49997 11.7929L2.17155 9.46447C1.97628 9.2692 1.6597 9.2692 1.46444 9.46447C1.26918 9.65973 1.26918 9.97631 1.46444 10.1716L4.64642 13.3536C4.84168 13.5488 5.15826 13.5488 5.35353 13.3536Z"
                                                    fill="#61677A" />
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
                            <?php include "ogretimgorevlisi_tablorapor.php"; ?>
                        </div>
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
    </div>
    <?php include "sidebar.php"; ?>
</body>
<script src="index.js?v=0.01"></script>
<script src="sidebar.js?v=0.03"></script>

</html>
<script>
    //------------------------------------Uyarı Mesajı ALanı ----------------------------------------
    function uyari_box(kategori, msg) {
        if (kategori == "olumsuz") {
            document.getElementById('olumsuz-alert').style.display = "flex";
            document.getElementById('olumsuz-alert-mesaj').innerHTML = msg;
            document.getElementById('olumsuz-alert').style.borderColor = "var(--uyar-renklerikrmz)";
            document.getElementById('olumsuz-alert').style.boxShadow = "var(--alert-box-shadows-wrong)";
            document.getElementById('olumsuz-alert-progress').style.backgroundColor = "var(--uyar-renklerikrmz)";
            document.getElementById('olumsuz-alert-progress').style.width = "100%";
            document.getElementById('olumsuz-alert-progress').style.transition = "none";

            setTimeout(() => {
                document.getElementById('olumsuz-alert-progress').style.transition = "width 5s linear";
                document.getElementById('olumsuz-alert-progress').style.width = "0";
            }, 10)

            setTimeout(() => {
                bildirimKapat("olumsuz");
            }, 5000);

        } else if (kategori == "olumlu") {
            document.getElementById('olumlu-alert').style.display = "flex";
            document.getElementById('olumlu-alert-mesaj').innerHTML = msg;
            document.getElementById('olumlu-alert').style.borderColor = "var(--uyar-renkleriyeil)";
            document.getElementById('olumlu-alert').style.boxShadow = "var(--alert-box-shadows-succes)";
            document.getElementById('olumlu-alert-progress').style.backgroundColor ="var(--uyar-renkleriyeil)";
            document.getElementById('olumlu-alert-progress').style.width = "100%";
            document.getElementById('olumlu-alert-progress').style.transition = "none";

            setTimeout(() => {
                document.getElementById('olumlu-alert-progress').style.transition = "width 5s linear";
                document.getElementById('olumlu-alert-progress').style.width = "0";
            }, 10)
            
            setTimeout(() => {
                bildirimKapat("olumlu");
            }, 5000);
        }
    }

    function bildirimKapat(s) {
        if (s == "olumlu") {
            document.getElementById("olumlu-alert").style.display = "none";
        } else {
            document.getElementById("olumsuz-alert").style.display = "none";
        }
    }
    //------------------------------------Uyarı Mesajı ALanı ----------------------------------------

    function yedekAl() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'SYedekAl.php', true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText === 'Yedek Alındı') {
                    uyari_box("olumlu","Yedek başarıyla alındı.")
                }
            }
        }
    }
    document.addEventListener("DOMContentLoaded", () => {
        var bildirimKapat = document.getElementsByClassName('alert-bar')[0].children[2];
        bildirimKapat.addEventListener('click', function () {
            document.getElementsByClassName('alert-bar')[0].style.display = 'none';
        })
    })

</script>