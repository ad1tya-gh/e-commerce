<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['p'];

    $query = mysqli_query($conn, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
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
</head>

<style>
    .no-decoration{
        text-decoration:none;
    }

    form div{
        margin-bottom: 10px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <h2>Detail Produk</h2>

        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="<?php echo $data['nama'] ?>" id="nama" class="form-control" autocomplete="off" required>
                </div>

                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?php echo $data['kategori_id'] ?>"><?php echo $data['nama_kategori'] ?></option>
                        <?php
                        while($dataKategori=mysqli_fetch_array($queryKategori)){
                        ?>
                            <option value="<?php echo $dataKategori ['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" value="<?php echo $data['harga'] ?>" id="harga" class="form-control" required>
                </div>

                <div>
                    <label for="currentFoto">Foto Produk Sekarang</label>
                    <img src="../image/<?php echo $data['foto']; ?>" alt="" width="300px">
                </div>

                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>

                <div>
                    <label for="detali">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
                        <?php echo $data['detail']; ?>
                    </textarea>
                </div>

                <div>
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

                <div class="d-flex justify-content-between">
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