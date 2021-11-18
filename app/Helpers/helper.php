<?php
$koneksi=mysqli_connect('localhost','root','','final_project');
function ambilData($koneksi){
    $sql = "SELECT * FROM pembukuans ORDER BY id DESC LIMIT 1";
    $query = mysqli_query($koneksi,$sql);
    if ($query){
        $x = mysqli_fetch_array($query);
        if(isset($x['saldo'])){
            $data = $x['saldo'];
            return $data;
        }
    }
    else
        return 0;
}

