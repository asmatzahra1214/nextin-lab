@extends('layouts.app')

@section('title', 'home')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
<div class="container">
    <!-- Banner Section -->
    <div class="banner">
        <img 
            src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1400&q=80" 
            alt="Welcome Banner"
        >
        <div class="banner-overlay"></div>
        <div class="banner-text">
            <h1>Welcome to Our Learning Platform</h1>
            <p>Explore the latest courses and start learning today</p>
        </div>
    </div>

    <!-- Dynamic Highlight Section -->
    <div class="highlight-section">
        <div class="highlight-card">
            <h2>🔥 Trending Now</h2>
            <p>Check out our most popular courses and join thousands of learners already mastering new skills.</p>
        </div>
        <div class="highlight-stats">
            <div>
                <h3>120+</h3>
                <p>Active Courses</p>
            </div>
            <div>
                <h3>15K+</h3>
                <p>Happy Students</p>
            </div>
            <div>
                <h3>98%</h3>
                <p>Satisfaction Rate</p>
            </div>
        </div>
    </div>

    <!-- Courses Section -->
    <div class="courses-section">
        <div class="courses-header">
            <h2 class="section-title">Latest Courses</h2>
            <div class="scroll-buttons">
                <button class="scroll-btn" onclick="scrollCourses(-1)">&#10094;</button>
                <button class="scroll-btn" onclick="scrollCourses(1)">&#10095;</button>
            </div>
        </div>

        <div class="courses-wrapper" id="coursesWrapper">
            @php
                $courses = [
                    [
                        'title' => 'Laravel Basics', 
                        'instructor' => 'John Doe', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=400&q=80',
                        'views' => '1.2K views', 
                        'time' => '2 days ago'
                    ],
                    [
                        'title' => 'React for Beginners', 
                        'instructor' => 'Jane Smith', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=400&q=80',
                        'views' => '3.5K views', 
                        'time' => '1 week ago'
                    ],
                    [
                        'title' => 'Advanced PHP Techniques', 
                        'instructor' => 'Michael Lee', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=400&q=80',
                        'views' => '500 views', 
                        'time' => '3 days ago'
                    ],
                    [
                        'title' => 'Mastering Tailwind CSS', 
                        'instructor' => 'Sarah Johnson', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=400&q=80',
                        'views' => '2K views', 
                        'time' => '5 days ago'
                    ],
                    [
                        'title' => 'Vue.js Crash Course', 
                        'instructor' => 'Chris Evans', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1581091012184-5c57f43b11f9?auto=format&fit=crop&w=400&q=80',
                        'views' => '980 views', 
                        'time' => '4 days ago'
                    ],
                    [
                        'title' => 'Node.js API Development', 
                        'instructor' => 'Emily Carter', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=400&q=80',
                        'views' => '1.8K views', 
                        'time' => '6 days ago'
                    ],
                    [
                        'title' => 'Django Web Development', 
                        'instructor' => 'Olivia Brown', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1505685296765-3a2736de412f?auto=format&fit=crop&w=400&q=80',
                        'views' => '2.3K views', 
                        'time' => '1 week ago'
                    ],
                    [
                        'title' => 'Flutter for Mobile Apps', 
                        'instructor' => 'Liam Johnson', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=400&q=80',
                        'views' => '1.6K views', 
                        'time' => '3 days ago'
                    ],
                    [
                        'title' => 'Python Data Analysis', 
                        'instructor' => 'Sophia Martinez', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1549924231-f129b911e442?auto=format&fit=crop&w=400&q=80',
                        'views' => '4.2K views', 
                        'time' => '5 days ago'
                    ],
                    [
                        'title' => 'Machine Learning Essentials', 
                        'instructor' => 'William Harris', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1581090700227-4c4f50b1443d?auto=format&fit=crop&w=400&q=80',
                        'views' => '3K views', 
                        'time' => '2 weeks ago'
                    ],
                    [
                        'title' => 'UI/UX Design Fundamentals', 
                        'instructor' => 'Ava Thompson', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1522202195461-9e75b6fd8a06?auto=format&fit=crop&w=400&q=80',
                        'views' => '1.1K views', 
                        'time' => '1 day ago'
                    ],
                    [
                        'title' => 'AWS Cloud Basics', 
                        'instructor' => 'James White', 
                        'thumbnail' => 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=400&q=80',
                        'views' => '2.7K views', 
                        'time' => '4 days ago'
                    ],
                ];
                $chunks = array_chunk($courses, 6);
            @endphp

            @foreach($chunks as $chunk)
            <div class="courses-grid">
                @foreach($chunk as $course)
                <div class="course-card">
                    <div class="thumbnail-container">
                        <img src="{{ $course['thumbnail'] }}" alt="{{ $course['title'] }}">
                        <div class="thumbnail-overlay">
                            <h3>{{ $course['title'] }}</h3>
                            <p class="instructor">{{ $course['instructor'] }}</p>
                            <small>{{ $course['views'] }} • {{ $course['time'] }}</small>
                        </div>
                    </div>
                    
                </div>
                
                @endforeach
               <div class="view-more-container">
                 <a href="/templates" style="align-items:center;" class="btn-view-more" aria-label="View more CodeLab projects">View More</a>
                 </div> 
            </div>
             
            @endforeach
           
        </div>
         
    </div>

    <!-- Projects Section -->
    <section class="projects-section">
        <h2 class="section-title">Our Latest Projects</h2>
        <div class="projects-grid">
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/student-app-:-nodejs-expressjs-&-mongodb-crud-api-project.png" alt="Student App">
                </div>
                <div class="project-details">
                    <div class="project-header">
                        <span class="project-category">NodeJS</span>
                        <span class="project-price">Free</span>
                    </div>
                    <h3 class="project-title">Student App: NodeJS ExpressJS & MongoDB CRUD API</h3>
                    <p class="project-desc">Perform CRUD operations on student records using Node.js, Express.js, and MongoDB.</p>
                    <div class="project-footer">
                        <div class="project-stats">
                            <span><i class="fas fa-download"></i> 273</span>
                            <span><i class="fas fa-comment"></i> 2</span>
                        </div>
                        <button class="download-btn"><i class="fas fa-download"></i> Download</button>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/contact-app-:-nodejs-expressjs-&-mongodb-crud-project.png" alt="Contact App">
                </div>
                <div class="project-details">
                    <div class="project-header">
                        <span class="project-category">NodeJS</span>
                        <span class="project-price">Free</span>
                    </div>
                    <h3 class="project-title">Contact App: NodeJS ExpressJS & MongoDB CRUD</h3>
                    <p class="project-desc">NodeJS, ExpressJS, and MongoDB contact management system with CRUD & search functionality.</p>
                    <div class="project-footer">
                        <div class="project-stats">
                            <span><i class="fas fa-download"></i> 413</span>
                            <span><i class="fas fa-comment"></i> 2</span>
                        </div>
                        <button class="download-btn"><i class="fas fa-download"></i> Download</button>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/school-management-project-in-laravel.jpg" alt="School Management Project">
                </div>
                <div class="project-details">
                    <div class="project-header">
                        <span class="project-category">LaravelPHP</span>
                        <span class="project-price">₹350</span>
                    </div>
                    <h3 class="project-title">School Management Project in Laravel</h3>
                    <p class="project-desc">Automates school operations like student management and grading.</p>
                    <div class="project-footer">
                        <div class="project-stats">
                            <span><i class="fas fa-download"></i> 223</span>
                            <span><i class="fas fa-comment"></i> 130</span>
                        </div>
                        <button class="download-btn"><i class="fas fa-shopping-cart"></i> Purchase</button>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/digital-products-selling-project-in-laravel.jpg" alt="Digital Products Selling">
                </div>
                <div class="project-details">
                    <div class="project-header">
                        <span class="project-category">LaravelPHP</span>
                        <span class="project-price">₹250</span>
                    </div>
                    <h3 class="project-title">Digital Products Selling Project in Laravel</h3>
                    <p class="project-desc">Multi-vendor platform for selling digital products with payment integration.</p>
                    <div class="project-footer">
                        <div class="project-stats">
                            <span><i class="fas fa-download"></i> 190</span>
                            <span><i class="fas fa-comment"></i> 98</span>
                        </div>
                        <button class="download-btn"><i class="fas fa-shopping-cart"></i> Purchase</button>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/tourism-management-project-in-laravel.png" alt="Tourism Management">
                </div>
                <div class="project-details">
                    <div class="project-header">
                        <span class="project-category">LaravelPHP</span>
                        <span class="project-price">₹250</span>
                    </div>
                    <h3 class="project-title">Tourism Management Project in Laravel</h3>
                    <p class="project-desc">Manages tours, bookings, and customer relationships for tourism businesses.</p>
                    <div class="project-footer">
                        <div class="project-stats">
                            <span><i class="fas fa-download"></i> 195</span>
                            <span><i class="fas fa-comment"></i> 694</span>
                        </div>
                        <button class="download-btn"><i class="fas fa-shopping-cart"></i> Purchase</button>
                    </div>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="https://www.yahubaba.com/public/projects/hospital-management-system-in-laravel.png" alt="Hospital Management">
                </div>
                <div class="project-details">
                    <div class="project-header">
                        <span class="project-category">LaravelPHP</span>
                        <span class="project-price">₹300</span>
                    </div>
                    <h3 class="project-title">Hospital Management System in Laravel</h3>
                    <p class="project-desc">Efficiently manages patients, doctors, appointments, and billing in hospitals.</p>
                    <div class="project-footer">
                        <div class="project-stats">
                            <span><i class="fas fa-download"></i> 210</span>
                            <span><i class="fas fa-comment"></i> 512</span>
                        </div>
                        <button class="download-btn"><i class="fas fa-shopping-cart"></i> Purchase</button>
                    </div>
                    
                </div>
               
            </div>
             
        </div>
    <div class="view-more-container">
                <a href="/projects" class="btn-view-more" aria-label="View more CodeLab projects">View More</a>
               </div>
    </section>

    <!-- Free Templates Section -->
    <section class="free-templates">
        <h2>Free Templates</h2>
        <div class="templates-grid">
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/amaze.jpg" alt="Amaze">
                <div class="template-title">Amaze</div>
                <div class="template-framework">Framework: Bootstrap</div>
                <div class="template-stats">❤ 26301 <span>⬇ 5127</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/probusiness.jpg" alt="ProBusiness">
                <div class="template-title">ProBusiness</div>
                <div class="template-framework">Framework: Bootstrap</div>
                <div class="template-stats">❤ 19812 <span>⬇ 3898</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/fortune.jpg" alt="Fortune">
                <div class="template-title">Fortune</div>
                <div class="template-framework">Framework: Bootstrap</div>
                <div class="template-stats">❤ 12731 <span>⬇ 2208</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/electrify.jpg" alt="Electrify">
                <div class="template-title">Electrify</div>
                <div class="template-framework">Framework: Bootstrap</div>
                <div class="template-stats">❤ 8243 <span>⬇ 1960</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/edge.jpg" alt="Edge">
                <div class="template-title">Edge</div>
                <div class="template-framework">Framework: Bootstrap</div>
                <div class="template-stats">❤ 7430 <span>⬇ 1846</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
            <div class="template-card">
                <img src="https://www.yahubaba.com/public/freetemplates/dreamz.jpg" alt="Dreamz">
                <div class="template-title">Dreamz</div>
                <div class="template-framework">Framework: Bootstrap</div>
                <div class="template-stats">❤ 6322 <span>⬇ 1517</span></div>
                <div class="template-actions">
                    <button class="download-btn">Download</button>
                    <button class="demo-btn">Demo</button>
                </div>
            </div>
        </div>
        <div class="view-more-container">
      <a href="/templates" class="btn-view-more" aria-label="View more CodeLab projects">View More</a>
    </div>
    </section>
     
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

