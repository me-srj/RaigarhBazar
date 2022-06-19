
<div class="page-content-wrapper py-3">
      <div class="container">
        <!-- User Information-->
        <div class="card user-info-card mb-3">
          <div class="card-body d-flex align-items-center">
            <div class="user-profile me-3">
              <img src="<?=base_url()?>app-assets/user/img/bg-img/<?= $userdetails->image;?>" alt="" id="avatar">
              <form action="#">
                <input class="form-control" type="file" onchange="dppic(this)" id="dpid">
              </form>
               <a class="btn btn-primary btn-sm mt-1 dp" onclick="change_photo()">Change Photo</a>
            </div>
            <div class="user-info">
              <div class="d-flex align-items-center">
                <h5 class="mb-1"><?= $userdetails->Name;?></h5>
              </div>
              <p class="mb-0 text-success"><span class="badge-success badge-empty"></span> Online</p>
            </div>
          </div>

        </div>
        <canvas style="display:none;" id="dppic_canvas"></canvas>
   <div id="msgdtl"></div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
            <form id="userdetails" method="post" action="<?= base_url()?>user/Edit_Profile">
             
              <div class="form-group mb-3">
                <label class="form-label" for="fullname">Full Name</label>
                <input class="form-control" id="fullname" type="text" value="<?= $userdetails->Name;?>" placeholder="Full Name" name="fullname" >
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="email">Email Address</label>
                <input class="form-control" id="email" type="text" value="<?= $userdetails->email;?>" placeholder="Email Address" name="email" >
              </div>
               <div class="form-group mb-3">
                <label class="form-label" for="Contact">Contact</label>
                <input class="form-control" id="number" type="text" value="<?= $userdetails->mobile;?>" placeholder="Mobile" name="contact" readonly>
              </div> 
               <button class="btn btn-success w-100" id="dt" type="submit">Update Now</button>
            </form>
          </div>
        </div>
        <div id="msgaddress"></div>
        <!-- Address Card -->
         <div class="card user-data-card mt-3">
          <div class="card-body">
            <div class="text-center"><h6>Billing Address</h6></div>
            <?php if(!empty($addressdetails)){?>
             <label class="form-label" for="fullname">Reciever Name :<?=$addressdetails->rname;?></label>
            <label class="form-label" for="fullname">address:<?=$addressdetails->addressline;?></label>
            <label class="form-label" for="fullname">Pin Code : <?=$addressdetails->pin_code;?></label>
            <label class="form-label" for="fullname">Post : <?=$addressdetails->city;?></label>
            <label class="form-label" for="fullname">State : <?=$addressdetails->state;?></label>
             <a class="btn mb-3" id="editaddressbtn" style="margin-left:-0.75rem;"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 64 64" width="20px" height="20px"><path fill="#ed7899" d="M46.2,7.92h9.63a4,4,0,0,1,4,4V17.1a0,0,0,0,1,0,0H42.2a0,0,0,0,1,0,0V11.92a4,4,0,0,1,4-4Z" transform="rotate(45 51.017 12.512)"/><path fill="#c2cde7" d="M32.5 15.51H55.129999999999995V24.869999999999997H32.5z" transform="rotate(45 43.817 20.19)"/><path fill="#f9e3ae" d="M17.12 17.45H35.5V57.92999999999999H17.12z" transform="rotate(45 26.318 37.691)"/><path fill="#f6d397" d="M27.38 21.7H33.74V62.17999999999999H27.38z" transform="rotate(45 30.567 41.941)"/><path fill="#faefde" d="M5 57L6 46 13 47 14 50 16.92 51.5 19 59 7 59 5 57z"/><path fill="#faefde" d="M18.88 13.2H25.24V53.67999999999999H18.88z" transform="rotate(45 22.068 33.441)"/><path fill="#8d6c9f" d="M60.59,15.9a4,4,0,0,0-1.17-2.83L50.93,4.59a4.09,4.09,0,0,0-5.66,0L41,8.83a2,2,0,0,0-2.83,0l-5.66,5.66a2,2,0,0,0,0,2.83l.05.05L5.52,44.4a3,3,0,0,0-.87,1.88L4,54.68l-.7,4.92a1,1,0,0,0,1,1.14H4.4L9.32,60l8.45-.62a3,3,0,0,0,1.9-.87l27.08-27a2,2,0,0,0,2.77,0l5.66-5.66a2,2,0,0,0,0-2.83l4.24-4.24A4,4,0,0,0,60.59,15.9Zm-48.69,32,.58,2.88a1,1,0,0,0,.78.78l2.88.58,1.07,5.34L9.59,58,6,54.41l.61-7.6ZM19,56.35l-1-4.77L34.67,35a1,1,0,0,0-1.41-1.41L16.66,50.17,14.3,49.7l-.47-2.36L27.59,33.58a1,1,0,0,0-1.41-1.41L12.42,45.93,7.75,45,34,18.78,45.32,30.09ZM52.34,25.8h0a1,1,0,0,0-1.41,0l-1.41,1.41a1,1,0,0,0,0,1.41h0L48.1,30h0L34,15.9l1.41-1.41a1,1,0,0,0,1.41,0l1.41-1.41a1,1,0,0,0,0-1.41l1.41-1.41.71.71L53.05,23.68l.71.71ZM58,17.31l-4.24,4.24L42.44,10.24,46.69,6a2,2,0,0,1,2.83,0L58,14.49a2,2,0,0,1,0,2.83Z"/><path fill="#8d6c9f" d="M40.32 15.19l-1.41 1.41A1 1 0 1 0 40.32 18l1.41-1.41a1 1 0 0 0-1.41-1.41zM43.86 18.73l-1.41 1.41a1 1 0 1 0 1.41 1.41l1.41-1.41a1 1 0 0 0-1.41-1.41zM47.39 22.26L46 23.68a1 1 0 1 0 1.41 1.41l1.41-1.41a1 1 0 0 0-1.41-1.41zM31.84 26.51L29 29.33a1 1 0 1 0 1.41 1.41l2.83-2.83a1 1 0 0 0-1.41-1.41z"/></svg></a>
             <?php }else{?>
            <a href="javascript:void(0)" class="btn btn-sm btn-primary mb-2" id="editaddressbtn">Add Address</a>
            <?php }?>
             <div id="editaddress" style="display:none;">
            <form id="addressdetails" method="post" action="<?=base_url()?>User/Edit_Address">
             <input type="hidden" name="rname" value="<?=$userdetails->Name;?>">
             <div class="form-group mb-3">
                <label class="form-label" for="Pin Code">Receiver Name</label>

                 <input type="text" name="rname" value="<?=$userdetails->Name;?>" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="Pin Code">Pin Code</label>

                <input class="form-control" id="pin_code" name="pincode" type="text"  placeholder="Enter Pin Code" required>
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="email">Post Office</label>
                <select class="form-control post" required="" name="PostOffice">
                  <optgroup class="po"></optgroup>
                </select>
              </div>
               <div class="form-group mb-3">
                <label class="form-label" for="state">State</label>
                <input class="form-control state" type="text" name="state"  placeholder="" readonly="" >
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="email">Complete Address</label>
                 <textarea class="form-control addressline" name="address" required="">
                   
                 </textarea>
              </div> 
               <button class="btn btn-success w-100" id="ad" type="submit">Update Address</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      var toastr = new Toastr();
          var failed;
        var vphotos = '';
        var adphoto = '';
        var addphoto = '';
      function dppic(ele) {
          var img = new Image();
          img.onload = dp;
          img.onerror = failed;
          img.src = URL.createObjectURL(ele.files[0]);
          }
      function dp() {
  var canvas = document.getElementById('dppic_canvas');
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
  vphotos=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
  $('#avatar').attr('src',dataURL);
 // console.log(vphotos);
};

