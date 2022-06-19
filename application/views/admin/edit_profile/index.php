<!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
          </div>
        </div>
            <div class="content-body">
                <section id="minimal-statistics-bg">
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
              <div class="card-body">
<div class="row badge" id="messagediv"></div>
<form class="form form-horizontal" method="POST" id="editform"
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-eye"></i> Edit Profile</h4>
                                <div class="col-md-12">
                                <img src="<?= base_url() ?>app-assets/admin/images/portrait/small//<?= $admin['image']; ?>" id="profile-img-tag" style="width:100px; height:100px" class="img-thumbnail">
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="validationTooltip01">Name</label>
                                            <div class="col-md-9">
                                            <div class="position-relative has-icon-left">
<input type="text" id="validationTooltip01" class="form-control border-primary" placeholder="Name" name="name" value="<?= $admin['name']; ?>" required="">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput2">Phone No.</label>
                                            <div class="col-md-9">
                                                <div class="position-relative has-icon-left">
                                                <input type="tel" id="userinput2" class="form-control border-primary" placeholder="Phone Number" name="mobile" value="<?= $admin['mobile']; ?>" max="10" min="10" required="">
                                        
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                                <div class="row">
                                  <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput2">Email</label>
                                            <div class="col-md-9">
                                                <div class="position-relative has-icon-left">
                                                <input type="text" id="userinput2" class="form-control border-primary" placeholder="Phone Number" name="email" value="<?= $admin['email']; ?>" max="10" min="10" required="">
                                        
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput8">Image</label>
                                        <div class="col-md-9">
                                        <fieldset class="form-group">
                            <div class="custom-file">
                                <input type="file"  class="custom-file-input image-file" id="photo" name="image" onchange="dppic(this)">
                                <label class="custom-file-label" for="userinput7">Choose file</label>
                            </div>
                                        </fieldset>
                                        <canvas style="display:none;" id="dppic_canvas"></canvas>
                            <div class="form-actions right">
                                <center>
                                <button id="submitbtn" type="submit" class="btn btn-primary" name="submit" id="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                              <span style="display: none;" class="fa fa-circle-o-notch fa-spin"></span>
            </center>                </div>
                        </form>
                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <!--/ form end -->
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </section>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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
  $('#profile-img-tag').attr('src',dataURL);
 // console.log(vphotos);
};

    //form submit
    $("#editform").submit(function(e){
        e.preventDefault();
    var formData = {
            'name': $('input[name=name]').val(),
            'mobile': $('input[name=mobile]').val(),
            'email': $('input[name=email]').val(),
            'image': vphotos
          }
    $.ajax({
      method:"POST",
      url:"<?= base_url() ?>admin/edit_profile_data",
      data:formData,
      cache:false,
        beforeSend:function(){
    $('#submit').html('<span class="fa fa-circle-o-notch fa-spin"></span> Loading...');
    $('#submit').attr('disabled','disabled');
        },
        success: function(dataResult)
        {
          console.log(dataResult);
          $('#submit').removeAttr('disabled');
      $('#submit').html('<i class="la la-check-square-o"></i> Save');
      if (dataResult) 
      {
$("#messagediv").attr("class","badge row badge-success");
 $("#messagediv").html("Update Successfully!");
      }
      else
      {
$("#messagediv").attr("class","badge row badge-danger");
 $("#messagediv").html("Something Error!");
      }
        }
      });
  });
</script>


