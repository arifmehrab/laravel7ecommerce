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
                       @if(Auth::user()->category == 2)
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Categories
                            <span class="label label-rouded label-primary pull-right">3</span>
                            </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.category.index') }}">Category</a></li>
                                <li><a href="{{ route('admin.subcategory.index') }}">Sub category</a></li>
                                <li><a href="{{ route('admin.brand.index') }}">Brand</a></li>
                            </ul>
                        </li>
                       @else
                       @endif
                       @if(Auth::user()->coupon == 2)
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Coupons
                            <span class="label label-rouded label-primary pull-right">1</span>
                            </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.coupon.index') }}">Coupon</a></li>
                            </ul>
                        </li>
                       @else
                       @endif
                       @if(Auth::user()->product == 2)
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Products
                            <span class="label label-rouded label-primary pull-right">2</span>
                            </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.product.index') }}">All Products</a></li>
                                <li><a href="{{ route('admin.product.create') }}">Add Product</a></li>
                            </ul>
                        </li>
                        @else
                        @endif
                        <!----- Blog Widget Area ---->
                        @if(Auth::user()->blog == 2)
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Blogs
                            <span class="label label-rouded label-primary pull-right">3</span>
                            </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.postcategory.index') }}">Category</a></li>
                                <li><a href="{{ route('admin.post.index') }}">All Post</a></li>
                                <li><a href="{{ route('admin.post.create') }}">Add Post</a></li>
                            </ul>
                        </li>
                        @else
                        @endif
                         <!----- Order Widget Area ---->
                         @if(Auth::user()->order == 2)
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
                        @endif
                          <!----- Order Report Widget Area ---->
                          @if(Auth::user()->report == 2)
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
                          @else
                          @endif
                          <!----- Setting Widget Area ---->
                          @if(Auth::user()->setting == 2)
                          <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Settings
                              <span class="label label-rouded label-primary pull-right">2</span>
                              </span></a>
                              <ul aria-expanded="false" class="collapse">
                                  <li><a href="{{ route('admin.site.setting') }}">Site Info Setting</a></li>
                                  <li><a href="{{ route('admin.seo') }}">Seo Setting</a></li>
                              </ul>
                          </li>
                         @else
                         @endif
                           <!----- User Role Widget Area ---->
                           @if(Auth::user()->user_role == 2)
                           <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">User Role
                               <span class="label label-rouded label-primary pull-right">2</span>
                               </span></a>
                               <ul aria-expanded="false" class="collapse">
                                   <li><a href="{{ route('admin.user.list') }}">All User</a></li>
                                   <li><a href="{{ route('admin.user.add') }}">Add User</a></li>
                               </ul>
                           </li>
                          @else
                          @endif
                            <!----- Return Order Widget Area ---->
                            @if(Auth::user()->return_order == 2)
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Return Order
                                <span class="label label-rouded label-primary pull-right">2</span>
                                </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ route('admin.return.order.request') }}">Return Request</a></li>
                                    <li><a href="{{ route('admin.return.order.list') }}">All Return Order</a></li>
                                </ul>
                            </li>
                            @else
                            @endif
                             <!----- Contact Message Widget Area ---->
                             @if(Auth::user()->contact_message == 2)
                             <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Contact Message
                                 <span class="label label-rouded label-primary pull-right">3</span>
                                 </span></a>
                                 <ul aria-expanded="false" class="collapse">
                                     <li><a href="{{ route('admin.pending.order') }}">All User</a></li>
                                     <li><a href="{{ route('admin.seo') }}">Add User</a></li>
                                 </ul>
                             </li>
                             @else
                             @endif
                              <!----- Product Comments Widget Area ---->
                              @if(Auth::user()->product_comment == 2)
                              <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Product Comments
                                  <span class="label label-rouded label-primary pull-right">3</span>
                                  </span></a>
                                  <ul aria-expanded="false" class="collapse">
                                      <li><a href="{{ route('admin.pending.order') }}">All Comments</a></li>
                                  </ul>
                              </li>
                             @else
                             @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
