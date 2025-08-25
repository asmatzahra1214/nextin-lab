@extends('layouts.app')

@section('title', 'Lab')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
    <style>
        :root {
            --primary-color: #00695C;
            --secondary-color: #004D40;
            --sidebar-color: #35978D;
            --accent-color: #E0F2F1;
            --highlight-color: #B2DFDB;
            --extra-color: #80CBC4;
            --text-color: #333333;
            --background-color: #F8F9FA;
            --card-background: #FFFFFF;
            --border-color: #E0E0E0;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .main-wrapper {
            flex: 1;
            padding-top: 20px;
            min-height: calc(100vh - 110px);
            padding-bottom: 50px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .project-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px 0;
            color: var(--primary-color);
            animation: fadeInDown 0.8s ease-out;
        }

        .project-header h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .project-header .tech-badge {
            background-color: var(--accent-color);
            color: var(--secondary-color);
            padding: 6px 15px;
            border-radius: 20px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
            font-size: 0.9rem;
            animation: scaleIn 0.5s 0.3s ease-out both;
        }

        .project-image {
            max-width: 700px;
            margin: 0 auto 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px var(--shadow-color);
            animation: slideIn 0.8s 0.4s ease-out both;
        }

        .project-image img {
            width: 100%;
            display: block;
            transition: transform 0.5s ease, filter 0.3s ease;
        }

        .project-image img:hover {
            transform: scale(1.03);
            filter: brightness(1.05);
        }

        .description {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
            text-align: center;
            color: var(--text-color);
            animation: fadeIn 0.8s 0.6s ease-out both;
        }

        .content-section {
            background: var(--card-background);
            border-radius: 10px;
            box-shadow: 0 5px 15px var(--shadow-color);
            padding: 25px;
            margin-bottom: 40px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInUp 0.6s ease-out both;
        }

        .content-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .content-section h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--highlight-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .content-section h2 i {
            background: var(--accent-color);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
            transition: transform 0.3s ease;
        }

        .content-section:hover h2 i {
            transform: rotate(10deg);
        }

        .feature-list {
            list-style: none;
        }

        .feature-list li {
            margin-bottom: 15px;
            padding-left: 30px;
            position: relative;
            color: var(--text-color);
            animation: fadeInRight 0.5s ease-out both;
        }

        .feature-list li:nth-child(1) { animation-delay: 0.1s; }
        .feature-list li:nth-child(2) { animation-delay: 0.2s; }
        .feature-list li:nth-child(3) { animation-delay: 0.3s; }
        .feature-list li:nth-child(4) { animation-delay: 0.4s; }
        .feature-list li:nth-child(5) { animation-delay: 0.5s; }

        .feature-list li:before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 2px;
            color: var(--extra-color);
            background-color: var(--accent-color);
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }

        .feature-list li:hover:before {
            background-color: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        .tech-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .tech-item {
            background-color: var(--highlight-color);
            color: var(--secondary-color);
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            animation: popIn 0.4s ease-out both;
        }

        .tech-item:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        .project-stats {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-box {
            background: var(--card-background);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px var(--shadow-color);
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .stat-box:hover {
            transform: translateY(-5px);
            background: var(--accent-color);
        }

        .stat-box h3 {
            color: var(--primary-color);
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .stat-box .value {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--secondary-color);
            transition: color 0.3s ease;
        }

        .stat-box:hover .value {
            color: var(--primary-color);
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
            flex-wrap: wrap;
            animation: fadeInUp 0.6s 0.8s ease-out both;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: 0 5px 15px rgba(0, 105, 92, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 105, 92, 0.4);
        }

        .btn-secondary {
            background: var(--card-background);
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary:hover {
            background: var(--highlight-color);
            transform: translateY(-3px);
        }

        .comments-section {
            background: var(--card-background);
            border-radius: 10px;
            box-shadow: 0 5px 15px var(--shadow-color);
            padding: 30px;
            margin-bottom: 40px;
            animation: fadeInUp 0.6s 1s ease-out both;
        }

        .comments-section h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--highlight-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .comment {
            padding: 20px 0;
            border-bottom: 1px solid var(--border-color);
            transition: background 0.3s ease;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .comment:hover {
            background-color: var(--accent-color);
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            align-items: center;
        }

        .comment-user {
            font-weight: 600;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .comment-user:before {
            content: '\f007';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: var(--primary-color);
        }

        .comment-date {
            color: #777;
            font-size: 0.9rem;
            font-style: italic;
        }

        .comment-content {
            margin-bottom: 15px;
            line-height: 1.7;
            padding-left: 28px;
        }

        .comment-content a {
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .comment-content a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .reply-btn {
            background: none;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 28px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .reply-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        .favorite-btn {
            color: #e0e0e0;
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .favorite-btn.active {
            color: #F44336;
        }

        .favorite-btn:hover {
            transform: scale(1.2);
        }

        .social-icons-main {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
            animation: fadeIn 0.6s 0.9s ease-out both;
        }

        .social-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--extra-color);
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-icon:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-5px) rotate(5deg);
        }

        .table-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
            background: var(--card-background);
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            animation: slideInDown 0.6s 0.2s ease-out both;
        }

        .search-box-main {
            display: flex;
            gap: 10px;
            flex: 1;
            max-width: 500px;
        }

        .search-box-main input {
            padding: 12px 20px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            font-size: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .search-box-main input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 105, 92, 0.2);
        }

        .action-button {
            padding: 12px 24px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            box-shadow: 0 4px 10px rgba(0, 105, 92, 0.25);
        }

        .action-button:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 105, 92, 0.3);
        }

        .search-results {
            background: var(--card-background);
            border-radius: 10px;
            box-shadow: 0 5px 15px var(--shadow-color);
            padding: 25px;
            margin-bottom: 30px;
            animation: fadeInUp 0.5s ease-out;
        }

        .search-results h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-results h3 i {
            color: var(--secondary-color);
        }

        .result-item {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border-color);
            transition: background 0.3s ease;
        }

        .result-item:hover {
            background: var(--accent-color);
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .no-results {
            text-align: center;
            padding: 20px;
            color: #777;
            font-style: italic;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: var(--text-color);
            font-size: 0.9rem;
            background: var(--card-background);
            border-top: 1px solid var(--border-color);
            animation: fadeIn 0.8s 1.2s ease-out both;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes popIn {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            70% {
                opacity: 1;
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(50, 50);
                opacity: 0;
            }
        }

        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
            .project-stats {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
        }

        @media (max-width: 900px) {
            .main-wrapper {
                margin-left: 60px;
            }
        }

        @media (max-width: 768px) {
            .main-wrapper {
                margin-left: 0;
            }
            .table-controls {
                flex-direction: column;
                align-items: stretch;
            }
            .search-box-main {
                width: 100%;
            }
            .search-box-main input {
                width: 100%;
                min-width: auto;
            }
            .project-header h1 {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 480px) {
            .project-stats {
                grid-template-columns: 1fr 1fr;
            }
            .action-buttons {
                flex-direction: column;
            }
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="container">
            <div class="table-controls">
                <div class="search-box-main">
                    <input type="text" id="search-input" placeholder="Search by name, technology, or feature...">
                    <button class="action-button" id="search-btn"><i class="fas fa-search"></i> Search</button>
                </div>
            </div>

            <div id="search-results" class="search-results" style="display: none;">
                <h3><i class="fas fa-search"></i> Search Results</h3>
                <div id="results-container"></div>
            </div>

            <div class="project-header">
                <h1>Student App : NodeJS ExpressJS & MongoDB CRUD API Project</h1>
                <div class="tech-badge">NodeJS</div>
                <p class="description">The Students CRUD App is a web-based application that allows users to Create, Read, Update, and Delete student records using a RESTful API.</p>
            </div>

            <div class="project-image">
                <img src="https://www.yahubaba.com/public/projects/student-app-:-nodejs-expressjs-&-mongodb-crud-api-project.png" alt="Student App Project">
            </div>

            <div class="content-section">
                <h2><i class="fas fa-star"></i> Core Features</h2>
                <ul class="feature-list">
                    <li><strong>Add New Student</strong><p>Users can fill out a form to add a new student record, including details like name, age, class, and ID.</p></li>
                    <li><strong>View All Students</strong><p>Student records are fetched from the API and displayed dynamically in a table or list format.</p></li>
                    <li><strong>Update Student Details</strong><p>Each record has an "Edit" button that loads the selected student's data into the form for editing and updates it via a PUT or PATCH request.</p></li>
                    <li><strong>Delete Student</strong><p>Users can remove a student from the database by clicking a "Delete" button, which sends a DELETE request to the API.</p></li>
                    <li><strong>Search Students</strong><p>Users can search for students by name or other criteria. The app filters the displayed records either on the client side or by querying the API.</p></li>
                </ul>
            </div>

            <div class="content-section">
                <h2><i class="fas fa-layer-group"></i> Technology Stack</h2>
                <div class="tech-stack">
                    <div class="tech-item">HTML</div>
                    <div class="tech-item">CSS</div>
                    <div class="tech-item">JavaScript</div>
                    <div class="tech-item">NodeJS</div>
                    <div class="tech-item">ExpressJS</div>
                    <div class="tech-item">MongoDB</div>
                    <div class="tech-item">RESTful API</div>
                    <div class="tech-item">Fetch API</div>
                </div>
            </div>

            <div class="content-section">
                <h2><i class="fas fa-info-circle"></i> Project Details</h2>
                <div class="project-stats">
                    <div class="stat-box">
                        <h3>Project Name</h3>
                        <div class="value">Student App</div>
                    </div>
                    <div class="stat-box">
                        <h3>Version</h3>
                        <div class="value">V 1.0</div>
                    </div>
                    <div class="stat-box">
                        <h3>Size</h3>
                        <div class="value">107.95 kB</div>
                    </div>
                    <div class="stat-box">
                        <h3>Downloads</h3>
                        <div class="value">289</div>
                    </div>
                    <div class="stat-box">
                        <h3>Level</h3>
                        <div class="value">Beginner</div>
                    </div>
                    <div class="stat-box">
                        <h3>Add to Favorite</h3>
                        <div><i class="fas fa-heart favorite-btn" id="favorite-btn"></i></div>
                    </div>
                </div>
            </div>

            <div class="social-icons-main">
                <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary"><i class="fas fa-download"></i> Download Project</button>
                <button class="btn btn-secondary"><i class="fas fa-video"></i> Video Tutorial</button>
                <button class="btn btn-secondary"><i class="fas fa-crown"></i> Premium Projects</button>
            </div>

            <div class="comments-section">
                <h2><i class="fas fa-comments"></i> Comments</h2>
                <div class="comment">
                    <div class="comment-header">
                        <div class="comment-user">Sachin2580</div>
                        <div class="comment-date">2025-07-30 AT 03:58 AM</div>
                    </div>
                    <div class="comment-content">
                        <p>How do I run this project? I'm having trouble setting up the MongoDB connection.</p>
                    </div>
                    <button class="reply-btn"><i class="fas fa-reply"></i> Reply</button>
                </div>
                <div class="comment">
                    <div class="comment-header">
                        <div class="comment-user">Yahoo Baba</div>
                        <div class="comment-date">2025-07-31 AT 01:11 PM</div>
                    </div>
                    <div class="comment-content">
                        <p>See this video tutorial for a step-by-step guide: <a href="https://www.youtube.com/watch?v=quD4kLvmcOg&list=PL0b6OzIxLPbx0ZTmVQgsB4T5KWXXxrZ6C">https://www.youtube.com/watch?v=quD4kLvmcOg&list=PL0b6OzIxLPbx0ZTmVQgsB4T5KWXXxrZ6C</a></p>
                    </div>
                    <button class="reply-btn"><i class="fas fa-reply"></i> Reply</button>
                </div>
                <div class="comment">
                    <div class="comment-header">
                        <div class="comment-user">DevUser42</div>
                        <div class="comment-date">2025-08-05 AT 10:22 AM</div>
                    </div>
                    <div class="comment-content">
                        <p>Great tutorial! I was able to implement JWT authentication using your guidance. Thanks!</p>
                    </div>
                    <button class="reply-btn"><i class="fas fa-reply"></i> Reply</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Favorite button functionality
            const favoriteBtn = document.getElementById('favorite-btn');
            favoriteBtn.addEventListener('click', function() {
                this.classList.toggle('active');
                this.classList.toggle('far');
                this.classList.toggle('fas');
                
                if (this.classList.contains('active')) {
                    this.style.color = '#F44336';
                    // Animation effect
                    this.animate([
                        { transform: 'scale(1)', color: '#e0e0e0' },
                        { transform: 'scale(1.5)', color: '#F44336', offset: 0.5 },
                        { transform: 'scale(1.2)', color: '#F44336' }
                    ], {
                        duration: 500,
                        easing: 'ease-out'
                    });
                } else {
                    this.style.color = '#e0e0e0';
                }
            });
            
            // Search functionality
            const searchInput = document.getElementById('search-input');
            const searchBtn = document.getElementById('search-btn');
            const searchResults = document.getElementById('search-results');
            const resultsContainer = document.getElementById('results-container');
            
            // Sample searchable content
            const searchableContent = [
                { title: "Add New Student", content: "Users can fill out a form to add a new student record, including details like name, age, class, and ID.", category: "feature" },
                { title: "NodeJS", content: "JavaScript runtime built on Chrome's V8 JavaScript engine used for building scalable network applications.", category: "technology" },
                { title: "MongoDB", content: "Source-available cross-platform document-oriented database program. Classified as a NoSQL database program.", category: "technology" },
                { title: "ExpressJS", content: "Back end web application framework for Node.js, designed for building web applications and APIs.", category: "technology" },
                { title: "Update Student Details", content: "Each record has an 'Edit' button that loads the selected student's data into the form for editing.", category: "feature" },
                { title: "CRUD Operations", content: "Create, Read, Update, and Delete operations implemented using RESTful API endpoints.", category: "concept" },
                { title: "Sachin2580's Comment", content: "How do I run this project? I'm having trouble setting up the MongoDB connection.", category: "comment" },
                { title: "Yahoo Baba's Response", content: "See this video tutorial for a step-by-step guide.", category: "comment" }
            ];
            
            // Perform search
            function performSearch() {
                const searchTerm = searchInput.value.trim().toLowerCase();
                resultsContainer.innerHTML = '';
                
                if (searchTerm === '') {
                    searchResults.style.display = 'none';
                    return;
                }
                
                const results = searchableContent.filter(item => 
                    item.title.toLowerCase().includes(searchTerm) || 
                    item.content.toLowerCase().includes(searchTerm)
                );
                
                if (results.length > 0) {
                    results.forEach(item => {
                        const resultItem = document.createElement('div');
                        resultItem.className = 'result-item';
                        
                        const categoryBadge = document.createElement('span');
                        categoryBadge.className = 'tech-badge';
                        categoryBadge.textContent = item.category.charAt(0).toUpperCase() + item.category.slice(1);
                        categoryBadge.style.marginBottom = '5px';
                        categoryBadge.style.display = 'inline-block';
                        
                        const title = document.createElement('h4');
                        title.textContent = item.title;
                        title.style.marginBottom = '5px';
                        
                        const content = document.createElement('p');
                        content.textContent = item.content;
                        content.style.color = '#555';
                        
                        resultItem.appendChild(categoryBadge);
                        resultItem.appendChild(title);
                        resultItem.appendChild(content);
                        resultsContainer.appendChild(resultItem);
                    });
                    searchResults.style.display = 'block';
                } else {
                    resultsContainer.innerHTML = '<div class="no-results">No results found for "' + searchTerm + '"</div>';
                    searchResults.style.display = 'block';
                }
            }
            
            // Event listeners for search
            searchBtn.addEventListener('click', performSearch);
            searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Enter') {
                    performSearch();
                }
            });
            
            // Button ripple effect
            const buttons = document.querySelectorAll('.btn, .action-button');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Remove any existing ripple
                    const existingRipple = this.querySelector('.ripple');
                    if (existingRipple) {
                        existingRipple.remove();
                    }
                    
                    // Create ripple
                    const ripple = document.createElement('span');
                    ripple.className = 'ripple';
                    
                    // Position ripple
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size/2;
                    const y = e.clientY - rect.top - size/2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    
                 this.appendChild(ripple);
                    
                    // Remove ripple after animation
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
</body>
@endsection