<div class="container" style="background-color: #373638; max-width: 500px;  border-radius: 25px;">
    <div class="container-fluid pt-5 pb-3 text-center" style="margin-top: 250px;">
        <h1 class="mb-5">Dashboard</h1>
        <h3>Welcome back <?= $first_name?>!</h3>
        <div class="my-5 ">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationModal">Logout</button>

        <div class="modal fade" id="confirmationModal" tabindex="-1" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel" color:black;>Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <p style="color:black;">Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <?= form_open('logout') ?>    
                        <button type="submit" class="btn btn-primary">Yes</button>
                    <?= form_close()?>
                </div>
                </div>
            </div>
            </div>

        
        <!-- <input type="submit" class="btn btn-danger" value="Logout"> -->
        
        </div>
    </div>
</div>