<?php 
$currentUrl = $_SERVER['REQUEST_URI'];
// Check if the URL contains "view/m_user/"
if (strpos($currentUrl, 'view/m_user/') !== false) {
    $userActive = 'class="mm-active"';
} else {
    $userActive = '';
}
if (strpos($currentUrl, 'view/pengaturan/') !== false) {
    $pengaturanActive = 'class="mm-active"';
} else {
    $pengaturanActive = '';
}
?>

<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Syndron</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						<li> <a href="index.html"><i class='bx bx-radio-circle'></i>eCommerce</a>
						</li>
						<li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Analytics</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Main Navigation</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-book-content' ></i>
						</div>
						<div class="menu-title">Master Pages</div>
					</a>
					<ul>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Pages
							</a>
						</li>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Sub Pages
							</a>
						</li>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Post
							</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-data' ></i>
						</div>
						<div class="menu-title">Master Data</div>
					</a>
					<ul>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Data Umum
							</a>
						</li>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Data Pokja 1
							</a>
						</li>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Data Pokja 2
							</a>
						</li>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Data Pokja 3
							</a>
						</li>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Data Pokja 4
							</a>
						</li>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Data Rekap
							</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-file'></i>
						</div>
						<div class="menu-title">Master Surat</div>
					</a>
					<ul>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Semua Surat
							</a>
						</li>
						
					</ul>
				</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-laptop'></i>
						</div>
						<div class="menu-title">Master Asset</div>
					</a>
					<ul>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Barang
							</a>
						</li>
						
					</ul>
				</li>
				<li class="menu-label">Pengaturan</li>
				<!-- <li>
					<a href="../m_user/">
						<div class="parent-icon"><i class="bx bx-folder"></i>
						</div>
						<div class="menu-title">Data Pegawai</div>
					</a>
				</li> -->
				<li <?php echo $userActive ?> >
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxs-group' ></i>
						</div>
						<div class="menu-title">Master Pengguna</div>
					</a>
					<ul>
						<li> <a href="#"><i class='bx bx-radio-circle'></i>Pengurus</a>
						</li>
						<li <?php echo $userActive ?>> 
							<a href="../m_user">
								<i class='bx bx-radio-circle'></i>
								Pengguna
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-group' ></i>
						</div>
						<div class="menu-title">Master Admin</div>
					</a>
					<ul>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Admin Kota
							</a>
						</li>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Admin Kecamatan
							</a>
						</li>
						<li > 
 						    <a href="#">
								<i class='bx bx-radio-circle'></i>
								Admin Kelurahan
							</a>
						</li>
					</ul>
				</li>
				<li <?php echo $pengaturanActive ?>>
					<a href="../pengaturan" >
						<div class="parent-icon"><i class='bx bx-cog' ></i>
						</div>
						<div class="menu-title">Pengaturan</div>
					</a>
				</li>
				
				<li>
					<a href="../../logout.php" >
						<div class="parent-icon"><i class='bx bx-log-out-circle'></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
				</li>
			</ul>
		</div>