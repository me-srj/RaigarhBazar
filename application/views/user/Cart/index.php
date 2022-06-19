<div class="page-content-wrapper py-3" id="cartdata"> 
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area">
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0 text-center" id="productTable">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name/Discription</th>
                    <th scope="col">Quantity</th>
                     <th scope="col">Price</th>
                    <th scope="col">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
            <div class="card-body border-top order_place">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
      var price=0;
cart_item();
      });
      function cart_item()
       {
  $.ajax({
   url:"<?=base_url()?>welcome/count_cart_item2",
   cache:false,
   success:function(data)
   {
    var data=JSON.parse(data);
    // console.log(data);
    $('#cart_iteam').html(data.cart_count);
    $('tbody').html(data.table);
    $('.order_place').html(data.place_order);
    // subAmount();
    $('#checkout').prop('disabled', false);
   }
  });
}
      function remove_book(id,book_id)
      {
        $.ajax({
   url:"<?=base_url()?>welcome/remove_cart_item",
   method:"POST",
   data:{action:'remove',book_id:book_id},
   cache:false,
   success:function(data)
   { 
    data=JSON.parse(data);
    // console.log(data);

    if(data.status)
    {
    $('#trid'+id+'').remove();
    cart_item();
     var toastr = new Toastr();
     toastr.show(data.msg);
    }    
   }
  });  
  }
</script>