<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['p'];

    
    $query = mysqli_query($conn, "SELECT produk.*, kategori.nama AS nama_kategori FROM produk JOIN kategori ON produk.kategori_id=kategori.id WHERE produk.id=$id");
    $data = mysqli_fetch_array($query);

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id != '$data[kategori_id]'");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
    
        return $randomString;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
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

    form div{
        margin-bottom: 10px;
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
        <h2 class="josefin-sans-700">Detail Produk</h2>

        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama" class="josefin-sans-400">Nama</label>
                    <input type="text" name="nama" value="<?php echo $data['nama'] ?>" id="nama" class="form-control josefin-sans-400" autocomplete="off" required>
                </div>

                <div class="josefin-sans-400">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['nama_kategori'] ?></option>
                        <?php
                        while($dataKategori=mysqli_fetch_array($queryKategori)){
                        ?>
                            <option value="<?php echo $dataKategori ['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="josefin-sans-400">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" value="<?php echo $data['harga'] ?>" id="harga" class="form-control" required>
                </div>

                <div class="josefin-sans-400">
                    <label for="currentFoto">Foto Produk Sekarang</label>
                    <img src="../image/<?php echo $data['foto']; ?>" alt="" width="300px">
                </div>

                <div class="josefin-sans-400">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>

                <div class="josefin-sans-400">
                    <label for="detali">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
                        <?php echo $data['detail']; ?>
                    </textarea>
                </div>

                <div class="josefin-sans-400">
                    <label for="stok">Stok</label>
                    <select name="stok" id="stok" class="form-control">
                        <option value="<?php echo $data['ketersediaan_stok']; ?>"><?php echo $data['ketersediaan_stok']; ?></option>
                        <?php if($data['ketersediaan_stok']=='tersedia'){
                    ?>
                            <option value="habis">habis</option>
                    <?php
                        }else{
                    ?>
                            <option value="tersedia">tersedia</option>
                    <?php
                        } ?>
                    </select>
                </div>

                <div class="d-flex justify-content-between josefin-sans-400">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan'])){
                    $nama = htmlspecialchars($_POST['nama']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $detail = htmlspecialchars($_POST['detail']);
                    $stok = htmlspecialchars($_POST['stok']);

                    $target_dir = "../image/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $randomName = generateRandomString(20);
                    $newName = $randomName . '.' . $imageFileType;

                    if($nama=='' || $kategori=='' || $harga==''){
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Nama, Kategori dan Harga wajib di isi
                        </div>
                        <?php
                    }else{
                        $queryUpdate = mysqli_query($conn, "UPDATE produk SET kategori_id='$kategori', nama = '$nama', harga = '$harga', detail = '$detail', ketersediaan_stok = '$stok' WHERE id = '$id'");

                        if($nama_file!=''){
                            if($image_size > 500000){
                                ?>
                                    <div class="alert alert-warning mt-3" role="alert">
                                        File tidak boleh lebih dari 500 kb
                                    </div>
                                <?php
                                    }else{
                                        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' ){
                                ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            File wajib bertipe jpg, png, jpeg
                                        </div>
                                <?php
                                        }else{
                                            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $newName);

                                            $queryUpdate = mysqli_query($conn, "UPDATE produk SET foto='$newName' WHERE id='$id'");

                                            if($queryUpdate){
                                ?>
                                            <div class="alert alert-success mt-3" role="alert">
                                                Produk berhasil di tambahkan
                                            </div>

                                            <meta http-equiv="refresh" content="2; url=produk.php">
                                <?php
                                            }
                                        }
                                    }
                        }
                }
            }

            if(isset($_POST['hapus'])){
                $queryHapus = mysqli_query($conn, "DELETE FROM produk WHERE id = '$id'");

                if($queryHapus){
                    ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Produk berhasil di hapus
                        </div>

                        <meta http-equiv="refresh" content="2; url=produk.php">
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>