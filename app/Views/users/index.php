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

function createData() {
    $('#createData').submit((e) => {
        e.preventDefault();
        $.ajax({
            url: $('#createData').attr('action'),
            type: $('#createData').attr('method'),
            data: $('#createData').serialize(),
            dataType: "json",
            success: (res) => {
                if (res.status == 'success') {
                    $('#createData')[0].reset();
                    $('.btn-cancel').click();
                    Swal.fire(
                        '<?= lang('App.success') ?>',
                        '<?= lang('App.createdData') ?>',
                        'success'
                    )
                    $('#dataTables').DataTable().ajax.reload();
                } else {
                    // name validation
                    if (res.data.name) {
                        $('#createName').addClass('is-invalid');
                        $('#validationCreateName').html(res.data.name);
                    } else {
                        $('#createName').removeClass('is-invalid');
                        $('#validationCreateName').html('');
                    }

                    // email validation
                    if (res.data.email) {
                        $('#createEmail').addClass('is-invalid');
                        $('#validationCreateEmail').html(res.data.email);
                    } else {
                        $('#createEmail').removeClass('is-invalid');
                        $('#validationCreateEmail').html('');
                    }

                    // group validation
                    if (res.data.group) {
                        $('#createGroup').addClass('is-invalid');
                        $('#validationCreateGroup').html(res.data.group);
                    } else {
                        $('#createGroup').removeClass('is-invalid');
                        $('#validationCreateGroup').html('');
                    }

                    // username validation
                    if (res.data.username) {
                        $('#createUsername').addClass('is-invalid');
                        $('#validationCreateUsername').html(res.data.username);
                    } else {
                        $('#createUsername').removeClass('is-invalid');
                        $('#validationCreateUsername').html('');
                    }

                    // password validation
                    if (res.data.password) {
                        $('#createPassword').addClass('is-invalid');
                        $('#validationCreatePassword').html(res.data.password);
                    } else {
                        $('#createPassword').removeClass('is-invalid');
                        $('#validationCreatePassword').html('');
                    }
                }
            },
            error: (xhr, ajaxOptions, thrownError) => {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
}

function editData() {
    $('#dataTables').on('click', '.btn-edit', function() {
        let id = $(this).data('id');
        $('#editData').attr('action', '<?= base_url() ?>/users/edit/' + id);
        $('#editModal').modal('show');
        $.ajax({
            url: '<?= base_url() ?>/users/edit/' + id,
            method: 'GET',
            dataType: 'json',
            success: (res) => {
                console.log(res)
                $('#editId').val(res.data.id);
                $('#editName').val(res.data.name);
                $('#editEmail').val(res.data.email);
                $(`#editGroup  option[value="${res.data.group_id}"]`).prop("selected", true);
                $('#editUsername').val(res.data.username);
                $('#editData').submit(function(e) {
                    e.preventDefault();
                    updateData();
                });
            }

        })
    });
}

function updateData() {
    $.ajax({
        url: $('#editData').attr('action'),
        data: $('#editData').serialize(),
        method: $('#editData').attr('method'),
        dataType: 'json',
        success: (res) => {
            if (res.status == 'success') {
                $('#editData')[0].reset();
                $('.btn-cancel').click();
                Swal.fire(
                    '<?= lang('App.success') ?>',
                    '<?= lang('App.updatedData') ?>',
                    'success'
                )
                $('#dataTables').DataTable().ajax.reload();
            } else {
                // name validation
                if (res.data.name) {
                    $('#editName').addClass('is-invalid');
                    $('#validationEditName').html(res.data.name);
                } else {
                    $('#editName').removeClass('is-invalid');
                    $('#validationEditName').html('');
                }

                // email validation
                if (res.data.email) {
                    $('#editEmail').addClass('is-invalid');
                    $('#validationEditEmail').html(res.data.email);
                } else {
                    $('#editEmail').removeClass('is-invalid');
                    $('#validationEditEmail').html('');
                }

                // group validation
                if (res.data.group) {
                    $('#editGroup').addClass('is-invalid');
                    $('#validationEditGroup').html(res.data.group);
                } else {
                    $('#editGroup').removeClass('is-invalid');
                    $('#validationEditGroup').html('');
                }

                // username validation
                if (res.data.username) {
                    $('#editUsername').addClass('is-invalid');
                    $('#validationEditUsername').html(res.data.username);
                } else {
                    $('#editUsername').removeClass('is-invalid');
                    $('#validationEditUsername').html('');
                }
            }
        },
        error: (xhr, ajaxOptions, thrownError) => {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}



function cancelForm() {
    $(document).on('hide.bs.modal', () => {
        $('.form-control').removeClass('is-invalid');
    });
}

function deleteData() {
    $('#dataTables').on('click', '.btn-delete', function() {
        let id = $(this).data('id');
        $('#deleteData').attr('action', '<?= base_url() ?>/users/delete/' + id);
        $('#deleteModal').modal('show');
        $('#deleteData').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: (res) => {
                    if (res.status == 'success') {
                        $('#deleteData')[0].reset();
                        $('.btn-cancel').click();
                        Swal.fire(
                            '<?= lang('App.success') ?>',
                            '<?= lang('App.deletedData') ?>',
                            'success'
                        )
                        $('#dataTables').DataTable().ajax.reload();
                    }
                }

            });
        });
    });
}
</script>
<?= $this->endSection(); ?>