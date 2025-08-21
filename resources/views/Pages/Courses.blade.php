@extends('layouts.app')

@section('title', 'Web Development Courses')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="page-header">
        <h1>Web Development Courses</h1>
        <p>Master the art of building modern websites and applications with our comprehensive web development courses</p>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
        <div class="filter-group">
            <label for="categoryFilter">Category:</label>
            <select id="categoryFilter">
                <option value="all">All Web Development</option>
                <option value="frontend">Frontend</option>
                <option value="backend">Backend</option>
                <option value="fullstack">Full Stack</option>
                <option value="frameworks">Frameworks</option>
            </select>
        </div>
        <div class="filter-group">
            <label for="levelFilter">Level:</label>
            <select id="levelFilter">
                <option value="all">All Levels</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
        </div>
        <div class="search-group">
            <input type="text" id="courseSearch" placeholder="Search courses...">
            <button class="search-btn">Search</button>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="courses-grid-container">
        @php
            $webDevCourses = [
                [
                    'id' => 1,
                    'title' => 'HTML & CSS Fundamentals', 
                    'instructor' => 'Sarah Johnson', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&w=400&q=80',
                    'views' => '5.2K views', 
                    'time' => '1 week ago',
                    'category' => 'frontend',
                    'level' => 'beginner',
                    'duration' => '6 hours',
                    'lessons' => 24,
                    'price' => 'Free'
                ],
                [
                    'id' => 2,
                    'title' => 'JavaScript Mastery', 
                    'instructor' => 'Michael Chen', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1579468118864-1b9ea3c0db4a?auto=format&fit=crop&w=400&q=80',
                    'views' => '8.7K views', 
                    'time' => '2 weeks ago',
                    'category' => 'frontend',
                    'level' => 'intermediate',
                    'duration' => '10 hours',
                    'lessons' => 42,
                    'price' => '$29.99'
                ],
                [
                    'id' => 3,
                    'title' => 'React.js Complete Guide', 
                    'instructor' => 'Emma Wilson', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?auto=format&fit=crop&w=400&q=80',
                    'views' => '12.3K views', 
                    'time' => '3 days ago',
                    'category' => 'frontend',
                    'level' => 'intermediate',
                    'duration' => '15 hours',
                    'lessons' => 58,
                    'price' => '$49.99'
                ],
                [
                    'id' => 4,
                    'title' => 'Node.js & Express', 
                    'instructor' => 'David Kim', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1565106430482-8f6e74349ca1?auto=format&fit=crop&w=400&q=80',
                    'views' => '6.5K views', 
                    'time' => '5 days ago',
                    'category' => 'backend',
                    'level' => 'intermediate',
                    'duration' => '12 hours',
                    'lessons' => 45,
                    'price' => '$39.99'
                ],
                [
                    'id' => 5,
                    'title' => 'PHP & MySQL for Backend', 
                    'instructor' => 'Robert Taylor', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1600132806608-446446a9490a?auto=format&fit=crop&w=400&q=80',
                    'views' => '3.8K views', 
                    'time' => '2 weeks ago',
                    'category' => 'backend',
                    'level' => 'beginner',
                    'duration' => '8 hours',
                    'lessons' => 32,
                    'price' => '$24.99'
                ],
                [
                    'id' => 6,
                    'title' => 'Laravel Framework Deep Dive', 
                    'instructor' => 'Jennifer Lopez', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1624953587687-daf255b6b80a?auto=format&fit=crop&w=400&q=80',
                    'views' => '4.1K views', 
                    'time' => '1 week ago',
                    'category' => 'backend',
                    'level' => 'advanced',
                    'duration' => '18 hours',
                    'lessons' => 65,
                    'price' => '$59.99'
                ],
                [
                    'id' => 7,
                    'title' => 'Vue.js from Scratch', 
                    'instructor' => 'Thomas Baker', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1566837945700-30057527ade0?auto=format&fit=crop&w=400&q=80',
                    'views' => '7.2K views', 
                    'time' => '4 days ago',
                    'category' => 'frontend',
                    'level' => 'beginner',
                    'duration' => '9 hours',
                    'lessons' => 36,
                    'price' => '$34.99'
                ],
                [
                    'id' => 8,
                    'title' => 'MERN Stack Development', 
                    'instructor' => 'Lisa Wong', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=400&q=80',
                    'views' => '9.8K views', 
                    'time' => '1 day ago',
                    'category' => 'fullstack',
                    'level' => 'advanced',
                    'duration' => '25 hours',
                    'lessons' => 92,
                    'price' => '$79.99'
                ],
                [
                    'id' => 9,
                    'title' => 'Django for Python Developers', 
                    'instructor' => 'Kevin Smith', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?auto=format&fit=crop&w=400&q=80',
                    'views' => '5.4K views', 
                    'time' => '3 weeks ago',
                    'category' => 'backend',
                    'level' => 'intermediate',
                    'duration' => '14 hours',
                    'lessons' => 51,
                    'price' => '$44.99'
                ],
                [
                    'id' => 10,
                    'title' => 'Angular Framework Course', 
                    'instructor' => 'Nancy Drew', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1581276879432-15e50529f34b?auto=format&fit=crop&w=400&q=80',
                    'views' => '6.1K views', 
                    'time' => '2 days ago',
                    'category' => 'frontend',
                    'level' => 'intermediate',
                    'duration' => '16 hours',
                    'lessons' => 60,
                    'price' => '$54.99'
                ],
                [
                    'id' => 11,
                    'title' => 'WordPress Theme Development', 
                    'instructor' => 'Paul Graham', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&w=400&q=80',
                    'views' => '4.7K views', 
                    'time' => '1 week ago',
                    'category' => 'frontend',
                    'level' => 'intermediate',
                    'duration' => '11 hours',
                    'lessons' => 40,
                    'price' => '$39.99'
                ],
                [
                    'id' => 12,
                    'title' => 'RESTful API Design', 
                    'instructor' => 'Amanda Lee', 
                    'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=400&q=80',
                    'views' => '3.9K views', 
                    'time' => '5 days ago',
                    'category' => 'backend',
                    'level' => 'advanced',
                    'duration' => '8 hours',
                    'lessons' => 30,
                    'price' => '$29.99'
                ]
            ];
        @endphp

        @foreach($webDevCourses as $course)
        <div class="course-card" data-category="{{ $course['category'] }}" data-level="{{ $course['level'] }}">
            <div class="thumbnail-container">
                <img src="{{ $course['thumbnail'] }}" alt="{{ $course['title'] }}">
                <div class="thumbnail-overlay">
                    <h3>{{ $course['title'] }}</h3>
                    <p class="instructor">{{ $course['instructor'] }}</p>
                    <small>{{ $course['views'] }} • {{ $course['time'] }}</small>
                </div>
            </div>
            <div class="course-meta">
                <span class="course-level {{ $course['level'] }}">{{ ucfirst($course['level']) }}</span>
                <span class="course-duration">{{ $course['duration'] }}</span>
                <span class="course-lessons">{{ $course['lessons'] }} lessons</span>
            </div>
              <div class="course-footer">
        <span class="course-price">{{ $course['price'] }}</span>
        <a href="{{ route('courses.detail', ['id' => $course['id']]) }}" class="course-btn">View Course</a>
    </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <a href="#" class="page-nav disabled">&laquo;</a>
        <a href="#" class="page-active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#" class="page-nav">&raquo;</a>
    </div>