function change_photo()
{
  if(vphotos!='')
        {
           $.ajax({
            type:"POST",
            url:"<?=base_url()?>User/Edit_Profile_Photo",
            data:{'photo':vphotos},
            beforeSend: function(){
            $('.dp').html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Wait');
              $('#dt').attr('disabled','disabled');
           },
           complete: function(){
            $('.dp').html('Change Photo');
            $('#dt').prop('disabled', false);
           },
            success: function (data) {
                data=JSON.parse(data);
                if(data.status)
                {
                 toastr.show(data.message);
                }
                else{
                  toastr.show(data.message);
                }
               
              
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
         
        }
        else
        {
           toastr.show("No Photo Choosen");

        }
}
      $(document).ready(function()
      {
          
        var frm = $('#userdetails');
        var frm2=$('#addressdetails');
        frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            beforeSend: function(){
            $('#dt').html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait');
              $('#dt').attr('disabled','disabled');
           },
           complete: function(){
            $('#dt').html('Update Now');
            $('#dt').prop('disabled', false);
           },
            success: function (data) {
               // console.log('Submission was successful.');
                data=JSON.parse(data);
                if(data.status){
                  console.log(data.message);
                 $('#msgdtl').html('<div class="alert custom-alert-1 shadow-sm alert-success alert-dismissible fade show" role="alert"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/></svg> '+data.message+'<button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else
                {
                   console.log(data.message);
                   $('#msgdtl').html('<div class="alert custom-alert-1 shadow-sm alert-danger alert-dismissible fade show" role="alert"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/></svg> '+data.message+'<button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }

            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
        frm2.submit(function (e) {

        e.preventDefault();
        if($('#pin_code').val()=='')
        {
          alert('please enter Valid Pin Code');
        }
        else{
        $.ajax({
            type: frm2.attr('method'),
            url: frm2.attr('action'),
            data: frm2.serialize(),
             beforeSend: function(){
            $('#ad').html('<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait');
            $('#ad').attr('disabled','disabled');
           },
           complete: function(){
            $('#ad').html('Update address');
            $('#ad').prop('disabled', false);
           },
            success: function (data) {
              console.log(data);
               // console.log('Submission was successful.');
                data=JSON.parse(data);
                //console.log(data.status);
                if(data.status){
                 // console.log(data.message);
                 location.reload();
                 $('#msgaddress').html('<div class="alert custom-alert-1 shadow-sm alert-success alert-dismissible fade show" role="alert"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/></svg> Address Updated Successfully <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else
                {
                   console.log(data.message);
                   $('#msgaddress').html('<div class="alert custom-alert-1 shadow-sm alert-danger alert-dismissible fade show" role="alert"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/></svg> Failed To Update Address <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }

            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
      }
    });
        
        $('#editaddressbtn').click(function()
        {
          $('#editaddress').show(500);

        })
        $('#pin_code').keyup(function()
        {
          var pincode = $('#pin_code').val();
          var url = "https://api.postalpincode.in/pincode/"+pincode;
          $.ajax({
        url: url,
        type: "GET",
        success: function(data){
           //var res=JSON.parse(data);
           var i;
           if(data[0].Status==='Success'){
            $('.state').val(data[0].PostOffice[0].Circle);
            for(i=0;i<data[0].PostOffice.length;i++)
            {
                var opt='<option value="'+data[0].PostOffice[i].Name+'">'+data[0].PostOffice[i].Name+'</option>';
                $('.po').append(opt);
            }
           }
     
        }
      });
        })
      });
      $('#avatar').click(function(){
         $('#dpid').click(); 
      });
    </script>