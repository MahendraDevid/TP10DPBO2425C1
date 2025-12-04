<?php include 'views/template/header.php'; ?>
<?php include 'views/template/navigation.php'; ?>

<div class="container" style="max-width: 600px;">
    <h3><?= isset($data) ? '🛠️ Edit Series' : '📝 Tambah Series Baru' ?></h3>

    <form method="POST" action="">
        <div class="form-group">
            <label>Pilih Brand:</label>
            <select name="id_brand" required>
                <option value="">-- Pilih Brand --</option>
                <?php foreach ($brands as $b): ?>
                    <option value="<?= $b['id_brand'] ?>" 
                        <?= (isset($data) && $data['id_brand'] == $b['id_brand']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($b['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Nama Series:</label>
            <input type="text" name="series_name" required 
                   value="<?= isset($data) ? htmlspecialchars($data['series_name']) : '' ?>" 
                   placeholder="Contoh: Kaido House, Boulevard...">
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <button type="submit" class="btn btn-save">Simpan</button>
            <a href="index.php?mod=series" class="btn btn-cancel">Batal</a>
        </div>
    </form>
</div>

<?php include 'views/template/footer.php'; ?>