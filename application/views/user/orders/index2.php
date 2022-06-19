<?php $totalSub=0;
 foreach ($data as $key) {
$totalSub+=$key['selling_price'];
?>
<div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card product-details-card mb-3"><!-- <span class="badge bg-warning text-dark position-absolute product-badge">Sale -10%</span> -->
          <div class="card-body">
            <div class="product-gallery owl-carousel">
              <div class="single-product-image"><a class="gallery-img2" href="<?=base_url()?>app-assets/product/img/<?=$key['img1']?>" data-effect="mfp-zoom-in"><img src="<?=base_url()?>app-assets/product/img/<?=$key['img1']?>" alt=""></a></div>
              <div class="single-product-image"><a class="gallery-img2" href="<?=base_url()?>app-assets/product/img/<?=$key['img2']?>" data-effect="mfp-zoom-in"><img src="<?=base_url()?>app-assets/product/img/<?=$key['img2']?>" alt=""></a></div>
            </div>
          </div>
        </div>
        <div class="card product-details-card mb-3">
          <div class="card-body">
            <h3><?=$key['name']?></h3>
            <h1>&#8377;<?=$key['selling_price']?></h1>
            <p><?=$key['qnt']?> Quantity</p>
            <p><?=$key['size']?> Size</p>
            <h5>Description</h5>
            <p><?=$key['description']?>p>
          </div>
        </div>
        <?php }?>
        <div class="card product-details-card mb-3">
          <div class="card-body">
            <h5>Shipping Details</h5>
            <p>
            	<h6><?=$data[0]['rname'];?></h6>
            	<?=$data[0]['addressline'];?><br/>
            	<?=$data[0]['city'];?><br/>
            	<?=$data[0]['state'].'-'.$data[0]['pin_code'];?><br/>
            	<?='Phone no. '.$data[0]['mobile'];?>
            </p>
            <hr/>
            <div class="rating-card-two mt-4">
              <!-- Rating result-->
              <h5>Price Details</h5>
              <!-- Rating Details-->
              <div class="rating-detail">
                <!-- Single Rating Details-->
                <div class="d-flex align-items-center mt-2">
                <h6 style="font-weight: 70; display: flex;color: #8480ae"> Selling price</h6>
                  <h6 style="margin-left:auto;font-weight: 500; display: flex; color: #8480ae">&#8377; <?=$totalSub;?></h6>
                </div>
                <div class="d-flex align-items-center mt-2">
                <h6 style="font-weight: 70; display: flex;color: #8480ae"> Shipping fee</h6>
                  <h6 style="margin-left:auto;font-weight: 500; display: flex;color: #8480ae">&#8377; <?php if($totalSub>=500){echo"0";}else{echo"0";}?></h6>
                </div>
                <div class="d-flex align-items-center mt-2">
                <h6 style="font-weight: 70; display: flex;color: #8480ae"> Total Amount</h6>
                  <h6 style="margin-left:auto;font-weight: 500; display: flex;color: #8480ae">&#8377; <?php if($totalSub>=500){echo $totalSub;}else{echo $totalSub;}?></h6>
                </div>

              </div>
            </div>
            <hr/>
            <div>
            	<li> Cash on Delivery.</li>
            </div>
            <?php if($data[0]['dlrp']=="ordered"){?>
            <button class="btn btn-danger w-100 mt-4" id="Cancel">Cancel Order</button>
          <?php }
          elseif($data[0]['dlrp']=="cancel"){
          ?>
          <span class="badge bg-danger rounded-pill w-100 mt-4">Order Canceled</span>
        <?php }
        elseif($data[0]['dlrp']=="delivered"){
        ?>
        <span class="badge bg-success rounded-pill w-100 mt-4">Order Delivered</span>
      <?php } ?>
          </div>
        </div>
        <script type="text/javascript">
          $("#Cancel").click(function(){
            var oid = "<?=$data[0]['oid'];?>";
            $.ajax({
   url:"<?=base_url()?>user/orderCancel",
   method: "POST",
   cache:false,
   data:{oid:oid},
   beforeSend:function(){
       $("#Cancel").attr("disabled","disabled");
   },
   success:function(data)
   {
    //   console.log(data);
     location.reload();
   }
  });
          })
        </script>