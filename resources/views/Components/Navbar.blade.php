<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/navbar.blade.php -->
<nav style="background-color:grey; padding:10px 0; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; align-items: center; justify-content: space-between;">
        
        <!-- Logo -->
        <div>
            <a href="{{ url('/') }}" style="text-decoration: none; font-size: 1.5rem; font-weight: bold; color: #fff;">
                MyWebsite
            </a>
        </div>

        <!-- Nav Links -->
        <ul style="list-style: none; display: flex; gap: 20px; margin: 0; padding: 0;">
            <li style="display: inline;">
                <a href="{{ url('/') }}" style="text-decoration: none; color: #fff; font-size: 1rem;" onmouseover="this.style.color='#ffcc00'" onmouseout="this.style.color='#fff'">Home</a>
            </li>
            <li style="display: inline;">
                <a href="{{ url('/projects') }}" style="text-decoration: none; color: #fff; font-size: 1rem;" onmouseover="this.style.color='#ffcc00'" onmouseout="this.style.color='#fff'">CodeProjects</a>
            </li>
            <li style="display: inline;">
                <a href="{{ url('/templates') }}" style="text-decoration: none; color: #fff; font-size: 1rem;" onmouseover="this.style.color='#ffcc00'" onmouseout="this.style.color='#fff'">FreeTemplates</a>
            </li>
            <li style="display: inline;">
                <a href="{{ url('/lab') }}" style="text-decoration: none; color: #fff; font-size: 1rem;" onmouseover="this.style.color='#ffcc00'" onmouseout="this.style.color='#fff'">CodeLab</a>
            </li>
            <!-- <li style="display: inline;">
                <a href="{{ url('/login') }}" style="text-decoration: none; color: #fff; font-size: 1rem;" onmouseover="this.style.color='#ffcc00'" onmouseout="this.style.color='#fff'">Login</a>
            </li> -->
        </ul>
    </div>
</nav>

</body>
</html>