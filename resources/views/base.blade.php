<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6ZCAM"
        crossorigin="anonymous">
         
   
</head>
<body>

   <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="/">Blog</a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navMenu"
                    aria-controls="navMenu"
                    aria-expanded="false"
                    aria-label="Ouvrir la navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => request()->routeIs('blog.*')])
                           href="{{ route('blog.index') }}"
                           @if(request()->routeIs('blog.*')) aria-current="page" @endif>
                            Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Link</a>
                    </li>
                </ul>
            </div>
        </div>  
    </nav>
    <div class="container">
    
        @if(session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
            @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>
</html>
<style>
        @layer {
            button {
                all: unset;
            }
        }
    </style>