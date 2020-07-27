<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-profile"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><img src="{{ asset('Backend/assets/images/profile/'.Auth::user()->profile) }}" alt="user" /><span class="hide-menu">{{ Auth::user()->name }}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.profile') }}">My Profile </a></li>
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
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Categories
                            <span class="label label-rouded label-primary pull-right">3</span>
                            </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.category.index') }}">Category</a></li>
                                <li><a href="{{ route('admin.subcategory.index') }}">Sub category</a></li>
                                <li><a href="{{ route('admin.brand.index') }}">Brand</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Coupons
                            <span class="label label-rouded label-primary pull-right">1</span>
                            </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.coupon.index') }}">Coupon</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Products
                            <span class="label label-rouded label-primary pull-right">2</span>
                            </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.product.index') }}">All Products</a></li>
                                <li><a href="{{ route('admin.product.create') }}">Add Product</a></li>
                            </ul>
                        </li>
                        <!----- Blog Widget Area ---->
                        <li class="nav-small-cap">Blog Widget</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Blogs
                            <span class="label label-rouded label-primary pull-right">3</span>
                            </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.postcategory.index') }}">Category</a></li>
                                <li><a href="{{ route('admin.post.index') }}">All Post</a></li>
                                <li><a href="{{ route('admin.post.create') }}">Add Post</a></li>
                            </ul>
                        </li>
                         <!----- Order Widget Area ---->
                         <li class="nav-small-cap">Orders Widget</li>
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Orders
                             <span class="label label-rouded label-primary pull-right">5</span>
                             </span></a>
                             <ul aria-expanded="false" class="collapse">
                                 <li><a href="{{ route('admin.pending.order') }}">New Pending Order</a></li>
                                 <li><a href="{{ route('admin.order.payment.accept') }}">Payment Accept Order</a></li>
                                 <li><a href="{{ route('admin.order.prograss') }}">Prograss Order</a></li>
                                 <li><a href="{{ route('admin.order.delivered') }}">delivered Order</a></li>
                                 <li><a href="{{ route('admin.order.cancled') }}">Cancle Order</a></li>
                             </ul>
                         </li>

                          <!----- Setting Widget Area ---->
                          <li class="nav-small-cap">Order Report</li>
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Reports
                              <span class="label label-rouded label-primary pull-right">4</span>
                              </span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li><a href="{{ route('admin.today.report') }}">Today Order</a></li>
                                  <li><a href="{{ route('admin.month.report') }}">Last Month</a></li>
                                  <li><a href="{{ route('admin.year.report') }}">Last Year</a></li>
                                  <li><a href="{{ route('admin.search.report') }}">Search Report</a></li>
                              </ul>
                          </li>

                          <!----- Setting Widget Area ---->
                          <li class="nav-small-cap">Setting Widget</li>
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Settings
                              <span class="label label-rouded label-primary pull-right">3</span>
                              </span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li><a href="{{ route('admin.pending.order') }}">Site Info Setting</a></li>
                                  <li><a href="{{ route('admin.seo') }}">Seo Setting</a></li>
                              </ul>
                          </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
