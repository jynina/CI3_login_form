<div class="container" style="background-color: #373638; max-width: 500px;  border-radius: 25px;">
    <div class="container-fluid pt-5 pb-3 text-center" style="margin-top: 250px;">
        <h1>Register</h1>
        <div class="my-5 ">
            <form class="register_form text-end" action="<?= base_url();?>register_process" method="POST">
                <div class="form-group ">
                    <input type="text" name="first_name" class="form-control mb-3" id="inputFirstName" placeholder="First Name" value=<?= set_value('first_name');?>>
                    <span class="text-danger "><?=form_error('first_name')?></span>
                    <input type="text" name="last_name" class="form-control mb-3" id="inputLastName" placeholder="Last Name" value=<?= set_value('last_name');?>>
                    <span class="text-danger"><?=form_error('last_name')?></span>
                    <input type="email" name="register_email" class="form-control mb-3" id="inputEmail" placeholder="Email" value=<?= set_value('email');?>>
                    <span class="text-danger"><?=form_error('register_email')?></span>
                </div>
                <div class="form-group input-group show_hide_pass"  id="show_hide_pass">
                    <input type="password" class="form-control mb-3 inputPassword" id="inputPassword" placeholder="Password" name="register_password" value=<?= set_value('register_password');?>>
                    <span class="p-viewer " style="cursor:pointer;">
                        <i class="fa-solid fa-eye-slash border border-start-0 toggle-password rounded-end" style="padding: 10px; cursor:pointer;"></i> 	
                    </span>    
                </div>
                <span class="text-danger"><?=form_error('register_password')?></span>
                <div class="form-group input-group show_hide_pass"  id="show_hide_pass">
                    <input type="password" class="form-control mb-3 inputRPassword" id="inputRPassword" placeholder="Repeat Password" name="repeat_password" value=<?= set_value('repeat_password');?>>
                    <span class="p-viewer" style="cursor:pointer;">
                        <i class="fa-solid fa-eye-slash border border-start-0 rounded-end toggle-repeat-password" style="padding: 10px; cursor:pointer;"></i> 	
                    </span>
                </div>
                <span class="text-danger"><?=form_error('repeat_password')?></span>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-danger btn-back me-2">Back</button>
                    <input type="submit" name="register" value="Register" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
