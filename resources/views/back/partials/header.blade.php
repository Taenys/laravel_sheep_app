<nav class="navbar navbar-default" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('dashboard')}}">Super Pouloulou</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                <li class="active"><a href="{{route('spending.index')}}">Liste des dépenses <span class="sr-only">(current)</span></a></li>
                <li><a href="{{route('spending.create')}}">Ajouter une dépense</a></li>
                <li><a href="{{route('user.index')}}">Voir les Pouloulou</a></li>
                <li><a href="{{route('balance')}}">Balance ton Pouloulou</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <p class="control">
                        <a class="button is-primary" href="{{ route('login') }}">
            <span class="icon">
                <i class="fa fa-user-circle"></i>
            </span>
                            <span>Login</span>
                        </a>
                    </p>
                    <p class="control">
                        <a class="button is-info" href="{{ route('register') }}">
            <span class="icon">
                <i class="fa fa-user-circle"></i>
            </span>
                            <span>Register</span>
                        </a>
                    </p>
                @else
                    <p class="control">
                        <a class="button is-primary" href="#">
                <span class="icon">
                    <i class="fa fa-user-circle"></i>
                </span>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                    </p>
                    <p class="control">
                        <a class="button is-primary" href="#">
            <span class="icon">
                <i class="fa fa-shopping-cart"></i>
            </span>
                            <span>{{ $total ?? '00' }}&euro;</span>
                        </a>
                    </p>
                    <p class="control">
                        <a class="button is-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span class="icon">
                <i class="fa fa-sign-out"></i>
            </span>
                            <span>Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </p>
                @endguest
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>