<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .admin-container {
            display: grid;
            grid-template-columns: 240px 1fr;
            min-height: 100vh;
        }
        .sidebar {
            @apply bg-blue-800 text-white;
        }
        .content-area {
            @apply bg-gray-300;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        @include('admin.partials.adminsidebar')
        
      
            
            <main class="p-6">
                @yield('content')
            </main>
  
    </div>

    <script>
        // Simple tab functionality
        function openTab(evt, tabName) {
            let tabContents = document.getElementsByClassName("tab-content");
            for (let tab of tabContents) {
                tab.style.display = "none";
            }
            
            let tabButtons = document.getElementsByClassName("tab-button");
            for (let btn of tabButtons) {
                btn.classList.remove("bg-blue-600", "text-white");
            }
            
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("bg-blue-600", "text-white");
        }
    </script>
</body>
</html>