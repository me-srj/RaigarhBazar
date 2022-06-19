
  <div class="page-content-wrapper">
     <!-- For form auto complete working: Please connect this script <script src="js/default/form-autocomplete.js"></script> --><!-- Auto Complete -->
     <div class="container pt-2">
<form action="#" autocomplete="off">
<input class="form-control" oninput="search_product(this.value)" id="autoCompletePlace" type="search" name="search" placeholder="Search With Book name,Writer,Publisher and more..">
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

<script type="text/javascript">
  var toastr = new Toastr();
$(document).ready(function(){
 
 var limit = 10;
 var start = 0;
 var action = 'inactive';
 function load_wishlist_data(limit, start)
 {
  $.ajax({
   url:"<?=base_url()?>User/get_wishlist",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    //console.log(data);
    $('#searchproductlist').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<span class='text-dark'>No More In Wishlist</span>");
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
  load_wishlist_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#searchproductlist").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_wishlist_data(limit, start);
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
function remove_wishlist(id)
{
  $.ajax({
   url:"<?=base_url()?>User/remove_wishlist_item",
   method:"POST",
   data:{wid:id},
   cache:false,
   beforeSend: function(){
      $('#remove'+id+'').attr('disabled','disabled');
      $('#remove'+id+'').removeAttr("onclick");
   },
   complete: function(){
    $('#remove'+id+'').prop('disabled', false);
    $('#remove'+id+'').attr('onclick','AddToCart('+id+')');
   },
   success:function(data)
   {
    data=JSON.parse(data);
    console.log(data.status);
    if(data.status)
    {
    toastr.show(data.msg);
    location.reload();
     }
    
    
    
   }
  });
}

</script>