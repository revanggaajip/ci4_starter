<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="<?= route_to('users.create'); ?>" method="post" id="createData"
            class="modal-form">
            <?= csrf_field() ?>
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle"><?= lang('App.usersCreate'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="createName" class="form-label"><?= lang('App.name'); ?></label>
                        <input type="text" id="createName" class="form-control" name="name"
                            placeholder="<?= lang('App.insertName'); ?>">
                        <div id="validationCreateName" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="createEmail" class="form-label"><?= lang('App.email'); ?></label>
                        <input type="email" id="createEmail" class="form-control" name="email"
                            placeholder="<?= lang('App.insertEmail'); ?>">
                        <div id="validationCreateEmail" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="createGroup" class="form-label"><?= lang('App.group'); ?></label>
                        <select class="form-select" id="createGroup" aria-label="Default select example" name="group">
                            <option selected disabled><?= lang('App.selectGroup'); ?></option>
                            <?php foreach($groups as $key => $group): ?>
                            <option value="<?= $group->id; ?>"><?= $group->name; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="validationCreateGroup" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="createUsername" class="form-label"><?= lang('App.username'); ?></label>
                        <input type="text" id="createUsername" class="form-control" name="username"
                            placeholder="<?= lang('App.insertUsername'); ?>">
                        <div id="validationCreateUsername" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="createPassword" class="form-label"><?= lang('App.password'); ?></label>
                        <input type="password" id="createPassword" class="form-control" name="password"
                            placeholder="<?= lang('App.insertPassword'); ?>">
                        <div id="validationCreatePassword" class="invalid-feedback">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-danger btn-cancel" data-bs-dismiss="modal">
                    <i class="bx bx-block"></i> <?= lang('App.cancel'); ?>
                </button>
                <button type="submit" class="btn btn-success btn-save"><i class="bx bx-save"></i>
                    <?= lang('App.save'); ?></button>
            </div>
        </form>
    </div>
</div>

<script>
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
</script>