<?= $this->extend('auth/template/index_new'); ?>

<?= $this->section('logincontent_new'); ?>
<div class="limiter">
    <div class="container-login100" style="background-image: url('<?= base_url(); ?>/newlogin_assets/images/bg-01.jpg');">
        <div class="wrap-login100">

            <?= view('Myth\Auth\Views\_message_block') ?>

            <form action="<?= route_to('login') ?>" class="login100-form validate-form" method="post">
                <?= csrf_field() ?>

                <span class="login100-form-logo">
                    <i class="zmdi zmdi-view-web"></i>
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    JE DB Login
                </span>

                <?php if ($config->validFields === ['email']) : ?>
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                    </div>
                <?php else : ?>
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                    </div>
                <?php endif; ?>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>

                <!-- <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Remember me
                    </label>
                </div> -->

                <div class="row">
                    <?php if ($config->allowRemembering) : ?>
                        <div class="col-8">
                            <div class="icheck-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                    <?= lang('Auth.rememberMe') ?>
                                </label>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn"><?= lang('Auth.loginAction') ?></button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div> -->

                <div class="text-center p-t-90">
                    <a class="txt1" href="#">
                        <!-- Forgot Password? -->
                    </a>
                </div>
            </form>

            <?php if ($config->allowRegistration) : ?>
                <p class="mb-0">
                    <a href="<?= route_to('register') ?>" class="text-center"><?= lang('Auth.needAnAccount') ?></a>
                </p>
            <?php endif; ?>
            <?php if ($config->activeResetter) : ?>
                <p class="mb-0">
                    <a href="<?= route_to('forgot') ?>" class="text-center"><?= lang('Auth.forgotYourPassword') ?></a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- <div id="dropDownSelect1"></div> -->
<?= $this->endSection(); ?>