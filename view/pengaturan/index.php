<?php
include '../../config.php';
error_reporting(0);

if(isset($_SESSION['email'])== 0) {
	header('Location: ../../index.php');
}

if( $_SESSION['level_id'] == "1" ){
}else{
  echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

$master = "Pengaturan";
$dba = "setting";

?>

<?php 
include '../footer.php';
include '../header.php';
include '../sidebar.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="../../assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="../../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="../../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../../assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="../../assets/css/app.css" rel="stylesheet">
    <link href="../../assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="../../assets/css/dark-theme.css" />
    <link rel="stylesheet" href="../../assets/css/semi-dark.css" />
    <link rel="stylesheet" href="../../assets/css/header-colors.css" />
    <title> <?php echo $master; ?></title>
</head>

<body>
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Admin</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="card-header px-4 py-3">
                                <h5 class="mb-0">Pengaturan</h5>
                            </div>
                            <div class="card-body p-4">
                                <?php
                                $sql = "SELECT * FROM setting ORDER BY id DESC";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $row = $stmt->fetch();
                                ?>

                                <form class="row g-3 needs-validation" novalidate
                                    action="../../controller/<?php echo $dba;?>_controller.php?op=edit" method="post"
                                    enctype="multipart/form-data">

                                    <input type="hidden" class="form-control" name="id"
                                        value="<?php echo $row['id']; ?>">

                                    <div class="col-md-12">
                                        <label for="bsValidation3" class="form-label">Nama </label>
                                        <input type="text" class="form-control" id="bsValidation3"
                                            placeholder="Masukan nama" required name="nama"
                                            value="<?php echo $row['nama']; ?>">
                                        <div class="invalid-feedback">
                                            Gunakan Untuk Nama Web
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Keterangan</label>
                                        <textarea class="form-control" placeholder="description" name="des"><?php echo $row['des']; ?></textarea>
                                        <div class="invalid-feedback">
                                            Inputkan Keterangan
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $row['alamat']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Alamat
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Running Text</label>
                                        <input type="text" class="form-control" placeholder="Running Text" name="run_text" value="<?php echo $row['run_text']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Running Text
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Nomor Wa</label>
                                        <input type="text" class="form-control" placeholder="6285280000000" name="wa" value="<?php echo $row['wa']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Nomor Wa
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Kalimat Wa</label>
                                        <input type="text" class="form-control" placeholder="Kalimat Wa" name="kata_wa" value="<?php echo $row['kata_wa']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Kalimat Wa
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">SEO</label>
                                        <input type="text" class="form-control" placeholder="keyword" name="seo" value="<?php echo $row['seo']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan SEO
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="email" name="email" value="<?php echo $row['email']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Email
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Youtube Link</label>
                                        <input type="text" class="form-control" placeholder="youtube" name="yt" value="<?php echo $row['yt']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Youtube Link
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Warna</label>
                                        <input type="text" class="form-control" placeholder="warna" name="warna" value="<?php echo $row['warna']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Warna
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Neon Warna</label>
                                        <input type="text" class="form-control" placeholder="neon warna" name="neon" value="<?php echo $row['neon']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Neon Warna
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Skin</label>
                                        <input type="text" class="form-control" placeholder="skin" name="skin" value="<?php echo $row['skin']; ?>">
                                        <small>* blue, blue-light, yellow, yellow-light, green,	green-light, purple,	purple-light, red,	red-light, black,  black-light,</small>
                                        <div class="invalid-feedback">
                                            Inputkan Neon Warna
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Pilihan Posisi Web</label>
                                        <div class="row">
                                            <div class="col">
                                                <h6 style="color:red;">Atur Posisi Ketika Tampilan Website Pertama Kali dibuka Copy Paste nama php warna hitam dibagian bawah dan isi bagian tersebut sesuai keinginan</h6>
                                                
                                                <a class="text-primary">1. Slide - </a>w_slide.php<br>
                                                <a class="text-primary">2. Konten - </a>w_konten.php<br>
                                                <a class="text-primary">3. Video - </a>w_video.php<br>
                                                <a class="text-primary">4. Tentang - </a>w_tentang.php<br>
                                                <a class="text-primary">5. Populer - </a>w_populer.php<br>
                                                <a class="text-primary">6. Berita - </a>w_berita.php<br>
                                                <a class="text-primary">7. Mitra - </a>w_mitra.php<br>
                                                <a class="text-primary">8. RunText - </a>w_run.php<br>
                                                <a class="text-primary">9. Berita2 - </a>w_beritab.php<br>
                                                <a class="text-primary">10. Total - </a>w_total.php<br>  

                                            </div>       
                                        </div>                                        
                                    </div>

                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Posisi Satu</label>
                                        <input type="text" class="form-control" placeholder="s_satu" name="s_satu" value="<?php echo $row['s_satu']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Posisi Satu
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Posisi Dua</label>
                                        <input type="text" class="form-control" placeholder="s_dua" name="s_dua" value="<?php echo $row['s_dua']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Posisi Dua
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Posisi Tiga</label>
                                        <input type="text" class="form-control" placeholder="s_tiga" name="s_tiga" value="<?php echo $row['s_tiga']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Posisi Tiga
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Posisi Empat</label>
                                        <input type="text" class="form-control" placeholder="s_empat" name="s_empat" value="<?php echo $row['s_empat']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Posisi Empat
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Posisi Lima</label>
                                        <input type="text" class="form-control" placeholder="s_lima" name="s_lima" value="<?php echo $row['s_lima']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Posisi Lima
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Posisi Enam</label>
                                        <input type="text" class="form-control" placeholder="s_enam" name="s_enam" value="<?php echo $row['s_enam']; ?>">
                                        <div class="invalid-feedback">
                                            Inputkan Posisi Enam
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn btn-primary px-4">Update</button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>

    <div class="modal" id="SearchModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header gap-2">
                    <div class="position-relative popup-search w-100">
                        <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                            placeholder="Search">
                        <span
                            class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i
                                class='bx bx-search'></i></span>
                    </div>
                    <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="search-list">
                        <p class="mb-1">Html Templates</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-angular fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Web Designe Company</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-windows fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-dropbox fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Software Development</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Online Shoping Portals</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-slack fs-4'></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-skype fs-4'></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                    class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search modal -->



    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <h6 class="mb-0">Theme Styles</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr />
            <h6 class="mb-0">Header Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
            <hr />
            <h6 class="mb-0">Sidebar Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../../assets/plugins/validation/jquery.validate.min.js"></script>
    <script src="../../assets/plugins/validation/validation-script.js"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>
    <!--app JS-->
    <script src="../../assets/js/app.js"></script>
</body>

</html>