

<div class="content-wrapper ">
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-10 ">
            <h2>List of Products</h2>
        <?php if($this->session->flashdata('class')):?>
          <div class="alert <?php echo $this->session->flashdata('class')?> alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo($this->session->flashdata('message'));?>
          </div>
        <?php endif; ?>
            <?php if($allProduct): ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Product Name</td>
                            <td>Product Offer</td>
                            <td>Product Details</td>
                            <td>Photo</td>
                            <td>Price</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>                                                          
                        <?php foreach($allProduct as $ul): ?>
                        <tr>
                            <td><?php echo $ul->p_id;?></td>
                            <td><?php echo $ul->product_name ?></td>
                            <td><?php echo $ul->product_offer ?></td>
                            <td><?php echo $ul->product_details ?></td>
                            <td><img src="<?php echo base_url('assets/Products/'.$ul->product_photo) ?>" style="width:45px;height:45px"></td>
                            <td><?php echo $ul->product_price ?></td>
                            <td><a class="btn-sm btn-info" href="<?php echo site_url('admin/editProduct/'.$ul->p_id)?>"><i class="fa-solid fa-pen-to-square"></i></a><a class="btn-sm btn-danger " href="<?php echo base_url(); ?>Admin/deleteProduct/<?php echo $ul->p_id; ?>"><i class="fa-solid fa-trash-can"></i></a> </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                    <?php echo $links; ?> 
                </table>                                                                                                         
                    
                <?php echo $links; ?>
            <?php else: ?>
                User Not Available
            <?php endif; ?>  
        </div>
    </div>
    <!-- <a class="btn-sm btn-danger deluser" href="javascript:void(0)" data-id="<?php echo $ul->p_id;?>" data-text="<?php echo $this->encryption->encrypt($ul->p_id)?>">Delete</a> -->
</div>