</div>

<style>
/* Base Styles */
.container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 1rem;
    font-family: 'Poppins', sans-serif;
}

.page-header {
    text-align: center;
    margin-bottom: 3rem;
}

.page-header h1 {
    font-size: 2.5rem;
    color: #00695C;
    margin-bottom: 0.5rem;
}

.page-header p {
    font-size: 1.1rem;
    color: #607D8B;
    max-width: 700px;
    margin: 0 auto;
}

/* Filter Section */
.filter-section {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: #FFFFFF;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.filter-group {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-group label {
    font-weight: 500;
    color: #1A3C34;
}

.filter-group select {
    padding: 0.5rem 1rem;
    border: 1px solid #B2DFDB;
    border-radius: 4px;
    background: #FFFFFF;
    cursor: pointer;
}

.search-group {
    display: flex;
    margin-left: auto;
}

.search-group input {
    padding: 0.5rem 1rem;
    border: 1px solid #B2DFDB;
    border-radius: 4px 0 0 4px;
    width: 250px;
}

.search-btn {
    padding: 0.5rem 1.5rem;
    background: #00695C;
    color: white;
    border: none;
    border-radius: 0 4px 4px 0;
    cursor: pointer;
    transition: background 0.3s;
}

.search-btn:hover {
    background: #004D40;
}