html, body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #E6ECEC; /* --background */
}

.container {
    max-width: 1140px;
    margin: 2rem auto;
    padding: 0 1rem;
    box-sizing: border-box;
}

/* Banner Styling */
.banner {
    position: relative;
    height: 300px;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 3rem;
}

.banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.45);
    z-index: 1;
}

.banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #E0F2F1; /* --text-light */
    z-index: 2;
    padding: 0 1rem;
}

.banner-text h1 {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.75);
}

.banner-text p {
    font-size: 1.25rem;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.75);
}

/* Highlight Section */
.highlight-section {
    background: linear-gradient(90deg, #00695C, #004D40); /* --primary-dark */
    color: #E0F2F1; /* --text-light */
    padding: 2rem;
    border-radius: 8px;
    margin-bottom: 3rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
}

.highlight-card {
    max-width: 400px;
}

.highlight-card h2 {
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
    color: #FF8A65; /* --accent */
}

.highlight-card p {
    font-size: 1rem;
    opacity: 0.9;
}

.highlight-stats {
    display: flex;
    gap: 2rem;
}

.highlight-stats div {
    text-align: center;
}

.highlight-stats h3 {
    font-size: 1.6rem;
    margin-bottom: 0.25rem;
    color: #FF8A65; /* --accent */
}

/* Courses Section */
.courses-section {
    background: linear-gradient(to right, #0e7c6fff, #1f997cff); /* --primary-dark to --text-dark */
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 2rem;
}

.courses-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.courses-header h2 {
    color: #E0F2F1; /* --text-light */
}

.scroll-buttons {
    display: flex;
    gap: 0.5rem;
}

.scroll-btn {
    background: rgba(255, 255, 255, 0.8);
    border: none;
    padding: 0.4rem 0.8rem;
    cursor: pointer;
    border-radius: 4px;
    font-size: 1.2rem;
    color: #00695C; /* --primary-dark */
}

.courses-wrapper {
    display: flex;
    overflow-x: hidden;
    scroll-behavior: smooth;
}

.courses-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    min-width: 100%;
}

.course-card {
    background: #FFFFFF; /* --card-background */
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.3s ease;
    border: 1px solid #B2DFDB; /* --card-border */
}

.course-card:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

.thumbnail-container {
    position: relative;
    height: 180px;
    overflow: hidden;
}

.thumbnail-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.course-card:hover .thumbnail-container img {
    transform: scale(1.1);
}

.thumbnail-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 0.75rem 1rem;
    background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.75));
    color: #E0F2F1; /* --text-light */
}

