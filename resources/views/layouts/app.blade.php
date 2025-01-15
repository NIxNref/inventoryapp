<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            /* Prevent the body from scrolling */
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            color: white;
            padding: 20px;
            text-align: center;
            background-color: #2db0fe;
            z-index: 1000;
            /* Ensure sidebar stays above the content */
            overflow-y: auto;
            /* Allow scrolling inside the sidebar if necessary */
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            padding: 10px 15px;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: white;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px;
            /* Offset the content to the right to make space for the sidebar */
            overflow-y: auto;
            /* Enable scrolling in the main content */
            height: 100vh;
        }

        .dropdown-menu {
            background-color: #ffffff !important;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
            padding: 0;
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            height: 0;
            overflow: hidden;
            transition: transform 0.3s ease, opacity 0.3s ease, height 0.3s ease;
        }

        .dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
            height: auto;
        }

        .dropdown-menu .dropdown-item {
            color: #333;
            font-size: 1.5rem;
            padding: 10px 15px;
            transition: background-color 0.2s ease;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #495057;
        }

        .nav-link.dropdown-toggle {
            color: white !important;
            font-size: 1.5rem;
        }

        .nav-link.dropdown-toggle:hover {
            color: #dfe9ff !important;
        }
    </style>
</head>

<body>
    <div class="sidebar d-flex flex-column p-4 bg-primary">
        <h4 class="text-center">Asset Management</h4>
        <ul class="nav flex-column">
            @if (auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="true">
                        Assets
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.items') }}">All Assets</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.category') }}">Category</a></li>
                        <li><a class="dropdown-item">User</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Software</a>
                </li>
            @elseif (auth()->user()->role === 'user')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.assets.index') }}">View Assets</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/371b820458.js" crossorigin="anonymous"></script>

</body>

</html>
