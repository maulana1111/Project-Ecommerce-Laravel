<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>               

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="?member-area">Member Area</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (session()->get('member_logged_in'))
                            <a class="dropdown-item" href="/memberArea">Masuk Profile <i class="fa fa-arrow-right"></i></a>
                            <a class="dropdown-item" href="/memberArea/logout">Logout</a>
                        @else
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                            <br>
                            <a class="dropdown-item" href="/memberArea/DaftarMember">Daftar</a>
                        @endif
                    </div>
                </li>
                @if (session()->get('member_logged_in'))
                <li class="nav-item active">
                    <p class="nav-link" style="color:aliceblue">Selamat Datang {{ session()->get('member_name') }}</p>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/Admin/Login">Login Admin</a>
                </li>  
            </ul>
            
            <form class="form-inline my-2 my-lg-0" method="post" action="/product/search">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2" type="text" name="product" placeholder="Pencarian">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </nav>