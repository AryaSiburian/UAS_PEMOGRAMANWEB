<title>Sistem Manajemen Inventaris Produk</title>
<?php include("header.php"); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="formatHarga.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<body>
    <div class="container">
        <div class="header">
            <h1>Sistem Manajemen Inventaris Produk</h1>
            <form method="GET" action="fungsi.php">
                <input type="hidden" name="search" value="1">
                <input type="text" name="keyword" placeholder="Cari produk..." style="flex: 1; width: 100%;" required>
                <button type="submit" class="btn btn-success" style="margin-top: 10px;">Cari</button>
                <a href="login.php">Login</a>
            </form>
            </div>

            <div class="filters">
                <select>
                    <option value="">Semua Kategori</option>
                    <option value="elektronik">Elektronik</option>
                    <option value="pakaian">Pakaian</option>
                    <option value="makanan">Makanan</option>
                    <option value="makanan">Makanan343</option>
                    
                </select>

            </div>
        </div>

        <div class="main-content">
            <div class="form-section">

                <form method="POST" action="fungsi.php?index" class="form">
                <h2 style="margin-bottom: 20px;">Tambah Produk Baru</h2>
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" >
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="elektronik">Elektronik</option>
                            <option value="pakaian">Pakaian</option>
                            <option value="makanan">Makanan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="number" name="stok"
                        >
                    </div>

                    
                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <input placeholder="Rp..." id="harga_satuan" name="harga" min="0">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit" >Tambah Produk</button>
                    
                </form>
            </div>

            <div class="inventory-list">
                <h2 style="margin-bottom: 20px;">Daftar Inventaris</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                require_once 'connection.php'; 
                
                    $result = $koneksi->query("SELECT * FROM products");
                    if ($result->num_rows > 0) {
                        while($value = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td><?php echo $value['nama_produk']; ?></td>
                            <td><?php echo $value['kategori']; ?></td>
                            <td><?php echo $value['stok']; ?></td>
                            <td><?php echo $value['harga']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $value ["id"] ?>" class="btn btn-primary">Edit</a> 
                              
                            <div class="modal" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus produk ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                 
                                    <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Delete</a>
                                </div>
                                </div>
                            </div>
                            </div>

                                <a href="fungsi.php?delete&id" class="btn btn-danger delete-btn" data-id="<?php echo $value['id']; ?>">Delete</a>

                        </td>
                    </tr>
                <?php 
                }

                } else {
                    echo "<tr><td colspan='10'>Tidak ada data</td></tr>";
                }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("footer.php"); ?>