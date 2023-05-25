<?php
    $status = isset($_GET['status']) ? $_GET['status'] : ' ';
    $buku = "library.txt";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Library GoRead</title>
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
    
    <div align="center">
        <main role="main">
            <?php
                if($status == 'OKAY') {
                    echo "<br>Data Buku Berhasil ditambah";
                } elseif ($status == 'ERROR') {
                    echo "<br>Data Buku Gagal Disimpan";
                }
            ?>
            <h2>DATA BUKU</h2>
            <div>
                <table border="2" cellpadding=10s>
                    <thead>
                        <tr>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                           <th>Cover</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach (file($buku) as $line) :
                                $dataBuku = explode("-", $line);
                        ?>
                        <tr>
                            <td><?= $dataBuku[0]; ?></td>
                            <td><?= $dataBuku[1]; ?></td>
                            <td><?= $dataBuku[2]; ?></td>
                            <td><?= $dataBuku[3]; ?></td>
                            <td><?= $dataBuku[4]; ?></td>
                            <td><img src="./<?= $dataBuku[5]; ?>" alt="gambar" width="200px"></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>