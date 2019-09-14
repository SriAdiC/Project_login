<div class="container">

    <div class="wrongpassword" data-flashdata="<?= $this->session->flashdata('wrongpassword') ?>"></div>
    <div class="logout" data-flashdata="<?= $this->session->flashdata('logout') ?>"></div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
    <div class="info" data-flashdata="<?= $this->session->flashdata('info') ?>"></div>
    <div class="error" data-flashdata="<?= $this->session->flashdata('error') ?>"></div>

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">


            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Forgot your password?</h1>
                                </div>

                                <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth') ?>">Back to login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>