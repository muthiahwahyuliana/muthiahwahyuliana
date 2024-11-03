<?php
include('koneksi.php');
$koneksi = new database();

$action = $_GET['action'];

if ($action == "add") {
    $koneksi->tambah_data($_POST['nama_barang'], $_POST['stok'], $_POST['harga_beli'], $_POST['harga_jual']);
    header(header: "location:index.php");
} else if ($action == "edit") {
    $id_barang = $_GET['id_barang'];
    $koneksi->tambah_data($_POST['nama_barang'], $_POST['stok'], $_POST['harga_beli'], $_POST['harga_jual']);
    header(header: "location:index.php");
} else if ($action == "delete") {
    $id_barang = $_GET['id_barang'];
    $koneksi->delete_data(id_barang: $id_barang);
    header(header: "location:index.php");
} else if ($action == "search") {
    $nama_barang = $_GET['nama_barang'];
    $koneksi->cari_data(nama_barang: $nama_barang);
    header(header: "location:index.php");
}