/* Courses Grid */
.courses-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.course-card {
    background: #FFFFFF;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 105, 92, 0.3);
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
    transform: scale(1.05);
}

.thumbnail-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 0.75rem 1rem;
    background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.75));
    color: #E0F2F1;
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

.course-meta {
    padding: 0.75rem 1rem;
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
    font-size: 0.8rem;
    color: #607D8B;
    border-bottom: 1px solid #E0F2F1;
}

.course-level {
    padding: 0.2rem 0.5rem;
    border-radius: 4px;
    font-weight: 500;
}

.course-level.beginner {
    background: #E8F5E9;
    color: #2E7D32;
}

.course-level.intermediate {
    background: #E3F2FD;
    color: #1565C0;
}

.course-level.advanced {
    background: #F3E5F5;
    color: #7B1FA2;
}

.course-footer {
    padding: 0.75rem 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}

.course-price {
    font-weight: 700;
    color: #00695C;
    font-size: 1.1rem;
}

.course-btn {
    padding: 0.5rem 1rem;
    background: #00695C;
    color: white;
    border-radius: 4px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: background 0.3s;
}

.course-btn:hover {
    background: #004D40;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 2rem;
}

.pagination a {
    padding: 0.5rem 1rem;
    text-decoration: none;
    color: #00695C;
    border: 1px solid #B2DFDB;
    border-radius: 4px;
    transition: background 0.3s;
}

.pagination a:hover:not(.page-active, .page-nav.disabled) {
    background: #E0F2F1;
}

.page-active {
    background: #00695C;
    color: white !important;
    border-color: #00695C !important;
}

.page-nav.disabled {
    color: #B2DFDB;
    cursor: not-allowed;
}

/* Responsive Design */
@media (max-width: 768px) {
    .filter-section {
        flex-direction: column;
    }
    
    .search-group {
        margin-left: 0;
        width: 100%;
    }
    
    .search-group input {
        width: 100%;
    }
    
    .courses-grid-container {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
}

@media (max-width: 480px) {
    .courses-grid-container {
        grid-template-columns: 1fr;
    }
    
    .page-header h1 {
        font-size: 2rem;
    }
    
    .page-header p {
        font-size: 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const categoryFilter = document.getElementById('categoryFilter');
    const levelFilter = document.getElementById('levelFilter');
    const searchInput = document.getElementById('courseSearch');
    const searchBtn = document.querySelector('.search-btn');
    const courseCards = document.querySelectorAll('.course-card');
    
    function filterCourses() {
        const categoryValue = categoryFilter.value;
        const levelValue = levelFilter.value;
        const searchValue = searchInput.value.toLowerCase();
        
        courseCards.forEach(card => {
            const cardCategory = card.dataset.category;
            const cardLevel = card.dataset.level;
            const cardTitle = card.querySelector('h3').textContent.toLowerCase();
            
            const categoryMatch = categoryValue === 'all' || cardCategory === categoryValue;
            const levelMatch = levelValue === 'all' || cardLevel === levelValue;
            const searchMatch = cardTitle.includes(searchValue);
            
            if (categoryMatch && levelMatch && searchMatch) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    // Event listeners
    categoryFilter.addEventListener('change', filterCourses);
    levelFilter.addEventListener('change', filterCourses);
    searchBtn.addEventListener('click', filterCourses);
    searchInput.addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            filterCourses();
        }
    });

    // Pagination functionality
    const paginationLinks = document.querySelectorAll('.pagination a:not(.page-nav)');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links
            paginationLinks.forEach(l => l.classList.remove('page-active'));
            
            // Add active class to clicked link
            this.classList.add('page-active');
            
            // In a real app, you would fetch the paginated data here
            console.log('Page changed to:', this.textContent);
        });
    });
});
</script>
@endsection