<?php
   if(isset($_GET["index"])) {
        index();
   } else if (isset($_GET['update'])) {
        update();
   }else if (isset($_GET['delete'])) {
        delete();
   }

   function index() {
    require("connection.php");
    $index = $koneksi->query("insert into products set nama_produk='{$_POST['nama_produk']}', kategori='{$_POST['kategori']}', stok='{$_POST['stok']}',harga='{$_POST['harga']}' ");
    if($index === true) {
        echo  'insert berhasil';
    } else {
        echo 'insert gagal';
    }

    header('Location: index.php');
}
function update() {
    require("connection.php");
    $insert = $koneksi->query("UPDATE products SET nama_produk='{$_POST['nama_produk']}', Kategori='{$_POST['kategori']}', stok='{$_POST['stok']}', harga='{$_POST['harga_satuan']}' where id ={$_POST['id']}");
    if($insert === true) {
        echo  'insert berhasil';
    } else {
        echo 'insert gagal';
    }

    header('Location: index.php');
}

function delete() {
    require("connection.php");
    $insert = $koneksi->query("delete from products where id={$_GET['id']}");
    if($insert === true) {
        echo  'insert berhasil';
    } else {
        echo 'insert gagal';
    }

    header('Location: index.php');

}

function search() {
    require("connection.php");

    if (!isset($_GET['keyword']) || empty($_GET['keyword'])) {
        echo "<p>Masukkan keyword untuk mencari produk.</p>";
        return;
    }

    $keyword = $_GET['keyword'];

    $result = $koneksi->query("SELECT * FROM products WHERE 
    nama_produk LIKE '%$keyword%' OR 
    kategori LIKE '%$keyword%'  
   ");

    if ($result->num_rows > 0) {
        echo "<h3>Hasil Pencarian:</h3>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama_produk']}</td>
                    <td>{$row['kategori']}</td>
                    <td>{$row['stok']}</td>
                    <td>{$row['harga']}</td>
                  </tr>";
        }
        echo "</table>";
    
        echo "<br><a href='index.php' style='display: inline-block; text-decoration: none; background-color: #28a745; color: white; padding: 10px 15px; border-radius: 5px;'>Kembali ke Halaman Utama</a>";
        
    } else {
        echo "<p>Tidak ada data ditemukan untuk keyword: <strong>" . htmlspecialchars($keyword) . "</strong></p>";
    }
}

if (isset($_GET['search'])) {
    search();
}


?>

