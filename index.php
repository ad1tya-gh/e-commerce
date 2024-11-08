<?php
    require "koneksi.php";
    $queryProduk = mysqli_query($conn, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALcatraz e-commerce</title>
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

    .kategori-baju-pria {
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("image/baEvECXvejqNkWOFiQ05.jpg");
    background-size: cover;
    background-position: center;
    box-shadow: 0px 0px 13px 4px rgba(0,0,0,0.2);
    }

    .kategori-baju-wanita {
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("image/0oA2YaAsk4IBo4b8SH7p.jpeg");
    background-size: cover;
    background-position: center;
    box-shadow: 0px 0px 13px 4px rgba(0,0,0,0.2);
    }

    .kategori-sepatu {
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("image/bH8bQgvskP7rCzDMsnyJ.jpg");
    background-position: center;
    background-size: cover;
    box-shadow: 0px 0px 13px 4px rgba(0,0,0,0.2);
    }

    .hover-img {
        transition: 0.5s;
    }

    .hover-img:hover {
        transform: scale(1.1);
        z-index: 2;
    }

    .card {
        box-shadow:0px 0px 12px 4px rgba(0,0,0,0.2);
    }

    .banner {
        height: 100vh;
        background-attachment: fixed;
    }

    @media screen and (max-width: 1050px){
        .banner {
            height: 40vh;
            padding-top: 80px;
        }
    }

</style>

<body>
    <?php require "navbar.php"; ?>
    
    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1 class="outfit">Al-Catraz Fashion</h1>
            <h5 class="sriracha-regular">Mau Cari Apa?</h5>

            <div class="col-md-8 offset-md-2">
                <form action="produk.php" method="get">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control pacifico-regular" placeholder="Nama Produk" aria-label="Nama Produk" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna2 text-white josefin-sans-400">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- highlit -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3 class="josefin-sans-700">Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class=" hover-img col-md-4 mb-3 ">
                    <a class="no-decoration" href="produk.php?kategori=Pakaian Pria">
                        <div class=" highlighted-kategori kategori-baju-pria img-thumbnail d-flex justify-content-center align-items-center">
                            <h4 class="text-white hanken-600-">Baju Pria</h4>
                        </div>
                    </a>
                </div>
                <div class=" hover-img col-md-4 mb-3">
                    <a class="no-decoration" href="produk.php?kategori=Sepatu">
                        <div class="highlighted-kategori kategori-sepatu img-thumbnail d-flex justify-content-center align-items-center">
                            <h4 class="text-white hanken-600-">Sepatu</h4>
                        </div>
                    </a>
                </div>
                <div class=" hover-img col-md-4 mb-3">
                    <a class="no-decoration"href="produk.php?kategori=Pakaian Wanita">
                        <div class="highlighted-kategori kategori-baju-wanita img-thumbnail d-flex justify-content-center align-items-center">
                            <h4 class="text-white hanken-600-">Baju Wanita</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->

    <div class="container-fluid warna3 py-5" id="tentang-kami">
        <div class="container text-center text-white">
            <h3 class="josefin-sans-700">Tentang Kami</h3>
            <p class="fs-6 mt-3 hanken">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum laudantium facilis aspernatur incidunt atque esse molestias. Corrupti perspiciatis iusto provident reprehenderit! Provident, beatae aspernatur repellat, dolorem similique, quasi praesentium error repellendus fugiat non nam excepturi? Nam repudiandae animi at quisquam rem tenetur amet, quis a fuga? Ullam deserunt, similique voluptates et odio possimus corporis animi eum veniam nemo adipisci aliquid beatae consequuntur a ipsam obcaecati expedita tenetur facere? Architecto molestias similique suscipit harum voluptate illum quo at aliquid porro doloremque.</p>
        </div>
    </div>

    <!-- produk -->

    <div class="container-fluid py-5" id="produk">
        <div class="container text-center">
            <h3 class="josefin-sans-700">Produk</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="image-box">
                        <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">

                        </div>
                        <div class="card-body">
                            <h4 class="card-title outfit-500"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate hanken"><?php echo $data['detail']; ?></p>
                            <p class="text-harga card-text hanken-600"><?php echo "Rp " . number_format("$data[harga]", 2, ",", "."); ?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?> " class="btn warna2 text-white hanken">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a href="produk.php" class="btn btn-outline-primary mt-3 p-2 hanken-500">Lihat Lainnya</a>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php"; ?>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>