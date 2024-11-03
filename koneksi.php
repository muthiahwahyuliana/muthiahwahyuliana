<?php
class Database
{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "belajaroop";
    var $koneksi;

        public function __construct() {
            $this->koneksi = mysqli_connect("localhost", "root", "", "belajaroop");
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
            }
        }
    }

class Login extends Database
{
    public $id;

    public function login($username, $password)
    {
        $result = mysqli_query($this->koneksi, "SELECT * FROM user WHERE username = '$username'");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($password == $row["password"]) {
                $this->id_user = $row["id_user"];
                return 1; // Login successful
            } else {
                return 10; // Wrong password
            }
        } else {
            return 100; // User not registered
        }
    }

    public function idUser ()
    {
        return $this->id;
    }
}

class Select extends Database
{
    public function selectUserById($id)
    {
    $result = mysqli_query($this->koneksi, "SELECT * FROM user WHERE id_user = $id");
    return mysqli_fetch_assoc($result);
}

public function tampil_data()
{
    $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang");
    $hasil = [];
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
}

    public function tambah_data($nama_barang, $stok, $harga_beli, $harga_jual)
    {
        mysqli_query($this->koneksi, "INSERT INTO tb_barang VALUES ('', '$nama_barang', '$stok', '$harga_beli', '$harga_jual')");
    }

    public function tampil_edit_data($id_barang)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
        $hasil = [];
        while ($d = mysqli_fetch_array($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    public function edit_data($id_barang, $nama_barang, $stok, $harga_beli, $harga_jual)
    {
        mysqli_query($this->koneksi, "UPDATE tb_barang SET nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' WHERE id_barang='$id_barang'");
    }

    public function delete_data($id_barang)
    {
        mysqli_query($this->koneksi, "DELETE FROM tb_barang WHERE id_barang='$id_barang'");
    }

    public function cari_data($nama_barang)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang WHERE nama_barang='$nama_barang'");
        $hasil = [];
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
}
?>
