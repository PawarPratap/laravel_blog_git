<div class="row g-0">
    <div class="col-12 g-0 p-2 ps-4 pe-4 m-0">
        <nav class="navbar navbar-expand-lg navbar-light mt-2 mb-2 p-0">
            <div class="container-fluid p-0">
                <a class="navbar-brand" href="/"><b>Blog</b></a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blogs</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="#">Images</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard/users')}}">Users</a>
                    </li> 
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" area-expanded="false">
                            <!--in curly braces Auth::user()->name  -->Pratap
                        </a>
                        <ul class="dropdown-menu" airia-labelled-by="navbarDropdown">
                            <li>
                                <a class="dropdown-item text-center text-dark" onclick="event.preventDefault()" id="logoutButton">Logout</a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
    <div class="col-12 text-center g-0 border-bottom-black border-top-black background-white">
        <img style="max-height:420px;" src="\laravel-blog-background-image.png" title="My Blog Main Image">
    </div> 
</div>