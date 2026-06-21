<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
SPK Deteksi Dini Penyakit Jantung
</title>


<!-- Bootstrap 5 -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Bootstrap Icon -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">



<style>


body{

background:linear-gradient(
135deg,
#dc3545,
#6f42c1
);

height:100vh;

display:flex;

align-items:center;

justify-content:center;

}



.card{

border-radius:25px;

}


.icon-heart{

font-size:90px;

color:#dc3545;

}



.btn-masuk{

border-radius:30px;

padding:12px 40px;

font-size:18px;

}



</style>


</head>


<body>



<div class="container">


<div class="row justify-content-center">


<div class="col-md-6">



<div class="card shadow-lg">


<div class="card-body text-center p-5">



<i class="bi bi-heart-pulse-fill icon-heart"></i>



<h2 class="mt-3">

SPK Deteksi Dini

</h2>



<h3 class="text-danger">

Penyakit Jantung

</h3>



<p class="text-muted mt-3">


Sistem Pendukung Keputusan menggunakan

<br>


<b>
Algoritma Naive Bayes
</b>

dan

<b>
Decision Tree
</b>


untuk membantu mendeteksi risiko penyakit jantung.



</p>




<hr>




<div class="row mt-4">



<div class="col-4">


<i class="bi bi-database fs-2 text-primary"></i>


<p>

Dataset

</p>


</div>




<div class="col-4">


<i class="bi bi-cpu fs-2 text-success"></i>


<p>

Naive Bayes

</p>


</div>




<div class="col-4">


<i class="bi bi-diagram-3 fs-2 text-warning"></i>


<p>

Decision Tree

</p>


</div>



</div>




<br>




<a href="dashboard.php"

class="btn btn-danger btn-masuk">


<i class="bi bi-box-arrow-in-right"></i>

Masuk Sistem


</a>



</div>


</div>



</div>


</div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>