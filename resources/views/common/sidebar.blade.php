<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">


        @if($LoggedUserInfo['s_usertype'] == 1)
         
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">GST Slabs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.addgstrtype') }}">Create Slab</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.managegstslabs') }}">Manage Slab</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Store Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.addstore') }}">Create Store</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.managestore') }}">Manage Store</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">View DayBook</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Record Bills</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.purchasebillview')}}">Purchase Bill</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.salebillview')}}">Sales Bill</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.recordexpence')}}" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Record Expences</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
        
          @elseif($LoggedUserInfo['s_usertype'] == 0)



       
          
          @endif


        </ul>
      </nav>



