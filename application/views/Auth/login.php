

<div class="container" style="background-color: #373638; max-width: 500px;  border-radius: 25px;">
    <div class="container-fluid pt-5 pb-3 text-center" style="margin-top: 250px;">
        <!--error message -->
        <?php if($this->session->flashdata('error')){?>
            <div class="alert alert-danger" role="alert">
                <?php  echo $this->session->flashdata('error');?>
            </div>
        <?php } ?>
        <h1>Log-In</h1>
        <div class="my-5 ">
            <form action="<?= base_url('login_process')?>" method="POST" class="login_form text-start">
                <input type="email" name="login_email" class="form-control mb-3" id="inputEmail" placeholder="Email" value=<?= set_value('login_email')?>>
                    <span class="text-danger"><?= form_error('login_email')?></span>
                    <div class="input-group show_hide_pass"  id="show_hide_pass">
                        <input type="password" name="login_password" class="form-control mb-3 inputPassword" id="inputPassword" placeholder="Password" name="login_password" value=<?= set_value('login_password')?>>
                        <span class="p-viewer " style="cursor:pointer;">
                            <i class="fa-solid fa-eye-slash border border-start-0 rounded-end" style="padding: 10px; cursor:pointer;"></i> 	
                        </span>
                    </div>
                    <span class="text-danger"><?= form_error('login_password')?></span>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-danger btn-back me-2">Back</button>
                    <input type="submit" name="login" value="Login" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
