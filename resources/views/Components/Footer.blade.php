<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NextIn Lab Footer</title>
<!-- FontAwesome for social icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1; /* pushes footer down */
        padding: 20px;
    }

    footer {
        background-color: #00695C; 
        color: white;
        padding: 50px 30px 20px 30px;
        margin-left: 230px; /* leaves space for sidebar */
        width: calc(100% - 230px);
        box-sizing: border-box;
    }

    .footer-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: auto;
    }

    .footer-col h3 {
        margin-bottom: 15px;
        font-size: 18px;
        border-bottom: 2px solid #00e0c6;
        display: inline-block;
        padding-bottom: 5px;
    }

    .footer-col ul {
        list-style: none;
        padding: 0;
    }

    .footer-col ul li {
        margin: 10px 0;
    }

    .footer-col ul li a {
        color: #ddd;
        text-decoration: none;
        font-size: 15px;
        transition: 0.3s;
    }

    .footer-col ul li a:hover {
        color: #00e0c6;
    }

    /* Social Icons under description */
    .social-icons {
        /* margin-top: 15px; */
    }
   .social-icons a {
            color: white;
            margin-left: 15px;
            font-size: 1.2rem;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #00e0c6;
        }

    /* Newsletter */
    .newsletter input {
        padding: 12px;
        border: none;
        border-radius: 4px 0 0 4px;
        width: 70%;
        font-size: 15px;
    }

    .newsletter button {
        padding: 12px 18px;
        border: none;
        border-radius: 0 4px 4px 0;
        color: white;
        background: #004d40;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        font-size: 15px;
    }

    .newsletter button:hover {
        background: white;
        color: #004d40;
    }

    .footer-bottom {
        text-align: center;
        font-size: 14px;
        color: #ddd;
        margin-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding-top: 15px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        footer {
            margin-left: 0;
            width: 100%;
        }
        .newsletter {
            display: flex;
            flex-direction: column;
        }
        .newsletter input {
            width: 100%;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .newsletter button {
            width: 100%;
            border-radius: 4px;
        }
    }
</style>
</head>
<body>

<footer>
    <div class="footer-container">
        <!-- Company Info + Social -->
        <div class="footer-col">
            <h3>NextIn Lab</h3>
            <p>NextIn Lab is a hub for developers, designers, and learners. Explore free templates, coding labs, and real-world projects.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-col">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/projects') }}">Code Projects</a></li>
                <li><a href="{{ url('/templates') }}">Free Templates</a></li>
                <li><a href="{{ url('/lab') }}">Code Lab</a></li>
            </ul>
        </div>

        <!-- Newsletter -->
        <div class="footer-col newsletter">
            <h3>Newsletter</h3>
            <p>Subscribe to get the latest updates and free resources.</p>
            <form>
                <input type="email" placeholder="Enter your email"> <br> <br> 
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>

    <div class="footer-bottom">
        Copyright © 1999-2025 NextIn Lab. All Rights Reserved.
    </div>
</footer>

</body>
</html>
