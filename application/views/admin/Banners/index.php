<link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/plugins/extensions/ext-component-sliders.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/pages/app-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/plugins/extensions/ext-component-toastr.min.css">
 <script src="<?=base_url()?>app-assets/admin/js/scripts/pages/app-ecommerce.min.js"></script>
<!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Admin</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/Dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Banner Setting</a>
                    </li>
                    
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="alert alert-success msgdiv d-none" role="alert">
       </div>
        <div class="content-detached content-right">
        <section id="ecommerce-products" class="grid-view">
          <?php
          foreach($banners as $banner)
          {?>      
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="javascript:void(0)">
        <img class="img-fluid card-img-top" style="height:40vh;" src="<?=base_url()?>/app-assets/admin/Banners/<?=$banner->banner;?>" alt="img-placeholder" id="cover<?=$banner->id;?>"></a>
    </div>
    <div class="card-body">
    
        <div class="item-name">
          <input type="text" class="form-control" maxlength="25" value="<?= $banner->line1;?>" id="line1<?=$banner->id;?>">
        </div>
     
      <h6 class="item-name">
        <input type="text" class="form-control" maxlength="50" value="<?= $banner->line2;?>" id="line2<?=$banner->id;?>">
      </h6>
      
    </div>
    <div class="item-options text-center">
      <a class="btn btn-light waves-effect waves-float waves-light" id="firstahref<?=$banner->id;?>">
        <svg fill="none" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="14px" height="14px" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M 16.9375 1.0625 L 3.875 14.125 L 1.0742188 22.925781 L 9.875 20.125 L 22.9375 7.0625 C 22.9375 7.0625 22.8375 4.9615 20.9375 3.0625 C 19.0375 1.1625 16.9375 1.0625 16.9375 1.0625 z M 17.3125 2.6875 C 18.3845 2.8915 19.237984 3.3456094 19.896484 4.0214844 C 20.554984 4.6973594 21.0185 5.595 21.3125 6.6875 L 19.5 8.5 L 15.5 4.5 L 16.9375 3.0625 L 17.3125 2.6875 z M 4.9785156 15.126953 C 4.990338 15.129931 6.1809555 15.430955 7.375 16.625 C 8.675 17.825 8.875 18.925781 8.875 18.925781 L 8.9179688 18.976562 L 5.3691406 20.119141 L 3.8730469 18.623047 L 4.9785156 15.126953 z"/></svg>
        <span>Choose Photo</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-float waves-light" id="save<?=$banner->id;?>">
        <svg fill="none" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="14px" height="14px" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M 2 2 L 2 22 L 22 22 L 22 2 Z M 4 4 L 20 4 L 20 20 L 4 20 Z M 17.40625 7.1875 L 11 13.5625 L 7.71875 10.28125 L 6.28125 11.71875 L 10.28125 15.71875 L 11 16.40625 L 11.71875 15.71875 L 18.8125 8.59375 Z"/></svg>
        <span class="add-to-cart">Save</span>
      </a>
    </div>
  </div>
  <input type="file" id="firstimg<?=$banner->id;?>" onchange="coverfnc<?=$banner->id;?>(this)" hidden/>
  <canvas style="display:none;" id="canvas<?=$banner->id;?>"></canvas>
  <script>
  var failed;
        var vphotos<?=$banner->id;?> = '';
      $("#firstahref<?=$banner->id;?>").click(function(){
      $("#firstimg<?=$banner->id;?>").click(); 
      });
      function coverfnc<?=$banner->id;?>(ele){
          var img = new Image();
          img.onload = dp<?=$banner->id;?>;
          img.onerror = failed;
          img.src = URL.createObjectURL(ele.files[0]);
      };
       function dp<?=$banner->id;?>() {
  var canvas = document.getElementById('canvas<?=$banner->id;?>');
if (this.width>500) 
{
    canvas.width = 500;
}
else
{
   canvas.width = this.width; 
}
 if (this.height>500) 
{
    canvas.height = 500;
}
else
{
   canvas.height = this.height; 
}
  var ct = canvas.getContext('2d');
  ct.drawImage(this, 0,0,canvas.width,canvas.height);
  var dataURL = canvas.toDataURL("image/png");
  vphotos<?=$banner->id;?>=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
  $('#cover<?=$banner->id;?>').attr('src',dataURL);
 // console.log(vphotos);
};
$("#save<?=$banner->id;?>").click(function(){
  var formData = {
            'id': '<?=$banner->id;?>',
            'banner': vphotos<?=$banner->id;?>,
            'line1': $('#line1<?=$banner->id;?>').val(),
            'line2': $('#line2<?=$banner->id;?>').val()
          }
          $.ajax({
      method:"POST",
      url:"<?= base_url() ?>admin/updatecover",
      data:formData,
      cache:false,
        beforeSend:function(){
    $('#save<?=$banner->id;?>').html('<span class="fa fa-circle-o-notch fa-spin"></span> wait...');
    $('#save<?=$banner->id;?>').attr('disabled','disabled');
        },
        success: function(dataResult){
     data=JSON.parse(dataResult);
    $('#save<?=$banner->id;?>').html('Save');
    $('#save<?=$banner->id;?>').removeAttr('disabled');
    if(data.status){
    $('.msgdiv').attr("class","alert alert-success msgdiv");
    $('.msgdiv').html('<h4 class="alert-heading">'+data.message+'</h4>');
     }else{
         $('.msgdiv').attr("class","alert alert-danger msgdiv");
         $('.msgdiv').html('<h4 class="alert-heading">'+data.message+'</h4>');
     }
   }
    });
})
  </script>
  <?php
  }
  ?>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->