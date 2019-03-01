<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">

         <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Blog</a>
                </li>
               
            </ul>

           
            <ul class="navbar-nav ml-auto">
               @auth:
                <li class="nav-item">
                     <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                 </li>
               @else:
                <li class="nav-item">
                    <a class="nav-link" href="/users/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users/login">Login</a>
                </li>
               @endauth
            </ul>
          

             </div>
    </div>
      
</nav>
