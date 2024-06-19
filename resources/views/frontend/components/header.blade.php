<header class="page-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg align-items-center">
            <a class="navbar-brand" href="/" style="display: contents;">
                <img src="/admin/dist/images/logo.png" alt="Cynic brand logo" style="margin-right: 7px;"> <div style="font-size: 24px;">Science ID</div>
            </a>
            <!-- End of .navbar-brand -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#custom-navbar" aria-controls="custom-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="custom-toggler-icon"></span>
                <span class="custom-toggler-icon"></span>
                <span class="custom-toggler-icon"></span>
            </button>
            <!-- End of .navbar-toggler -->

            <div class="collapse navbar-collapse" id="custom-navbar">
                <ul class="navbar-nav ml-auto align-items-center dynamic-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Bosh sahifa</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("frontend.about") }}" class="nav-link">Foydalanish yo'riqnomasi</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("frontend.contact") }}" class="nav-link">Bog'lanish</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="custom-btn btn-small" >Kirish</a>
                    </li>
                </ul>
            </div>
            <!-- End of .navbar-nav -->
        </nav>
    </div>
    <!-- End of .container -->
</header>