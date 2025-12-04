<?php include 'views/template/header.php'; ?>
<?php include 'views/template/navigation.php'; ?>

<div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h3>🏁 Data Brand Diecast</h3>
        <a href="index.php?mod=brand&act=form" class="btn btn-add">+ Tambah Brand Baru</a>
    </div>

    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Nama Brand</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($brands)): ?>
                <?php foreach ($brands as $row): ?>
                <tr>
                    <td><?= $row['id_brand'] ?></td>
                    <td><b><?= htmlspecialchars($row['name']) ?></b></td>
                    <td>
                        <a href="index.php?mod=brand&act=form&id=<?= $row['id_brand'] ?>" class="btn btn-edit">Edit</a>
                        <a href="index.php?mod=brand&act=delete&id=<?= $row['id_brand'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center;">Belum ada data brand.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'views/template/footer.php'; ?>