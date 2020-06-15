<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-profile"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><img src="../assets/images/users/profile.png" alt="user" /><span class="hide-menu">{{ Auth::user()->name }}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void()">My Profile </a></li>
                                <li>
                                    <a href="{{ route('admin.logout') }}">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li> <a class="waves-effect waves-dark" href="{{ url('admin/dashboard') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span>Dashboard</span></a>
                        </li>

                       <li class="nav-small-cap">Ecommerce All Widget</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Categories</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="form-basic.html">Category</a></li>
                                <li><a href="form-basic.html">Sub category</a></li>
                                <li><a href="form-basic.html">Brand</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
