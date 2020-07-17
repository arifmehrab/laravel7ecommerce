<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+38 068 005 3570</div>
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Italian</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Japanese</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">EUR Euro</a></li>
                                    <li><a href="#">GBP British Pound</a></li>
                                    <li><a href="#">JPY Japanese Yen</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="top_bar_user">
                        <div class="user_icon"><img src="images/user.svg" alt=""></div>
                        @guest
                        <div><a href="{{ route('login') }}">Register/Sign in</a></div>
                        @else
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                <a href="{{ route('customer.dashboard') }}">My Profile<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('customer.wishlist.view') }}">Wishlist</a></li>
                                    <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                </ul>
                            </li>
                        </ul>     
                        @endguest            
                    </div>
                </div>
            </div>
        </div>
    </div>		
</div>