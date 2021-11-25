<?php

function koneksi(){
    $koneksi=mysqli_connect('localhost','root','','project-akhir-wabw') or die("Unable to connect");
    return $koneksi;
}


function banyakDataSetelah($idRepo,$id){
    $sql = "SELECT * FROM pembukuan WHERE id_repo = ".$idRepo." AND id_pembukuans > ".$id." ORDER BY id_pembukuans";
    $query = mysqli_query(koneksi(),$sql);
    if($query){
        $i=0;
        while($pecah=mysqli_fetch_array($query)){
            $i++;
        }
        return $i;
    }
    else{
        return ?> <script>swal("Deposit Gagal", "Pastikan saldo anda cukup", "danger");</script> <?php
    }
}


function saldoSetelah($idRepo,$id){
    $sql = "SELECT * FROM pembukuan WHERE id_repo = ".$idRepo." AND id_pembukuans > ".$id." ORDER BY id_pembukuans LIMIT 1";
    $query = mysqli_query(koneksi(),$sql);
    if($query){
        if(($pecah = mysqli_fetch_array($query))){
            return $pecah['saldo'];
        }
        else{
            return 0;
        }
    }
}

function saldoSebelum($idRepo,$id){
    $sql = "SELECT * FROM pembukuans WHERE id_repo = ".$idRepo." AND id_pembukuans < ".$id." ORDER BY id_pembukuans DESC LIMIT 1";
    $query = mysqli_query(koneksi(),$sql) or die('query gagal');
    if($query){
        if(($x = mysqli_fetch_array($query))){
            return $x['saldo'];
        }
        else{
            return 0;
        }
    }
    else{
        @dd('query gagal');
    }

}

function saldoMax($idRepo,$requestDebit){
    $sql = "SELECT * FROM pembukuans WHERE id_repo =".$idRepo." ORDER BY id_pembukuans DESC LIMIT 1";
    $query = mysqli_query(koneksi(),$sql) or die('query gagal');
    if($query){
        if(($x = mysqli_fetch_array($query))){
            // $x = mysqli_fetch_array($query);
            return $x['saldo'];
        }
        else{
            return 0;
        }
    }
    else{
        @dd('query gagal');
    }
}

function updateSaldo($idRepo,$requestDebit,$requestKredit,$id){
    $sebelum = saldoSebelum($idRepo,$id);
    return $sebelum + $requestDebit - $requestKredit;
}


function insertSaldo($idRepo,$requestDebit,$requestKredit){
    $max = saldoMax($idRepo,$requestDebit);
    return $max + $requestDebit - $requestKredit;
}




// function updateRefresh(){
//     if(isset($_POST['update'])){
//         $data = banyakDataSetelah($id);
//         $id = $data->id;
//         for($i=0;$i<$data;$i++){
//             $id = $id+1;
//     }
// }
