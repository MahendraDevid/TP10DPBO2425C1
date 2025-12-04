<?php include 'views/template/header.php'; ?>
<?php include 'views/template/navigation.php'; ?>

<div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h3>🏎️ Katalog Produk</h3>
        <a href="index.php?mod=product&act=form" class="btn btn-add">+ Tambah Produk</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Series (Brand)</th>
                <th>Skala</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['product_name']) ?></td>
                <td>
                    <span style="color:#d32f2f; font-weight:bold;"><?= htmlspecialchars($row['series_name']) ?></span><br>
                    <small style="color:#666;"><?= htmlspecialchars($row['brand_name']) ?></small>
                </td>
                <td><span style="background:#eee; padding:2px 5px; border-radius:3px;"><?= htmlspecialchars($row['scale']) ?></span></td>
                <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                <td>
                    <a href="index.php?mod=product&act=form&id=<?= $row['id_product'] ?>" class="btn btn-edit">Edit</a>
                    <a href="index.php?mod=product&act=delete&id=<?= $row['id_product'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'views/template/footer.php'; ?>