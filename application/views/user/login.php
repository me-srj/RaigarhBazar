  <div class="page-content-wrapper">
    <div id="msg">
    <div class="toast toast-autohide custom-toast-1 toast-info home-page-toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="4000" data-bs-autohide="true"><div class="toast-body"><svg width="30" height="30" viewBox="0 0 16 16" class="bi bi-bookmark-check text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/><path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/></svg><div class="toast-text ms-3 me-2"><p class="mb-1 text-white">Welcome to <?= APP_NAME ?></p><small class="d-block">Please Enter your Credentials to Login.</small></div><button class="btn btn-close btn-close-white position-relative p-1 ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button></div></div>
    </div>
      <!-- Hero Slides-->
<div class="container" style="margin-top: 20vh;">
<div class="card">
          <div class="card-body">
            <form class="was-validated" id="loginform" onsubmit="userloginfunction(event)">
              <h2>Login</h2>
              <div class="loginmsg"></div>
              <div class="form-group">
                <label class="form-label" for="username">E-mail/Mobile</label>
                <input class="form-control form-control-clicked" id="username" type="text" placeholder="Enter E-mail/Mobile" required="">
              </div>
              <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input class="form-control form-control-clicked" id="password" type="password" placeholder="Enter your Password" required="">
              </div>
              <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center login" type="submit">
                Login<svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
</svg>
              </button>
            </form>
            <form class="was-validated" id="registerationform" style="display: none;" onsubmit="userregisterfunction(event)">
              <h2>Register now</h2>
              <div class="form-group">
                <label class="form-label" for="username">Enter Mobile</label>
                <input class="form-control form-control-clicked" id="regmobile" type="number" minlength="10" maxlength="10" placeholder="Enter Mobile Number" required="">
              </div>
              <div class="form-group">
                <label class="form-label" for="email">Enter Email</label>
                <input class="form-control form-control-clicked" id="email" type="email" placeholder="example@email.com" required="">
              </div>
              <div class="form-group">
                <label class="form-label" for="cpassword">Create Password</label>
                <input class="form-control form-control-clicked" id="cpassword" type="text" minlength="4" maxlength="10" placeholder="Enter your Password" required="">
              </div>
              <div class="form-group">
                <label class="form-label" for="rpassword">Re-Enter Password</label>
                <input class="form-control form-control-clicked" id="rpassword" type="password" minlength="4" maxlength="10" placeholder="Re-Enter your Password" required="">
              </div>
              <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center register" type="submit">
                Register<svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
</svg>
              </button>
            </form>
            <form class="was-validated" id="forgetpasswordform" style="display: none;" onsubmit="userforgetfunction(event)" novalidate="">
              <h2>Forget Password</h2>
              <div class="msgdiv"></div>
              <div class="form-group">
                <label class="form-label" for="forgetusername">E-mail</label>
                <input class="form-control form-control-clicked" id="forgetusername" type="email" placeholder="example@email.com" required="">
              </div>
              <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" id="forget" type="submit">
                Send OTP<svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
</svg>
              </button>
            </form>
            <form class="was-validated" id="otpform" style="display: none;" onsubmit="otpevent(event)" novalidate="">
              <h2>Verify OTP</h2>
              <div class="msgotp"></div>
              <div class="form-group">
                <label class="form-label" for="otpid">OTP</label>
                <input class="form-control form-control-clicked" id="otpid" type="number" required="">
              </div>
              <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" id="otpbtn" type="submit">
                Verify OTP<svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
</svg>
              </button>
            </form>
            <form class="was-validated" id="resetform" style="display: none;" onsubmit="resetevent(event)" novalidate="">
              <h2>Reset Password</h2>
              <div class="resetdiv"></div>
              <div class="form-group">
                <label class="form-label" for="passwordres">New Password</label>
                <input class="form-control form-control-clicked" id="passwordres" type="password" minlength="4" maxlength="10" placeholder="Enter your Password" required="">
              </div>
              <div class="form-group">
                <label class="form-label" for="passwordresc">Confirm Password</label>
                <input class="form-control form-control-clicked" id="passwordresc" type="password" minlength="4" maxlength="10" placeholder="Confirm your Password" required="">
              </div>
              <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" id="resetbtn" type="submit">
                Reset Password<svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
</svg>
              </button>
            </form>
<br>
<div class="row">
 <center>
  <a class="form-label" id="registrationlink" href="#" onclick="show_register_form()">Register Now &nbsp;</a>
  <a class="form-label" id="loginlink" style="display: none;" href="#" onclick="show_login_form()">Login &nbsp;</a>
  <a class="form-label" id="forgetlink" href="#" onclick="show_reset_password_form()">Forget Password.</a></center>
