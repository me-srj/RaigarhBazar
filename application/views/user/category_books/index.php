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
     
     <!-- For form auto complete working: Please connect this script <script src="js/default/form-autocomplete.js"></script> --><!-- Auto Complete -->
     <div class="container pt-2">
     	<div class="shop-pagination pt-3">
        <div class="container">
          <div class="card">
            <div class="card-body py-3 btn text-dark">
            	<?php echo $cat_book->name;?>
            </div>
          </div>
        </div>
      </div>

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

<script type="text/javascript">
  var toastr = new Toastr();
$(document).ready(function(){
 
 var limit = 10;
 var start = 0;
 var id='<?=$id?>';
 var action = 'inactive';
 function load_country_data(limit, start,$id)
 {
  $.ajax({
   url:"<?=base_url()?>welcome/get_cat_wise_Books",
   method:"POST",
   data:{limit:limit, start:start,id:id},
   cache:false,
   success:function(data)
   {
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
function AddToCart(id)
{
   $.ajax({
   url:"<?=base_url()?>welcome/AddToCart",
   method:"POST",
   data:{pid:id},
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
    // alert(data);
    cart_item();
    data=JSON.parse(data);
    if(data.status)
    {
    $('<audio id="chatAudio"><source src="<?=base_url()?>app-assets/user/notify.mp3" type="audio/ogg">">').appendTo('body');
    $('#chatAudio')[0].play();
     }    
    toastr.show(data.msg);    
   }
  });

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
    toastr.show(data.msg);
   }
   else{
     toastr.show(data.msg);
     window.location.href='<?=base_url()?>User-Login';
   }  
    
   
    
   }
  });
}
</script>