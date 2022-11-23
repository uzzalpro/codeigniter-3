<div class="content-wrapper ">
    <h2 class ="d-flex justify-content-center" style="color:green">Add Admin user</h2>
    <div class="row d-flex justify-content-center"> 
           
        <div class="col-md-6 col-md-offset-3 ">
        <?php if($this->session->flashdata('class')):?>
          <div class="alert <?php echo $this->session->flashdata('class')?> alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo($this->session->flashdata('message'));?>
          </div>
        <?php endif; ?>
            <?php echo form_open_multipart('admin/createAdminUser','',''); ?>
                <p>First Name</p>
                <div class="form-group">
                    <?php echo form_input('FirstName','','class="form-control"') ?>
                </div>
                <p>Last Name</p>
                <div class="form-group">
                    <?php echo form_input('LastName','','class="form-control"') ?>
                </div>
                <p>Email</p>
                <div class="form-group">
                    <?php echo form_input('UserEmail','','class="form-control"') ?>
                </div>
                <p>Photo</p>
                <div class="form-group">
                    <?php echo form_upload('ProfilePhoto','','class="form-control"') ?>
                </div>
                <p>Password</p>
                <div class="form-group">
                    <?php echo form_input('UserPassword','','class="form-control"') ?>
                </div>
                <div class="form-group">
                    <?php echo form_submit('createAdminUser','Create User','class="btn btn-primary"') ?>
                </div>
                
            <?php echo form_close();?>  
        </div>
    </div>
</div>