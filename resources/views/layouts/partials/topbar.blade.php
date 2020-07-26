<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+38 068 005 3570</div>
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">
                    @if(Session::get('language') == 'bangla')
                    আরিফ
                    @else
                    fastsales@gmail.com
                    @endif
                    </a></div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                @if(Session::get('language') == 'bangla')
                                <a href="{{ route('english.language') }}">English<i class="fas fa-chevron-down"></i></a>
                                @else
                                <a href="{{ route('bangla.language') }}">Bangla<i class="fas fa-chevron-down"></i></a>
                                @endif                               
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#exampleModal" href="#">Order Track<i class="fas fa-chevron-down"></i></a>  
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
                                <a href="{{ route('customer.dashboard') }}">
                                    @if(Session::get('language') == 'bangla')
                                    আমার একাউন্ট 
                                    @else
                                    My Profile
                                    @endif
                                    <i class="fas fa-chevron-down"></i></a>
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
