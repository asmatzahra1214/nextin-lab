@extends('layouts.app')

@section('title', 'template')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
    <style>
        :root {
            --primary-dark: #00695C; /* Navbar and Footer: Deep teal */
            --primary-light: #4DB6AC; /* Sidebar: Lighter teal */
            --accent: #FF8A65; /* Titles and hover effects: Coral orange */
            --text-light: #E0F2F1; /* Text on dark backgrounds: Soft teal-white */
            --gradient-hover: linear-gradient(135deg, #4DB6AC, #00695C); /* Sidebar hover gradient */
            --background: #E6ECEC; /* Page background: Light teal-gray */
            --card-background: #FFFFFF; /* Project card background: Pure white */
            --card-border: #B2DFDB; /* Card border: Pale teal */
            --text-dark: #1A3C34; /* Main text: Dark teal-gray */
            --text-muted: #607D8B; /* Muted text for stats: Muted blue-gray */
            --shadow: rgba(0, 0, 0, 0.1); /* Shadow for cards and hover */
        }

        body {
            font-family: poppins, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background);
            box-sizing: border-box;
            overflow-x: hidden;
            color: var(--text-dark);
        }
        .container {
            max-width: 95%;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        h1 {
            font-size: 2em;
            color: var(--text-dark);
            margin-bottom: 20px;
            /* text-align: center; */
        }
          .search-bar {
            display: flex;
            align-items: center;
            background: var(--card-background);
            border: 1px solid var(--card-border);
            border-radius: 4px;
            margin-bottom: 1.5rem;
            width: 100%;
            max-width: 400px;
        }
        
        .search-bar input {
            flex: 1;
            border: none;
            padding: 0.8rem 1rem;
            background: transparent;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }
        
        .search-bar input:focus {
            outline: none;
        }
        .templates-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            width: 100%;
            box-sizing: border-box;
        }
        .template-card {
            background: var(--card-background);
            border: 1px solid var(--card-border);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 10px var(--shadow);
            width: 100%;
            height: 400px; /* Adjusted for taller images */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
            box-sizing: border-box;
        }
        .template-card:hover {
            transform: translateY(-5px);
        }
        .template-card img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .template-title {
            font-size: 1.4em;
            color: var(--accent);
            margin-bottom: 5px;
            font-weight: bold;
        }
        .template-framework {
            font-size: 1em;
            color: var(--text-muted);
            margin-bottom: 10px;
        }
        .template-stats {
            font-size: 1.1em;
            color: var(--text-muted);
            margin-bottom: 10px;
        }
        .template-stats span {
            margin: 0 10px;
        }
        .template-actions {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 10;
        }
        .template-card:hover .template-actions {
            opacity: 1;
        }
        .template-actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 20px; /* Cute rounded styling */
            font-size: 1em;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
            color: var(--text-light);
            box-shadow: 0 2px 5px var(--shadow);
        }
        .template-actions button:hover {
            transform: scale(1.1);
        }
        .download-btn {
            background-color: var(--primary-dark);
        }
        .demo-btn {
            background-color: var(--accent);
        }
        .template-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4); /* Overlay on hover */
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 5;
        }
        .template-card:hover::before {
            opacity: 1;
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
            background-color: var(--card-background);
            border: 1px solid var(--card-border);
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            color: var(--text-dark);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .pagination span:hover {
            background-color: var(--accent);
            color: var(--text-light);
        }
        .pagination span.active {
            background-color: var(--accent);
            color: var(--text-light);
            font-weight: bold;
        }
        @media (max-width: 1200px) {
            .templates-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            .template-card {
                height: 360px;
            }
            .template-card img {
                height: 200px;
            }
        }
        @media (max-width: 992px) {
            .templates-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .template-card {
                height: 340px;
            }
            .template-card img {
                height: 180px;
            }
        }
        @media (max-width: 768px) {
            .templates-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .template-card {
                height: 320px;
            }
            .template-card img {
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
            .templates-grid {
                grid-template-columns: 1fr;
            }
            .template-card {
                height: 340px;
            }
            .template-card img {
                height: 180px;
            }
            .pagination span {
                padding: 8px 12px;
                font-size: 0.9em;
            }
        }
    </style>

    <div class="container">
        <h1>Free Templates</h1>
        
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search">
        </div>

        <div class="templates-grid">
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/amaze.jpg" alt="Amaze">
                <div class="template-title">Amaze</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 26301 <span>⬇ 5127</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/probusiness.jpg" alt="ProBusiness">
                <div class="template-title">ProBusiness</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 19812 <span>⬇ 3898</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/fortune.jpg" alt="Fortune">
                <div class="template-title">Fortune</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 12731 <span>⬇ 2208</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/electrify.jpg" alt="Electrify">
                <div class="template-title">Electrify</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 8243 <span>⬇ 1960</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/edge.jpg" alt="Edge">
                <div class="template-title">Edge</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 7430 <span>⬇ 1846</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/dreamz.jpg" alt="Dreamz">
                <div class="template-title">Dreamz</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 6322 <span>⬇ 1517</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/stylo.jpg" alt="Stylo">
                <div class="template-title">Stylo</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 6960 <span>⬇ 1574</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/everest.jpg" alt="Everest">
                <div class="template-title">Everest</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 7170 <span>⬇ 1430</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/velocity.jpg" alt="Velocity">
                <div class="template-title">Velocity</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 6488 <span>⬇ 1537</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/rainy.jpg" alt="Rainy">
                <div class="template-title">Rainy</div>
                <div class="template-framework">Framework : Bootstrap</div>
                <div class="template-stats">❤ 8777 <span>⬇ 1622</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
        </div>
        <div class="pagination">
            <span class="active">1</span>
            <span>2</span>
            <span>»</span>
        </div>
    </div>
@endsection