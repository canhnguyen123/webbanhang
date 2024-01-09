<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{asset('BE/images/logo.svg')}}" class="mr-2" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('BE/images/logo-mini.svg')}}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
   
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="icon-bell mx-0"></i>
            <span class="count"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header"></p>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-success">
                  <i class="ti-info-alt mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Thông báo</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  Nguyễn Xuân Cảnh
                </p>
              </div>
            </a>
          
          </div>
        </li>
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('upload/BE/' . request()->cookie('img')) }}" alt="profile"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" 
              href="{{route('infroDeatil')}}"
              >
              <i class="mdi mdi-account"></i>
              Thông tin cá nhân
            </a>
            <a class="dropdown-item" href="{{route('setting')}}">
              <i class="ti-settings text-primary"></i>
              Cài đặt
            </a>
            <a class="dropdown-item" href="{{route('update.password')}}">
              <i class="mdi mdi-account-key"></i>
                Đổi mật khẩu
            </a>
            <a class="dropdown-item" href="{{route('restore.password')}}">
              <i class="mdi mdi-lock"></i>
                Khôi phục mật khẩu
            </a>  
            <a class="dropdown-item" href="{{route('logout')}}">
              <i class="mdi mdi-logout"></i>
              Đăng xuất
            </a>
          </div>
        </li>
        <li class="nav-item nav-settings d-none d-lg-flex">
          <a class="nav-link" href="#">
            <i class="icon-ellipsis"></i>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>