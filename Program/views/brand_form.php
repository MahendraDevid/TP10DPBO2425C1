<?php include 'views/template/header.php'; ?>
<?php include 'views/template/navigation.php'; ?>

<div class="container" style="max-width: 600px;"> <h3><?= isset($data) ? '🛠️ Edit Brand' : '📝 Tambah Brand Baru' ?></h3>

    <form method="POST" action="">
        <div class="form-group">
            <label>Nama Brand Diecast:</label>
            <input type="text" name="name" value="<?= isset($data) ? htmlspecialchars($data['name']) : '' ?>" required placeholder="Contoh: Hot Wheels, Mini GT...">
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <button type="submit" class="btn btn-save">Simpan Data</button>
            <a href="index.php?mod=brand" class="btn btn-cancel">Batal</a>
        </div>
    </form>
</div>

<?php include 'views/template/footer.php'; ?>