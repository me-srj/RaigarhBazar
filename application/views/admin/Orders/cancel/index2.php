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
                    <li class="breadcrumb-item"><a href="<?=base_url()?>CancelOrders">Cancel Orders</a>
                    </li>
                    <li class="breadcrumb-item active">Orders List
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
              <th>id</th>
              <th>Item Name</th>
              <th>Quantity</th>
              <th>Size</th>
              <th>Price</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; foreach ($data as $key) {?>
          <tr>
            <td><?=++$i;?></td>
            <td><?=$key->prname;?></td>
            <td><?=$key->qnt;?></td>
            <td><?php if($key->size=='0'){echo'---';}else{echo$key->size;}?></td>
            <td>&#8377; <?=$key->tamount;?></td>
            <td><?php if($key->ptype=='PAID'){echo'<span class="badge badge-pill bg-success">PAID</span>';}else{echo'<span class="badge badge-pill bg-danger">UNPAID</span>';}?></td>
          </tr>
        <?php }?>
        </tbody>
              </table>
            </div>
<!--/ Basic table -->
