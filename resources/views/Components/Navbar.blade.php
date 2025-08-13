<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextIn Lab</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        nav {
            position: fixed;
            top: 0;
            left: 230px; /* space for sidebar */
            right: 0;
            height: 60px;
            background-color: #00695C;

            color: white;
            padding: 10 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
       
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
            padding-left:150px;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-links a:hover {
             color: #15888bff;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: white;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .search-box input {
            border: none;
            outline: none;
            padding: 5px;
        }

        .search-box button {
            background: none;
            border: none;
            cursor: pointer;
            color: #10454F;
        }

        .social-icons a {
            color: white;
            margin-left: 15px;
            font-size: 1.2rem;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #15888bff;
        }

        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            nav {
                left: 0;
            }
            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                background: #10454F;
                padding: 15px 0;
            }
            .nav-links.active {
                display: flex;
            }
            .menu-toggle {
                display: block;
            }
            .search-box {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

<nav>
    <div class="menu-toggle" onclick="document.querySelector('.nav-links').classList.toggle('active')">
        <i class="fas fa-bars"></i>
    </div>
    <div class="nav-links">
        <a href="{{url('/')}}">Home</a>
        <a href="{{url('/projects')}}">Code Projects</a>
        <a href="{{url('/templates')}}">Free Templates</a>
        <a href="{{url('/lab')}}">Code Lab</a>
        
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
</nav>

</body>
</html>
