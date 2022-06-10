<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Saypr Case</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        @media (min-width: 768px) {
            .text-md-right {
                text-align: right !important;
            }
        }

    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    @stack('header-styles')
    @stack('header-scripts')
</head>

<body>

@auth()
    <nav class="navbar navbar-expand-lg bg-light navbar-container">
        <div class="container">
            <a class="navbar-brand" href="{{ url('home') }}">Saypr</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" href="{{ url('home') }}">Home</a>
                    </li>
                    @if(Auth::User()->is_admin)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ (request()->is('company*')) ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Company
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{ (request()->is('company')) ? 'active' : '' }}" href="{{url('company')}}">Company List</a>
                            <a class="dropdown-item {{ (request()->is('company/add')) ? 'active' : '' }}" href="{{url('company/add')}}">Company Add</a>
                        </div>
                    </li>
                        @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ (request()->is('employee*')) ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Employee
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{ (request()->is('employee')) ? 'active' : '' }}" href="{{url('employee')}}">Employee List</a>
                            <a class="dropdown-item {{ (request()->is('employee/add')) ? 'active' : '' }}" href="{{url('employee/add')}}">Employee Add</a>
                        </div>
                    </li>

                </ul>
                <span class="navbar-text">
                                        <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::User()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                        </div>
                    </div>

      </span>
            </div>
        </div>
    </nav>
@endauth


    @yield('content')



@stack('body-scripts')

</body>



</html>
