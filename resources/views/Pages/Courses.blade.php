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
                <option value="Frontend">Frontend</option>
                <option value="Backend">Backend</option>
                <option value="Full Stack">Full Stack</option>
                <option value="Framework">Frameworks</option>
            </select>
        </div>
        <div class="filter-group">
            <label for="levelFilter">Level:</label>
            <select id="levelFilter">
                <option value="all">All Levels</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
        </div>
        <div class="search-group">
            <input type="text" id="courseSearch" placeholder="Search courses...">
            <button class="search-btn">Search</button>
        </div>
    </div>

    <!-- Loading Indicator -->
    <div id="loadingIndicator" style="text-align: center; padding: 2rem; display: none;">
        <div style="font-size: 1.2rem; color: #00695C; margin-bottom: 1rem;">Loading courses...</div>
        <div style="width: 50px; height: 50px; border: 5px solid #f3f3f3; border-top: 5px solid #00695C; border-radius: 50%; margin: 0 auto; animation: spin 1s linear infinite;"></div>
    </div>

    <!-- Error Message -->
    <div id="errorMessage" style="display: none; text-align: center; padding: 2rem; background: #ffebee; color: #c62828; border-radius: 8px; margin: 1rem 0;">
        <p>Failed to load courses. Please try again later.</p>
        <button onclick="loadCourses()" style="padding: 0.5rem 1rem; background: #c62828; color: white; border: none; border-radius: 4px; cursor: pointer;">Retry</button>
    </div>

    <!-- Courses Grid -->
    <div class="courses-grid-container" id="coursesGrid">
        <!-- Courses will be loaded dynamically from the backend -->
    </div>

    <!-- Pagination -->
    <div class="pagination" id="pagination" style="display: none;">
        <a href="#" class="page-nav disabled" id="prevPage">&laquo;</a>
        <div id="pageNumbers"></div>
        <a href="#" class="page-nav" id="nextPage">&raquo;</a>
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

