

        
<div class="content-wrapper ">
    <h2 class ="d-flex justify-content-center" style="color:green">Add New Product</h2>
    <div class="row d-flex justify-content-center"> 
           
        <div class="col-md-6 col-md-offset-3 ">
        <?php if($this->session->flashdata('class')):?>
          <div class="alert <?php echo $this->session->flashdata('class')?> alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo($this->session->flashdata('message'));?>
          </div>
        <?php endif; ?>
            <?php echo form_open_multipart('admin/addnewProduct','',''); ?>
                <p>Product Name</p>
                <div class="form-group">
                    <?php echo form_input('ProductName','','class="form-control"') ?>
                </div>
                <p>Product Offer</p>
                <div class="form-group">
                    <?php echo form_input('ProductOffer','','class="form-control"') ?>
                </div>
                <p>Product Details</p>
                <div class="form-group">
                    <?php echo form_input('ProductDetails','','class="form-control"') ?>
                </div>
                <p>Photo</p>
                <div class="form-group">
                    <?php echo form_upload('ProductPhoto','','class="form-control"') ?>
                </div>
                <p>Price</p>
                <div class="form-group">
                    <?php echo form_input('ProductPrice','','class="form-control"') ?>
                </div>
                <div class="form-group">
                    <?php echo form_submit('addnewProduct','Add Product','class="btn btn-primary"') ?>
                </div>
                
            <?php echo form_close();?>  
        </div>
    </div>
</div>