.thumbnail-overlay h3 {
    margin: 0 0 0.25rem 0;
    font-size: 1.1rem;
    font-weight: 700;
}

.thumbnail-overlay .instructor {
    margin: 0 0 0.4rem 0;
    font-size: 0.9rem;
    opacity: 0.8;
}

.thumbnail-overlay small {
    font-size: 0.8rem;
    opacity: 0.7;
}

/* Projects Section */
.projects-section {
    padding: 20px;
    text-align: center;
    background-color: #E6ECEC; /* --background */
}

.section-title {
    font-size: 1.8rem;
    color: #00695C; /* --primary-dark */
    margin-bottom: 20px;
    font-weight: 600;
}

.projects-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.project-card {
    background: #FFFFFF; /* --card-background */
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
   
}

.project-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0, 105, 92, 0.3); /* --primary-dark with opacity */
}

.project-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #B2DFDB; /* --card-border */
}

.project-details {
    padding: 15px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.project-header {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    color: #00695C; /* --primary-dark */
    margin-bottom: 10px;
}

.project-title {
    font-size: 1.1rem;
    color: #1A3C34; /* --text-dark */
    margin: 10px 0;
    line-height: 1.3;
}

.project-desc {
    font-size: 0.9rem;
    color: #607D8B; /* --text-muted */
    margin-bottom: 15px;
    flex-grow: 1;
}

.project-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #E0F2F1; /* --text-light */
    padding-top: 10px;
}

