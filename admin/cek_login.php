<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from tb_admin where nama_admin='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['jabatan']=="Admin"){

		// buat session login dan username
		$_SESSION['username'] = $data['nama'];
		$_SESSION['nama_admin'] = $username;
		$_SESSION['jabatan'] = "Admin";
		$_SESSION['password'] = $password;
		// alihkan ke halaman dashboard admin
		header("location: admin.php");

	// cek jika user login sebagai pegawai
	}else if($data['posisi']=="Produksi"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['posisi'] = "Produksi";
		$_SESSION['password'] = $password;
		// alihkan ke halaman dashboard pegawai
		header("location:produksi.php");

	// cek jika user login sebagai pengurus
	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	
}else{
	header("location:index.php?pesan=gagal");
}



?>