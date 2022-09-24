<aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="/admin/images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session()->get('admin_name') }}</div>
                <div class="email">{{ session()->get('admin_title') }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="/Admin/profileAdmin"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="/Admin/Logout"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            @if(session()->get('admin_title') == "superAdmin")
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="/Admin/Home">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">text_fields</i>
                        <span>List Admin</span>
                    </a>
                    <ul class="ml-menu">
                            <li>
                                <a href="/Admin/listAdmin">See -></a>
                            </li>
                            <li>
                                <a href="/Admin/listAdmin/Add">Add</a>
                            </li>
                    </ul>
                </li>
                <li>
                    <a href="/Admin/Payment">
                        <i class="material-icons">layers</i>
                        <span>Payment Confirm</span>
                    </a>
                </li>
                <li>
                    <a href="/Admin/historyOrder">
                        <i class="material-icons">swap_calls</i>
                        <span>History Order</span>
                    </a>
                </li>
                <li>
                    <a href="/Admin/memberArea">
                        <i class="material-icons">layers</i>
                        <span>Member Area</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Product</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Product</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/Admin/Product">See -></a>
                                </li>
                                <li>
                                    <a href="pages/widgets/cards/colored.html">Add</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Color</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/Admin/Product/Color">See -></a>
                                </li>
                                <li>
                                    <a href="/Admin/Product/Color/Add">Add</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Category</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/Admin/Product/Category">See -></a>
                                </li>
                                <li>
                                    <a href="/Admin/Product/Category/Add">Add</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="/Admin/Home">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="/Admin/Payment">
                        <i class="material-icons">layers</i>
                        <span>Payment Confirm</span>
                    </a>
                </li>
                <li>
                    <a href="/Admin/historyOrder">
                        <i class="material-icons">swap_calls</i>
                        <span>History Order</span>
                    </a>
                </li>
                <li>
                    <a href="/Admin/memberArea">
                        <i class="material-icons">layers</i>
                        <span>Member Area</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Product</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Product</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/Admin/Product">See -></a>
                                </li>
                                <li>
                                    <a href="pages/widgets/cards/colored.html">Add</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Color</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/Admin/Product/Color">See -></a>
                                </li>
                                <li>
                                    <a href="/Admin/Product/Color/Add">Add</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Category</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="/Admin/Product/Category">See -></a>
                                </li>
                                <li>
                                    <a href="/Admin/Product/Category/Add">Add</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>