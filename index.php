<?php
include 'koneksi.php';

// Class Hewan (assessment 1)
class Hewan {
    protected $id;
    protected $nama;

    public function __construct($id, $nama) {
        $this->id = $id;
        $this->nama = $nama;
    }

    public function displayInfo() {
        return "ID: {$this->id}, Nama: {$this->nama}";
    }
}

class Mamalia extends Hewan {
    private $ciri_khas;

    public function __construct($id, $nama, $ciri_khas) {
        parent::__construct($id, $nama);
        $this->ciri_khas = $ciri_khas;
    }

    public function displayInfo() {
        return "Mamalia - " . parent::displayInfo() . ", Ciri Khas: {$this->ciri_khas}";
    }
}

class Burung extends Hewan {
    private $ciri_khas;

    public function __construct($id, $nama, $ciri_khas) {
        parent::__construct($id, $nama);
        $this->ciri_khas = $ciri_khas;
    }

    public function displayInfo() {
        return "Burung - " . parent::displayInfo() . ", Ciri Khas: {$this->ciri_khas}";
    }
}

// Proses penyimpanan data ke database
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jenis = mysqli_real_escape_string($koneksi, $_POST['jenis']);
    $ciri_khas = mysqli_real_escape_string($koneksi, $_POST['ciri_khas']);

    $query = "INSERT INTO hewan (nama, jenis, ciri_khas) VALUES ('$nama', '$jenis', '$ciri_khas')";
    if (!mysqli_query($koneksi, $query)) {
        echo "<script>alert('Gagal menyimpan: ".mysqli_error($koneksi)."')</script>";
    } else {
        echo "<script>alert('Data tersimpan'); window.location='index.php';</script>";
    }
}

// Ambil data untuk ditampilkan
$result = mysqli_query($koneksi, "SELECT * FROM hewan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Hewan - Kebun Binatang</title>
    <style>
        body {font-family: Arial; background-color: #f0f8ff;}
        form {background: #fff; padding: 20px; width: 400px; margin: 40px auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        input, select {width: 100%; padding: 10px; margin: 8px 0;}
        button {background: #2e8b57; color: white; padding: 10px; border: none; border-radius: 5px;}
        table {width: 90%; margin: 20px auto; border-collapse: collapse;}
        th, td {padding: 10px; border: 1px solid #ccc; text-align: center;}
        th {background: #e0ffff;}
    </style>
</head>
<body>

<h2 align="center">Registrasi Hewan Kebun Binatang</h2>

<form method="POST" action="">
    <label>Nama Hewan</label>
    <input type="text" name="nama" required>

    <label>Jenis</label>
    <select name="jenis" required>
        <option value="">-- Pilih Jenis --</option>
        <option value="Mamalia">Mamalia</option>
        <option value="Burung">Burung</option>
    </select>

    <label>Ciri Khas</label>
    <input type="text" name="ciri_khas" required>

    <button type="submit" name="submit">Simpan</button>
</form>

<h3 align="center">Daftar Hewan</h3>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Ciri Khas</th>
        <th>Waktu Input</th>
        <th>Info</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= htmlspecialchars($row['id']); ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['jenis']); ?></td>
            <td><?= htmlspecialchars($row['ciri_khas']); ?></td>
            <td><?= htmlspecialchars($row['tanggal_input']); ?></td>
            <td>
                <?php
                if ($row['jenis'] == 'Mamalia') {
                    $obj = new Mamalia($row['id'], $row['nama'], $row['ciri_khas']);
                } else {
                    $obj = new Burung($row['id'], $row['nama'], $row['ciri_khas']);
                }
                echo htmlspecialchars($obj->displayInfo());
                ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
