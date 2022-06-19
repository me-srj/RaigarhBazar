<div class="page-content-wrapper py-3">
      <div class="container">               
        <!-- Contact Form-->
        <div class="card mb-3">

          <div class="card-body">
            <h5 class="mb-3">Write to us</h5>
            <span class="error text-danger" style="font-size:12px;font-weight:bolder;"></span>
            <div class="successdiv"></div>
            <div class="contact-form">
              <form action="<?=base_url()?>welcome/contact_admin" method="POST" id="form">
                <div class="form-group mb-3">
                  <input class="form-control name" type="text" name="name" placeholder="Your name">
                </div>
                <div class="form-group mb-3">
                  <input class="form-control email" type="email" name="email" placeholder="Enter email">
                </div>
                <div class="form-group mb-3">
                 <input class="form-control mobile" type="text" minlength="10" maxlength="10" name="mobile" placeholder="Mobile Number" onkeypress="return isNumber(event)">
                </div>
                <div class="form-group mb-3">
                  <textarea class="form-control msg" name="msg" cols="30" rows="10" placeholder="Write details"></textarea>
                </div>
                <button class="btn btn-primary w-100 send" type="submit">Send Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <!-- Google Maps-->
        <!-- <div class="card">
          <div class="card-body">
            <div class="google-maps">
              <h5 class="mb-3">Our office location</h5>
              <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37902.096510377676!2d101.6393079588335!3d3.103387873464772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49c701efeae7%3A0xf4d98e5b2f1c287d!2sKuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur%2C%20Malaysia!5e0!3m2!1sen!2sbd!4v1591684973931!5m2!1sen!2sbd" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
        </div> -->
      </div>
    </div>
   
       <script type="text/javascript">
    $("#form").submit(function(e) {
    var toastr = new Toastr();
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    var name=$('.name').val();
    var email=$('.email').val();
    var mobile=$('.mobile').val();
    var msg=$('.msg').val();
    if(name=='' || email=='' || mobile=='' || msg=='')
    {
        $('.error').html('Provide All Details*');
        $('.successdiv').html('');
       $('.error').show();
    }
    else{
      $('.error').html('');
        $('.error').hide();
      $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(),
            beforeSend: function(){
            $('.send').html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait');
            $('.send').attr('disabled','disabled');
           },
           complete: function(){
            $('.send').html('Send Now');
            $('.send').prop('disabled', false);
           },
           success: function(data)
           {
           data=JSON.parse(data);
            if(data.status)
            {
              $('.name').val(null);
              $('.email').val(null);
              $('.mobile').val(null);
              $('.msg').val(null);
             toastr.show(data.message);
             $('.successdiv').html('<div class="alert custom-alert-1 shadow-sm alert-success alert-dismissible fade show" role="alert"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/></svg> Query Received We will reach You soon <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }
            else{
              $('.successdiv').html('<div class="alert custom-alert-1 shadow-sm alert-danger alert-dismissible fade show" role="alert"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/></svg> Query Received We will reach You soon <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            }
           }
         });
          }
        });
      function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
    </script>
