<?= $this->extend($config->viewLayout) ?>

<!-- Title -->
<?= $this->section('title'); ?>
<?= lang('Auth.register'); ?>
<?= $this->endSection() ?>
<!-- /Title -->

<!-- Content -->
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                    <img src="<?= base_url(); ?>/img/illustrations/logo.svg" alt="logo" width="25">
                </span>
                <span class="app-brand-text demo text-body fw-bolder"><?= config('App')->name; ?></span>
            </a>
        </div>
        <!-- /Logo -->

        <h4 class="mb-4"><?= lang('Auth.register'); ?></h4>

        <form action="<?= route_to('register'); ?>" method="post">
            <?= csrf_field(); ?>
            <?= $this->include('Auth/_message_block'); ?>

            <!-- Nama -->
            <div class="mb-3">
                <label for="name" class="form-label"><?= lang('Auth.name'); ?></label>
                <input type="text" class="form-control <?= session('errors.name') ? 'is-invalid' : null ?>" id="name"
                    name="name" placeholder="<?= lang('Auth.name'); ?>" autofocus
                    value="<?= old('name') ?? null ; ?>" />
                <div class="invalid-feedback">
                    <?= session('errors.name') ?>
                </div>
            </div>
            <!-- /Nama -->

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label"><?= lang('Auth.email'); ?></label>
                <input type="text" class="form-control <?= session('errors.email') ? 'is-invalid' : null ?>" id="email"
                    name="email" placeholder="<?= lang('Auth.email'); ?>" autofocus
                    value="<?= old('email') ?? null ; ?>" />
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>
            <!-- /Email -->

            <!-- username -->
            <div class="mb-3">
                <label for="username" class="form-label"><?= lang('Auth.username'); ?></label>
                <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : null ?>"
                    id="username" name="username" placeholder="<?= lang('Auth.username'); ?>" autofocus
                    value="<?= old('username') ?? null ; ?>" />
                <div class="invalid-feedback">
                    <?= session('errors.username') ?>
                </div>
            </div>
            <!-- /username -->

            <!-- password -->
            <div class="mb-3">
                <label for="password" class="form-label"><?= lang('Auth.password'); ?></label>
                <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : null ?>"
                    id="password" name="password" placeholder="<?= lang('Auth.password'); ?>" autofocus
                    value="<?= old('password') ?? null ; ?>" />
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>
            <!-- /password -->

            <!-- repeaPassword -->
            <div class="mb-3">
                <label for="pass_confirm" class="form-label"><?= lang('Auth.repeatPassword'); ?></label>
                <input type="password" class="form-control <?= session('errors.pass_confirm') ? 'is-invalid' : null ?>"
                    id="pass_cofirm" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword'); ?>" autofocus
                    value="<?= old('pass_confirm') ?? null ; ?>" />
                <div class="invalid-feedback">
                    <?= session('errors.pass_confirm') ?>
                </div>
            </div>
            <!-- /repeatPassword -->
            <!-- Button -->
            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit"><?= lang('Auth.register'); ?></button>
            </div>
            <!-- /Button -->
        </form>
        <p class="text-center">
            <span><?=lang('Auth.alreadyRegistered')?></span>
            <a href="<?= route_to('login') ?>"><span><?=lang('Auth.signIn')?></span></a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>
<!-- /Content -->