<?php

include 'header.php';
include 'koneksi.php';

?>


<h3 class="mb-4">

Pohon Keputusan (Decision Tree)

</h3>



<div class="card shadow mb-4">


<div class="card-header bg-primary text-white">

Aturan Decision Tree Deteksi Penyakit Jantung

</div>


<div class="card-body">


<div class="text-center">


<h5>

Pohon Pengambilan Keputusan

</h5>


<br>


<div class="alert alert-warning">

<b>

Apakah Pasien Mengalami Nyeri Dada?

</b>

</div>



<div class="row">


<div class="col-md-6">


<div class="card border-danger">


<div class="card-body">


<h5 class="text-danger">

YA

</h5>


<p>

Periksa Kolesterol

</p>



<div class="alert alert-danger">


Kolesterol Tinggi?


</div>



<p>

YA → <b>Berisiko</b>

</p>


<p>

TIDAK → Cek Tekanan Darah

</p>


</div>


</div>


</div>




<div class="col-md-6">


<div class="card border-success">


<div class="card-body">


<h5 class="text-success">

TIDAK

</h5>


<div class="alert alert-success">


Tidak Berisiko

</div>


</div>


</div>


</div>


</div>


</div>


</div>


</div>





<br>




<div class="card shadow">


<div class="card-header bg-success text-white">

Form Prediksi Decision Tree

</div>



<div class="card-body">


<form method="post">


<div class="row">


<div class="col-md-4">


<label>
Nyeri Dada
</label>


<select 
name="nyeri"
class="form-control">


<option>Ya</option>

<option>Tidak</option>


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

<option>Normal</option>


</select>


</div>




<div class="col-md-4">


<label>
Tekanan Darah
</label>


<select 
name="tekanan"
class="form-control">


<option>Tinggi</option>

<option>Normal</option>


</select>


</div>


</div>


<br>


<button 
name="proses_tree"
class="btn btn-primary">

Proses Decision Tree

</button>


</form>


</div>


</div>





<?php


if(isset($_POST['proses_tree']))
{


$nyeri=$_POST['nyeri'];

$kolesterol=$_POST['kolesterol'];

$tekanan=$_POST['tekanan'];





// RULE DECISION TREE


if($nyeri=="Ya")
{


    if($kolesterol=="Tinggi")
    {

        $hasil="Berisiko";

    }

    else if($tekanan=="Tinggi")
    {

        $hasil="Berisiko";

    }

    else

    {

        $hasil="Tidak Berisiko";

    }


}

else

{

$hasil="Tidak Berisiko";

}




?>

<br>


<div class="card shadow">


<div class="card-header bg-info text-white">

Hasil Decision Tree

</div>


<div class="card-body text-center">


<h4>


<?php


if($hasil=="Berisiko")

{

echo "

<span class='badge bg-danger fs-4'>

BERISIKO

</span>

";

}

else

{

echo "

<span class='badge bg-success fs-4'>

TIDAK BERISIKO

</span>

";

}


?>


</h4>


</div>


</div>



<?php

}

?>


<?php include 'footer.php'; ?>