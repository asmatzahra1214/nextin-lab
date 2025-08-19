@extends('layouts.app')

@section('title', $course['title'] ?? 'Course Details')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
<div class="container">
    <div class="course-detail-container">
        <!-- Dynamic Course Title -->
        <div class="course-header">
            <h1 class="course-title">{{ $course['title'] ?? 'Course Title' }}</h1>
            <div class="course-meta-header">
                <span class="course-level-badge {{ $course['level'] ?? 'intermediate' }}">
                    {{ ucfirst($course['level'] ?? 'Intermediate') }}
                </span>
                <span class="course-rating">
                    <i class="fas fa-star"></i> 4.8 (1.2K reviews)
                </span>
            </div>
        </div>

        <div class="course-detail-content">
            <div class="course-main">
                <div class="course-video">
                    <img src="{{ $course['thumbnail'] ?? 'https://via.placeholder.com/800x450' }}" alt="{{ $course['title'] ?? 'Course' }} Thumbnail">
                </div>
                
                <div class="course-description">
                    <h2>About This Course</h2>
                    <p>{{ $course['description'] ?? 'This comprehensive course will teach you everything you need to know about...' }}</p>
                    
                    <!-- Course Topics Section -->
                    <div class="course-topics">
                        <h3>Course Curriculum</h3>
                        <div class="topics-list">
                            @foreach($course['topics'] ?? [
                                ['id' => 1, 'title' => 'Introduction to HTML', 'duration' => '45 min'],
                                ['id' => 2, 'title' => 'CSS Fundamentals', 'duration' => '1 hour'],
                                ['id' => 3, 'title' => 'JavaScript Basics', 'duration' => '1.5 hours'],
                                ['id' => 4, 'title' => 'Responsive Design', 'duration' => '1 hour'],
                                ['id' => 5, 'title' => 'Project: Build a Portfolio', 'duration' => '2 hours']
                            ] as $topic)
                            <a href="{{ route('course.content', ['courseId' => $course['id'] ?? 1, 'topicId' => $topic['id']]) }}" class="topic-item">
                                <div class="topic-info">
                                    <span class="topic-number">{{ $loop->iteration }}</span>
                                    <h4 class="topic-title">{{ $topic['title'] }}</h4>
                                </div>
                                <div class="topic-meta">
                                    <span class="topic-duration">{{ $topic['duration'] }}</span>
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="course-sidebar">
                <div class="course-info-card">
                    <div class="pricing-section">
                        <span class="course-price">{{ $course['price'] ?? '$49.99' }}</span>
                        @if(isset($course['original_price']))
                        <span class="original-price">{{ $course['original_price'] }}</span>
                        @endif
                    </div>
                    <button class="enroll-btn">Enroll Now</button>
                    
                    <h3>This Course Includes</h3>
                    <ul class="course-features">
                        <li><i class="fas fa-video"></i> {{ $course['duration'] ?? '10 hours' }} on-demand video</li>
                        <li><i class="fas fa-file-alt"></i> {{ $course['lessons'] ?? count($course['topics'] ?? []) }} lessons</li>
                        <li><i class="fas fa-download"></i> Downloadable resources</li>
                        <li><i class="fas fa-certificate"></i> Certificate of completion</li>
                    </ul>
                    
                    <div class="instructor-info">
                        <h3>Instructor</h3>
                        <div class="instructor-details">
                            <img src="{{ $course['instructor_avatar'] ?? 'https://via.placeholder.com/80' }}" alt="{{ $course['instructor'] ?? 'Instructor' }}" class="instructor-avatar">
                            <div>
                                <h4>{{ $course['instructor'] ?? 'John Doe' }}</h4>
                                <p class="instructor-bio">{{ $course['instructor_bio'] ?? 'Senior Developer with 10+ years of experience' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Resources Section -->
                    <div class="resources-section">
                        <h4>Resources</h4>
                        <ul>
                            <li><a href="#"><i class="fas fa-file-pdf"></i> Course Slides</a></li>
                            <li><a href="#"><i class="fas fa-file-code"></i> Source Code</a></li>
                            <li><a href="#"><i class="fas fa-book"></i> Reading Materials</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Font Import */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

/* Base Typography */
body {
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 
                 Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color: #2d3748;
    line-height: 1.6;
}

/* Color Variables */
:root {
    --primary: #00695C;
    --primary-dark: #004D40;
    --primary-light: #B2DFDB;
    --text-dark: #2d3748;
    --text-medium: #4a5568;
    --text-light: #718096;
    --background: #f7fafc;
    --white: #ffffff;
    --gray-light: #edf2f7;
    --gray-medium: #e2e8f0;
    --accent: #4299e1;
    --success: #10b981;
    --warning: #f59e0b;
}

/* Container Styles */
.course-detail-container {
    margin-top: 2rem;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}

/* Course Header */
.course-header {
    margin-bottom: 2rem;
}

.course-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
    line-height: 1.2;
}

.course-meta-header {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.course-level-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: capitalize;
}

.course-level-badge.beginner {
    background-color: #e6f6f4;
    color: var(--primary);
}

.course-level-badge.intermediate {
    background-color: #e6f0f6;
    color: #1a56a8;
}

.course-level-badge.advanced {
    background-color: #f6e6f6;
    color: #8e1aa8;
}

.course-rating {
    color: var(--warning);
    font-weight: 500;
}

.course-rating i {
    margin-right: 0.25rem;
}

/* Main Content Area */
.course-detail-content {
    display: flex;
    gap: 2.5rem;
}

.course-main {
    flex: 2;
}

.course-video img {
    width: 100%;
    border-radius: 12px;
    margin-bottom: 2rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

/* Typography */
h2 {
    font-size: 1.75rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1.25rem;
}

h3 {
    font-size: 1.4rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1.25rem;
}

h4 {
    font-size: 1.1rem;
    font-weight: 500;
    color: var(--text-dark);
    margin: 0;
}

/* Course Description */
.course-description p {
    font-size: 1.05rem;
    line-height: 1.7;
    color: var(--text-medium);
    margin-bottom: 2rem;
}

/* Topics Section */
.course-topics {
    margin-top: 3rem;
}

.topics-list {
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid var(--gray-medium);
}

.topic-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.25rem 1.75rem;
    background: var(--white);
    border-bottom: 1px solid var(--gray-medium);
    text-decoration: none;
    color: var(--text-dark);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.topic-item:hover {
    background: var(--gray-light);
    transform: translateX(8px);
    box-shadow: 4px 0 0 0 var(--primary);
}

.topic-info {
    display: flex;
    align-items: center;
    gap: 1.25rem;
}

.topic-number {
    background: var(--primary);
    color: var(--white);
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.topic-meta {
    display: flex;
    align-items: center;
    gap: 1.25rem;
}

.topic-duration {
    color: var(--text-light);
    font-size: 0.9rem;
    font-weight: 400;
}

/* Sidebar Styles */
.course-sidebar {
    flex: 1;
    position: sticky;
    top: 2rem;
    align-self: flex-start;
}

.course-info-card {
    background: var(--white);
    padding: 1.75rem;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border: 1px solid var(--gray-medium);
}

/* Pricing Section */
.pricing-section {
    margin-bottom: 1.5rem;
}

.course-price {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-dark);
}

.original-price {
    font-size: 1.2rem;
    text-decoration: line-through;
    color: var(--text-light);
    margin-left: 0.75rem;
}

/* Buttons */
.enroll-btn {
    background: var(--primary);
    color: var(--white);
    border: none;
    padding: 1rem 1.5rem;
    border-radius: 8px;
    width: 100%;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 105, 92, 0.2);
}

.enroll-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 105, 92, 0.3);
}

