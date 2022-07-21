<div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="post" id="editData" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT" id="editMethod">
            <input type="hidden" name="id" value="PUT" id="editId">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle"><?= lang('App.usersEdit'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="editName" class="form-label"><?= lang('App.name'); ?></label>
                        <input type="text" id="editName" class="form-control" name="name"
                            placeholder="<?= lang('App.insertName'); ?>" value="">
                        <div id="validationEditName" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="editEmail" class="form-label"><?= lang('App.email'); ?></label>
                        <input type="email" id="editEmail" class="form-control" name="email"
                            placeholder="<?= lang('App.insertEmail'); ?>" value="">
                        <div id="validationEditEmail" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="editGroup" class="form-label"><?= lang('App.group'); ?></label>
                        <select class="form-select" id="editGroup" aria-label="Default select example" name="group"
                            value="">
                            <option disabled><?= lang('App.selectGroup'); ?></option>
                            <?php foreach($groups as $key => $group): ?>
                            <option value="<?= $group->id; ?>"><?= $group->name; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="validationEditGroup" class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="editUsername" class="form-label"><?= lang('App.username'); ?></label>
                        <input type="text" id="editUsername" class="form-control" name="username" value=""
                            placeholder="<?= lang('App.insertUsername'); ?>">
                        <div id="validationEditUsername" class="invalid-feedback">
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