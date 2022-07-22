<?= $this->extend('layout/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h4 class="fw-bold py-3 mb-4"><?= $title; ?></h4>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>
            <?= lang('App.usersIndex'); ?>
        </h5>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus"></i> <?=lang('App.add') ?>
        </button>
    </div>
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
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modals -->
<?= $this->include('users/create'); ?>
<?= $this->include('users/edit'); ?>
<?= $this->include('users/delete'); ?>

<?= $this->endSection(); ?>

<?= $this->section('style'); ?>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
</script>

<script>
$(document).ready(() => {
    loadData();
    createData();
    editData();
    deleteData();
    cancelForm();
});

function loadData() {
    $('#dataTables').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?= route_to('users') ?> ',
        order: [],
        columns: [{
                data: 'no',
                orderable: false
            },
            {
                data: 'name'
            },
            {
                data: 'username'
            },
            {
                data: 'group_name'
            },
            {
                data: 'action',
                orderable: false
            },
        ]
    });
}

function cancelForm() {
    $(document).on('hide.bs.modal', () => {
        $('.form-control').removeClass('is-invalid');
    });
}
</script>
<?= $this->endSection(); ?>