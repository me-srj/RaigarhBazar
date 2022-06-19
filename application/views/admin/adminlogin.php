<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Title -->
     <title>ADMIN LOGIN , Online Shopping Site for Mobiles, Electronics, Furniture, Grocery, Lifestyle, Books , Fashion &amp; More. Best Offers!</title>
      <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <meta name="Description" content="India&#x27;s biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Home, Furniture, Grocery, Jewelry, Sporting goods, Beauty &amp; Personal Care and more! Find the largest selection from all brands at the lowest prices in India. Payment options - COD, Credit card, Debit card &amp;amp; more."/>
        <meta name="Keywords" content="Online Shopping in India,online Shopping store,Online Shopping Site,Buy Online,Shop Online,Online Shopping,raigarhbazar.in"/>
        <meta name="google-site-verification" content="ADAVMJEXrV1X3w-ZG3HXaG2N1rV8Bk8fXtT0bMT_Z7c" />
        <meta name="author" content=">Online Shopping Site for Mobiles, Electronics, Furniture, Grocery, Lifestyle, Books , Fashion " />
        <meta name="expires" content="never" />
        <meta name="distribution" content="global" />
        <meta name="copyright" content="https://www.raigarhbazar.in/" />
        <meta name="email" content="raigarhbazar@gmail.com" />
    <link rel="apple-touch-icon" href="<?=base_url()?>app-assets/admin/images/ico/apple-icon-120.html">
    <link rel="icon" href="<?=base_url()?>app-assets/user/img/core-img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/themes/bordered-layout.min.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/css/pages/page-auth.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/admin/assets/css/style.css">
    <!-- END: Custom CSS-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="<?=base_url()?>app-assets/commonjs/jquery.min.js"></script>
<script src="<?=base_url()?>app-assets/commonjs/ajax.min.js"></script>
       <style>
      #overlay {
  background:#1b1e21;
  color: #666666;
  position: fixed;
  height: 100%;
  width: 100%;
  z-index: 5000;
  top: 0%;
  left: 0;
  float: left;
  text-align: center;
  padding-top:0;
  opacity: .80;
}

.spinner {
   /*margin: 240px 100px 1px 150px;*/
    margin: 260px auto 1px auto;
    height: 64px;
    width: 64px;
    animation: rotate 0.8s infinite linear;
    border: 5px solid firebrick;
    border-right-color: transparent;
    border-radius: 50%;
}
@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
  </style>

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-v2">
            <div class="auth-inner row m-0">
              <!-- Brand logo--><a class="brand-logo" href="javascript:void(0);">
                <img src="<?=base_url()?>app-assets/user/img/core-img/logonew.png" style="height:40px;"/>
                </a>
              <!-- /Brand logo-->
              <!-- Left Text-->
              <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="<?=base_url()?>app-assets\admin\images\elements\login-v2.svg" alt="Login V2"/></div>
              </div>
              <!-- /Left Text-->
              <!-- Login-->
              <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                  <h4 class="card-title mb-1">Welcome to Raigarh Bazar! 👋</h4>
                  <p class="card-text mb-2">Plesase don't share Your credentials to Keep Your Account Secure</p>
                  <div class="alert alert-danger messagediv mt-1 alert-validation-msg" role="alert" style="display:none;">
              <div class="alert-body">
                <i data-feather="info" class="mr-50 align-middle"></i>
                <span id="messagediv" style="font-size: 12px;"> Provide Email & Password  <i class="fa fa-dizzy"></i></span>
              </div>
            </div>
                  
                  <form id="adminloginform" class="mt-2" action="#" onsubmit="adminloginformsubmit(event)">
                    <div class="form-group">
                      <label class="form-label" for="login-email">Email</label>
                      <input class="form-control" id="login-email" type="email" name="username" placeholder="example@gmail.com.com" aria-describedby="login-email" autofocus="" tabindex="1" required="" />
                    </div>
                    <div class="form-group">
                      <div class="d-flex justify-content-between">
                        <label for="login-password">Password</label><a href="page-auth-forgot-password-v2.html"><small>Forgot Password?</small></a>
                      </div>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" required="" />
                        <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                      </div>
                    </div>
                   
                    <button class="btn btn-primary btn-block" type="submit" id="submit" tabindex="4" >Sign in </button>
                  </form>
                  
                  
                </div>
              </div>
              <!-- /Login-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    <div id="overlay" style="display:none;">
    <div class="spinner"></div>
    <br/>
    Loading...
</div>

  </body>
  <!-- END: Body-->
  <!-- BEGIN: Vendor JS-->
    <script src="<?=base_url()?>app-assets/admin/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?=base_url()?>app-assets/admin/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?=base_url()?>app-assets/admin/js/core/app-menu.min.js"></script>
    <script src="<?=base_url()?>app-assets/admin/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?=base_url()?>app-assets/admin/js/scripts/pages/page-auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      });
      function adminloginformsubmit(event) {
       event.preventDefault();
//     alert('jquery');
  $.ajax({
        url: "<?= base_url() ?>welcome/adminlogin",  
        method:"POST",  
        data:$('form').serialize(),  
        cache:false,
        beforeSend:function(){
    $('#submit').html('<span class="fa fa-circle-o-notch fa-spin"></span> Loading...');
    $('#submit').attr('disabled','true');
        },
        success: function(dataResult)
        {
           $('#submit').removeAttr('disabled');
      $('#submit').html('Sign In');
          var dataResult = JSON.parse(dataResult);
          if(!dataResult.status){
             $(".messagediv").show();
             $("#messagediv").html(dataResult.message);          
          }
          else{
             window.location='<?= base_url() ?>admin/dashboard';
          }
          
        }
      });
      }
    </script>
</html>