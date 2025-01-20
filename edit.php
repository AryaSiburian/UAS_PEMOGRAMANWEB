<?php 
include("header.php");
include("connection.php");
$select = $koneksi->query ("select*from products where id={$_GET['id']}");
$data = mysqli_fetch_assoc($select);
?>

<form method="POST" action="fungsi.php?update" class="form">
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" value="<?php echo $data['nama_produk'] ?>" required>
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori" value="<?php echo $data['kategori'] ?>" required>
            <option value="">Pilih Kategori</option>
                <option value="elektronik">Elektronik</option>
                <option value="pakaian">Pakaian</option>
                <option value="makanan">Makanan</option>
                <option value="makanan">Minuman</option>
            </select>
    </div>

    <div class="form-group">
        <label>Jumlah Stok</label>
        <input type="number" name="stok"min="0"  value="<?php echo $data['stok'] ?>"required>
    </div>

    <div class="form-group">
        <label>Harga Satuan</label>
        <input type="number" name="harga_satuan" value="<?php echo $data['harga']?>"required>
    </div>

    <button type="submit" class="btn btn-primary" name="submit" >Update</button>
</form>
            
<?php include("footer.php")?>