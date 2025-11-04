   <!-- Vertical Navbar -->
   <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
       id="navbarVertical">
       <div class="container-fluid">
           <!-- Toggler -->
           <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse"
               aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <!-- Brand -->
       

               <a class="navbar-brand mt-sm-n4 py-lg-2 mb-lg-5 px-lg-6 me-0 btn-primary text-center text-center" href="#">
  <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid d-block" style="max-height:48px; width:auto;">
</a>

           </a>
           
           <!-- Collapse -->
           <div class="collapse navbar-collapse " id="sidebarCollapse">
               <!-- Navigation -->
               <ul class="navbar-nav ">
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('admin.index') }}">
                           <i class="bi bi-house"></i> Dashboard
                       </a>
                   </li>

                   @auth
                       @if (Auth::user()->role === 'admin')
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('contacts.index') }}">
                                   <i class="bi bi-envelope"></i> Messages
                                   @if ($unreadMessages > 0)
                                       <span
                                           class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">{{ $unreadMessages }}</span>
                                   @endif
                               </a>
                           </li>


                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('showuser') }}">
                                   <i class="bi bi-bookmarks"></i> Users
                               </a>
                           </li>


                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('showcomment') }}">
                                   <i class="bi bi-chat-dots"></i> Comments

                               </a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="{{ route('showsubscribe') }}">
                                   <i class="bi bi-bookmarks"></i> Subscribtions
                               </a>
                           </li>
                       @endif
                   @endauth



                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('showpost') }}">
                           <i class="bi bi-newspaper"></i> Posts
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('showcategory') }}">
                           <i class="bi bi-grid"></i> Categories

                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('showsubcategory') }}">
                           <i class="bi bi-diagram-3"></i> Sub-Categories

                       </a>
                   </li>




               </ul>
               <!-- Divider -->
               <hr class="navbar-divider my-5 opacity-20">
               <!-- Navigation -->
               <ul class="navbar-nav mb-md-4">
                   <li class="nav-item">
                       <a  href="{{ route('profile') }}"
                           class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide">
                           <i class="bi bi-person-circle me-2"></i>
                           {{ Auth::user()->name }}
                           <span
                               class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-2">
                               Profile
                           </span>
                       </a>
                   </li>

                   <li class="nav-item">
                       <a class="nav-link" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           <i class="bi bi-box-arrow-left"></i> Logout
                       </a>

                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                       </form>
                   </li>
               </ul>

               </ul>
              
           </div>
       </div>
   </nav>


   <script>
       function fetchNewMessages() {
           fetch('{{ route('contacts.new-count') }}')
               .then(res => res.json())
               .then(data => {
                   document.getElementById('new-messages-count').textContent = data.count;
               });
       }

       // Poll every 15 seconds
       setInterval(fetchNewMessages, 15000);

       // Initial load
       fetchNewMessages();
   </script>
