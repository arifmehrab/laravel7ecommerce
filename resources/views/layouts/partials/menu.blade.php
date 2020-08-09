<div class="page_menu">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="page_menu_content">
                    
                    <div class="page_menu_search">
                        <form action="#">
                            <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                        </form>
                    </div>
                    <ul class="page_menu_nav">

                        <li class="page_menu_item">
                            <a href="{{ url('/') }}">Home<i class="fa fa-angle-down"></i></a>
                        </li>

                        <li class="page_menu_item has-children">
                            <a href="{{ route('product.shop') }}">Shop<i class=""></i></a>
                        </li>
                        <li class="page_menu_item"><a href="{{ route('blog.post') }}">blog<i class="fa fa-angle-down"></i></a></li>
                       
                    </ul>
                    
                    <div class="menu_contact">
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570</div>
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>