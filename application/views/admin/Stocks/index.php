<!-- End: Customizer--> <!-- BEGIN: Content-->
<style type="text/css">
  .dt-buttons{
    margin-left: 6vh; 
  }
  .btn-secondary{
    background-color: #7367F0!important;
  }
</style>
    <div class="app-content content ">
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
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Stocks
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <!-- Card stats -->
          <div class="row">
          <div class="col-md-12 card">
            <div class="table-responsive mt-3">
<center><div class="dabge col-md-12" id="messagediv"></div></center>
<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modals-slide-in" onclick="add()">+</button>
              <table class="table table-responsive file-export align-items-center">
                 <thead>
            <tr>
              <th>S.No.</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Description</th>
              <th>Quantity</th>
              <th>mrp</th>
              <th>Category</th>
              <th>Selling Price</th>
              <th>Publish On</th>
              <th>Author</th>
              <th>writer</th>
              <th>Publisher</th>
              <th>Disclaimer</th>
              <th>Add On</th>
              <th>Add By</th>
              <th>Minimume Alert</th>
              <th>Status</th>
              <th>Action</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=0;
          foreach($product as $pro){
          	if($pro->mfg_details==''||$pro->mfg_details==null){ $mgf="---";}else{ $mgf=date('M d,Y', strtotime($pro->mfg_details));}
          	if($pro->author==''||$pro->author==null){$auth="---";}else{$auth=$pro->author;}
          	if($pro->writer==''||$pro->writer==null){$writer="---";}else{$writer=$pro->writer;}
          	if($pro->publisher==''||$pro->publisher==null){$pub="---";}else{$pub=$pro->publisher;}
          	if($pro->status){$status='<span class="badge badge-pill bg-success">Active</span>';}else{$status='<span class="badge badge-pill bg-danger">InActive</span>';}
            echo '<tr>
              <td>'.++$i.'</td>
              <td><img src="'.base_url().'app-assets/product/img/'.$pro->img1.'" style="width: 50px;height: 50px;"/></td>
              <td>'.$pro->name.'</td>
              <td>'.$pro->description.'</td>
              <td>'.$pro->stock.'</td>
              <td>'.$pro->mrp.'</td>
              <td>'.$pro->cat.'</td>
              <td>'.$pro->selling_price.'</td>
              <td>'.$mgf.'</td>
              <td>'.$auth.'</td>
              <td>'.$writer.'</td>
              <td>'.$pub.'</td>
              <td>'.$pro->disclaimer.'</td>
              <td>'.date('M d,Y', strtotime($pro->con)).'</td>
              <td>'.$pro->cby.'</td>
              <td>'.$pro->minalert.'</td>
              <td>'.$status.'</td>
      <td><button class="btn btn-primary btn-sm" id="addqantity'.$pro->id.'" onclick="addqantity(\''.$pro->name.'\',\''.$pro->id.'\')">+</button></td>
              <td><button class="btn btn-primary btn-sm" id="edit'.$pro->id.'" onclick="edit('.$pro->id.')">edit</button>
              </td>
            </tr>';
            }?>
          </tbody>
              </table>
            </div>
