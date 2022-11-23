

        
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
            <?php echo form_open_multipart('admin/updateProduct','',''); ?>
            <input type="hidden" name="xid" value="<?php echo $product[0]['p_id'] ?>">
            <input type="hidden" name="oldimg" value="<?php echo $product[0]['product_photo'] ?>">
                <p>Product Name</p>
                <div class="form-group">
                    <?php echo form_input('ProductName',$product[0]['product_name'],'class="form-control"') ?>
                </div>
                <p>Product Offer</p>
                <div class="form-group">
                    <?php echo form_input('ProductOffer',$product[0]['product_offer'],'class="form-control"') ?>
                </div>
                <p>Product Details</p>
                <div class="form-group">
                    <?php echo form_input('ProductDetails',$product[0]['product_details'],'class="form-control"') ?>
                </div>
                <p>Photo</p>
                <div class="form-group">
                    <?php echo form_upload('ProductPhoto',$product[0]['product_photo'],'class="form-control"') ?>
                </div>
                <p>Price</p>
                <div class="form-group">
                    <?php echo form_input('ProductPrice',$product[0]['product_price'],'class="form-control"') ?>
                </div>
                <div class="form-group">
                    <?php echo form_submit('updateProduct','Update Product','class="btn btn-primary"') ?>
                </div>
                
            <?php echo form_close();?>  
        </div>
        <div class="col-md-3">
        <img src="<?php echo base_url('assets/Products/'.$product[0]['product_photo'])?>" class="img-responsive">
        </div>
    </div>
</div>
