<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contoh Modularisasi</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: "Roboto", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            height: 611px;
            /* Mengisi seluruh tinggi viewport */
            position: relative;
        }

        nav {
            width: 100%;
            background-color: rgb(44, 174, 253);
            padding: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav>a {
            text-decoration: none;
            color: white;
            padding: 10px;
            margin: 10px 5px;
            border-radius: 5px;
        }

        nav>a:hover,
        nav>a.active {
            background-color: rgb(4, 149, 237);
        }

        header {
            text-align: center;
            padding: 30px;
        }

        header code {
            color: crimson;
        }

        .content {
            background-color: rgb(165, 165, 165);
            color: white;
            width: 90%;
            margin: auto;
            margin-bottom: 50px;
            padding: 20px;
            border-radius: 5px;
        }

        .content h2 {
            margin-bottom: 20px;

        }

        .content span {
            color: rgb(52, 55, 57);
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: rgb(44, 174, 253);
            text-align: center;
            padding: 20px 0;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Modularisasi Menggunakan Require</h1>
        </header>
        <nav>
            <a href="home.php">Home</a>
            <a href="about.php">Tentang</a>
            <a href="kontak.php">Kontak</a>
            <a href="artikel/data_barang.php">Data barang</a>
        </nav>