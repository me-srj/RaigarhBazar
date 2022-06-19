  <style type="text/css">
    /* Parts are from twitter.com */
.animate {
  animation: heart-burst .8s steps(28) forwards;
}

@keyframes heart-burst {
  0% {
    background-position: left
  }
  100% {
    background-position: right
  }
}
  </style>
  <div class="page-content-wrapper">
      <!-- Hero Slides-->
      <div class="owl-carousel-one owl-carousel">
        <!-- Single Hero Slide-->
        <?php
        foreach ($banners as $img)
        {?>
        <div class="single-hero-slide bg-overlay" style="background-image: url('<?=base_url()?>/app-assets/admin/Banners/<?=$img->banner;?>')">
          <div class="slide-content h-100 d-flex align-items-center text-center">
            <div class="container">
              <h3 class="text-white" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="500ms"><?=$img->line1;?></h3>
              <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="500ms"><?=$img->line2;?>.</p>
            </div>
          </div>
        </div>
        <?php
        }?>
       
      </div>
     <!-- For form auto complete working: Please connect this script <script src="js/default/form-autocomplete.js"></script> --><!-- Auto Complete -->
     <div class="container pt-2">
<form action="#" autocomplete="off">
<input class="form-control" id="auto_complete_product" type="search" name="input" placeholder="Search With Book name,Writer,Publisher and more..">
<ul id="searchResult" style="display: none;list-style: none;background-color:#ffffff;margin-top: -5px;max-height: 200px;overflow-x: auto;" class="col-lg-12 col-12"></ul> 
</form>
</div>
<!-- shop grid -->
 <div class="page-content-wrapper py-3">
      <!-- Top Products-->
      <div class="top-products-area">
        <div class="container">
          <div class="row g-3" id="searchproductlist">

          </div>
        </div>
      </div>
      <!-- Pagination-->
      <div class="shop-pagination pt-3">
        <div class="container">
          <div class="card">
            <div class="card-body py-3 btn text-white" id="load_data_message">
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- shop grid -->
    </div>
    <div class="modal fade bottom-align-modal" id="bottomAlignModal" tabindex="-1" aria-labelledby="bottomAlignModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-end">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="bottomAlignModalLabel">Choose Size</h6>
            <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-primary" type="button" data-bs-dismiss="modal" id="btn5">5</button>
            <button class="btn btn-sm btn-primary" type="button" data-bs-dismiss="modal" id="btn6">6</button>
            <button class="btn btn-sm btn-primary" type="button" data-bs-dismiss="modal" id="btn7">7</button>
            <button class="btn btn-sm btn-primary" type="button" data-bs-dismiss="modal" id="btn8">8</button>
            <button class="btn btn-sm btn-primary" type="button" data-bs-dismiss="modal" id="btn9">9</button>
            <button class="btn btn-sm btn-primary" type="button" data-bs-dismiss="modal" id="close">Close</button>
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
  var toastr = new Toastr();
$(document).ready(function(){
  var limit = 10;
 var start = 0;
 var action = 'inactive';
 // check_wishlist();
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"<?=base_url()?>welcome/get_Books",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    //console.log(data);
    $('#searchproductlist').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<span class='text-dark'>No More Products</span>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<div class='spinner-border spinner-border-sm text-dark' role='status'></div> <text class='text-dark'>Please Wait....</text>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#searchproductlist").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
});
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
cart_item();
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
    cart_item();
    data=JSON.parse(data);
    console.log(data.status);
    if(data.status)
    {
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
function AddToWishlist(id)
{
   $.ajax({
   url:"<?=base_url()?>welcome/AddToWishlist",
   method:"POST",
   data:{pid:id},
   cache:false,
   success:function(data)
   {
   data=JSON.parse(data);
   if(data.status)
   {
    $(this).addClass("animate");
    toastr.show(data.msg);
   }
   else{
    $(this).removeClass("animate");
     toastr.show(data.msg);
     window.location.href='<?=base_url()?>User-Login';
   }  
   }
  });
}
function getproductwithname(search) {
   $.ajax({
   url:"<?=base_url()?>welcome/get_Book_with_name",
   method:"POST",
   data:{search:search},
   cache:false,
   success:function(data)
   {
    //console.log(data);
    $('#searchproductlist').html(data);
    if(data == '')
    {
     $('#load_data_message').html("<span class='text-dark'>No More Products</span>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<div class='spinner-border spinner-border-sm text-dark' role='status'></div> <text class='text-dark'>Please Wait....</text>");
     action = "inactive";
    }
   }
  });
}
$("#auto_complete_product").keyup(function(){
                var search = $(this).val();
                if(search != "" && search!=null && search.length>=3){
                    $.ajax({
                        url: '<?php echo base_url()  ?>welcome/autocompleteproduct',
                        type: 'post',
                        data: {search:search},
                        dataType: 'json',
                        success:function(response){
                          $("#searchResult").show();
                          console.log(response);
                            var len = response.length;
                            $("#searchResult").empty();
                            if (response.length==0) 
                            {
$("#searchResult").append("<li class='btn btn-white m-0' style='width:100%;border:none;border-radius:0px;' >No Product Found.</li>");
                            }
                            else
                            {
                        for( var i = 0; i<len; i++){
                                var id = btoa(response[i]['id']);
                                var name = response[i]['name'];
                                var author=response[i]['author'];
$("#searchResult").append("<li class='alert alert-neutral m-0' style='width:100%;border:none;border-radius:0px;' value='"+name+"'>"+name+"("+author+")</li>");
                            }
                            }
                            // binding click event to li
                            $("#searchResult li").bind("click",function(){
                                searchstr=this.getAttribute('value');
//                                alert(this.getAttribute('value'));
                                $("#auto_complete_product").val(searchstr);
                                $("#searchResult").empty();
                                $("#searchResult").hide();
                                getproductwithname(searchstr);
                            });


                        }
                    });
                }
                else
                {
                  $("#searchResult").hide();
                }

            });
// function check_wishlist()
// {
//   $.ajax({
//    url:"<?=base_url()?>welcome/check_wishlist",
//    cache:false,
//    success:function(data)
//    {
    // alert(data);
   // data=JSON.parse(data);
   // if(data.status)
   // {
   //  toastr.show(data.msg);
   // }
   // else{
   //   toastr.show(data.msg);
   //   window.location.href='<?=base_url()?>User-Login';
   // }    
  //  }
  // });

// }
</script>