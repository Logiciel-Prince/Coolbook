<header>
            <head>

                <div class="logo">
                    <img src="{{asset('images/download.jfif')}}"height="50px" alt="" srcset="">
                </div>
                <div class="nav">
                    <ul>
                        <li><a href="home">Home</li>
                        <li>
                            Category
                            <ul class="dropdown">
                                @foreach ($cat as $d)
                                <li><a href="category{{$d->id}}">{{$d->category_name}}</a></li>
                                    
                                @endforeach
                            </ul>
                        </li>
                        <li>Contacts</li>
                        @if (!empty(session('userid')))
                        <li><a href="upload">Upload</a></li>
                            
                        @endif
                        @if (!empty(session('userid')))
                        <li>
                            {{session('username')}}
                            <ul class="dropdown">
                                {{-- <li><a href="login">Login</a></li> --}}
                                <li><a href="logout">Logout</a></li>
                            </ul>
                        </li>
                        @else
                        <li>
                            Users
                            <ul class="dropdown">
                                <li><a href="login">Login</a></li>
                                <li><a href="register">Signup</a></li>
                            </ul>
                        </li>
                            
                        @endif
                    </ul>
                </div>
                <div class="search">
                    <form action="search" method="post">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Search Your Post by Username....." name="search" id="">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </head>
        </header>