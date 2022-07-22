<div class="modal fade" id="deleteModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="post" id="deleteData" class="modal-form">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle"><?= lang('App.usersDelete'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="describe"><?= lang('App.deleteConfirm'); ?></p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-danger btn-cancel" data-bs-dismiss="modal">
                    <i class="bx bx-block"></i> <?= lang('App.cancel'); ?>
                </button>
                <button type="submit" class="btn btn-success btn-destroy"><i class="bx bx-trash"></i>
                    <?= lang('App.delete'); ?></button>
            </div>
        </form>
    </div>
</div>

<script>
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