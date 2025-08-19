@extends('layouts.app')

@section('title', 'Projects')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
    <style>
        body {
            font-family: poppins, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            box-sizing: border-box; /* Prevent padding/margin issues */
            overflow-x: hidden; /* Prevent horizontal scroll */
        }
        .container {
            max-width: 95%; /* Reduced to ensure no overflow */
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .search-bar {
            display: flex;
            align-items: center;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 0 auto 30px;
            width: 100%;
            max-width: 400px;
        }
        .search-bar input {
            flex: 1;
            border: none;
            padding: 10px 15px;
            background: transparent;
            font-family: poppins, sans-serif;
            font-size: 1.1em;
            color: #1A3C34;
        }
        .search-bar input:focus {
            outline: none;
        }
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 cards per row */
            gap: 30px; /* Adjusted gap for better spacing */
            width: 100%;
            box-sizing: border-box;
        }
        .project-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            width: 100%; /* Full width of grid column */
            height: 300px; /* Fixed height for uniformity */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-sizing: border-box;
        }
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }
        .project-card img {
            width: 100%;
            height: 180px; /* Adjusted for better fit within 300px card */
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }
        .project-card:hover img {
            transform: scale(1.02); /* Subtle zoom effect */
        }
        .project-title {
            font-size: 1.4em;
            color: #1A3C34;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .project-stats {
            font-size: 1.1em;
            color: #757575;
            margin-bottom: 10px;
        }
        .project-stats span {
            margin: 0 10px;
        }
        .pagination {
            text-align: center;
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            box-sizing: border-box;
        }
        .pagination span {
            display: inline-block;
            padding: 12px 18px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .pagination span:hover {
            background-color: #00695C;
            color: #fff;
        }
        .pagination span.active {
            background-color: #00695C;
            color: #fff;
            font-weight: bold;
        }
        @media (max-width: 1200px) {
            .projects-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            .project-card {
                height: 300px;
            }
            .project-card img {
                height: 180px;
            }
        }
        @media (max-width: 992px) {
            .projects-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .project-card {
                height: 300px;
            }
            .project-card img {
                height: 180px;
            }
        }
        @media (max-width: 768px) {
            .projects-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .project-card {
                height: 280px;
            }
            .project-card img {
                height: 160px;
            }
            .pagination span {
                padding: 10px 15px;
                font-size: 1em;
            }
        }
        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }
            .projects-grid {
                grid-template-columns: 1fr;
            }
            .project-card {
                height: 300px;
            }
            .project-card img {
                height: 180px;
            }
            .pagination span {
                padding: 8px 12px;
                font-size: 0.9em;
            }
        }
    </style>

    <div class="container">
        <h1>CodeLab</h1>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search projects...">
        </div>
        <div class="projects-grid">
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/pricing-table-style-322.png" alt="Pricing Table Style 322">
                <div class="project-title">Pricing Table Style 322</div>
                <div class="project-stats">❤ 220 💬 0</div>
            </div>
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/counter-style-302.png" alt="Counter Style 302">
                <div class="project-title">Counter Style 302</div>
                <div class="project-stats">❤ 17 💬 0</div>
            </div>
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/ribbon-style-18.png" alt="Ribbon Style 18">
                <div class="project-title">Ribbon Style 18</div>
                <div class="project-stats">❤ 789 💬 0</div>
            </div>
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/preloader-style-452.png" alt="Preloader Style 452">
                <div class="project-title">Preloader Style 452</div>
                <div class="project-stats">❤ 1015 💬 0</div>
            </div>
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/buttons-style-275.png" alt="Buttons Style 275">
                <div class="project-title">Buttons Style 275</div>
                <div class="project-stats">❤ 8900 💬 0</div>
            </div>
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/css-text-effect-style-257.png" alt="CSS Text Effect Style 257">
                <div class="project-title">CSS Text Effect Style 257</div>
                <div class="project-stats">❤ 4050 💬 0</div>
            </div>
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/service-box-340.png" alt="Service Box 340">
                <div class="project-title">Service Box 340</div>
                <div class="project-stats">❤ 4860 💬 0</div>
            </div>
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/product-grid-style-313.jpg" alt="Product Grid Style 313">
                <div class="project-title">Product Grid Style 313</div>
                <div class="project-stats">❤ 710 💬 0</div>
            </div>
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/link-hover-style-283.png" alt="Link Hover Style 283">
                <div class="project-title">Link Hover Style 283</div>
                <div class="project-stats">❤ 489 💬 0</div>
            </div>
            <div class="project-card">
                <img src="https://www.yahubaba.com/public/codelab/pricing-table-style-321.png" alt="Pricing Table Style 321">
                <div class="project-title">Pricing Table Style 321</div>
                <div class="project-stats">❤ 369 💬 0</div>
            </div>
        </div>
        <div class="pagination">
            <span class="active">1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>6</span>
            <span>-</span>
            <span>453</span>
            <span>454</span>
            <span>»</span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const projectCards = document.querySelectorAll('.project-card');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase().trim();

                projectCards.forEach(card => {
                    const title = card.querySelector('.project-title').textContent.toLowerCase();
                    if (title.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection