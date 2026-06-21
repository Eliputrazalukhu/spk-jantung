<?php

include 'header.php';
include 'koneksi.php';

?>


<h3 class="mb-4">
Analisis Naive Bayes Penyakit Jantung
</h3>



<div class="card shadow">


<div class="card-header bg-danger text-white">

Form Analisis Pasien

</div>


<div class="card-body">


<form method="post">



<div class="row">


<div class="col-md-4">


<label>
Nama Pasien
</label>


<input 
type="text"
name="nama_pasien"
class="form-control"
required>


</div>



<div class="col-md-4">


<label>
Usia
</label>


<input 
type="number"
name="usia"
class="form-control"
required>


</div>



<div class="col-md-4">


<label>
Jenis Kelamin
</label>


<select name="jenis_kelamin"
class="form-control">


<option>Laki-laki</option>

<option>Perempuan</option>


</select>


</div>


</div>



<br>



<div class="row">


<div class="col-md-4">


<label>
Tekanan Darah
</label>


<select 
name="tekanan_darah"
class="form-control">


<option>Tinggi</option>

<option>Normal</option>


</select>


</div>




<div class="col-md-4">


<label>
Kolesterol
</label>


<select
name="kolesterol"
class="form-control">


<option>Tinggi</option>

<option>Sedang</option>

<option>Normal</option>


</select>


</div>




<div class="col-md-4">


<label>
Nyeri Dada
</label>


<select
name="nyeri_dada"
class="form-control">


<option>Ya</option>

<option>Tidak</option>


</select>


</div>



</div>



<br>


<button 
name="analisis"
class="btn btn-primary">

<i class="bi bi-search"></i>

Analisis Naive Bayes

</button>


</form>


</div>


</div>



<?php


if(isset($_POST['analisis'])){


$nama=$_POST['nama_pasien'];

$usia=$_POST['usia'];

$jk=$_POST['jenis_kelamin'];

$tekanan=$_POST['tekanan_darah'];

$kolesterol=$_POST['kolesterol'];

$nyeri=$_POST['nyeri_dada'];



// ===========================
// HITUNG JUMLAH DATA
// ===========================


$total=mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM data_training"

)

);



$jumlah_risiko=mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM data_training
WHERE hasil='Berisiko'"

)

);



$jumlah_tidak=mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM data_training
WHERE hasil='Tidak Berisiko'"

)

);



// ===========================
// PRIOR PROBABILITY
// ===========================


$prior_risiko=$jumlah_risiko/$total;


$prior_tidak=$jumlah_tidak/$total;



// ===========================
// LIKELIHOOD
// +1 LAPACE SMOOTHING
// ===========================



function hitungProb($kolom,$nilai,$kelas,$jumlah)
{

global $koneksi;


$query=mysqli_query(

$koneksi,

"SELECT * FROM data_training

WHERE 
$kolom='$nilai'

AND hasil='$kelas'"

);


$jumlah_data=mysqli_num_rows($query);


return ($jumlah_data+1)/($jumlah+2);


}




// BERISIKO


$risiko =

$prior_risiko *

hitungProb(
'tekanan_darah',
$tekanan,
'Berisiko',
$jumlah_risiko
)

*

hitungProb(
'kolesterol',
$kolesterol,
'Berisiko',
$jumlah_risiko
)

*

hitungProb(
'nyeri_dada',
$nyeri,
'Berisiko',
$jumlah_risiko
);




// TIDAK BERISIKO


$tidak =

$prior_tidak *

hitungProb(
'tekanan_darah',
$tekanan,
'Tidak Berisiko',
$jumlah_tidak
)

*

hitungProb(
'kolesterol',
$kolesterol,
'Tidak Berisiko',
$jumlah_tidak
)

*

hitungProb(
'nyeri_dada',
$nyeri,
'Tidak Berisiko',
$jumlah_tidak
);





// KEPUTUSAN


if($risiko>$tidak)

{

$hasil="Berisiko";

}

else

{

$hasil="Tidak Berisiko";

}




// SIMPAN HASIL


mysqli_query(

$koneksi,

"INSERT INTO hasil_analisis

VALUES

(
NULL,
'$nama',
'$usia',
'$jk',
'$tekanan',
'$kolesterol',
'$nyeri',
'$risiko',
'$tidak',
'$hasil',
NOW()
)

"

);



?>



<br>


<div class="card shadow">


<div class="card-header bg-success text-white">

Hasil Perhitungan Naive Bayes

</div>


<div class="card-body">


<table class="table table-bordered">


<tr>

<th>
Probabilitas Berisiko
</th>

<td>

<?= round($risiko,5) ?>

</td>


</tr>



<tr>

<th>
Probabilitas Tidak Berisiko
</th>

<td>

<?= round($tidak,5) ?>

</td>


</tr>



<tr>


<th>
Keputusan
</th>


<td>


<?php

if($hasil=="Berisiko"){

echo "

<span class='badge bg-danger fs-5'>

BERISIKO

</span>

";


}else{


echo "

<span class='badge bg-success fs-5'>

TIDAK BERISIKO

</span>

";


}


?>


</td>


</tr>



</table>



</div>


</div>



<?php } ?>



<?php include 'footer.php'; ?>