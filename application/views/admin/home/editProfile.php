
<?php

$userId = '';
$firstname = '';
$lastname = '';
$email = '';
$photo = '';


if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
        $userId = $uf->aId;
        $firstname = $uf->firstname;
        $lastname = $uf->lastname;
        $email = $uf->email;        
        $photo = $uf->photo;

    }
}
?>


        
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
                <form class="col s12" role="form" action="<?php echo base_url() ?>admin/updateUser" method="post" id="editUseri" role="form">
                <div class="row">
                    <div class="input-field col s12">
                    <input id="firstname" type="text" class="validate" name="firstname" value="<?php echo $this->session->userdata('aFirst_name')?>">
                    <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />
                    <label for="name">First Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="lastname" type="text" class="validate"  name="lastname" value="<?php echo $this->session->userdata('aLast_name')?>">
                    <label for="lastname">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                    <input id="email" type="text" class="validate" name="email" value="<?php echo $this->session->userdata('aEmail')?>">
                    <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <img src="<?php echo base_url('assets/profile/'.$this->session->userdata('aPhoto'))?>" class="img-responsive">
                    <label for="ProfilePhoto">Photo</label>
                    </div>
                </div>
            <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                    <input type="reset" class="btn btn-default" value="Reset" />
            </div>
            </form>        
    </div>
</div>