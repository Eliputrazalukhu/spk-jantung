<?php

include 'header.php';
include 'koneksi.php';


// =======================
// SIMPAN DATA
// =======================

if(isset($_POST['simpan'])){


$usia=$_POST['usia'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$tekanan_darah=$_POST['tekanan_darah'];
$kolesterol=$_POST['kolesterol'];
$gula_darah=$_POST['gula_darah'];
$nyeri_dada=$_POST['nyeri_dada'];
$detak_jantung=$_POST['detak_jantung'];
$hasil=$_POST['hasil'];



$query=mysqli_query($koneksi,

"INSERT INTO dataset_jantung

VALUES

(
NULL,
'$usia',
'$jenis_kelamin',
'$tekanan_darah',
'$kolesterol',
'$gula_darah',
'$nyeri_dada',
'$detak_jantung',
'$hasil'
)

");



if($query){

echo "

<div class='alert alert-success'>

Data berhasil disimpan

</div>

";

}


}



// =======================
// HAPUS DATA
// =======================


if(isset($_GET['hapus'])){


$id=$_GET['hapus'];


mysqli_query(

$koneksi,

"DELETE FROM dataset_jantung
WHERE id='$id'"

);


echo "

<div class='alert alert-danger'>

Data berhasil dihapus

</div>

";


}


?>


<h3 class="mb-4">

Dataset Penyakit Jantung

</h3>



<!-- FORM INPUT -->


<div class="card shadow mb-4">


<div class="card-header bg-danger text-white">

Tambah Dataset

</div>


<div class="card-body">


<form method="post">


<div class="row">


<div class="col-md-4">


<label>Usia</label>

<input 
type="number"
name="usia"
class="form-control"
required>


</div>



<div class="col-md-4">


<label>Jenis Kelamin</label>


<select 
name="jenis_kelamin"
class="form-control">


<option>Laki-laki</option>

<option>Perempuan</option>


</select>


</div>




<div class="col-md-4">


<label>Tekanan Darah</label>


<select 
name="tekanan_darah"
class="form-control">


<option>Tinggi</option>

<option>Normal</option>

<option>Rendah</option>


</select>


</div>


</div>



<br>



<div class="row">


<div class="col-md-4">


<label>Kolesterol</label>


<select 
name="kolesterol"
class="form-control">


<option>Tinggi</option>

<option>Sedang</option>

<option>Normal</option>


</select>


</div>




<div class="col-md-4">


<label>Gula Darah</label>


<select 
name="gula_darah"
class="form-control">


<option>Tinggi</option>

<option>Normal</option>


</select>


</div>




<div class="col-md-4">


<label>Nyeri Dada</label>


<select 
name="nyeri_dada"
class="form-control">


<option>Ya</option>

<option>Tidak</option>


</select>


</div>


</div>



<br>


<div class="row">


<div class="col-md-4">


<label>Detak Jantung</label>


<select
name="detak_jantung"
class="form-control">


<option>Cepat</option>

<option>Normal</option>


</select>


</div>



<div class="col-md-4">


<label>Hasil</label>


<select
name="hasil"
class="form-control">


<option>Berisiko</option>

<option>Tidak Berisiko</option>


</select>


</div>


</div>



<br>


<button 
name="simpan"
class="btn btn-primary">


<i class="bi bi-save"></i>

Simpan Data


</button>



</form>


</div>


</div>





<!-- TABEL DATASET -->


<div class="card shadow">


<div class="card-header bg-primary text-white">


Data Dataset Penyakit Jantung


</div>



<div class="card-body">


<table class="table table-bordered table-striped">


<thead class="table-primary">


<tr>


<th>No</th>

<th>Usia</th>

<th>Jenis Kelamin</th>

<th>Tekanan</th>

<th>Kolesterol</th>

<th>Gula</th>

<th>Nyeri</th>

<th>Detak</th>

<th>Hasil</th>

<th>Aksi</th>


</tr>


</thead>



<tbody>


<?php


$no=1;


$data=mysqli_query(

$koneksi,

"SELECT * FROM dataset_jantung"

);



while($d=mysqli_fetch_array($data)){


?>


<tr>


<td>

<?= $no++ ?>

</td>


<td>

<?= $d['usia'] ?>

</td>


<td>

<?= $d['jenis_kelamin'] ?>

</td>


<td>

<?= $d['tekanan_darah'] ?>

</td>


<td>

<?= $d['kolesterol'] ?>

</td>


<td>

<?= $d['gula_darah'] ?>

</td>


<td>

<?= $d['nyeri_dada'] ?>

</td>


<td>

<?= $d['detak_jantung'] ?>

</td>


<td>


<?php

if($d['hasil']=="Berisiko"){

echo "<span class='badge bg-danger'>Berisiko</span>";

}else{

echo "<span class='badge bg-success'>Tidak Berisiko</span>";

}

?>


</td>


<td>


<a href="dataset.php?hapus=<?= $d['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">


<i class="bi bi-trash"></i>

</a>


</td>


</tr>


<?php } ?>


</tbody>


</table>


</div>


</div>


<?php include 'footer.php'; ?>