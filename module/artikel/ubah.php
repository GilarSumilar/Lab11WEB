<?php
include("database.php");
$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idToUpdate = $_POST['id_barang'];
    $newData = array(

        'nama' => $_POST['nama'],
        'kategori' => $_POST['kategori'],
        'harga_beli' => $_POST['harga_beli'],
        'harga_jual' => $_POST['harga_jual'],
        'stok' => $_POST['stok']

    );

    if ($_FILES['gambar']['size'] > 0) {

        $targetDirectory = "gambar/";
        $targetFileName = $targetDirectory . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFileName);



        $newGambar = $_FILES['gambar']['name'];
        $updateImageSql = "UPDATE data_barang SET gambar = '$newGambar' WHERE id_barang = $idToUpdate";
        // mysqli_query($conn, $updateImageSql);
        $db->query($updateImageSql);
    }

    $updateSql = "UPDATE data_barang SET ";
    foreach ($newData as $field => $value) {
        $updateSql .= "$field = '$value', ";
    }
    $updateSql = rtrim($updateSql, ', ') . " WHERE id_barang = $idToUpdate";

    $updateResult = $db->query($updateSql);


    if ($updateResult) {
        header("Location: data_barang.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}


if (isset($_GET['id'])) {
    $idToEdit = $_GET['id'];


    // $editSql = "SELECT * FROM data_barang WHERE id_barang = $idToEdit";
    // $editResult = mysqli_query($conn, $editSql);

    $row = $db->getbyid("data_barang", $idToEdit);

    if ($row) {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <link href="styleG.css" rel="stylesheet" type="text/css" />
            <title>Edit Barang</title>

            <style>
                .main {
                    margin: auto;
                    width: 50%;
                    height: 50%;
                }

                button {
                    background-color: rgb(44, 174, 253);
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    margin-top: 5px;
                }

                button:hover {
                    background-color: rgb(4, 149, 237);
                }
            </style>
        </head>

        <body>
            <div class="container">
                <h1>Edit Barang</h1>
                <div class="main">
                    <form method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><label>Nama Barang:</label></td>
                                <td><input type="text" name="nama" value="<?= $row['nama']; ?>" required></td>
                            </tr>
                            <tr>
                                <td><label>Kategori:</label></td>
                                <td>
                                    <select name="kategori" required>
                                        <option value="Komputer" <?= ($row['kategori'] == 'Komputer') ? 'selected' : ''; ?>>Komputer</option>
                                        <option value="Elektronik" <?= ($row['kategori'] == 'Elektronik') ? 'selected' : ''; ?>>Elektronik</option>
                                        <option value="Hand phone" <?= ($row['kategori'] == 'Hand phone') ? 'selected' : ''; ?>>Hand phone</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td><label>Harga Beli:</label></td>
                                <td><input type="text" name="harga_beli" value="<?= $row['harga_beli']; ?>" required></td>
                            </tr>
                            <tr>
                                <td><label>Harga Jual:</label></td>
                                <td><input type="text" name="harga_jual" value="<?= $row['harga_jual']; ?>" required></td>
                            </tr>
                            <tr>
                                <td><label>Stok:</label></td>
                                <td><input type="text" name="stok" value="<?= $row['stok']; ?>" required></td>
                            </tr>
                            <tr>
                                <td><label for="gambar">Gambar:</label></td>
                                <td><input type="file" name="gambar"></td>
                            </tr>
                        </table>
                        <table class="button">
                            <tr>
                                <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">
                                <button type="submit">Simpan</button>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        echo "Barang not found";
    }
} else {
    echo "ID parameter is missing";
}
?>