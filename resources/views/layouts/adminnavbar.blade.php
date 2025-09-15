    <!-- Navbar -->
    <!-- Large screens navbar (centered) -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top d-none d-lg-flex">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav gap-3 text-center">



                    <!-- Categories dropdown -->
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-light btn px-3 dropdown-toggle"
                           href="#" id="categoryDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu text-end" aria-labelledby="categoryDropdown">
                            <li><a class="dropdown-item" href="{{ '/admin/category/index' }}">All Categories</a></li>
                            <li><a class="dropdown-item" href="{{ '/admin/category/create' }}">Add Category</a></li>
                        </ul>
                    </li>

                    <!-- Posts dropdown -->
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-light  btn px-3 dropdown-toggle"
                           href="#" id="postDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Posts
                        </a>
                        <ul class="dropdown-menu text-end" aria-labelledby="postDropdown">
                            <li><a class="dropdown-item" href="{{ '/admin/post/index' }}">All Posts</a></li>
                            <li><a class="dropdown-item" href="{{ '/admin/post/create' }}">Add Post</a></li>
                        </ul>
                    </li>

                    <!-- Users dropdown -->
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-light  btn px-3 dropdown-toggle"
                           href="#" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Users
                        </a>
                        <ul class="dropdown-menu text-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ '/admin/user/index' }}">All Users</a></li>
                            <li><a class="dropdown-item" href="{{ '/admin/user/create' }}">Add User</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
            <a class="navbar-brand ms-auto" href="#"><img src="{{ asset('images/logo.png') }}" alt="Bootstrap"
                    width="200" height="80"></a>
        </div>
    </nav>

    <!-- Mobile navbar with offcanvas sidebar -->
    <nav class="navbar navbar-light bg-dark offcanvastyle fixed-top d-lg-none">
        <div class="container-fluid">
            <!-- Toggler left -->
            <button class="btn btn-outline-light me-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand right -->
            <a class="navbar-brand ms-auto" href="#"><img src="{{ asset('images/logo.png') }}" alt="Bootstrap"
                    width="150" height="60"></a>
        </div>
    </nav>

    <!-- Offcanvas -->
   <!-- Offcanvas -->
<div class="offcanvas offcanvas-start offcanvastyle" tabindex="-1" id="offcanvasMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">القائمة</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav">

            <!-- Categories dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link menustyle dropdown-toggle" href="#" id="offcanvasCategoryDropdown"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>
                <ul class="dropdown-menu text-end" aria-labelledby="offcanvasCategoryDropdown">
                    <li><a class="dropdown-item" href="{{ '/admin/category/index' }}">All Categories</a></li>
                    <li><a class="dropdown-item" href="{{ '/admin/category/create' }}">Add Category</a></li>
                </ul>
            </li>

            <!-- Posts dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link menustyle dropdown-toggle" href="#" id="offcanvasPostDropdown"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Posts
                </a>
                <ul class="dropdown-menu text-end" aria-labelledby="offcanvasPostDropdown">
                    <li><a class="dropdown-item" href="{{ '/admin/post/index' }}">All Posts</a></li>
                    <li><a class="dropdown-item" href="{{ '/admin/post/create' }}">Add Post</a></li>
                </ul>
            </li>

            <!-- Users dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link menustyle dropdown-toggle" href="#" id="offcanvasUserDropdown"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Users
                </a>
                <ul class="dropdown-menu text-end" aria-labelledby="offcanvasUserDropdown">
                    <li><a class="dropdown-item" href="{{ '/admin/user/index' }}">All Users</a></li>
                    <li><a class="dropdown-item" href="{{ '/admin/user/create' }}">Add User</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>





