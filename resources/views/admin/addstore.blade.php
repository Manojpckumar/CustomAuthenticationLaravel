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
                  <h4 class="card-title">Store Details</h4>
                  <form class="form-sample" action="{{ route('admin.createstore')}}" method="post">

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
                          <label class="col-sm-3 col-form-label">Store Operator Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="storeopName" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Store Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="storeName" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- 2 -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Store Email</label>
                          <div class="col-sm-9">
                            <input type="email" name="storeEmail" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Store Phone</label>
                          <div class="col-sm-9">
                            <input type="text" name="storePhone" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>


                    <!-- 3 -->

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Store Address</label>
                          <div class="col-sm-9">
                            <input type="text" name="storeAddress" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Store Location</label>
                          <div class="col-sm-9">
                            <input type="text" name="storeLocation" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- 4 -->

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Store GST</label>
                          <div class="col-sm-9">
                            <input type="text" name="storeGst" class="form-control" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Store PAN</label>
                          <div class="col-sm-9">
                            <input type="text" name="storePan" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>


                    <p class="card-description">
                      Login Details
                    </p>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" name="storeUsername" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" name="storePassword" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class=text-center>
                      <button type="submit" class="btn btn-primary btn-rounded btn-fw">Create Store</button>
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