<?php include 'views/template/header.php'; ?>
<?php include 'views/template/navigation.php'; ?>

<div class="container" style="max-width: 700px;">
    <h3><?= isset($data) ? '🛠️ Edit Produk' : '📝 Tambah Produk Baru' ?></h3>

    <form method="POST" action="">
        <div class="form-group">
            <label>Series / Brand:</label>
            <select name="id_series" required>
                <option value="">-- Pilih Series --</option>
                <?php foreach ($seriesList as $s): ?>
                    <option value="<?= $s['id_series'] ?>" 
                        <?= (isset($data) && $data['id_series'] == $s['id_series']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($s['series_name']) ?> (<?= htmlspecialchars($s['brand_name']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Nama Produk (Mobil):</label>
            <input type="text" name="product_name" required 
                   value="<?= isset($data) ? htmlspecialchars($data['product_name']) : '' ?>" 
                   placeholder="Contoh: Nissan Skyline GT-R R34">
        </div>

        <div class="form-group">
            <label>Skala:</label>
            <input type="text" name="scale" required 
                   value="<?= isset($data) ? htmlspecialchars($data['scale']) : '1:64' ?>">
        </div>

        <div class="form-group">
            <label>Harga (Rp):</label>
            <input type="number" name="price" required 
                   value="<?= isset($data) ? $data['price'] : '' ?>" 
                   placeholder="Contoh: 150000">
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <button type="submit" class="btn btn-save">Simpan Data</button>
            <a href="index.php?mod=product" class="btn btn-cancel">Batal</a>
        </div>
    </form>
</div>

<?php include 'views/template/footer.php'; ?>