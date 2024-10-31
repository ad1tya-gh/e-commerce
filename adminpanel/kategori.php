<?php
    require "session.php";
    require "../koneksi.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo+Black&family=Bebas+Neue&family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Outfit:wght@100..900&family=Pacifico&family=Sriracha&display=swap" rel="stylesheet">
</head>

<style>
    .no-decoration{
        text-decoration:none;
    }

    .anton-regular {
    font-family: "Anton", sans-serif;
    font-weight: 400;
    font-style: normal;
    letter-spacing:1px;
    }

    .pacifico-regular {
    font-family: "Pacifico", cursive;
    font-weight: 400;
    font-style: normal;
    }

    /* // <uniquifier>: Use a unique and descriptive class name
    // <weight>: Use a value from 100 to 700 */

    .josefin-sans-100 {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 100;
    font-style: normal;
    }
    .josefin-sans-200 {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 200;
    font-style: normal;
    }
    .josefin-sans-300 {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 300;
    font-style: normal;
    }
    .josefin-sans-400 {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }
    .josefin-sans-500 {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    }
    .josefin-sans-600 {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 600;
    font-style: normal;
    }
    .josefin-sans-700 {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 700;
    font-style: normal;
    }

    .bebas-neue-regular {
    font-family: "Bebas Neue", sans-serif;
    font-weight: 400;
    font-style: normal;
    font-size: 40px;
    }

    .sriracha-regular {
    font-family: "Sriracha", serif;
    font-weight: 400;
    font-style: normal;
    }

    /* // <uniquifier>: Use a unique and descriptive class name
    // <weight>: Use a value from 100 to 900 */

    .outfit {
    font-family: "Outfit", serif;
    font-optical-sizing: auto;
    font-weight: 900;
    font-style: normal;
    }
    .outfit-400 {
    font-family: "Outfit", serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }
    .outfit-500 {
    font-family: "Outfit", serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    }

    .archivo-black-regular {
    font-family: "Archivo Black", serif;
    font-weight: 400;
    font-style: normal;
    }

    /* // <uniquifier>: Use a unique and descriptive class name
// <weight>: Use a value from 100 to 900 */

    .hanken {
    font-family: "Hanken Grotesk", serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    }
    .hanken-600- {
    font-family: "Hanken Grotesk", serif;
    font-optical-sizing: auto;
    font-weight: 600;
    font-style: normal;
    font-size: 34px;
    }
    .hanken-600 {
    font-family: "Hanken Grotesk", serif;
    font-optical-sizing: auto;
    font-weight: 600;
    font-style: normal;
    }
    .hanken-300 {
    font-family: "Hanken Grotesk", serif;
    font-optical-sizing: auto;
    font-weight: 300;
    font-style: normal;
    }
    .hanken-500 {
    font-family: "Hanken Grotesk", serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    }

    /* warna */

    .warna1 {
    background-color: #181c14;
    }

    .warna2 {
    background-color: #3c3d37;
    }

    .warna3 {
    background-color: #697565;
    }

    .warna4 {
    background-color: #ecdfcc;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5 pt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb josefin-sans-400">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="no-decoration text-muted">
                        <i class="fa-solid fa-house"></i> Home 
                    </a>
                </li>
                <li class="breadcrumb-item active " aria-current="page">
                    Kategori
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3 class="josefin-sans-700">Tambahkan Kategori</h3>

            <form action="" method="post">
                <div>
                    <label for="kategori" class="josefin-sans-400">Kategori</label>
                    <input type="text" name="kategori" id="kategori" placeholder="input nama kategori" class ="form-control josefin-sans-400" autocomplete=off>
                </div>
                
                <div class= "mt-3">
                    <button type="submit" class="btn btn-primary josefin-sans-500" name="simpan_kategori">Simpan</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    $queryExist = mysqli_query($conn, "SELECT nama FROM kategori WHERE nama='$kategori'");
                    $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

                    if($jumlahDataKategoriBaru > 0){
                        ?>
                        <div class="alert alert-warning mt-3 josefin-sans-400" role="alert">
                            Kategori sudah ada
                        </div>
                        <?php
                    }else{
                        $querySimpan = mysqli_query($conn, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                        if($querySimpan){
                            ?>
                            <div class="alert alert-success mt-3 josefin-sans-400" role="alert">
                                Kategori berhasil di tambahkan
                            </div>

                            <meta http-equiv="refresh" content="2; url=http:kategori.php">
                            <?php
                        }else{
                            echo mysqli_error($conn);
                        }
                    }
                }
            ?>
        </div>

        <div class="mt-3">
            <h2 class="josefin-sans-600">List Kategori</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead class="josefin-sans-500">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="josefin-sans-400">
                        <?php
                                if($jumlahKategori == 0){
                        ?>
                                    <tr>
                                        <td colspan=3 class="text-center">Tidak ada data kategori</td>
                                    </tr>
                        <?php
                                }
                                else{
                                    $jumlah = 1;
                                    while($data = mysqli_fetch_array($queryKategori)){
                        ?>
                                    <tr>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td>
                                            <a href="kategori-detail.php?p= <?php echo $data ['id'];?>" class = "btn btn-info">
                                                <i class = "fas fa-splid fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                        <?php
                                    $jumlah++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>