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
                    <li class="breadcrumb-item active">Manage Categorys
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
<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#modals-slide-in">+</button>
              <table class="table table-responsive file-export align-items-center">
                 <thead>
            <tr>
              <th>S.No.</th>
              <th>Name</th>
              <th>Unit</th>
              <th>cby</th>
              <th>con</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $i=0;
          foreach($cate as $data_cat){?>
            <tr>
              <td><?=++$i;?></td>
              <td><?=$data_cat->name;?></td>
              <td><?=$data_cat->unit;?></td>
              <td><?=$data_cat->cby;?></td>
              <td><?=date('M d,Y', strtotime($data_cat->con));?></td>
              <td><?php if($data_cat->status){?>
                <span class="badge badge-pill bg-success">Active</span>
              <?php }else{?><span class="badge badge-pill bg-danger">Active</span><?php }?></td>
              <td><button class="btn btn-primary btn-sm " id="<?=$data_cat->id;?>" onclick="edit('<?=$data_cat->id;?>','<?=$data_cat->name;?>','<?=$data_cat->unit_id;?>')">edit</button></td>
            </tr>
            <?php } ?>
 
                </tbody>
              </table>
            </div>
  <!-- Modal to add new record -->
  <div class="modal modal-slide-in fade" id="edit">
    <div class="modal-dialog sidebar-sm">
      <form class="add-new-record modal-content pt-0 editform" onsubmit="editformsubmit(event)">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">Edit Categorys</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <div class="form-group">
            <label class="form-label" for="name">Name</label>
            <input type="text" name="id" class="id" hidden>
            <input
              type="text"
              class="form-control dt-full-name editinput"
              id="name"
              placeholder="Categorys Name" name="name" required
            />
          </div>
          <div class="form-group">
            <label class="form-label" for="unit">Unit</label>
          <select type="text" class="form-control dt-full-name editunit" id="unit" name="unit" required>
            <option disabled="disabled" selected="true" value="">Choose Unit</option>
            <?php foreach($allunit as $unit){?>
            <option value="<?=$unit->id;?>"><?=$unit->name;?></option>
            <?php }?>
          </select>
          </div>
          <button type="submit" class="btn btn-primary data-submit mr-1" id="submit2">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
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
          <h5 class="modal-title" id="exampleModalLabel">New Categorys</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <div class="form-group">
            <label class="form-label" for="catname">Name</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="catname"
              placeholder="Categorys Name" name="name" required
            />
          </div>
          <div class="form-group">
            <label class="form-label" for="unitname">Unit</label>
          <select type="text" class="form-control dt-full-name" id="unitname" name="unit" required>
              <option disabled="disabled" selected="true" value="">Choose Unit</option>
              <?php foreach($allunit as $unit){?>
            <option value="<?=$unit->id;?>"><?=$unit->name;?></option>
            <?php }?>
          </select>
          </div>
          <button type="submit" class="btn btn-primary data-submit mr-1" id="submit">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
<!--/ Basic table -->
<script type="text/javascript">
  function edit(id,name,unit_id){
    $('.id').val(id);
    $('.editinput').val(name);
    $('.editunit').val(unit_id);
    $("#edit").modal()
  }
  function editformsubmit(event) {
       event.preventDefault();
//     alert('jquery');
  $.ajax({
        url: "<?= base_url() ?>admin/editcategory",  
        method:"POST",  
        data:$('.editform').serialize(),  
        cache:false,
        beforeSend:function(){
    $('#submit2').html('<span class="fa fa-circle-o-notch fa-spin"></span> Loading...');
    $('#submit2').attr('disabled','true');
        },
        success: function(dataResult)
        {
          // alert(dataResult);
           $('#submit2').removeAttr('disabled');
      $('#submit2').html('Sign In');
          var dataResult = JSON.parse(dataResult);
          if(!dataResult.status){
             $(".messagediv").show();
             $("#messagediv").html(dataResult.message);          
          }
          else{
             location.reload();
          }
          
        }
      });
      }
       function addformsubmit(event) {
       event.preventDefault();
//     alert('jquery');
  $.ajax({
        url: "<?= base_url() ?>admin/addcategorys",  
        method:"POST",  
        data:$('.addcat').serialize(),  
        cache:false,
        beforeSend:function(){
    $('#submit').html('<span class="fa fa-circle-o-notch fa-spin"></span> Loading...');
    $('#submit').attr('disabled','true');
        },
        success: function(dataResult)
        {
          // alert(dataResult);
           $('#submit').removeAttr('disabled');
      $('#submit').html('Sign In');
          var dataResult = JSON.parse(dataResult);
          console.log(dataResult);
          if(!dataResult.status){
             $(".messagediv").show();
             $("#messagediv").html(dataResult.message);          
          }
          else{
             location.reload();          }
          
        }
      });
      }
</script>
