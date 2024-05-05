<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$tp = new TampilPasien();
if(isset($_GET['id_edit'])){
    $tp->tampilEdit($_GET['id_edit']);
}
else if(isset($_GET['id_delete'])){
    $tp->deletePasien($_GET['id_delete']);
}
else if(isset($_POST['edit'])){
    $tp->editPasien($_POST);
}
else $tp->tampil();