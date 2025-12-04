<?php include 'views/template/header.php'; ?>
<?php include 'views/template/navigation.php'; ?>

<div class="container" style="max-width: 600px;">
    <h3><?= isset($data) ? '🛠️ Edit Customer' : '📝 Tambah Customer Baru' ?></h3>

    <form method="POST" action="">
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="name" required 
                   value="<?= isset($data) ? htmlspecialchars($data['name']) : '' ?>" 
                   placeholder="Nama pelanggan...">
        </div>

        <div class="form-group">
            <label>No. Telepon / WA:</label>
            <input type="text" name="phone" required 
                   value="<?= isset($data) ? htmlspecialchars($data['phone']) : '' ?>" 
                   placeholder="Contoh: 08123456789">
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <button type="submit" class="btn btn-save">Simpan</button>
            <a href="index.php?mod=customer" class="btn btn-cancel">Batal</a>
        </div>
    </form>
</div>

<?php include 'views/template/footer.php'; ?>