</div>
</div>
</div>
</div>
</div>
  <div class="modal modal-slide-in fade" id="modals-slide-in">
    <div class="modal-dialog sidebar-sm addform">
      <form class="add-new-record modal-content pt-0 addcat" onsubmit="addformsubmit(event)">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">New Stocks</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-fullname">Category</label>
          <select class="form-control dt-full-name catid" id="basic-icon-default-fullname" name="catid" required>
            <?php foreach($Categorys as $categ){?>
             <option value="<?=$categ->id?>" data-data1="<?=$categ->unit?>"><?=$categ->name?></option> 
          <?php }?>
          </select>
          </div>
          <div class="form-group">
            <input type="text" name="id" id="id" hidden>
            <label class="form-label" for="basic-icon-default-pname">Product Name</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="basic-icon-default-pname"
              placeholder="Product Name" name="name" required
            />
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-pimage">Product Image</label>
            <input
              type="file"
              class="form-control dt-full-name"
              id="basic-icon-default-pimage" name="img1" onchange="vehiclephoto(this)" required
            />
          </div>
          <canvas style="display: none;" id="vehiclephoto_canvas"></canvas>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-img2">Product Image 2</label>
            <input
              type="file"
              class="form-control dt-full-name"
              id="basic-icon-default-img2" name="img2" onchange="dvlphoto(this)"  required
            />
          </div>
          <canvas style="display: none;" id="drawdlphoto_canvas"></canvas>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-desc">Description</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="basic-icon-default-desc"
              placeholder="Description" name="description" required
            />
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-quty">Quantity</label>
            <input
              type="number"
              class="form-control dt-full-name"
              id="basic-icon-default-quty" name="stock" required
            />
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-mrp">MRP</label>
            <input
              type="number"
              class="form-control dt-full-name"
              id="basic-icon-default-mrp" name="mrp" required
            />
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-sellingprice">Selling Price</label>
            <input
              type="number"
              class="form-control dt-full-name"
              id="basic-icon-default-sellingprice" name="selling_price" required
            />
          </div>
          <div class="form-group" id="publishon">
            <label class="form-label" for="basic-icon-default-pon">Publish On</label>
            <input
              type="date"
              class="form-control dt-full-name mfg_details"
              id="basic-icon-default-pon" name="mfg_details" required
            />
          </div>
          <div class="form-group" id="author">
            <label class="form-label" for="basic-icon-default-author">Author</label>
            <input
              type="text"
              class="form-control dt-full-name author"
              id="basic-icon-default-author" name="author" required
            />
          </div>
          <div class="form-group" id="writer">
            <label class="form-label" for="basic-icon-default-writer">Writer</label>
            <input
              type="text"
              class="form-control dt-full-name writer"
              id="basic-icon-default-writer" placeholder="Writer" name="writer" required
            />
          </div>
          <div class="form-group" id="publisher">
            <label class="form-label" for="basic-icon-default-publi">Publisher</label>
            <input
              type="text"
              class="form-control dt-full-name publisher"
              id="basic-icon-default-publi" placeholder="Publisher"  name="publisher" required
            />
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-descl">Disclaimer</label>
            <textarea
              type="text"
              class="form-control dt-full-name"
              id="basic-icon-default-descl" placeholder="Disclaimer" name="disclaimer" required
            ></textarea>
          </div>
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-ml">Minimume Alert</label>
            <input
              type="number"
              class="form-control dt-full-name"
              id="basic-icon-default-ml" name="minalert" required
            />
          </div>
          <button type="submit" class="btn btn-primary data-submit mr-1" id="submit">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
   <!-- Modal to add new record -->
  <div class="modal modal-slide-in fade" id="addqantity">
    <div class="modal-dialog sidebar-sm">
      <form class="add-new-record modal-content pt-0 addqntform" onsubmit="addqntformsubmit(event)">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="prname4qnt">Add Quantity</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-fullname">Add Quantity</label>
            <input type="text" name="id" class="qid" hidden>
            <input
              type="number"
              class="form-control dt-full-name editinput"
              id="basic-icon-default-fullname addqnt" name="addqnt"
            />
          </div>
          <button type="submit" class="btn btn-primary data-submit mr-1" id="submit2">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
<!--/ Basic table -->
<script type="text/javascript">
    // vehiclephoto
    var failed;
    var img1='';
    var img2='';
    function vehiclephoto(ele) {
    var img = new Image();
    img.onload = drawvehiclephoto;
    img.onerror = failed;
    img.src = URL.createObjectURL(ele.files[0]);
    }
  function drawvehiclephoto() {
    var canvasv = document.getElementById('vehiclephoto_canvas');
    // $(canvasv).show();
  if (this.width>500) 
  {
      canvasv.width = 500;
  }
  else
  {
     canvasv.width = this.width; 
  }
   if (this.height>500) 
  {
      canvasv.height = 500;
  }
  else
  {
     canvasv.height = this.height; 
  }
    var ctx = canvasv.getContext('2d');
    ctx.drawImage(this, 0,0,canvasv.width,canvasv.height);
    var dataURL = canvasv.toDataURL("image/png");
    img1=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
  }
  // dlphotso start
  function dvlphoto(ele) {
  var img = new Image();
  img.onload = drawdlphoto;
  img.onerror = failed;
  img.src = URL.createObjectURL(ele.files[0]);
  }