.project-stats span {
    margin-right: 10px;
    color: #607D8B; /* --text-muted */
    font-size: 0.85rem;
}

.download-btn {
    background: #00695C; /* --primary-dark */
    color: #E0F2F1; /* --text-light */
    padding: 6px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
    font-size: 0.9rem;
}

.download-btn:hover {
    background: #004D40; /* darker shade of primary-dark */
}

/* Free Templates Section */
.free-templates {
    /* background: linear-gradient(135deg, #00695C, #1A3C34); --primary-dark to --text-dark */
    background:white;
    padding: 50px 20px;
    /* color: #E0F2F1;  */
    color:#004D40;
    text-align: center;
    border-radius:10px;
}

.free-templates h2 {
    font-size: 2rem;
    margin-bottom: 30px;
    font-weight: bold;
    /* color: #FF8A65; --accent */
    color:#004D40;
}

.templates-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.template-card {
   background:#E0F2F1;
    /* background:white; */
    border-radius: 12px;
    overflow: hidden;
    padding: 15px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
   
}

.template-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0, 105, 92, 0.6); /* --primary-dark with opacity */
}

.template-card img {
    width: 100%;
    border-radius: 8px;
    height: 180px;
    object-fit: cover;
}

.template-title {
    font-size: 1.2rem;
    margin-top: 10px;
    font-weight: bold;
}

