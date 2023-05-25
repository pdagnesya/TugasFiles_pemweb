<?php
    $data_buku = fopen("library.txt", "a+");
    $status ='';
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $kode_buku = $_POST['kode_buku'];
        $judul_buku = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $cover_buku = $_FILES['cover_buku'];

        $buku = $kode_buku.'_'.$cover_buku['name']; 
        $temp = $cover_buku['tmp_name'];

        $directory_files = "cover/";

        $upload = move_uploaded_file($temp, $directory_files.$buku);
        if(!$upload){
            echo "<script>alert('ERROR Save the Image')</script>";
        }

        $data = '';
        $data .= $kode_buku."-";
        $data .= $judul_buku."-";
        $data .= $pengarang."-";
        $data .= $penerbit."-";
        $data .= $tahun_terbit."-";
        $data .= $directory_files.$buku."\n";

        $save_data = fwrite($data_buku, $data);

        if($save_data == false) {
            $status = 'ERROR';
        } else {
            $status = 'OKAY';
        }
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Form Tambah Data</title>
    </head>
    <body>
        <header>
        <ul class="judul"> <h3>Library GoRead</h3></ul>
                <div class="ul">
                    <ul> <b>Putri Dwi Agnesya (21081010142)</b> </ul>
                </div>
        </header>
        <div class="nav" align="center">
            <a href="index.php"> Data Buku</a>
        <div>
        <div class="nav" align="center">
            <a href="form.php">Tambah Data Buku</a>
        <div>
        
            <main role="main">
                <?php
                    if($status == 'okay') {
                        echo "<br>Data Buku Berhasil Disimpan";
                    } elseif ($status == 'error') {
                        echo "<br>Data Buku Gagal Disimpan";
                    }
                ?>
    
                <h2>Form Tambah Data Buku </h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="kode_buku">Kode Buku</label></td>
                            <td><input type="number" name="kode_buku" id="kode_buku" placeholder="Kode Buku" required></td>
                        </tr>
                        <tr>
                            <td><label for="judul_buku">Judul Buku</label></td>
                            <td><input type="text" name="judul_buku" id="judul_buku" placeholder="Judul Buku" required></td>
                        </tr>
                        <tr>
                            <td><label for="pengarang">Pengarang Buku</label></td>
                            <td><input type="text" name="pengarang" id="pengarang" placeholder="Pengarang" required></td>
                        </tr>
                        <tr>
                            <td><label for="penerbit">Penerbit Buku</label></td>
                            <td><input type="text" name="penerbit" id="penerbit" placeholder="Penerbit Buku" required></td>
                        </tr>
                        <tr>
                            <td><label for="tahun_terbit">Tahun Terbit</label></td>
                            <td><input type="number" name="tahun_terbit" id="tahun_terbit" placeholder="Tahun Terbit Buku" required></td>
                        </tr>
                        <tr>
                            <td><label for="cover_buku">Gambar</label></td>
                            <td><input type="file" name="cover_buku" id="cover_buku" placeholder="Upload Disini" required></td>
                        </tr>

                    </table>
                    <button type="submit">SAVE</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>        