/* Loading Animation */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
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
    // Global variables
    let allCourses = [];
    let currentPage = 1;
    const coursesPerPage = 12;
    
    // DOM elements
    const coursesGrid = document.getElementById('coursesGrid');
    const loadingIndicator = document.getElementById('loadingIndicator');
    const errorMessage = document.getElementById('errorMessage');
    const pagination = document.getElementById('pagination');
    const prevPage = document.getElementById('prevPage');
    const nextPage = document.getElementById('nextPage');
    const pageNumbers = document.getElementById('pageNumbers');
    
    // Filter elements
    const categoryFilter = document.getElementById('categoryFilter');
    const levelFilter = document.getElementById('levelFilter');
    const searchInput = document.getElementById('courseSearch');
    const searchBtn = document.querySelector('.search-btn');
    
    // Load courses from backend
    function loadCourses() {
        loadingIndicator.style.display = 'block';
        errorMessage.style.display = 'none';
        coursesGrid.innerHTML = '';
        
        fetch('http://127.0.0.1:8000/admin/courses')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                
                return response.json();
            })
            .then(data => {
                console.log(data);
                allCourses = data;
                loadingIndicator.style.display = 'none';
                renderCourses();
                setupPagination();
            })
            .catch(error => {
                console.error('Error loading courses:', error);
                loadingIndicator.style.display = 'none';
                errorMessage.style.display = 'block';
            });
    }
    
    // Render courses based on current filters and pagination
    function renderCourses() {
        const filteredCourses = filterCourses();
        const startIndex = (currentPage - 1) * coursesPerPage;
        const paginatedCourses = filteredCourses.slice(startIndex, startIndex + coursesPerPage);
        
        coursesGrid.innerHTML = '';
        
        if (paginatedCourses.length === 0) {
            coursesGrid.innerHTML = `
                <div style="grid-column: 1 / -1; text-align: center; padding: 2rem;">
                    <h3>No courses found</h3>
                    <p>Try adjusting your filters or search terms</p>
                </div>
            `;
            return;
        }
        
        paginatedCourses.forEach(course => {
            const courseCard = createCourseCard(course);
            coursesGrid.appendChild(courseCard);
        });
    }
    
    // Create course card HTML
    function createCourseCard(course) {
        const card = document.createElement('div');
        card.className = 'course-card';
        card.dataset.category = course.category;
        card.dataset.level = course.level;
        
        // Format price for display
        const price = course.price ? `$${(course.price / 100).toFixed(2)}` : 'Free';
        
        // Default thumbnail if none provided
        const thumbnail = course.thumbnail || 'https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&w=400&q=80';
        
        // Format views for display
        const views = course.views ? `${formatNumber(course.views)} views` : 'No views yet';
        
        // Format time for display
        const time = course.time ? `${course.time} minutes ago` : 'Recently added';
        
        card.innerHTML = `
            <div class="thumbnail-container">
                <img src="${thumbnail}" alt="${course.title}">
                <div class="thumbnail-overlay">
                    <h3>${course.title}</h3>
                    <p class="instructor">${course.instructor}</p>
                    <small>${views} • ${time}</small>
                </div>
            </div>
            <div class="course-meta">
                <span class="course-level ${course.level.toLowerCase()}">${course.level}</span>
                <span class="course-duration">${course.duration} minutes</span>
                <span class="course-lessons">${course.lessons} lessons</span>
            </div>
            <div class="course-footer">
                <span class="course-price">${price}</span>
                <a href="/admin/coursedetail/${course.id}" class="course-btn">View Course</a>
            </div>
        `;
        
        return card;
    }
    
    // Format large numbers with K/M suffixes
    function formatNumber(num) {
        if (num >= 1000000) {
            return (num / 1000000).toFixed(1) + 'M';
        }
        if (num >= 1000) {
            return (num / 1000).toFixed(1) + 'K';
        }
        return num;
    }
    
    // Filter courses based on selected filters
    function filterCourses() {
        const categoryValue = categoryFilter.value;
        const levelValue = levelFilter.value;
        const searchValue = searchInput.value.toLowerCase();
        
        return allCourses.filter(course => {
            const categoryMatch = categoryValue === 'all' || course.category === categoryValue;
            const levelMatch = levelValue === 'all' || course.level === levelValue;
            const searchMatch = course.title.toLowerCase().includes(searchValue) || 
                               course.instructor.toLowerCase().includes(searchValue);
            
            return categoryMatch && levelMatch && searchMatch;
        });
    }
    
    // Setup pagination
    function setupPagination() {
        const filteredCourses = filterCourses();
        const totalPages = Math.ceil(filteredCourses.length / coursesPerPage);
        
        if (totalPages <= 1) {
            pagination.style.display = 'none';
            return;
        }
        
        pagination.style.display = 'flex';
        
        // Update prev/next buttons
        prevPage.classList.toggle('disabled', currentPage === 1);
        nextPage.classList.toggle('disabled', currentPage === totalPages);
        
        // Generate page numbers
        pageNumbers.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement('a');
            pageLink.href = '#';
            pageLink.textContent = i;
            if (i === currentPage) {
                pageLink.classList.add('page-active');
            }
            pageLink.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = i;
                renderCourses();
                setupPagination();
            });
            pageNumbers.appendChild(pageLink);
        }
        
        // Add event listeners for prev/next buttons
        prevPage.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                renderCourses();
                setupPagination();
            }
        });
        
        nextPage.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                renderCourses();
                setupPagination();
            }
        });
    }
    
    // Event listeners for filters
    categoryFilter.addEventListener('change', () => {
        currentPage = 1;
        renderCourses();
        setupPagination();
    });
    
    levelFilter.addEventListener('change', () => {
        currentPage = 1;
        renderCourses();
        setupPagination();
    });
    
    searchBtn.addEventListener('click', () => {
        currentPage = 1;
        renderCourses();
        setupPagination();
    });
    
    searchInput.addEventListener('keyup', (e) => {
        if (e.key === 'Enter') {
            currentPage = 1;
            renderCourses();
            setupPagination();
        }
    });
    
    // Initial load
    loadCourses();
});
</script>
@endsection