<?php

function koneksi(){
    $koneksi=mysqli_connect('localhost','root','','project-akhir-wabw');
    return $koneksi;
}


function updateSaldo($requestDebit,$requestKredit,$id){
    $sql = "SELECT * FROM pembukuans WHERE id < $id ORDER BY id DESC LIMIT 1";
    $query = mysqli_query(koneksi(),$sql);
    if ($query){
        if(($x = mysqli_fetch_array($query))){
            // @dd($x);
            if(isset($x['saldo'])){
                $data = $x['saldo'];
                return $data + $requestDebit - $requestKredit;
            }
            else{
                return $requestDebit;
            }
        }
        else{
            return $requestDebit;
        }
    }
    else
        return 0;
}


function insertSaldo($requestDebit,$requestKredit){
    $sql = "SELECT * FROM pembukuans ORDER BY id DESC LIMIT 1";
    $query = mysqli_query(koneksi(),$sql);
    if ($query){
        $x = mysqli_fetch_array($query);
        if(isset($x['saldo'])){
            $data = $x['saldo'];
            $data = $data + $requestDebit - $requestKredit;
            return $data;
        }
        else{
            if(isset($requestKredit)){
                return ?> <script>swal("Deposit Gagal", "Pastikan saldo anda cukup", "danger");</script> <?php
            }
            else{
                return $requestDebit;
            }
        }
    }
    else
    ?> <script>swal("Kesalahan Server", "Mohon maaf", "danger");</script> <?php
}


function banyakDataSetelah($id){
    $sql = "SELECT * FROM pembukuan WHERE id > '$id'";
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


function dataSetelah($id){
    $sql = "SELECT id FROM pembukuan WHERE id > ".$id." ORDER BY id LIMIT 1";
    $query = mysqli_query(koneksi(),$sql);
    if($query){
        if(($pecah = mysqli_fetch_array($query))){
            return $pecah['id'];
        }
        else{
            return 0;
        }
    }
}


// function updateRefresh(){
//     if(isset($_POST['update'])){
//         $data = banyakDataSetelah($id);
//         $id = $data->id;
//         for($i=0;$i<$data;$i++){
//             $id = $id+1;
//     }
// }
