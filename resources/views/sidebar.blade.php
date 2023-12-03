<!-- app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyInterns | @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        /* Add your custom styles here */
        body {
            padding-top: 56px; /* Adjust based on your top bar height */
        }

        .sidebar {
            height: 100vh;
            background-color: #12486C; /* Dark background color */
            color: white; /* Text color */
            width: 200px; /* Adjust sidebar width as needed */
            position: fixed;
            top: 56px; /* Adjust based on your top bar height */
            left: 0;
            bottom: 0;
            overflow-y: auto; /* Enable vertical scrolling if content is too long */
        }

        .sidebar a {
            color: white;
        }

        .content {
            padding-left: 180px;
            text-align: center; 
            margin: 0 auto; /* Add margin: 0 auto to center the element horizontally */
        }

        /* Add class flex-grow-1 to fill remaining space next to sidebar */
        .flex-grow-1 {
            flex-grow: 1;
        }
    </style>
</head>

<body>
    <!-- Top Bar -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">MyInterns</a>
    </nav>
    

    <!-- Sidebar -->
    <div class="d-flex">
        <nav class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin-mhs">
                        <i class="fas fa-user-graduate"></i> Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin-magang">
                        <i class="fas fa-briefcase"></i> Magang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin-matkul">
                        <i class="fas fa-book"></i> Mata Kuliah
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin-rekom">
                        <i class="fas fa-crown"></i> Rekomendasi
                    </a>
                </li>
                <!-- Add more links as needed -->
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="content flex-grow-1"> <!-- Add flex-grow-1 class to fill remaining space -->
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JavaScript and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Tautan Bootstrap dan JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-b21GGuA0q00xgV9dUtGXjDHD02eT9pEX8y3ZfS/Z9VM5EM4FuCVCJFRI8N9aHwlw" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy2M2q0G70nD0Zz0Hgk9t6u3h6pKZL8Yb" crossorigin="anonymous"></script>


</body>

</html>