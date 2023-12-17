<?php require('../../tamplate/header.php'); ?>
<?php
include("../../class/database.php");
$db = new Database();

if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];


    // $deleteSql = "DELETE FROM data_barang WHERE id_barang = $idToDelete";
    // $deleteResult = mysqli_query($conn, $deleteSql);

    $deleteResult = $db->delete("data_barang", "id_barang = $idToDelete");


    if ($deleteResult) {
        header("Location: data_barang.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// query untuk menampilkan data
// $sql = 'SELECT * FROM data_barang';
// $result = mysqli_query($conn, $sql);
$db = new Database();
$result = $db->get("data_barang");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="../../styleG.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>

<body>
    <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result) : ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><img src="../../gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['kategori']; ?></td>
                            <td><?= $row['harga_beli']; ?></td>
                            <td><?= $row['harga_jual']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td>
                                <a class="delete" href="?delete=<?= $row['id_barang']; ?>" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</a>
                                <a class="ubah" href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                            </td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
            <table>
                <th><a class="tambah" href="tambah_barang.php">Tambahkan Barang</a></th>
            </table>
        </div>
    </div>
</body>
<?php require('../../tamplate/footer.php'); ?>

</html>