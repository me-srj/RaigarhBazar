<!DOCTYPE html>
<html lang="en" id="theme">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Title -->
     <title>Raigarh Bazar</title>
      <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <meta name="Description" content="India&#x27;s biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Home, Furniture, Grocery, Jewelry, Sporting goods, Beauty &amp; Personal Care and more! Find the largest selection from all brands at the lowest prices in India. Payment options - COD, Credit card, Debit card &amp;amp; more."/>
        <meta name="Keywords" content="Raigarh Bazar,online shopping in jharkhnad,Online Shopping in India,online Shopping store,Online Shopping Site vegetebles and fruits,Buy Online,Shop Online,Online Shopping,raigarhbazar.in"/>
        <meta name="google-site-verification" content="ADAVMJEXrV1X3w-ZG3HXaG2N1rV8Bk8fXtT0bMT_Z7c" />
        <meta name="author" content="raigarhbazar" />
        <meta name="expires" content="never" />
        <meta name="distribution" content="global" />
        <meta name="copyright" content="https://www.raigarhbazar.in/" />
        <meta name="email" content="raigarhbazar@gmail.com" />
        <meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url()?>app-assets/user/img/core-img/favicon.png">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="<?=base_url()?>app-assets/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>app-assets/user/css/animate.css">
    <link rel="stylesheet" href="<?=base_url()?>app-assets/user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>app-assets/user/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>app-assets/user/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=base_url()?>app-assets/user/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="<?=base_url()?>app-assets/user/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url()?>app-assets/user/css/apexcharts.css">
    <!-- Core Stylesheet-->
    <link rel="stylesheet" href="<?=base_url()?>app-assets/user/style.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="<?=base_url()?>app-assets/user/manifest.json">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="<?=base_url()?>app-assets/commonjs/toastr/toastr.css">
     <script src="<?=base_url()?>app-assets/commonjs/toastr/toastr.js"></script>
      <script type="text/javascript">
      $(document).ready(function()
      {
        function cart_item()
       {
  $.ajax({
   url:"<?=base_url()?>welcome/count_cart_item",
   method:"POST",
   cache:false,
   success:function(data)
   {
     $('#cart_iteam').html(data);
   }
  });
}
cart_item();
      })
    </script>
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
      <div class="spinner-grow text-primary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>