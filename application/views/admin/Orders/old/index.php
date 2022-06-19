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
                    <li class="breadcrumb-item active">Old Orders
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
              <table class="table table-responsive file-export align-items-center">
                 <thead>
            <tr>
              <th>id</th>
              <th>Order ID</th>
              <th>Receiver Name</th>
              <th>Total Items</th>
              <th>Order Date</th>
              <th>Delivery Address</th>
              <th>Contact No.</th>
              <th>Total Amount</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $i=0;
		foreach($data as $data_cat){
			$subtotal=$data_cat->totalamt;
			if($data_cat->ptype=='PAID'){
				$status='<span class="badge badge-pill bg-success">PAID</span>';
			}else{
				$status='<span class="badge badge-pill bg-danger">UNPAID</span>';
			}
            echo'<tr>
              <td>'.++$i.'</td>
              <td>'.$data_cat->oid.'</td>
              <td>'.$data_cat->rname.'</td>
              <td>'.$data_cat->total_items.'</td>
              <td>'.date('M d,Y h:i a', strtotime($data_cat->odate)).'</td>
              <td>'.$data_cat->addressline.','.$data_cat->city.','.$data_cat->state.'-'.$data_cat->pin_code.'</td>
              <td>'.$data_cat->mobile.'</td>
              <td>&#8377; '.$subtotal.'</td>
              <td>'.$status.'</td>
              <td><a href="'.base_url().'OldOrdersList?oid='.base64_encode($data_cat->oid).'" class="btn btn-primary btn-sm ">View List</a></td>
            </tr>';
        }
          ?>
 
                </tbody>
              </table>
            </div>
<!--/ Basic table -->
