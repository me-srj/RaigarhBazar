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
                    <li class="breadcrumb-item active">Passbook
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
<div class="col-md-12 text-center">
      <div class="form-group">
      <label class="label-control mt-1 float-left" style="margin-left: 2vw;">Select Date</label>
      <br><br>
      <select id="year" class="form-control float-right" style="width: 50%;">
        <option selected="" value="<?= date("Y") ?>"><?= date("Y") ?></option>
        <option value="<?= date("Y",strtotime("-1 year")) ?>"><?= date("Y",strtotime("-1 year")) ?></option>
      </select>
      <select id="month" onchange="gettxnmonth(this.value)" class="form-control float-right" style="width: 50%;">
        <option selected="" value="<?= date("m") ?>"><?= date("M") ?> (<?= date("m") ?>)</option>
        <?php
        for ($i=1; $i<=12 ; $i++) { 
        if ($i!=intval(date("m"))) {
        ?>
        <option value="<?= date("m",mktime(0,0,0,$i,1,2011)); ?>"><?= date("M",mktime(0,0,0,$i,1,2011)); ?>(<?= date("m",mktime(0,0,0,$i,1,2011)); ?>)</option>
        <?php
        }
        }
        ?>
      </select>
      </div>
    </div>
        <div class="col-md-12 mt-1" id="daterow" style="max-width: 100vw;overflow-x: auto;max-height: 8vh;white-space: nowrap;">
      <?php
//$dm=cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
$dm=31;
for ($i=1; $i <=$dm ; $i++) { 
?>
<button onclick="gettxn('<?= $i ?>')" class="btn btn-sm btn-primary datebtn" id="date<?= $i?>"><?= $i ?></button>
<?php
}
      ?>
    </div>
              <table class="table table-responsive align-items-center">
                 <thead>
            <tr>
              <th>id</th>
              <th>Item(Qnt)</th>
              <th>Dely Det</th>
              <th>Amount</th>
              <th>Oon</th>
              <th>Don</th>
            </tr>
          </thead>
          <tbody id="passbooktablebody">
          <?php 
echo $passstring;
           ?>
 
                </tbody>
              </table>
            </div>
</div>
</div>
</div>
</div>
</div>
<!--/ Basic table -->
<script type="text/javascript">
  function gettxn(date){
    year=$("#year").val();
    month=$("#month").val();
$.ajax({
        url: "<?= base_url() ?>admin/passbookajax",  
        method:"POST",  
        data:{date:date,month:month,year:year},  
        cache:false,
        success: function(dataResult)
        {
          $("#passbooktablebody").html(dataResult);
        }
      });
  }
  function gettxnmonth(month) {
   year=$("#year").val();
$.ajax({
        url: "<?= base_url() ?>admin/passbookajax",  
        method:"POST",  
        data:{month:month,year:year},  
        cache:false,
        success: function(dataResult)
        {
          $("#passbooktablebody").html(dataResult);
        }
      });
  }
</script>
