<?php
session_start();
include '../config/koneksi.php';

if(isset($_POST['submit_jenis_obat'])){
    // $data = [
    //     "kategori" => $_POST['cat'],
    //     "deskripsi" => $_POST['desc'],
    //     "efekSamping" => $_POST['efek']
    // ];

    $kategori = $_POST['cat'];
    $deskripsi = $_POST['desc'];
    $efekSamping = $_POST['efek'];

    $query = mysqli_query($koneksi, "INSERT INTO `category` (`kategori`, `deskripsi`, `efekSamping`) VALUES ('$kategori', '$deskripsi', '$efekSamping')");

    if($query){
        $_SESSION['message'] = "<script>Swal.fire({title: 'Berhasil!',text: 'Data Berhasil Di Tambahkan!',icon: 'success',confirmButtonText: 'OK'})</script>";
        header("Location: index.php");
    }
}
elseif(isset($_POST['edit_jenis_obat'])){
    $kategori = $_POST['cat'];
    $deskripsi = $_POST['desc'];
    $efekSamping = $_POST['efek'];
    $id = $_POST['id'];
    $query = mysqli_query($koneksi, "UPDATE `category` SET kategori='$kategori', deskripsi='$deskripsi', efekSamping='$efekSamping' WHERE id='$id'") or die(mysqli_error($koneksi));
    if($query){
        $_SESSION['message'] = "<script>Swal.fire({title: 'Berhasil!',text: 'Data Berhasil Di Edit!',icon: 'success',confirmButtonText: 'OK'})</script>";
        header("Location: index.php");
    }
}
elseif(isset($_POST['hapus_category'])){
    $id = $_POST['id'];

    $query = mysqli_query($koneksi, "DELETE FROM category WHERE id='$id'") or die(mysqli_error($koneksi));

    if($query){
        $_SESSION['message'] = "<script>Swal.fire({title: 'Berhasil!',text: 'Data Berhasil Hapus!',icon: 'success',confirmButtonText: 'OK'})</script>";
        header("Location: kategori.php");
    }
}
elseif(isset($_POST['submit_unit_obat'])){
    $unit = $_POST['unit'];

    $query = mysqli_query($koneksi, "INSERT INTO units (unit) VALUES ('$unit')") or die(mysqli_error($koneksi));
    if($query){
        $_SESSION['message'] = "<script>Swal.fire({title: 'Berhasil!',text: 'Data Berhasil Di Tambahkan!',icon: 'success',confirmButtonText: 'OK'})</script>";
        header("Location: index.php");
    }
}
else {
    echo "What Are You Doing Here Sir ?";
}


?>