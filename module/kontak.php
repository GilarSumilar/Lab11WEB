<?php require('../tamplate/header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Kontak */
        .contact-form {
            width: 300px;
            margin: auto;
            margin-top: -40px;
        }

        .form-group label {
            display: block;
            margin-bottom: 1px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group textarea {
            height: 100px;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: rgb(44, 174, 253);
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 20px;
        }

        .submit-btn:hover {
            background-color: rgb(138, 142, 146);
        }
    </style>
</head>

<body>
    <div class="content">
        <h2>Ini Halaman <span>Kontak</span></h2>
        <p>Ini adalah bagian content dari halaman.</p>
    </div>
    <div class="contact-form" id="kontak"> <!--Kontak-->
        <h2>Contact Us</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Pesan:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Kirim Pesan</button>
        </form>
    </div>
</body>

</html>
<?php require('../tamplate/footer.php'); ?>