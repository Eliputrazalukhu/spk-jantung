<?php

include 'header.php';
include 'koneksi.php';


// =====================
// DATA DASHBOARD
// =====================


$total_dataset = mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM dataset_jantung"

)

);



$total_training = mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM data_training"

)

);



$total_analisis = mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis"

)

);



$total_risiko = mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis
WHERE keputusan='Berisiko'"

)

);



$total_aman = mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis
WHERE keputusan='Tidak Berisiko'"

)

);



?>



<h3 class="mb-4">

Dashboard Sistem Deteksi Dini Penyakit Jantung

</h3>



<div class="row">



<!-- DATASET -->


<div class="col-md-3">


<div class="card shadow bg-primary text-white">


<div class="card-body text-center">


<i class="bi bi-database fs-1"></i>


<h5>

Dataset

</h5>


<h2>

<?= $total_dataset ?>

</h2>


</div>


</div>


</div>





<!-- TRAINING -->


<div class="col-md-3">


<div class="card shadow bg-success text-white">


<div class="card-body text-center">


<i class="bi bi-cpu fs-1"></i>


<h5>

Data Training

</h5>


<h2>

<?= $total_training ?>

</h2>


</div>


</div>


</div>





<!-- ANALISIS -->


<div class="col-md-3">


<div class="card shadow bg-warning">


<div class="card-body text-center">


<i class="bi bi-search-heart fs-1"></i>


<h5>

Analisis

</h5>


<h2>

<?= $total_analisis ?>

</h2>


</div>


</div>


</div>





<!-- RISIKO -->


<div class="col-md-3">


<div class="card shadow bg-danger text-white">


<div class="card-body text-center">


<i class="bi bi-heart-pulse fs-1"></i>


<h5>

Berisiko

</h5>


<h2>

<?= $total_risiko ?>

</h2>


</div>


</div>


</div>



</div>




<br>




<div class="row">



<div class="col-md-6">


<div class="card shadow">


<div class="card-header bg-dark text-white">

Distribusi Hasil Analisis

</div>


<div class="card-body">


<canvas id="hasilChart"></canvas>


</div>


</div>


</div>





<div class="col-md-6">


<div class="card shadow">


<div class="card-header bg-info text-white">

Informasi Sistem

</div>



<div class="card-body">


<h5>

SPK Deteksi Dini Penyakit Jantung

</h5>


<p>

Sistem ini menggunakan algoritma:

</p>


<ul>

<li>
Naive Bayes
</li>

<li>
Decision Tree
</li>

<li>
Visualisasi Grafik
</li>


</ul>


<p>

Digunakan untuk membantu mendeteksi risiko penyakit jantung berdasarkan data pasien.

</p>


</div>


</div>


</div>


</div>





<script>


new Chart(

document.getElementById('hasilChart'),

{


type:'pie',


data:{


labels:[

'Berisiko',

'Tidak Berisiko'

],


datasets:[{


data:[

<?= $total_risiko ?>,

<?= $total_aman ?>

],


backgroundColor:[

'#dc3545',

'#198754'

]


}]


},


options:{


responsive:true,


plugins:{


legend:{


position:'bottom'

}


}


}


}

);


</script>




<?php include 'footer.php'; ?>