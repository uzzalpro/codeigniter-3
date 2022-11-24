

        
<div class="content-wrapper ">
    <h2 class ="d-flex justify-content-center" style="color:green">Edit user</h2>
    <div class="row d-flex justify-content-center"> 
           
        <div class="col-md-6 col-md-offset-3 ">
        <?php if($this->session->flashdata('class')):?>
          <div class="alert <?php echo $this->session->flashdata('class')?> alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo($this->session->flashdata('message'));?>
          </div>
        <?php endif; ?>
            <?php echo form_open_multipart('admin/updateUser','',''); ?>
            <input type="hidden" name="oid" value="<?php echo $_SESSION['aId'] ?>">
            <input type="hidden" name="oldimgs" value="<?php echo $_SESSION['aPhoto'] ?>">

                <p>First Name</p>
                <div class="form-group">
                    <?php echo form_input('FirstName',$_SESSION['aFirst_name'],'class="form-control"') ?>
                </div>
                <p>Last Name</p>
                <div class="form-group">
                    <?php echo form_input('LastName',$_SESSION['aLast_name'],'class="form-control"') ?>
                </div>
                <p>Email</p>
                <div class="form-group">
                    <?php echo form_input('UserEmail',$_SESSION['aEmail'],'class="form-control"') ?>
                </div>
                <p>Photo</p>
                <div class="form-group">
                    <?php echo form_upload('ProfilePhoto',$_SESSION['aPhoto'],'class="form-control"') ?>
                </div>

                <div class="form-group">
                    <?php echo form_submit('updateUser','Update User','class="btn btn-primary"') ?>
                </div>
                
            <?php echo form_close();?>  
        </div>
        <div class="col-md-3">
        <img src="<?php echo base_url('assets/profile/'.$_SESSION['aPhoto'])?>" class="img-responsive">
        </div>
    </div>
</div>
//$user[0]['u_address']