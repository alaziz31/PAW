<?php

	$host = "localhost";
	$user ="root";	
	$pass = "";									
	$database = "wachid";
	$koneksi= mysqli_connect($host,$user,$pass,$database) or die(mysqli_error($koneksi));


		//jika tombol submit diklik
if (isset($_POST['submit']))
{
    if($_GET['hal']=='edit')
    {
        $edit = mysqli_query($koneksi , "UPDATE tbl_103 SET 
                                         Nim= '$_POST[nim]',
                                         Nama= '$_POST[nama]',
                                         Alamat= '$_POST[alamat]',
                                         ProgramStudi= '$_POST[prodi]'
                                         WHERE No = '$_GET[id]'
                                                ");
    if($edit)//jika sukses
    {
        echo "<script>
            alert('edit data sukses');
            document.location='data mahasiswa.php';
            </script>";
    }
    //jika gagal
    else{
        echo "<script>
            alert('edit data gagal');
            document.location='data mahasiswa.php';
            </script>";
    }   
    }else
    {
        $submit = mysqli_query($koneksi , "INSERT INTO tbl_103 (Nim,Nama,Alamat,ProgramStudi)
        Values ('$_POST[nim]',
                '$_POST[nama]',
                '$_POST[alamat]',
                '$_POST[prodi]')
            ");
    if($submit)
    {
        echo "<script>
            alert('simpan data sukses');
            document.location='data mahasiswa.php';
            </script>";
    }
    else{
        echo "<script>
            alert('simpan data gagal');
            document.location='data mahasiswa.php';
            </script>";
    }
    }
	
}
if (isset($_GET['hal']))
{
    if($_GET['hal']=='edit')
    {
    //pengujian data yang akan diedit
    $tampil=mysqli_query($koneksi," SELECT *FROM tbl_103 WHERE No = '$_GET[id]'");
    $data=mysqli_fetch_array($tampil);
    if($data){
        $vnim = $data['Nim'];
        $vnama = $data['Nama'];
        $valamat = $data['Alamat'];
        $vprodi = $data['ProgramStudi'];
    }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>crud</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>
    <div class="container">
	<h1 class="text-center">FORM INPUT DATA MAHASISWA JURUSAN INFORMATIKA</h1>
	<!-- awal card-->
    
	<div class="card margin-left">
		<div class="card-header bg-primary text-white">
		 form input data mahasiswa
		</div>
		<div class="card-body">
			<form method="post" action="">
			<div class="form-group mb-3">
				<label>NIM</label>
				<input type="text" name="nim" value="<?=@$vnim?>" class="form-control" placeholder="input nim anda disini" required>
			</div>
			<div class="form-group mb-3">
				<label>NAMA</label>
				<input type="text" name="nama" value="<?=@$vnama?>" class="form-control" placeholder="input nama anda disini" required>
			</div>
			<div class="form-group mb-3">
				<label>ALAMAT</label>
				<textarea name ="alamat" class="form-control" placeholder="input alamat anda disini" required><?=@$valamat?></textarea>
			</div>
			<div class="form-group mb-3" ></div>
			<label>PROGRAM STUDI</label>
			<select class="form-control mb-3" name="prodi" required>
				<option value="<?=@$vprodi?>"><?=@$vprodi?></option>
				<option value="S1 Teknik Informatika">Teknik Informatika</option>
				<option value="S1 Sistem Informasi">Sistem Informasi</option>
			</select>
            <br>
			<button type="submit" class="btn btn-primary" name="submit">submit</button>
			
           
			</div>
			</form>
		</div>													
		
	  </div>
      </div>
	  <!--akhir card-->
	  
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>