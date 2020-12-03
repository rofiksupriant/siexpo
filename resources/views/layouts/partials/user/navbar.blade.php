<div class="container mb-5">
    <nav class="navbar navbar-light fixed-top navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="{{url('/simulasi')}}">Simulasi</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Store</a>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary my-2 my-sm-0 rounded-20" type="submit">Search</button>
                    </form>
                </div>
                <div class="navbar-nav ml-auto">
                    @auth
                    @else
                    <a class="nav-link" href="{{url('login')}}">Register</a>
                    <a class="nav-link" href="{{url('register')}}">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</div>
