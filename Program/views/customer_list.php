<?php include 'views/template/header.php'; ?>
<?php include 'views/template/navigation.php'; ?>

<div class="container">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h3>👥 Data Pelanggan</h3>
        <a href="index.php?mod=customer&act=form" class="btn btn-add">+ Tambah Customer</a>
    </div>

    <table>
        <thead>
            <tr>
                <th width="50">ID</th>
                <th>Nama Pelanggan</th>
                <th>No. Telepon</th>
                <th width="150" style="text-align:center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($customers)): ?>
                <?php foreach ($customers as $c): ?>
                <tr>
                    <td><?= $c['id_customer'] ?></td>
                    <td><b><?= htmlspecialchars($c['name']) ?></b></td>
                    <td><?= htmlspecialchars($c['phone']) ?></td>
                    <td style="text-align:center;">
                        <a href="index.php?mod=customer&act=form&id=<?= $c['id_customer'] ?>" class="btn btn-edit">Edit</a>
                        <a href="index.php?mod=customer&act=delete&id=<?= $c['id_customer'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" style="text-align:center;">Data kosong.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'views/template/footer.php'; ?>