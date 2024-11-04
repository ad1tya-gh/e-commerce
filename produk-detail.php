<?php
    require "koneksi.php";

    $nama = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama = '$nama'");
    $produk = mysqli_fetch_array($queryProduk);

    $queryProdukTerkait = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id = '$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Detail</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo+Black&family=Bebas+Neue&family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Outfit:wght@100..900&family=Pacifico&family=Sriracha&display=swap" rel="stylesheet">
</head>

<style>
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
    .josefin-sans-400-italic {
    font-family: "Josefin Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: italic;
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
</style>

<body>
    <?php require "navbar.php"; ?>

    <!-- Detail produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <img src="image/<?php echo $produk['foto'] ?>" alt="" class="w-100 img-thumbnail">
                </div>
                <div class="col-lg-6 offset-md-1">
                    <h1 class="outfit"><?php echo $produk['nama']; ?></h1>
                    <p class="fs-5 josefin-sans-500"><?php echo $produk['detail']; ?></p>
                    <p class="text-harga outfit fs-3"><?php   echo "Rp " . number_format("$produk[harga]", 2, ",", "."); ?></p>
                    <p class="fs-5 josefin-sans-400">Status : <strong><?php echo $produk['ketersediaan_stok']; ?></strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- produk terkait -->
    <div class="container-fluid py-5 warna3">
        <div class="container">
            <h2 class="text-center text-white mb-3 josefin-sans-700">Produk Terkait</h2>

            <div class="row">
                <?php while($data=mysqli_fetch_array($queryProdukTerkait)){ ?>
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
                    <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail produk-terkait-img" alt="">
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php"; ?>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>