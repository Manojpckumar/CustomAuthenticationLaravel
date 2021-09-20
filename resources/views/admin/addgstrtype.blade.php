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
 
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">GST Slabs</h4>
                  <form class="form-sample" action="{{ route('admin.creategstslab')}}" method="post">
                    
                  @csrf
               @if(Session::get('success'))
      
      <div class="alert alert-success">
        {{Session::get('success')}}
        
      </div>

  @endif

  @if(Session::get('fail'))

      <div class="alert alert-danger">
        {{Session::get('fail')}}
      </div>

  @endif
   
                   <!-- 1 -->

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">GST Slab</label>
                          <div class="col-sm-9">
                            <input type="text" name="gstslab" class="form-control" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    
                <div >
                <button type="submit" class="btn btn-primary btn-rounded btn-fw">Create Slab</button>
                </div>
                   
                   
                  </form>
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
  <!-- End custom js for this page-->
</body>

</html>
