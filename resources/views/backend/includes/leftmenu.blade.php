  <div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{route('admin.dashboard')}}" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li><!-- br-menu-item -->

      <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Product Management</label>


         <!-- Brand Menu Start-->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Manage Brands</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('brand.create')}}" class="sub-link">Add New Brand</a></li>
            <li class="sub-item"><a href="{{ route('brand.manage')}}" class="sub-link">Manage All Brands </a></li>
          </ul>
        </li>
        <!-- Brand Menu End-->

          <!-- Category Menu Start-->
          <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">Manage Category</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
              <li class="sub-item"><a href="{{ route('category.create')}}" class="sub-link">Add New Category</a></li>
              <li class="sub-item"><a href="{{ route('category.manage')}}" class="sub-link">Manage All Categories </a></li>
            </ul>
          </li>
          <!-- Category Menu End-->

             <!-- Product Menu Start-->
             <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">Manage Product</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                  <li class="sub-item"><a href="{{ route('product.create')}}" class="sub-link">Add New Product</a></li>
                  <li class="sub-item"><a href="{{ route('product.manage')}}" class="sub-link">Manage All Products </a></li>
                </ul>
              </li>
              <!-- Product Menu End-->

      <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Location Settings</label>
            <!-- division Menu Start-->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">Manage Diviosion</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                  <li class="sub-item"><a href="{{ route('division.create')}}" class="sub-link">Add New Division</a></li>
                  <li class="sub-item"><a href="{{ route('division.manage')}}" class="sub-link">Manage All Division </a></li>
                </ul>
              </li>
              <!-- division Menu End-->


               <!-- district Menu Start-->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">Manage District</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                  <li class="sub-item"><a href="{{ route('district.create')}}" class="sub-link">Add New District</a></li>
                  <li class="sub-item"><a href="{{ route('district.manage')}}" class="sub-link">Manage All District </a></li>
                </ul>
              </li>
              <!-- district Menu End-->


     </ul><!-- br-sideleft-menu -->

     <!-- <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label> -->



      <br>
    </div><!-- br-sideleft -->
