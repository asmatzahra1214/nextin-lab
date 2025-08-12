@extends('layouts.app')

@section('title', 'Lab')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
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
            font-family: 'Poppins', sans-serif;
            background-color: var(--background);
            color: var(--text-dark);
            line-height: 1.6;
            display: flex;
            margin: 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            width: 100%;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin: 2rem 0 1rem;
            color: var(--text-dark);
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
        
        .filter-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            background: var(--card-background);
            border: 1px solid var(--card-border);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background: var(--primary-dark);
            color: var(--text-light);
            border-color: var(--primary-dark);
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            padding-bottom: 2rem;
        }
        
        .project-card {
            background: var(--card-background);
          
            overflow: hidden;
            box-shadow: 0 2px 4px var(--shadow);
            transition: transform 0.3s ease;
            max-height: 400px; /* Fixed height for all cards */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Ensures content and footer align properly */
        }
        
        .project-card:hover {
            transform: translateY(-5px);
        }
        
        .project-image {
            height: 150px; /* Uniform height for all images */
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Maintains aspect ratio and fills space */
            transition: transform 0.3s;
        }
        
        .project-card:hover .project-image img {
            transform: scale(1.05);
        }
        
        .project-header {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--card-border);
        }
        
        .project-category {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--card-border);
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .project-category i {
            font-size: 1rem;
        }
        
        .project-price {
            background: var(--primary-dark);
            color: var(--text-light);
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .project-content {
            padding: 1rem;
            flex-grow: 1; /* Allows content to take available space */
        }
        
        .project-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }
        
        .project-desc {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.4;
        }
        
        .project-footer {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--card-border);
            min-height: 60px; /* Fixed minimum height to align buttons */
        }
        
        .project-stats {
            display: flex;
            gap: 1rem;
            color: var(--text-muted);
            font-size: 0.85rem;
        }
        
        .project-stats span {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .download-btn {
            background: var(--primary-dark);
            color: var(--text-light);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            min-width: 100px; /* Ensures uniform button width */
            text-align: center;
        }
        
        .download-btn:hover {
            background: var(--primary-light);
        }
        
        .paid .download-btn {
            background: var(--accent);
        }
        
        .paid .download-btn:hover {
            background: #FF7043;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 2rem 0;
        }
        
        .page-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--card-border);
            background: var(--card-background);
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .page-btn:hover, .page-btn.active {
            background: var(--primary-dark);
            color: var(--text-light);
            border-color: var(--primary-dark);
        }
        
        @media (max-width: 1024px) {
            .container {
                width: 100%;
                padding: 0 0.5rem;
            }
            
            .projects-grid {
                grid-template-columns: 1fr;
            }
            
            .search-bar {
                max-width: 100%;
            }
        }
    </style>

    <div class="container">
        <h1 class="page-title">Code Projects</h1>
        
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search">
        </div>
        
        <div class="filter-bar">
            <button class="filter-btn active">All Projects</button>
            <button class="filter-btn">Node.js</button>
            <button class="filter-btn">LaravelPHP</button>
            <button class="filter-btn">React</button>
            <button class="filter-btn">Free</button>
            <button class="filter-btn">Premium</button>
        </div>
        
        <div class="projects-grid">
            <!-- Project 1 -->
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/student-app-:-nodejs-expressjs-&-mongodb-crud-api-project.png" alt="Student App">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> NodeJS</div>
                    <div class="project-price">Free</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Student App : NodeJS ExpressJS & MongoDB CRUD API Project</h3>
                    <p class="project-desc">The Students CRUD App is a web-based application...</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 2</span>
                        <span><i class="fas fa-download"></i> 273</span>
                    </div>
                    <button class="download-btn">Download</button>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/contact-app-:-nodejs-expressjs-&-mongodb-crud-project.png" alt="Contact App">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> NodeJS</div>
                    <div class="project-price">Free</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Contact App : NodeJS ExpressJS & MongoDB CRUD Project</h3>
                    <p class="project-desc">In this new project you will get the code of complete nodejs, expressjs and mon...</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 2</span>
                        <span><i class="fas fa-download"></i> 413</span>
                    </div>
                    <button class="download-btn">Download</button>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/contact-app-html-template.png" alt="Contact App HTML Template">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> HTML</div>
                    <div class="project-price">Free</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Contact App HTML Template</h3>
                    <p class="project-desc">Responsive contact form with validation for websites.</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 9</span>
                        <span><i class="fas fa-download"></i> 672</span>
                    </div>
                    <button class="download-btn">Download</button>
                </div>
            </div>

            <!-- Project 4 -->
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/news-blog-project-in-nodejs,-expressjs-&-mongodb.png" alt="News Blog Project">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> NodeJS</div>
                    <div class="project-price">Free</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">News Blog Project in NodeJS, ExpressJS & MongoDB</h3>
                    <p class="project-desc">Manage news articles with categories and tags using NodeJS.</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 17</span>
                        <span><i class="fas fa-download"></i> 553</span>
                    </div>
                    <button class="download-btn">Download</button>
                </div>
            </div>

            <!-- Project 5 -->
            <div class="project-card paid">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/school-management-project-in-laravel.jpg" alt="School Management Project">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> LaravelPHP</div>
                    <div class="project-price">₹350</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">School Management Project in Laravel</h3>
                    <p class="project-desc">Automates school operations like student management and grading.</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 130</span>
                        <span><i class="fas fa-download"></i> 223</span>
                    </div>
                    <button class="download-btn">Purchase</button>
                </div>
            </div>

            <!-- Project 6 -->
            <div class="project-card paid">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/digital-products-selling-project-in-laravel.jpg" alt="Digital Products Selling">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> LaravelPHP</div>
                    <div class="project-price">₹250</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Digital Products Selling Project in Laravel</h3>
                    <p class="project-desc">Multi-vendor platform for selling digital products with payment integration.</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 98</span>
                        <span><i class="fas fa-download"></i> 190</span>
                    </div>
                    <button class="download-btn">Purchase</button>
                </div>
            </div>

            <!-- Project 7 -->
            <div class="project-card paid">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/tourism-management-project-in-laravel.png" alt="Tourism Management">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> LaravelPHP</div>
                    <div class="project-price">₹250</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Tourism Management Project in Laravel</h3>
                    <p class="project-desc">Manages tours, bookings, and customer relationships for tourism businesses.</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 694</span>
                        <span><i class="fas fa-download"></i> 195</span>
                    </div>
                    <button class="download-btn">Purchase</button>
                </div>
            </div>

            <!-- Project 8 -->
            <div class="project-card paid">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/resume-management-project-in-laravel.jpg" alt="Resume Management">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> LaravelPHP</div>
                    <div class="project-price">₹250</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Resume Management Project in Laravel</h3>
                    <p class="project-desc">Create professional resumes with personal and professional details.</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 12</span>
                        <span><i class="fas fa-download"></i> 159</span>
                    </div>
                    <button class="download-btn">Purchase</button>
                </div>
            </div>

            <!-- Project 9 -->
            <div class="project-card paid">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/beauty-salon-project-in-laravel.png" alt="Beauty Salon Project">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> LaravelPHP</div>
                    <div class="project-price">₹250</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Beauty Salon Project in Laravel</h3>
                    <p class="project-desc">Manages appointments, staff, and services for beauty salons.</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 42</span>
                        <span><i class="fas fa-download"></i> 213</span>
                    </div>
                    <button class="download-btn">Purchase</button>
                </div>
            </div>

            <!-- Project 10 -->
            <div class="project-card paid">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/ecommerce-project-in-laravel-&-inertia-js.png" alt="Ecommerce Project">
                </div>
                <div class="project-header">
                    <div class="project-category"><i class="fas fa-cube"></i> React Js LaravelPHP</div>
                    <div class="project-price">₹300</div>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Ecommerce Project in Laravel & Inertia Js</h3>
                    <p class="project-desc">E-commerce platform with Inertia.js and React for seamless shopping.</p>
                </div>
                <div class="project-footer">
                    <div class="project-stats">
                        <span><i class="fas fa-comment"></i> 25</span>
                        <span><i class="fas fa-download"></i> 150</span>
                    </div>
                    <button class="download-btn">Purchase</button>
                </div>
            </div>
        </div>
        
        <div class="pagination">
            <button class="page-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn"><i class="fas fa-chevron-right"></i></button>
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
                    const category = card.querySelector('.project-category').textContent.toLowerCase().replace('cube', '').trim();

                    if (title.includes(searchTerm) || category.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            const cards = document.querySelectorAll('.project-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            const buttons = document.querySelectorAll('button');
            buttons.forEach(button => {
                button.addEventListener('mousedown', function() {
                    this.style.transform = 'translateY(2px)';
                });
                button.addEventListener('mouseup', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            const filterBtns = document.querySelectorAll('.filter-btn');
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
@endsection