function drawdlphoto() {
  var canvasdl = document.getElementById('drawdlphoto_canvas');
  // $(canvasdl).show();
if (this.width>500) 
{
    canvasdl.width = 500;
}
else
{
   canvasdl.width = this.width; 
}
 if (this.height>500) 
{
    canvasdl.height = 500;
}
else
{
   canvasdl.height = this.height; 
}
  var ctxdl = canvasdl.getContext('2d');
  ctxdl.drawImage(this, 0,0,canvasdl.width,canvasdl.height);
  var dataURL = canvasdl.toDataURL("image/png");
  img2=dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
$(document).ready(function(){
  load();
  datachances();
  });
function load(){
//   $.ajax({
//         url: "<?= base_url() ?>admin/productdata",  
//         method:"POST",
//         cache:false,
//         success: function(dataResult){
//           if(dataResult==''){
//           $('tbody').html('<tr><td colspan="2">No Data</td></tr>');
//           }else{
//           $('tbody').html(dataResult);
//           }
//         }
//       });
    $('input[name=id]').val('');
    $('input[name=addqnt]').val('');
    $('input[name=name]').val('');
    $('input[name=description]').val('');
    $('input[name=stock]').val('');
    $('input[name=mrp]').val('');
    $('input[name=img1]').val('');
    $('input[name=img2]').val('');
    $('input[name=selling_price]').val('');
    $('input[name=mfg_details]').val('');
    $('input[name=author]').val('');
    $('input[name=writer]').val('');
    $('input[name=publisher]').val('');
    $('textarea[name=disclaimer]').val('');
    $('input[name=minalert]').val();
}
function add(){
  $('#exampleModalLabel').html('Add Stocks');
}
  function edit(id){
    var editbnt=$('#edit'+id+'');
    $.ajax({
        url: "<?= base_url() ?>admin/getpro",  
        method:"POST",  
        data:{'id':id},
        cache:false,
        beforeSend:function(){
    editbnt.html('<span class="fa fa-circle-o-notch fa-spin"></span>wait...');
    editbnt.attr('disabled','true');
        },
        success: function(dataResult)
        {
          var dataResult = JSON.parse(dataResult);
          datachances();
          $('select[name=catid]').val(dataResult.catid);
            $('input[name=id]').val(dataResult.id);
            $('input[name=name]').val(dataResult.name);
            $('input[name=description]').val(dataResult.description);
            $('input[name=stock]').val(dataResult.stock);
            $('input[name=mrp]').val(dataResult.mrp);
            $('input[name=selling_price]').val(dataResult.selling_price);
            $('input[name=mfg_details]').val(dataResult.mfg_details);
            $('input[name=author]').val(dataResult.author);
            $('input[name=writer]').val(dataResult.writer);
            $('input[name=publisher]').val(dataResult.publisher);
            $('textarea[name=disclaimer]').val(dataResult.disclaimer);
            $('input[name=minalert]').val(dataResult.minalert);
      editbnt.removeAttr('disabled');
      editbnt.html('edit');
      $('#exampleModalLabel').html('Update Stocks');
      $('input[name=img1]').removeAttr('required');
      $('input[name=img2]').removeAttr('required');
      $('#modals-slide-in').modal();
        }
      });
  }
       function addformsubmit(event) {
       event.preventDefault();
//     alert('jquery');
if($('#id').val() != ''){
var urldata = "<?= base_url() ?>admin/editpro";
var formData = {
            'id': $('input[name=id]').val(),
            'name': $('input[name=name]').val(),
            'description': $('input[name=description]').val(),
            'stock': $('input[name=stock]').val(),
            'mrp': $('input[name=mrp]').val(),
            'catid': $('select[name=catid]').val(),
            'selling_price': $('input[name=selling_price]').val(),
            'mfg_details': $('input[name=mfg_details]').val(),
            'author': $('input[name=author]').val(),
            'writer': $('input[name=writer]').val(),
            'publisher': $('input[name=publisher]').val(),
            'disclaimer': $('textarea[name=disclaimer]').val(),
            'minalert': $('input[name=minalert]').val(),
            'img1':img1,
            'img2':img2
        };
}else{
var urldata = "<?= base_url() ?>admin/addpro";
var formData = {
            'name': $('input[name=name]').val(),
            'description': $('input[name=description]').val(),
            'stock': $('input[name=stock]').val(),
            'mrp': $('input[name=mrp]').val(),
            'catid': $('select[name=catid]').val(),
            'selling_price': $('input[name=selling_price]').val(),
            'mfg_details': $('input[name=mfg_details]').val(),
            'author': $('input[name=author]').val(),
            'writer': $('input[name=writer]').val(),
            'publisher': $('input[name=publisher]').val(),
            'disclaimer': $('textarea[name=disclaimer]').val(),
            'minalert': $('input[name=minalert]').val(),
            'img1':img1,
            'img2':img2
        };
}
      $.ajax({
        url: urldata,  
        method:"POST",  
        data:formData,  
        cache:false,
        beforeSend:function(){
    $('#submit').html('<span class="fa fa-circle-o-notch fa-spin"></span> Loading...');
    $('#submit').attr('disabled','true');
        },
        success: function(dataResult)
        {
           //alert(dataResult);
           $('#submit').removeAttr('disabled');
      $('#submit').html('Sign In');
          var dataResult = JSON.parse(dataResult);
          //console.log(dataResult);
          if(!dataResult.status){
             $(".messagediv").show();
             $("#messagediv").html(dataResult.message);          
          }
          else{
             load();
             $('#modals-slide-in').modal('hide');
           }          
         }
      });
    }
    $('.catid').change(function(){
      datachances();
    });
    function datachances(){
      var selection = $('.catid').find('option:selected');
      var data1 = selection.data('data1');
      console.log(data1);
      if(data1 == 3){
        $('#publishon').show();
        $('.mfg_details').attr('required');
        $('.mfg_details').val('');
        $('#author').show();
        $('.author').attr('required');
        $('.author').val('');
        $('#writer').show();
        $('.writer').attr('required');
        $('.writer').val('');
        $('#publisher').show();
        $('.publisher').attr('required');
        $('.publisher').val('');
      }
      else{
        $('#publishon').hide();
        $('.mfg_details').removeAttr('required');
        $('.mfg_details').val('');
        $('#author').hide();
        $('.author').removeAttr('required');
        $('.author').val('');
        $('#writer').hide();
        $('.writer').removeAttr('required');
        $('.writer').val('');
        $('#publisher').hide();
        $('.publisher').removeAttr('required');
        $('.publisher').val('');
      }
    }
    function addqantity(name,id){
      $("#prname4qnt").html(name);
      $(".qid").val(id);
      $('#addqantity').modal();
    }
    function addqntformsubmit(event){
      event.preventDefault();
      $.ajax({
        url: "<?= base_url() ?>admin/addproductqnt",  
        method:"POST",
        cache:false,  
        data:$('.addqntform').serialize(),
        beforeSend:function(){
    $("#submit2").html('<span class="fa fa-circle-o-notch fa-spin"></span>wait...');
    $("#submit2").attr('disabled','true');
        },
        success: function(dataResult){
          load();
          $("#submit2").html('Submit');
    $("#submit2").attr('disabled',false);
          $('#addqantity').modal('hide');
        }
      });
    }
</script>
