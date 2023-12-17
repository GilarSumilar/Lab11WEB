<?php
include("../../class/database.php");
$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = [];
    $data['nama'] = $_POST['nama'];
    $data['kategori'] = $_POST['kategori'];
    $data['harga_jual'] = $_POST['harga_jual'];
    $data['harga_beli'] = $_POST['harga_beli'];
    $data['stok'] = $_POST['stok'];

    // Upload image file
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "../../gambar/" . $gambar;
    move_uploaded_file($gambar_tmp, $gambar_path);

    $data['gambar'] = $gambar;



    // $insertSql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) 
    //               VALUES ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')";

    // $insertResult = mysqli_query($conn, $insertSql);

    $insertResult = $db->insert("data_barang", $data);

    if ($insertResult) {
        header("Location: data_barang.php");
        exit();
    } else {
        echo "Error adding record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="../../styleG.css" rel="stylesheet" type="text/css" />
    <title>Tambah Barang</title>
    <style>
        .main {
            margin: auto;
            width: 35%;
            height: 35%;
        }

        table {
            border: 1px solid;
            padding: 2px;
            margin: 2px;
            border-radius: 3px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: rgb(44, 174, 253);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: rgb(4, 149, 237);
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Tambah Barang</h1>
        <div class="main">
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="nama">Nama Barang:</label></td>
                        <td><input type="text" name="nama" required></td>
                    </tr>
                    <tr>
                        <td><label for="kategori">Kategori:</label></td>
                        <td><select name="kategori">
                                <option value="Komputer">Komputer</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Hand Phone">Hand Phone</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><label for="harga_jual">Harga Jual:</label></td>
                        <td><input type="number" name="harga_jual" required></td>
                    </tr>
                    <tr>
                        <td><label for="harga_beli">Harga Beli:</label></td>
                        <td><input type="number" name="harga_beli" required></td>
                    </tr>
                    <tr>
                        <td><label for="stok">Stok:</label></td>
                        <td><input type="number" name="stok" required></td>
                    </tr>
                </table>
                <tr>
                    <td>
                        <p>Gambar : <input type="file" name="gambar" accept="image/*" required></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Add</button></td>
                </tr>
        </div>
    </div>
</body>

</html>

</html>