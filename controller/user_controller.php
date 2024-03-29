<?php
	ini_set('display_errors', 0);
	include "../config.php";
	session_start();

	$op = $_GET['op'];
	if($op == "tambah"){
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$nip = $_POST['nip'];
		$pangkat = $_POST['pangkat'];
		$jabatan = $_POST['jabatan'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$level_id = $_POST['level_id'];
		$status_aktif = $_POST['status_aktif'];
		$hp = $_POST['hp'];
		$ktp = $_POST['ktp'];

        $pass = password_hash($pass, PASSWORD_BCRYPT);
        
        try {
          $sql = "INSERT INTO m_user SET
			nik = :nik,
			nama = :nama,
			nip = :nip,
			pangkat = :pangkat,
			jabatan = :jabatan,
			email = :email,
			password = :password,
			level_id = :level_id,
			status_aktif = :status_aktif,
			hp = :hp,
			ktp = :ktp"
          ;

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':nik', $nik);
			$stmt->bindParam(':nama', $nama);
			$stmt->bindParam(':nip', $nip);
			$stmt->bindParam(':pangkat', $pangkat);
			$stmt->bindParam(':jabatan', $jabatan);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $pass);
			$stmt->bindParam(':level_id', $level_id);
			$stmt->bindParam(':status_aktif', $status_aktif);
			$stmt->bindParam(':hp', $hp);
			$stmt->bindParam(':ktp', $ktp);
			$stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Berhasil Tambah'); document.location.href=('../view/m_user')</script>";
		}else{
			echo "<script>alert('Gagal Tambah'); document.location.href=('../view/m_user')</script>";
		}
	
	} if($op == "daftar"){
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$stat = mysqli_real_escape_string($link, $_POST['stat']);
		$gender = mysqli_real_escape_string($link, $_POST['gender']);
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$password = mysqli_real_escape_string($link, $_POST['password']);
		$des = mysqli_real_escape_string($link, $_POST['des']);
		$codx = mysqli_real_escape_string($link, $_POST['codx']);
		$dt = date("d/m/Y");
		$mt = date("m");
		$yr = date("Y");
		$dir = "../up/";
		$proses_upload = move_uploaded_file($_FILES['file']["tmp_name"], $dir.$_FILES['file']["name"]);
	  	$url = $_FILES['file']["name"];
		
		if ($url == null){
			$url = "#";
		} else {
			$url = $_FILES['file']["name"];
		}
		
		$coba = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM pengguna ORDER BY id DESC"));
		$id_user = $coba['id'] + 1;

			$INSERT = mysqli_query($link,"INSERT INTO pengguna (id,id_user,name,stat,gender,nmr_hp,username,password,des,dt,mt,yr,pic,codx) VALUES ('$id_user','$id_user','$name','1','$gender','$nmr_hp','$username','$password','$des','$dt','$mt','$yr','$url','$codx') ");
			if($INSERT){		
				echo "<script>alert('Berhasil Tambah'); document.location.href=('../index.php')</script>";
			}else{
				echo "<script>alert('Gagal Tambah'); document.location.href=('../index.php')</script>";
			}
	}else if($op == "edit"){
		
		$id = $_POST['id']; 
        $pass = $_POST['password'];
        $pass = password_hash($pass, PASSWORD_BCRYPT);

        		  	
        try {
          $sql = "UPDATE m_user SET 
            password = :password
            WHERE id = $id" 
          ;

          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':password', $pass);
          
          $stmt->execute();
        }
        catch(PDOException $e) {
          echo $e->getMessage();
        }
        
        if($stmt){		
			echo "<script>alert('Password telah dirubah'); document.location.href=('../view/m_user')</script>";
		}else{
			echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/m_user')</script>";
		}

	}else if($op == "aktif"){
	        $id = $_GET['id'];
	        $level_id = 1;
	        $status_aktif = 1;
	    
	        try {
              $sql = "UPDATE m_user SET 
                level_id = :level_id, 
                status_aktif = :status_aktif
                WHERE id = $id"
              ;
    
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(':level_id', $level_id);
              $stmt->bindParam(':status_aktif', $status_aktif);
              $stmt->execute();
            }
            catch(PDOException $e) {
              echo $e->getMessage();
            }
            
            if($stmt){		
    			echo "<script>alert('Data telah dirubah'); document.location.href=('../view/m_user')</script>";
    		}else{
    			echo "<script>alert('Gagal Data telah dirubah'); document.location.href=('../view/m_user')</script>";
    		}
		
			
	}else if($op == "tidakaktif"){
		
			$UPDATE = mysqli_query($link,"UPDATE pengguna SET status_aktif='0' WHERE codx = '".$_GET['codx']."' ");
			if($UPDATE){
			echo "<script>alert('Berhasil Tidak Aktif'); document.location.href=('../in/user.php')</script>";
			}else{
				echo "<script>alert('Gagal Tidak Aktif'); document.location.href=('../in/user.php')</script>";
			}

	}else if($op == "hapus"){
		$id = $_GET['id'];
		$ktp = $_GET['ktp'];
		unlink("../images/$ktp");
		
		$sql = "DELETE FROM m_user WHERE id = :id";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		
		if($stmt){		
			echo "<script>alert('Berhasil Menghapus'); document.location.href=('../view/m_user/')</script>";
		}else{
			echo "<script>alert('Gagal Menghapus'); document.location.href=('../view/m_user/')</script>";
		}

	}else if($op=="cek_extensi"){
		$fileName =  $_GET['nama_file'];
		 
		$valid_ext = array('jpg','JPG','jpeg','JPEG','PNG','png','xls', 'gif', 'doc', 'docx', 'xlsx', 'zip','pdf');
		$ext = explode('.', $fileName);
		$extensi = $ext[count($ext) - 1];
		$cek_extensi = in_array($extensi, $valid_ext);

		if($cek_extensi > 0){
			echo "ok";
		}else{
			echo "no";
		}
	} else if($op=="hapus_gambar"){
	    
	    unlink('../../images/PENULIS.png');
	    
		echo "<script>alert('Berhasil Menghapus Gambar'); document.location.href=('../view/barang/')</script>";
	}
?>