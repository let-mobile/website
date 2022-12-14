<div class="container ps-4 pe-4">
    <div class="row">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo-m" src="{{ asset('assets/images/logo.png') }}" alt="" class="logo">
            </a>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img src="{{ asset('assets/images/nav-scroll.png') }}" alt=""></span>
            </button> --}}
            <button class="search-click d--mobile" >Post Ad</button>
            <button class="search-click search--icon d--mobile" ><img src="{{ asset('assets/images/search-icon.png') }}" alt=""></button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <form class="navbar-nav" action="">
                    <input type="text" name="q" placeholder="What are you looking for....?" class="searchComp fs-6"  value="{{ request()->q ?? '' }}">
                    <button type="submit" class="search-click" ><img src="{{ asset('assets/images/search-icon.png') }}" alt=""></button>
                </form>
            </div>


            <a href="" class="d-none d-sm-inline d-xs-inline post--ad text-decoration-none">Post Free ad</a>
        </nav>
    </div>

</div>
