<nav  class="navbar navbar-expand-md navbar-light nav-bg">
  <a class="navbar-brand" href="#">دار الايتام</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#rf" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="rf">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">من نحن</a>
      </li>
        
      <li class="nav-item">
        <a class="nav-link" href="#">الايتام</a>
      </li>
        
      <li class="nav-item">
        <a class="nav-link" href="/contact-us">تواصل معنا</a>
      </li>
    </ul>
    
    <ul class="navbar-nav" >
        @guest
            <li><a class="nav-link bt" href="{{ route('register') }}">تسجيل</a></li>
            <li><a class="nav-link bt" href="{{ route('login') }}">تسجيل الدخول</a></li>
        @else
            <li class="nav-item dropdown user">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">الايتام</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        تسجيل الخروج
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                 </div>
             </li>
        @endguest
    </ul>
  </div>
</nav>