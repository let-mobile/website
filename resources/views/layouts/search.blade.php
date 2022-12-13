<div class="container ps-4 pe-4">
    
        <div class="row">
            <nav class="navbar navbar-expand-lg mt-1 mb-1">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('public/assets/images/logo.png') }}" alt="" class="logo">
                </a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="{{ asset('public/assets/images/nav-scroll.png') }}" alt=""></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <form class="navbar-nav" action="">
                        <input type="text" name="q" placeholder="What are you looking for....?" class="searchComp fs-6"  value="{{ request()->q ?? '' }}">
                        <button type="submit" class="search-click" ><img src="{{ asset('public/assets/images/search-icon.png') }}" alt=""></button> 
                    </form>
                </div>
            </nav>
        </div>
    
</div>