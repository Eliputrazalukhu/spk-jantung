<?php

include 'header.php';
include 'koneksi.php';


// ==========================
// DATASET
// ==========================

$dataset_berisiko = mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM dataset_jantung
WHERE hasil='Berisiko'"

)

);


$dataset_tidak = mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM dataset_jantung
WHERE hasil='Tidak Berisiko'"

)

);



// ==========================
// HASIL NAIVE BAYES
// ==========================

$nb_berisiko = mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis
WHERE keputusan='Berisiko'"

)

);


$nb_tidak = mysqli_num_rows(

mysqli_query(

$koneksi,

"SELECT * FROM hasil_analisis
WHERE keputusan='Tidak Berisiko'"

)

);



?>



<h3 class="mb-4">

Dashboard Grafik Deteksi Penyakit Jantung

</h3>




<div class="row">



<!-- GRAFIK DATASET -->


<div class="col-md-4">


<div class="card shadow">


<div class="card-header bg-danger text-white">

Distribusi Dataset

</div>


<div class="card-body">


<canvas id="datasetChart"></canvas>


</div>


</div>


</div>




<!-- GRAFIK NAIVE BAYES -->


<div class="col-md-4">


<div class="card shadow">


<div class="card-header bg-primary text-white">

Hasil Naive Bayes

</div>


<div class="card-body">


<canvas id="nbChart"></canvas>


</div>


</div>


</div>




<!-- GRAFIK TREE -->


<div class="col-md-4">


<div class="card shadow">


<div class="card-header bg-success text-white">

Decision Tree

</div>


<div class="card-body">


<canvas id="treeChart"></canvas>


</div>


</div>


</div>



</div>





<br>




<div class="card shadow">


<div class="card-header bg-dark text-white">

Ringkasan Sistem

</div>


<div class="card-body">


<table class="table table-bordered">


<tr>

<th>

Total Dataset

</th>


<td>

<?= $dataset_berisiko+$dataset_tidak ?>

Data

</td>


</tr>



<tr>

<th>

Data Berisiko

</th>


<td class="text-danger">

<?= $dataset_berisiko ?>

</td>


</tr>



<tr>

<th>

Data Tidak Berisiko

</th>


<td class="text-success">

<?= $dataset_tidak ?>

</td>


</tr>


</table>


</div>


</div>





<script>


// ==========================
// PIE DATASET
// ==========================


new Chart(

document.getElementById('datasetChart'),

{


type:'pie',


data:{


labels:[

'Berisiko',

'Tidak Berisiko'

],


datasets:[{


data:[

<?= $dataset_berisiko ?>,

<?= $dataset_tidak ?>

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






// ==========================
// PIE NAIVE BAYES
// ==========================


new Chart(

document.getElementById('nbChart'),

{


type:'pie',


data:{


labels:[

'Berisiko',

'Tidak Berisiko'

],


datasets:[{


data:[

<?= $nb_berisiko ?>,

<?= $nb_tidak ?>

],


backgroundColor:[

'#ff0000',

'#00aa00'

]


}]


},


options:{


responsive:true


}


}

);






// ==========================
// DECISION TREE
// ==========================


new Chart(

document.getElementById('treeChart'),

{


type:'doughnut',


data:{


labels:[

'Aturan Risiko',

'Aturan Aman'

],


datasets:[{


data:[

70,

30

],


backgroundColor:[

'#ffc107',

'#0d6efd'

]


}]


},


options:{


responsive:true


}


}

);



</script>



<?php include 'footer.php'; ?>