/* Course Features */
.course-features {
    list-style: none;
    padding: 0;
    margin-bottom: 2.5rem;
}

.course-features li {
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.95rem;
}

.course-features i {
    color: var(--primary);
    width: 20px;
    text-align: center;
}

/* Instructor Info */
.instructor-info {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid var(--gray-medium);
}

.instructor-details {
    display: flex;
    gap: 1rem;
    align-items: center;
    margin-top: 1rem;
}

.instructor-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
}

.instructor-bio {
    font-size: 0.9rem;
    color: var(--text-medium);
    margin-top: 0.25rem;
}

/* Resources Section */
.resources-section {
    margin-top: 2.5rem;
    padding-top: 1.75rem;
    border-top: 1px solid var(--gray-medium);
}

.resources-section h4 {
    font-size: 1.2rem;
    margin-bottom: 1.25rem;
    color: var(--text-dark);
}

.resources-section ul {
    list-style: none;
    padding: 0;
}

.resources-section li {
    margin-bottom: 0.75rem;
}

.resources-section a {
    color: var(--text-medium);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    transition: color 0.3s ease;
    font-size: 0.95rem;
    padding: 0.5rem 0;
}

.resources-section a:hover {
    color: var(--primary);
}

.resources-section i {
    width: 24px;
    text-align: center;
    color: var(--primary);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .course-detail-content {
        gap: 1.5rem;
    }
    
    .course-title {
        font-size: 2.2rem;
    }
}

@media (max-width: 768px) {
    .course-detail-content {
        flex-direction: column;
    }
    
    .course-sidebar {
        position: static;
        margin-top: 2.5rem;
    }
    
    .course-title {
        font-size: 2rem;
    }
    
    .course-meta-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .topic-item {
        padding: 1rem 1.25rem;
    }
}

@media (max-width: 480px) {
    .course-title {
        font-size: 1.8rem;
    }
    
    .topic-info {
        gap: 0.75rem;
    }
    
    .topic-meta {
        gap: 0.75rem;
    }
    
    .course-info-card {
        padding: 1.25rem;
    }
    
    .instructor-details {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add active class to current topic if needed
    const urlParams = new URLSearchParams(window.location.search);
    const topicId = urlParams.get('topicId');
    
    if (topicId) {
        document.querySelectorAll('.topic-item').forEach(item => {
            item.classList.remove('active-topic');
            if (item.getAttribute('href').includes(`topicId=${topicId}`)) {
                item.classList.add('active-topic');
                item.style.background = '#f0fdf4';
                item.style.borderLeft = '4px solid var(--success)';
            }
        });
    }
    
    // Enrollment button click handler
    const enrollBtn = document.querySelector('.enroll-btn');
    if (enrollBtn) {
        enrollBtn.addEventListener('click', function() {
            alert('Enrollment functionality will be implemented here!');
            // In a real app, you would redirect to checkout or add to cart
        });
    }
});
</script>
@endsection