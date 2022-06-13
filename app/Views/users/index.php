<?= $this->extend('layout/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>
<div class="card">
    <h5 class="card-header">
        <?= lang('App.usersIndex'); ?>
    </h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $key => $user) : ?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->description; ?></td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i> Edit</a>
                            <button class="btn btn-danger btn-sm"><i class="bx bx-trash"></i> Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('style'); ?>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
</script>
<script>
$(document).ready(() => {
    $('#dataTables').DataTable();
});
</script>
<?= $this->endSection(); ?>