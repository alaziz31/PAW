<?php

	$host = "localhost";
	$user ="root";	
	$pass = "";									
	$database = "wachid";
	$koneksi= mysqli_connect($host,$user,$pass,$database) or die(mysqli_error($koneksi));


		//jika tombol submit diklik
if (isset($_POST['submit']))
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
		document.location='index.php';
		</script>";
}
else{
	echo "<script>
		alert('simpan data gagal');
		document.location='index.php';
		</script>";
}
}
	//pengujian edit
	if (isset($_GET['hal']))
	{
		if($_GET['hal']=='edit')
		{
		//pengujian data yang akan diedit
		$tampil=mysqli_query($koneksi," SELECT *FROM tbl_103 WHERE No = '$_GET[id]'");
		$data=mysqli_fetch_array($tampil);
		if($data){
			$vnim = $data['nim'];
			$vnim = $data['nama'];
			$vnim = $data['alamat'];
			$vnim = $data['prodi'];
		}
		}else if ($_GET['hal']=='hapus'){
			$hapus= mysqli_query($koneksi, "DELETE from tbl_103 where No = '$_GET[id]'");
			if($hapus){
				echo "<script>
				alert('Hapus data sukses');
				document.location='data mahasiswa.php';
				</script>";
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
	  <!--awal tabel-->
	  <div class="card">
		<div class="card-header bg-primary text-white">
		  DATA MAHASISWA
		</div>
		<div class="card-body" >
		 <table class="table table-bordered table-striped">
			 <tr>
				 <th>No</th>
				 <th>NIM</th>
				 <th>Nama</th>
				 <th>Alamat</th>
				 <th>Program Studi</th>
				 <th>Aksi</th>
			 </tr>
			 <?php
			 $No = 1;
			 $tampil = mysqli_query($koneksi, "SELECT * from tbl_103 order by No desc");
			 while($data = mysqli_fetch_array($tampil)):
			 ?>
			 <tr>
				 <td><?=$No++;?></td>
				 <td><?=$data['Nim']?></td>
				 <td><?=$data['Nama']?></td>
				 <td><?=$data['Alamat']?></td>
				 <td><?=$data['ProgramStudi']?></td>
				 <td>
					 <a href="tambah data.php?hal=edit&id=<?=$data['No']?>" class="fa-solid fa-pen"></a>&nbsp;&nbsp;
					 <a href="data mahasiswa.php?hal=hapus&id=<?=$data['No']?>" class="fa-solid fa-trash-can"></a>
				 </td>
			 </tr>
			 <?php
			 endwhile;
			 ?>
			 </table>
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="fa-solid fa-user-plus fa-sm" href="tambah data.php">tambah data</a>
			 			
		</div>
	  </div>
	  </div>
	  <!--akhir tabel-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>