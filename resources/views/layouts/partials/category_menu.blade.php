<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->
                    @php
                        $categories  = App\Models\Admin\category::all();
                    @endphp
                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories</div>
                        </div>

                        <ul class="cat_menu">
                            @foreach($categories as $category)
                            <li class="hassubs">
                                <a href="{{ url('products/category/'.$category->id.'/'.$category->category_name) }}">{{ $category->category_name }}<i class="fas fa-chevron-right"></i></a>
                                @php
                                  $subCategories = App\Models\Admin\subcategory::where('category_id', $category->id)->get();  
                                @endphp
                                <ul>
                                    @foreach($subCategories as $subcat)
                                    <li><a href="{{ url('products/'.$subcat->id.'/'.$subcat->subcategory_name) }}">{{ $subcat->subcategory_name }}<i class="fas fa-chevron-right"></i></a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="{{ url('/') }}">Home<i class="fas fa-chevron-down"></i></a></li>
                            <li class="hassubs">
                                <a href="{{ route('product.shop') }}">Shop</a>
                            </li>
                            <li><a href="{{ route('blog.post') }}">Blog<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>