<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sticky Sidebar</title>

<!-- Google Fonts: Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
       font-family: 'Poppins', sans-serif;
        display: flex;
    }

    /* Sidebar Styles */
    .sidebar {
        width: 230px;
        background-color: #35978dff;
        color: white;
        height: 100vh;
        position: sticky;
        top: 0;
        padding: 0;
    }

    .sidebar h2 {
        font-size: 20px;
        font-weight: 600;
        margin: 0;
        padding: 12px 15px;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li a {
        display: block;
        padding: 10px 15px;
        text-decoration: none;
        color: white;
        transition: background 0.3s;
        font-weight: 400;
    }

    .sidebar ul li a:hover {
        color: black;
        background: linear-gradient(135deg, #35978dff, #00695C);
    }

    /* Main content for testing */
    .content {
        flex: 1;
        padding: 20px;
    }
    .navbar-title {
    font-family: 'Poppins', sans-serif;
    font-size: 1.5rem; /* Adjust for navbar height */
    font-weight: 600;
    line-height: 60px; /* Match navbar height */
    margin: 0;
    padding: 0;
    color: white; /* or your navbar text color */
}
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
   
<h2 class="navbar-title">NextIn Lab</h2>
    <ul>
        <li><a href="#">LEARN HTML</a></li>
        <li><a href="#">LEARN CSS</a></li>
        <li><a href="#">LEARN SASS</a></li>
        <li><a href="#">LEARN Bootstrap</a></li>
        <li><a href="#">LEARN JavaScript</a></li>
        <li><a href="#">LEARN Advance Js</a></li>
        <li><a href="#">LEARN jQuery</a></li>
        <li><a href="#">LEARN PHP</a></li>
        <li><a href="#">LEARN MySQL</a></li>
        <li><a href="#">LEARN SVG</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="content">
    <h1>Welcome to Nextin Lab</h1>
    <p>Scroll down to test sticky sidebar.</p>
    <p style="height:2000px;"></p>
</div>

</body>
</html>
