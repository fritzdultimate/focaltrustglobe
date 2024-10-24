
	
    <header id="header" class="py-4 py-md-0 {{ Request::is('/') ? '' : 'scrolled'  }}">
        <div class="language container container d-md-none justify-content-center py-22">
           @include('visitor.theludax.translate')
        </div>
        <div class="container mbc">
            <div class="logo">
                <a href="/"><img src="{{ asset('images/Fortress_Logo_PMS_542_6in.png') }}" alt="Fortressminers"></a>
            </div>
            <ul id="mainnav" class="m-0" data-name="Fortressminers">
                <li class="hide-on-mobil">
                    <a href="/" class="menu-item translatable">Home</a>
                </li>
                <li class="hide-on-mobil">
                    <a href="/faqs" class="menu-item translatable">FaQ</a>
                </li>
                <li class="hide-on-mobil">
                    <a href="/about-us" class="menu-item translatable">About</a>
                </li>
                <li class="hide-on-mobil">
                    <a href="/register" class="menu-item translatable">Register</a>
                </li>
                <li class="hide-on-mobil">
                    <a href="/login" class="btn btn-header translatable" data-trans="header_login">
                        <span class="btn_text">Login</span>
                    </a>
                </li>
                <li class="d-none d-md-inline">
                    <div class="xm-dropdown lang-picker">
                        @include('visitor.theludax.translate')
                    </div>
                </li>
               
                <li class="menu-close d-md-none">
                    <div class="">
                       <i class="fas fa-times"></i>  
                    </div>
                </li>
            </ul>
            <div class="menu-open-cont d-md-none">
                <div class="menu-open">
                    <i class="fas fa-bars fa-2x text-white"></i>  
                </div>
            </div>
        </div>
    </header>