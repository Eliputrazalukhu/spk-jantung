<?php

include 'header.php';
include 'koneksi.php';

?>


<h3 class="mb-4">

Riwayat Hasil Deteksi Penyakit Jantung

</h3>



<div class="card shadow">


<div class="card-header bg-primary text-white">


<i class="bi bi-clock-history"></i>

Data Riwayat Analisis Pasien


</div>




<div class="card-body">


<div class="table-responsive">


<table class="table table-bordered table-striped">


<thead class="table-dark">


<tr>


<th>No</th>

<th>Nama Pasien</th>

<th>Usia</th>

<th>Jenis Kelamin</th>

<th>Tekanan Darah</th>

<th>Kolesterol</th>

<th>Nyeri Dada</th>

<th>Prob Berisiko</th>

<th>Prob Tidak</th>

<th>Keputusan</th>

<th>Tanggal</th>


</tr>


</thead>




<tbody>


<?php


$no=1;



$data=mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis
ORDER BY id DESC"

);



while($d=mysqli_fetch_array($data)){


?>


<tr>


<td>

<?= $no++ ?>

</td>



<td>

<?= $d['nama_pasien'] ?>

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

<?= round($d['prob_berisiko'],5) ?>

</td>




<td>

<?= round($d['prob_tidak'],5) ?>

</td>




<td>


<?php


if($d['keputusan']=="Berisiko")

{


echo "

<span class='badge bg-danger'>

Berisiko

</span>

";


}

else

{


echo "

<span class='badge bg-success'>

Tidak Berisiko

</span>

";


}


?>


</td>




<td>

<?= $d['tanggal'] ?>

</td>



</tr>



<?php

}

?>


</tbody>


</table>


</div>


</div>


</div>




<br>



<div class="card shadow">


<div class="card-header bg-success text-white">


Statistik Hasil Analisis


</div>


<div class="card-body">


<?php


$total=mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis"

)

);



$risk=mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis

WHERE keputusan='Berisiko'"

)

);



$aman=mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis

WHERE keputusan='Tidak Berisiko'"

)

);



?>



<div class="row text-center">



<div class="col-md-4">


<div class="card bg-primary text-white">


<div class="card-body">


<h5>

Total Analisis

</h5>


<h2>

<?= $total ?>

</h2>


</div>


</div>


</div>




<div class="col-md-4">


<div class="card bg-danger text-white">


<div class="card-body">


<h5>

Berisiko

</h5>


<h2>

<?= $risk ?>

</h2>


</div>


</div>


</div>




<div class="col-md-4">


<div class="card bg-success text-white">


<div class="card-body">


<h5>

Tidak Berisiko

</h5>


<h2>

<?= $aman ?>

</h2>


</div>


</div>


</div>



</div>


</div>


</div>





<br>


<button onclick="window.print()"

class="btn btn-dark">


<i class="bi bi-printer"></i>

Cetak Laporan


</button>





<?php include 'footer.php'; ?>