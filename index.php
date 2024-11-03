<?php
include('koneksi.php');
$db = new database();
$select = new Select(); // Corrected class name
$data_barang = $db->tampil_data();
$koneksi = mysqli_connect("localhost", "root", "", "belajaroop");

if(!empty($_SESSION["id"])){
    $user = $select->selectUserById($_SESSION["id"]);
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        form=background_border {
            margin: 0px 230px;
            color: white;
        }
    </style>
</head>

<body>
    <a HREF="tambah_data.php">Tambah Data</a>
    <form id="background_border" method="get">
        <input type="text" name="cari" placeholder="Cari Nama Barang">
        <input type="submit" value="cari">
    </form>
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        echo "<b>Hasil pencarian:" . $cari . "</b>";
    }
    ?>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        foreach ($data_barang as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['stok']; ?></td>
                <td><?php echo $row['harga_beli']; ?></td>
                <td><?php echo $row['harga_jual']; ?></td>
                <td>
                    <a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>&action">Edit</a>
                    <a href="prose_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete">Hapus</a>
                </td>
            </tr>
            <?PHP
        }
        ?>

    </table>

    <a href="logout.php">Logout</a>
</body>

</html>