.template-framework {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-bottom: 8px;
}

.template-stats {
    font-size: 0.9rem;
    margin-bottom: 12px;
}

.template-actions button {
    padding: 8px 15px;
    border: none;
    margin: 5px;
    cursor: pointer;
    border-radius: 6px;
    font-weight: bold;
    transition: background 0.3s;
}

.template-actions .download-btn {
    background: #00695C; /* --primary-dark */
    color: #E0F2F1; /* --text-light */
}

.template-actions .download-btn:hover {
    background: #004D40; /* darker shade of primary-dark */
}

.template-actions .demo-btn {
    background: #FFFFFF; /* --card-background */
    color: #00695C; /* --primary-dark */
}

.template-actions .demo-btn:hover {
    background: #FF8A65; /* --accent */
    color: #E0F2F1; /* --text-light */
}

/* Responsive Design */
@media (max-width: 1024px) {
    .courses-grid, .projects-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .courses-grid, .projects-grid {
        grid-template-columns: 1fr;
    }

    .banner-text h1 {
        font-size: 2rem;
    }

    .banner-text p {
        font-size: 1rem;
    }

    .highlight-section {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<script>
function scrollCourses(direction) {
    const wrapper = document.getElementById('coursesWrapper');
    const scrollAmount = wrapper.clientWidth;
    wrapper.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
}
</script>
<section class="labs-section">
  <div class="container">
    <h2 class="section-title">CodeLab Projects</h2>
    <div class="search-bar">
      <input type="text" id="labSearchInput" placeholder="Search projects...">
    </div>
    <div class="projects-grid" id="labsGrid">
      <!-- All your project cards here -->
      <div class="project-card">
        <img src="https://www.yahubaba.com/public/codelab/pricing-table-style-322.png" alt="Pricing Table Style 322" loading="lazy">
        <div class="project-title">Pricing Table Style 322</div>
        <div class="project-stats"><i class="fas fa-heart"></i> 220 <i class="fas fa-comment"></i> 0</div>
      </div>
      <div class="project-card">
        <img src="https://www.yahubaba.com/public/codelab/counter-style-302.png" alt="Counter Style 302" loading="lazy">
        <div class="project-title">Counter Style 302</div>
        <div class="project-stats"><i class="fas fa-heart"></i> 17 <i class="fas fa-comment"></i> 0</div>
      </div>
      <div class="project-card">
        <img src="https://www.yahubaba.com/public/codelab/ribbon-style-18.png" alt="Ribbon Style 18" loading="lazy">
        <div class="project-title">Ribbon Style 18</div>
        <div class="project-stats"><i class="fas fa-heart"></i> 789 <i class="fas fa-comment"></i> 0</div>
      </div>
      <!-- <div class="project-card">
        <img src="https://www.yahubaba.com/public/codelab/preloader-style-452.png" alt="Preloader Style 452" loading="lazy">
        <div class="project-title">Preloader Style 452</div>
        <div class="project-stats"><i class="fas fa-heart"></i> 1015 <i class="fas fa-comment"></i> 0</div>
      </div>
      <div class="project-card">
        <img src="https://www.yahubaba.com/public/codelab/buttons-style-275.png" alt="Buttons Style 275" loading="lazy">
        <div class="project-title">Buttons Style 275</div>
        <div class="project-stats"><i class="fas fa-heart"></i> 8900 <i class="fas fa-comment"></i> 0</div>
      </div>
      <div class="project-card">
        <img src="https://www.yahubaba.com/public/codelab/css-text-effect-style-257.png" alt="CSS Text Effect Style 257" loading="lazy">
        <div class="project-title">CSS Text Effect 257</div>
        <div class="project-stats"><i class="fas fa-heart"></i> 4050 <i class="fas fa-comment"></i> 0</div>
      </div> -->
      <div class="project-card">
        <img src="https://www.yahubaba.com/public/codelab/service-box-340.png" alt="Service Box 340" loading="lazy">
        <div class="project-title">Service Box 340</div>
        <div class="project-stats"><i class="fas fa-heart"></i> 4860 <i class="fas fa-comment"></i> 0</div>
      </div>
      <div class="project-card">
        <img src="https://www.yahubaba.com/public/codelab/product-grid-style-313.jpg" alt="Product Grid Style 313" loading="lazy">
        <div class="project-title">Product Grid Style 313</div>
        <div class="project-stats"><i class="fas fa-heart"></i> 710 <i class="fas fa-comment"></i> 0</div>
      </div>
      <div class="project-card">
        <img src="https://www.yahubaba.com/public/codelab/link-hover-style-283.png" alt="Link Hover Style 283" loading="lazy">
        <div class="project-title">Link Hover Style 283</div>
        <div class="project-stats"><i class="fas fa-heart"></i> 489 <i class="fas fa-comment"></i> 0</div>
      </div>
    </div>

    <div class="view-more-container">
      <a href="/lab" class="btn-view-more" aria-label="View more CodeLab projects">View More</a>
    </div>
  </div>
</section>

<style>
  :root {
    --primary-dark: #00695C;
    --primary-light: #35978dff;
    --accent: #FF8A65;
    --text-light: #E0F2F1;
    --gradient-hover: linear-gradient(135deg, #4DB6AC, #00695C);
    --background: #E6ECEC;
    --card-background: #FFFFFF;
    --card-border: #B2DFDB;
    --text-dark: #1A3C34;
    --text-muted: #607D8B;
    --shadow: rgba(0, 0, 0, 0.1);
  }

  .labs-section {
    background: var(--background);
    padding: 3rem 0 5rem;
    font-family: 'Poppins', sans-serif;
    color: var(--text-dark);
  }

  .labs-section .container {
    max-width: 1140px;
    margin: 0 auto;
    padding: 0 1rem;
  }

  .section-title {
    font-size: 2.4rem;
    font-weight: 700;
    text-align: center;
    color: #00695C;
    margin-bottom: 2rem;
    letter-spacing: 1.1px;
  }

  .search-bar {
    max-width: 400px;
    margin: 0 auto 3rem;
    text-align: center;
  }

  .search-bar input {
    width: 100%;
    padding: 0.75rem 1.2rem;
    font-size: 1.05rem;
    border: 2px solid var(--card-border);
    border-radius: 30px;
    outline-color: var(--primary-dark);
    background: #fff;
    transition: box-shadow 0.3s ease;
    box-shadow: inset 0 0 5px var(--card-border);
  }

  .search-bar input:focus {
    box-shadow: 0 0 8px var(--primary-dark);
    border-color: var(--primary-dark);
  }

  .projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 28px;
  }

  .project-card {
    background: var(--card-background);
    /* border: 2px solid var(--card-border); */
    border-radius: 16px;
    box-shadow: 0 8px 16px var(--shadow);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    cursor: pointer;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
  }

  .project-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 14px 30px rgba(0, 105, 92, 0.3);
    border-color: var(--primary-light);
  }

  .project-card img {
    width: 100%;
    height: 200px;
    object-fit: contain;
    background: var(--primary-light);
    transition: transform 0.35s ease;
  }

  .project-card:hover img {
    transform: scale(1.07);
  }

  .project-title {
    font-weight: 600;
    font-size: 1.15rem;
    color: var(--text-dark);
    padding: 1rem 1.2rem 0.4rem;
    flex-grow: 1;
    user-select: none;
  }

  .project-stats {
    padding: 0 1.2rem 1rem;
    color: var(--text-muted);
    font-size: 0.9rem;
    display: flex;
    gap: 1.5rem;
    align-items: center;
    user-select: none;
  }

  .project-stats i {
    color: var(--primary-dark);
    margin-right: 6px;
  }

  .view-more-container {
    text-align: center;
    margin-top: 3.5rem;
  }

  .btn-view-more {
    background: var(--primary-dark);
    color: var(--text-light);
    padding: 0.8rem 3.2rem;
    font-weight: 700;
    font-size: 1.2rem;
    border-radius: 50px;
    text-decoration: none;
    box-shadow: 0 8px 18px rgba(0, 105, 92, 0.4);
    transition: background 0.35s ease, box-shadow 0.35s ease;
    display: inline-block;
    user-select: none;
  }

  .btn-view-more:hover,
  .btn-view-more:focus {
    background: var(--primary-light);
    box-shadow: 0 10px 24px rgba(53, 151, 141, 0.6);
    outline: none;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .projects-grid {
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    }
  }

  @media (max-width: 480px) {
    .projects-grid {
      grid-template-columns: 1fr;
    }
    .search-bar {
      max-width: 90vw;
      margin-bottom: 2rem;
    }
  }
</style>

@endsection