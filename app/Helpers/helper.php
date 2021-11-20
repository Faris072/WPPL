<?php
$koneksi=mysqli_connect('localhost','root','','project-akhir-wabw');
function updateSaldo($koneksi,$requestDebit,$requestKredit){
    $sql = "SELECT * FROM pembukuans WHERE id < (SELECT * FROM pembukuans HAVING MAX(id)) ORDER BY id DESC LIMIT 1";
    $query = mysqli_query($koneksi,$sql);
    if ($query){
        $x = mysqli_fetch_array($query);
        if(isset($x['saldo'])){
            $data = $x['saldo'];
            return $data + $requestDebit - $requestKredit;
        }
    }
    else
        return 0;
}

function insertSaldo($koneksi,$requestDebit,$requestKredit){
    $sql = "SELECT * FROM pembukuans ORDER BY id DESC LIMIT 1";
    $query = mysqli_query($koneksi,$sql);
    if ($query){
        $x = mysqli_fetch_array($query);
        if(isset($x['saldo'])){
            $data = $x['saldo'];
            $data = $data + $requestDebit - $requestKredit;
            return $data;
        }
        else{
            if(isset($requestKredit)){
                return redirect('/pembukuan');
            }
            else{
                return $requestDebit;
            }
        }
    }
    else
        return redirect('/pembukuan',['pesan'=>'Kesalahan server!']);
}

