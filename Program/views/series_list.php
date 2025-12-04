<?php include 'views/template/header.php'; ?>
<?php include 'views/template/navigation.php'; ?>

<div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h3>🏎️ Data Series</h3>
        <a href="index.php?mod=series&act=form" class="btn btn-add">+ Tambah Series</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Series Name</th>
                <th>Brand Induk</th>
                <th width="150" style="text-align:center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($seriesList)): ?>
                <?php foreach ($seriesList as $row): ?>
                <tr>
                    <td><b><?= htmlspecialchars($row['series_name']) ?></b></td>
                    <td><span style="color:#555;"><?= htmlspecialchars($row['brand_name']) ?></span></td>
                    <td style="text-align:center;">
                        <a href="index.php?mod=series&act=form&id=<?= $row['id_series'] ?>" class="btn btn-edit">Edit</a>
                        <a href="index.php?mod=series&act=delete&id=<?= $row['id_series'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="3" style="text-align:center;">Data kosong.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'views/template/footer.php'; ?>   