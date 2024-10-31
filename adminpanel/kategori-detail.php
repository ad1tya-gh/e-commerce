<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['p'];

    $query = mysqli_query($conn, "SELECT * FROM kategori WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
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
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5 pt-5">
        <h2 class="josefin-sans-700">Detail Kategori</h2>
    
        <div class="col-12 col-md-6">
            <form action="" method="post">
                <div>
                    <label for="kategori" class="josefin-sans-400">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="<?php echo $data['nama']; ?>" class="form-control josefin-sans-400">
                </div>

                <div class="mt-5 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary josefin-sans-400" name="editBtn">Edit</button>
                    <button type="submit" class="btn btn-danger josefin-sans-400" name="hapusBtn">Hapus</button>
                </div>
            </form>

            <?php
                if(isset($_POST['editBtn'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    if($data['nama']==$kategori){
                        ?>
                        <meta http-equiv="refresh" content="0; kategori.php">
                        <?php
                    }else{
                        $query= mysqli_query($conn, "SELECT * FROM kategori WHERE nama = '$kategori'");
                        $jumlahData = mysqli_num_rows($query);
                        
                        if($jumlahData > 0){
                            ?>
                                <div class="alert alert-warning josefin-sans-400 mt-3" role="alert">
                                    Kategori sudah ada
                                </div>
                            <?php
                        }else{
                            $querySimpan = mysqli_query($conn, "UPDATE kategori SET nama = '$kategori' WHERE id='$id'");
                            if($querySimpan){
                                ?>
                                <div class="alert alert-success josefin-sans-400 mt-3" role="alert">
                                    Kategori berhasil di update
                                </div>
    
                                <meta http-equiv="refresh" content="2; url=http:kategori.php">
                                <?php
                            }else{
                                echo mysqli_error($conn);
                            }
                        }
                    }
                }

                if(isset($_POST['hapusBtn'])){
                    $queryCheck = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id = '$id'");
                    $dataCount = mysqli_num_rows($queryCheck);

                    if($dataCount > 0){
                ?>
                        <div class="alert alert-warning mt-3 josefin-sans-400" role="alert">
                                    Kategori tidak bisa di hapus, karena sudah di gunakan di produk
                                </div>
                <?php
                die();
                    }

                    $queryDelete = mysqli_query($conn, "DELETE FROM kategori WHERE id = '$id'");

                    if($queryDelete){
                        ?>
                            <div class="alert alert-success mt-3 josefin-sans-400" role="alert">
                                    Kategori berhasil di hapus
                            </div>

                                <meta http-equiv="refresh" content="2; url=http:kategori.php">
                        <?php
                    }else{
                        echo mysqli_error($conn);
                    }
                }
            ?>
        </div>
    </div>
    
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>