</div>
<script>
 $(document).ready(function(){

// toastr1.show('Name Updated Successfully');
});
  var toastr = new Toastr();
 function userloginfunction(event) {
   event.preventDefault();
   username=$("#username").val();
   password=$("#password").val();
   $.ajax({
    url:"<?= base_url() ?>welcome/userloginbackend",
    type:"POST",
    data:{username:username,password:password},
     beforeSend: function(){
            $('.login').html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait');
            $('.login').attr('disabled','disabled');
           },
    success:function(data)
    {
      var res=JSON.parse(data);
      if (res['status']<0) 
      {
        toastr.show("Something Went Wrong!!")
      }
      if (res['status']==1) 
      {
  $("#username").val("");
  $("#password").val("");
        toastr.show(res['message']);
        window.location.href='<?=base_url()?>';
      }
      if (res['status']==0) 
      {
         $('.login').html('Login <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path></svg>');
        $('.login').prop('disabled', false);
        toastr.show(res['message']);
      }
    }
   })
 }
 function userregisterfunction(event)
 {
  event.preventDefault();
  mobile=$("#regmobile").val();
  email=$("#email").val();
  password=$("#cpassword").val();
  repassword=$("#rpassword").val();
  if (password==repassword) 
  {
    $.ajax({
        url: "<?= base_url() ?>welcome/userregistration",
        type: "POST",
        data: {
          mobile: mobile,
          email: email,
          password:password,
        },
        beforeSend: function(){
            $('.register').html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait');
            $('.register').attr('disabled','disabled');
           },
           complete: function(){
            $('.register').html('Register <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path></svg>');
            $('.register').prop('disabled', false);
           },
        success: function(data){
                var res=JSON.parse(data);
      if (res['status']<0) 
      {
        toastr.show("Something Went Wrong!!")
      }
      if (res['status']==1) 
      {
  $("#regmobile").val("");
  $("#cpassword").val("");
  $("#rpassword").val("");
  toastr.show(res['message']);
  show_login_form();
      }
      if (res['status']==0) 
      {
        toastr.show(res['message']);
      }
        }
      });
  }
  else
  {
toastr.show("Password and Re-Password Are not Equal.");
  }
 }
  function show_register_form() {
    $("#registrationlink").hide();
    $("#loginlink").show();
    $("#registerationform").fadeIn(500);
    $("#loginform").hide();
    $("#forgetlink").show();
    $("#forgetpasswordform").hide();
    $("#otpform").hide();
    $("#resetform").hide();
  }
  function show_login_form() {
    $("#registrationlink").show();
    $("#loginlink").hide();
    $("#registerationform").hide();
    $("#loginform").fadeIn(500);
    $("#forgetlink").show();
    $("#forgetpasswordform").hide();
    $("#otpform").hide();
    $("#resetform").hide();
  }
  function show_reset_password_form() {
    $("#registrationlink").show();
    $("#loginlink").show();
    $("#registerationform").hide();
    $("#loginform").hide();
    $("#forgetlink").hide();
    $("#forgetpasswordform").fadeIn(500);
    $("#otpform").hide();
    $("#resetform").hide();
  }
  function userforgetfunction(event){
      event.preventDefault();
      forgetusername=$("#forgetusername").val();
    $.ajax({
        url: "<?= base_url() ?>welcome/userforgetpass",
        type: "POST",
        data: {
          email: forgetusername,
        },
        beforeSend: function(){
            $('#forget').html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait');
            $('#forget').attr('disabled','disabled');
          },
          complete: function(){
            $('#forget').html('Send OTP<svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path></svg>');
            $('#forget').prop('disabled', false);
          },
        success: function(data){
            var data=JSON.parse(data);
            if(data['status']==1){
            // $(".msgdiv").html(data['msg']);
            $("#forgetpasswordform").hide();
            $("#otpform").fadeIn(500);
            }
            else if(data['status']==2){
                $(".msgdiv").html("<p class='text-danger'>"+data['msg']+"</p>");
            }
            else if(data['status']==3){
                $(".msgdiv").html("<p class='text-danger'>"+data['msg']+"</p>");
            }
        }
        });
        }
        function otpevent(event){
      event.preventDefault();
      otp=$("#otpid").val();
    $.ajax({
        url: "<?= base_url() ?>welcome/verifyotp",
        type: "POST",
        data: {
          otp: otp,
        },
        beforeSend: function(){
            $('#otpbtn').html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait');
            $('#otpbtn').attr('disabled','disabled');
          },
          complete: function(){
            $('#otpbtn').html('Send OTP<svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path></svg>');
            $('#otpbtn').prop('disabled', false);
          },
        success: function(data){
            var res=JSON.parse(data);
            if(res['status']==1) {
            // $(".msgdiv").html(res['msg']);
            $("#otpform").hide();
            $("#resetform").fadeIn(500);
            }
            else if(res['status']==2){
                $(".msgotp").html("<p class='text-danger'>"+res['msg']+"</p>");
            }
        }
    });
  }
  function resetevent(event){
      event.preventDefault();
  passwordres=$("#passwordres").val();
  passwordresc=$("#passwordresc").val();
  if (passwordres==passwordresc) 
  {
    $.ajax({
        url: "<?= base_url() ?>welcome/resetpass",
        type: "POST",
        data: {
          password:passwordres,
        },
        beforeSend: function(){
            $('#resetbtn').html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait');
            $('#resetbtn').attr('disabled','disabled');
          },
          complete: function(){
            $('#resetbtn').html('Reset Password <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path></svg>');
            $('#resetbtn').prop('disabled', false);
          },
        success: function(data){
            $("#resetform").hide();
            $(".loginmsg").html("<p class='text-success'>Password Successfully Reset.</p>");
            $("#loginform").fadeIn(500);
        }
    })
  }
  else{
      $(".msgotp").html("<p class='text-danger'>Password doesn't Matched!</p>");
  }
}
</script>
          </div>
        </div>
        </div>