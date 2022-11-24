<div class="row justify-content-center">
    <div class="col-6">
    <h1><?php echo $title ?></h1>
        <?php echo form_open('admin/changePassword', array('aId' => 'passwordForm'))?>
            <div class="form-group">
                <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Old Password" />
                <?php echo form_error('oldpass', '<div class="error">', '</div>')?>
            </div>
            <div class="form-group">
                <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password" />
                <?php echo form_error('newpass', '<div class="error">', '</div>')?>
            </div>
            <div class="form-group">
                <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Confirm Password" />
                <?php echo form_error('passconf', '<div class="error">', '</div>')?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Change Password</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>