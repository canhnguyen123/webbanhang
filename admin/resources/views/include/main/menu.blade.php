 <!-- partial:partials/_settings-panel.html -->
 <div class="theme-setting-wrapper">
  <div id="settings-trigger"><i class="ti-settings"></i></div>
  <div id="theme-settings" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <p class="settings-heading">SIDEBAR SKINS</p>
    <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
    <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
    <p class="settings-heading mt-2">HEADER SKINS</p>
    <div class="color-tiles mx-0 px-4">
      <div class="tiles success"></div>
      <div class="tiles warning"></div>
      <div class="tiles danger"></div>
      <div class="tiles info"></div>
      <div class="tiles dark"></div>
      <div class="tiles default"></div>
    </div>
  </div>
</div>
<div id="right-sidebar" class="settings-panel">
  <i class="settings-close ti-close"></i>
  <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
    </li>
  </ul>
  <div class="tab-content" id="setting-content">
    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
      <div class="add-items d-flex px-3 mb-0">
        <form class="form w-100">
          <div class="form-group d-flex">
            <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
            <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
          </div>
        </form>
      </div>
      <div class="list-wrapper px-3">
        <ul class="d-flex flex-column-reverse todo-list">
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Team review meeting at 3.00 PM
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Prepare for presentation
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox">
                Resolve all the low priority tickets due today
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
          <li class="completed">
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox" checked>
                Schedule meeting for next week
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
          <li class="completed">
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox" checked>
                Project review
              </label>
            </div>
            <i class="remove ti-close"></i>
          </li>
        </ul>
      </div>
      <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
      <div class="events pt-4 px-3">
        <div class="wrapper d-flex mb-2">
          <i class="ti-control-record text-primary mr-2"></i>
          <span>Feb 11 2018</span>
        </div>
        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
        <p class="text-gray mb-0">The total number of sessions</p>
      </div>
      <div class="events pt-4 px-3">
        <div class="wrapper d-flex mb-2">
          <i class="ti-control-record text-primary mr-2"></i>
          <span>Feb 7 2018</span>
        </div>
        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
        <p class="text-gray mb-0 ">Call Sarah Graves</p>
      </div>
    </div>
    <!-- To do section tab ends -->
    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
      <div class="d-flex align-items-center justify-content-between border-bottom">
        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
      </div>
      <ul class="chat-list">
        <li class="list active">
          <div class="profile"><img src="{{asset('BE/images/faces/face1.jpg')}}" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Thomas Douglas</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">19 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="{{asset('BE/images/faces/face2.jpg')}}" alt="image"><span class="offline"></span></div>
          <div class="info">
            <div class="wrapper d-flex">
              <p>Catherine</p>
            </div>
            <p>Away</p>
          </div>
          <div class="badge badge-success badge-pill my-auto mx-2">4</div>
          <small class="text-muted my-auto">23 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="{{asset('BE/images/faces/face3.jpg')}}" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Daniel Russell</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">14 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="{{asset('BE/images/faces/face4.jpg')}}" alt="image"><span class="offline"></span></div>
          <div class="info">
            <p>James Richardson</p>
            <p>Away</p>
          </div>
          <small class="text-muted my-auto">2 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="{{asset('BE/images/faces/face5.jpg')}}" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Madeline Kennedy</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">5 min</small>
        </li>
        <li class="list">
          <div class="profile"><img src="{{asset('BE/images/faces/face6.jpg')}}" alt="image"><span class="online"></span></div>
          <div class="info">
            <p>Sarah Graves</p>
            <p>Available</p>
          </div>
          <small class="text-muted my-auto">47 min</small>
        </li>
      </ul>
    </div>
    <!-- chat tab ends -->
  </div>
</div>
<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link"  href="{{route('home')}}">
        <i class="fa-solid fa-house"></i>
        <span class="menu-title">Trang chủ</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="true" aria-controls="form-elements">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Sản phẩm</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{route('category_list')}}">Danh mục</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('phanloai_list')}}">Phân loại</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('theloai_list')}}">Thể loại</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('color_list')}}">Màu sắc</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('brand_list')}}">Thương hiệu</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('size_list')}}">Kích cỡ</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('product_list')}}">Sản phẩm</a></li>
          </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('user_list')}}">
        <i class="mdi mdi-account-settings menu-icon"></i>
        <span class="menu-title">Người dùng</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('banner_list')}}">
        <i class="mdi mdi-image menu-icon"></i>
        <span class="menu-title">Bannner</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Hệ thống</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('position_list')}}">Vị trí</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('staff_list')}}">Nhân viên</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('permission.Group.list')}}">Nhóm quyền</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('permission.list')}}">Phân quyền chi tiết</a></li>
        </ul>
      </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#payment" aria-expanded="false" aria-controls="payment">
        <i class="mdi mdi-cart-outline menu-icon"></i>
        <span class="menu-title">Hóa đơn</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="payment">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('methodPayment_list')}}">Phương thức TT</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('statusPayment_list')}}">Trạng thái đơn hàng</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('ship.list')}}">Vận chuyển</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('payment_list')}}">Đơn hàng</a></li>
        </ul>
   
    </li>
   <li class="nav-item">
      <a class="nav-link" href="{{route('voucher_list')}}">
        <i class="mdi mdi-account-settings menu-icon"></i>
        <span class="menu-title">Voucher</span>
      </a>
    </li>
  </ul>
</nav>