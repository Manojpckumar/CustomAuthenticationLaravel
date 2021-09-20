<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
 @include('common.style')
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('common.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
  
    
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('common.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage Store</h4>

                  @if(Session::get('success'))
      
                  <div class="alert alert-success">
                    {{Session::get('success')}}
                  </div>

                  @endif

                  <div class="table-responsive">
                    <table id="example" class="table table-hover">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th>Store Name</th>
                          <th>Operator Name</th>
                          <th>Phone</th>
                          <th>Place</th>
                          <th>GST</th>
                          <th>Username</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        
                      <?php $number = 1; ?>
                        @foreach ($stores as $store)
                        <tr>
                          <td>{{ $number }}</td>
                          <td>{{ $store->s_name }}</td>
                          <td>{{ $store->so_name }}</td>
                          <td>{{ $store->s_phone }}</td>
                          <td>{{ $store->s_place }}</td>
                          <td>{{ $store->s_gst }}</td>
                          <td>{{ $store->s_username }}</td>
                          
                          <td>
                            @if($store->s_userstatus == 0)
                            <label class="badge badge-danger">Inactive</label>
                            @elseif($store->s_userstatus == 1)
                            <label class="badge badge-success">Active</label>
                            @endif
                          </td>

                          <td>
                            <div class="row">

                            <a href="{{ route('admin.removestore',$store->id) }}"><i class="mdi mdi-delete"></i></a>
                            &nbsp;
                            <a href="{{ route('admin.editstore',$store->id) }}"><i class="mdi mdi-lead-pencil"></i></a>
                            &nbsp;
                            <a href="{{ route('admin.activatestore',$store->id) }}"><i class="mdi mdi-check"></i></a>
                            &nbsp;
                            <a href="{{ route('admin.blockstore',$store->id) }}"><i class="mdi mdi-block-helper"></i></a>

                            </div>
                          </td>

                        </tr>
                        <?php $number++; ?>
                          @endforeach

                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
         




          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
      
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
@include('common.script')
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
