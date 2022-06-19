<div class="page-content-wrapper py-5">
      <div class="container">
<!-- Call To Action 02 -->
<div class="pt-4" id="orderdata"> 

</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
   url:"<?=base_url()?>user/getorders",
   cache:false,
   success:function(data)
   {
    $('#orderdata').html(data);
    }
  });
	});
</script>