<?php

include 'header.php';
include 'koneksi.php';


// =============================
// PROSES PEMBUATAN DATA TRAINING
// =============================


if(isset($_POST['proses'])){


// hapus training lama

mysqli_query(
$koneksi,
"TRUNCATE TABLE data_training"
);


// ambil dataset

$data=mysqli_query(

$koneksi,

"SELECT * FROM dataset_jantung"

);



while($d=mysqli_fetch_array($data)){


mysqli_query(

$koneksi,

"INSERT INTO data_training

VALUES

(
NULL,
'$d[usia]',
'$d[jenis_kelamin]',
'$d[tekanan_darah]',
'$d[kolesterol]',
'$d[nyeri_dada]',
'$d[hasil]'
)

"

);


}



echo "

<div class='alert alert-success'>

Data training berhasil dibuat dari dataset.

</div>

";


}



// =============================
// JUMLAH DATA TRAINING
// =============================


$total=mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM data_training"

)

);


$berisiko=mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM data_training

WHERE hasil='Berisiko'"

)

);



$tidak=mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM data_training

WHERE hasil='Tidak Berisiko'"

)

);



?>


<h3 class="mb-4">

Data Training Naive Bayes

</h3>



<div class="row mb-4">



<div class="col-md-4">


<div class="card shadow text-center">


<div class="card-body">


<h5>

Total Data Training

</h5>


<h2 class="text-primary">

<?= $total ?>

</h2>


</div>

</div>


</div>




<div class="col-md-4">


<div class="card shadow text-center">


<div class="card-body">


<h5>

Berisiko

</h5>


<h2 class="text-danger">

<?= $berisiko ?>

</h2>


</div>

</div>


</div>




<div class="col-md-4">


<div class="card shadow text-center">


<div class="card-body">


<h5>

Tidak Berisiko

</h5>


<h2 class="text-success">

<?= $tidak ?>

</h2>


</div>

</div>


</div>



</div>





<form method="post">


<button

name="proses"

class="btn btn-primary mb-4">


<i class="bi bi-cpu"></i>

Proses Training


</button>


</form>





<div class="card shadow">


<div class="card-header bg-success text-white">


Tabel Data Training


</div>



<div class="card-body">


<table class="table table-bordered table-striped">


<thead class="table-success">


<tr>


<th>No</th>

<th>Usia</th>

<th>Jenis Kelamin</th>

<th>Tekanan</th>

<th>Kolesterol</th>

<th>Nyeri Dada</th>

<th>Status</th>


</tr>


</thead>



<tbody>


<?php


$no=1;


$data=mysqli_query(

$koneksi,

"SELECT * FROM data_training"

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

<?= $d['nyeri_dada'] ?>

</td>


<td>


<?php


if($d['hasil']=="Berisiko"){

echo "

<span class='badge bg-danger'>

Berisiko

</span>

";


}else{


echo "

<span class='badge bg-success'>

Tidak Berisiko

</span>

";


}


?>


</td>


</tr>


<?php } ?>


</tbody>


</table>


</div>


</div>



<?php include 'footer.php'; ?>