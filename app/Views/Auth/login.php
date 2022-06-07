<?= $this->extend($config->viewLayout); ?>

<!-- Title -->
<?= $this->section('title'); ?>
<?= lang('Auth.loginTitle'); ?>
<?= $this->endSection(); ?>
<!-- /Title -->

<!-- Content -->
<?= $this->section('content'); ?>
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
        <h4 class="mb-2"><?= lang('Auth.loginTitle'); ?></h4>
        <p class="mb-4"><?= lang('Auth.loginInstruction'); ?></p>

        <form id="login" class="mb-3" action="<?= route_to('login'); ?>" method="POST">
            <?= csrf_field() ?>
            <?= $this->include('Auth/_message_block') ?>
            <!-- Username or Email -->
            <!-- Email -->
            <?php if ($config->validFields === ['email']): ?>
            <div class="mb-3">
                <label for="login" class="form-label"><?= lang('Auth.email'); ?></label>
                <input type="text" class="form-control <?= session('errors.login') ? 'is-invalid' : null ?>" id="login"
                    name="login" placeholder="<?= lang('Auth.email'); ?>" autofocus />
                <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                </div>
            </div>
            <!-- /Email -->
            <?php else: ?>
            <!-- Email Or Username -->
            <div class="mb-3 has-validation">
                <label for="login" class="form-label"><?= lang('Auth.emailOrUsername'); ?></label>
                <input type="text" class="form-control <?= session('errors.login') ? 'is-invalid' : null ?>" id="login"
                    name="login" placeholder="<?= lang('Auth.emailOrUsername'); ?>" autofocus
                    value="<?= old('login') ?? null; ?>" />
                <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                </div>
            </div>
            <!-- /Email Or Username -->
            <?php endif; ?>
            <!-- Password -->
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password"><?= lang('Auth.password'); ?></label>
                    <!-- Forgot -->
                    <?php if ($config->activeResetter): ?>
                    <a href="<?= route_to('forgot') ?>">
                        <small><?=lang('Auth.forgotYourPassword')?></small>
                    </a>
                    <?php endif; ?>
                    <!-- /Forgot -->
                </div>
                <div class="input-group input-group-merge has-validation">
                    <input type="password" id="password"
                        class="form-control <?= session('errors.login') ? 'is-invalid' : null ?>" name="password"
                        placeholder="<?=lang('Auth.password')?>" aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                </div>
            </div>
            <!-- /Password -->
            <!-- Remember Me -->
            <?php if ($config->allowRemembering): ?>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        <?php old('remember') ? 'checked' : null ?> />
                    <label class="form-check-label" for="remember"> <?= lang('Auth.rememberMe'); ?>
                    </label>
                </div>
            </div>
            <?php endif; ?>
            <!-- /Remember Me -->
            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit"><?= lang('Auth.loginAction'); ?></button>
            </div>
        </form>
        <?php if ($config->allowRegistration) : ?>
        <p class="text-center">
            <span><?= lang('Auth.newMember'); ?></span>
            <a href="<?= route_to('register'); ?>">
                <span><?= lang('Auth.needAnAccount') ?></span>
            </a>
        </p>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>
<!-- /Content -->