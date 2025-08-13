<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sticky Footer with Sidebar</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

  

    /* Footer styling */
    footer {
        /* background-color: #2f6666;  */
            background-color: #00695C;

        color: white;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        left: 230px; /* space for sidebar */
        width: calc(100% - 230px); /* align with navbar width */
        box-sizing: border-box;
    }

    /* Responsive: when screen < 768px */
    @media (max-width: 768px) {
        footer {
            left: 0;
            width: 100%;
        }
    }
</style>
</head>
<body>

   

    <footer>
        &copy; 2025 My Website. All rights reserved.
    </footer>

</body>
</html>
