<div class="page-content-wrapper py-3 mt-4">
      <div class="container">
        <div class="card product-details-card mb-3">
          <div class="card-body">
            <div class="product-gallery owl-carousel">
              <div class="single-product-image"><a class="gallery-img2" href="<?=base_url()?>app-assets/product/img/<?= $data[0]->img1;?>" data-effect="mfp-zoom-in"><img src="<?=base_url()?>app-assets/product/img/<?= $data[0]->img1;?>" alt=""></a></div>
              <div class="single-product-image"><a class="gallery-img2" href="<?=base_url()?>app-assets/product/img/<?= $data[0]->img2;?>" data-effect="mfp-zoom-in"><img src="<?=base_url()?>app-assets/product/img/<?= $data[0]->img1;?>" alt=""></a></div>
            </div>
          </div>
        </div>
        <div class="card product-details-card mb-3">
          <div class="card-body">
            <h3><?= $data[0]->name;?></h3>
            <h1>&#8377;<?= $data[0]->selling_price;?></h1>
            <p><?= $data[0]->description;?></p>
            <form id="addcartform" onsubmit="formpost(event)">
              <input type="hidden" name="pid" value="<?= $data[0]->id;?>">
              <?php if($data[0]->unitname=="size"){?>
                <label for="chooseSize">Size</label>
              <select class="form-select mb-3" id="chooseSize" name="size" aria-label="Default select example">
                <option value="5" selected>5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
              </select>
            <?php }
            else{ ?>
              <input type="hidden" name="size" value="0" id="chooseSize">
              <?php
            }
            ?>
            <label for="qnt">Quantity</label>
              <div class="input-group">
                <select class="input-group-text form-control" id="qnt" name="qnt" aria-label="Default select example">
                    <?php if($data[0]->unitname=="kg"){?>
                <option value="0.5">0.5 kg</option>
                <option value="1" selected>1 kg</option>
                <option value="1.5">1.5 kg</option>
                <option value="2">2 kg</option>
                <option value="2.5">2.5 kg</option>
                <option value="3">3 kg</option>
                <option value="3.5">3.5 kg</option>
                <option value="4">4 kg</option>
                <option value="4.5">4.5 kg</option>
                <option value="5">5 kg</option>
                <?php } else if($data[0]->unitname=="dozen"){?>
                <option value="1" selected>1 dozen</option>
                <option value="2">2 dozen</option>
                <option value="3">3 dozen</option>
                <option value="4">4 dozen</option>
                <option value="5">5 dozen</option>
                <?php } else{?>
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <?php }?>
              </select>
                <button class="btn btn-primary w-50" type="submit" id="addcart">Add to Cart</button>
              </div>
            </form>
          </div>
        </div>
        <div class="card product-details-card mb-3">
          <div class="card-body">
            <h5>Description</h5>
            <p><?= $data[0]->description;?></p>
          </div>
        </div>
        <?php
        if(empty($related_product))
        {
        ?>
        <div class="container pt-2">
     	<div class="shop-pagination pt-3">
        <div class="container">
          <div class="card">
            <div class="card-body py-3 btn text-dark">
            Similar Product Not Found
            </div>
          </div>
        </div>
      </div>
       <?php 
        }
        else
        {
        ?>
        <div class="card related-product-card">
          <div class="card-body">
            <h5 class="mb-3">Related Products</h5>
            <div class="row g-3">
                <?php
                foreach($related_product as $similar)
                if($similar->unit==='size'){
                      $btn='<a class="btn btn-danger btn-sm" id="cartbtn'.$similar->id.'" onclick="AddToCart2('.$similar->id.')">Add to Cart</a>';
          }
          else{
            $btn='<a class="btn btn-danger btn-sm" id="cartbtn'.$similar->id.'" onclick="AddToCart('.$similar->id.',0)">Add to Cart</a>';
          }
                {?>
                <div class="col-6 col-sm-4 col-lg-3">
              <div class="card single-product-card">
                <div class="card-body p-3">
                  <!-- Product Thumbnail-->
                  <a class="product-thumbnail d-block" href="<?=base_url()?>viewproduct?id=<?=base64_encode($similar->id)?>"><img src="<?=base_url();?>app-assets/product/img/<?=$similar->img1?>" alt=""></a>
                  <!-- Product Title-->
                  <a class="product-title d-block text-truncate" href="<?=base_url()?>viewproduct?id=<?=base64_encode($similar->id)?>"><?= $similar->name;?></a>
                  <!-- Product Price-->
                  <p class="sale-price">&#8377; <?=$similar->selling_price?></p>
                  <?= $btn ;?>
                </div>
              </div>
            </div>
                <?php
                }
                ?>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
        
      </div>
    </div>
    <script type="text/javascript">
      var toastr = new Toastr();
     
      function formpost(event){
        event.preventDefault();
        $.ajax({
   url:"<?=base_url()?>welcome/AddToCart",
   method: "POST",
   cache:false,
   data:$("#addcartform").serialize(),
   success:function(data)
   {
    data=JSON.parse(data);
    console.log(data.status);
    if(data.status){
    $('<audio id="chatAudio"><source src="<?=base_url()?>app-assets/user/notify.mp3" type="audio/ogg">">').appendTo('body');
    $('#chatAudio')[0].play();
     }    
    toastr.show(data.msg);
   }
  });
  };
  function cart_item()
{
  $.ajax({
   url:"<?=base_url()?>welcome/count_cart_item",
   cache:false,
   success:function(data)
   {
     $('#cart_iteam').html(data);
   }
  });
}

  function AddToCart(id,sze)
{
  $.ajax({
   url:"<?=base_url()?>welcome/AddToCart",
   method:"POST",
   data:{pid:id,size:sze},
   cache:false,
   beforeSend: function(){
      $('#cartbtn'+id+'').attr('disabled','disabled');
      $('#cartbtn'+id+'').removeAttr("onclick");
   },
   complete: function(){
    $('#cartbtn'+id+'').prop('disabled', false);
    $('#cartbtn'+id+'').attr('onclick','AddToCart('+id+')');
   },
   success:function(data)
   {
    data=JSON.parse(data);
    console.log(data.status);
    if(data.status)
    {
      cart_item();  
    $('<audio id="chatAudio"><source src="<?=base_url()?>app-assets/user/notify.mp3" type="audio/ogg">">').appendTo('body');
    $('#chatAudio')[0].play();
     }
    
    toastr.show(data.msg);
    
   }
  });

}
function AddToCart2(id){
  $("#btn5").attr("onclick","AddToCart("+id+",5)");
  $("#btn6").attr("onclick","AddToCart("+id+",6)");
  $("#btn7").attr("onclick","AddToCart("+id+",7)");
  $("#btn8").attr("onclick","AddToCart("+id+",8)");
  $("#btn9").attr("onclick","AddToCart("+id+",9)");
  $("#bottomAlignModal").modal('show');
}
    </script>