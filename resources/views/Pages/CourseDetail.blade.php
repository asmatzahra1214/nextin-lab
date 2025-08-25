@extends('layouts.app')

@section('title', $course->title ?? 'Course Details')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
<style>
    /* Font Import */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    /* Base Typography */
    body {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 
                     Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: #2d3748;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: #f7fafc;
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
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .course-detail-container {
        margin-top: 2rem;
    }

    /* Course Header */
    .course-header {
        margin-bottom: 2rem;
        background: var(--white);
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
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

<div class="container">
    <div class="course-detail-container">
        <div class="course-header">
            <h1 class="course-title">{{ $course->title }}</h1>
            <div class="course-meta-header">
                <span class="course-level-badge {{ strtolower($course->level) }}">{{ $course->level }}</span>
                <span class="course-meta">Category: {{ $course->category }}</span>
                <span class="course-meta">{{ $course->views }} Views</span>
                <span class="course-meta">{{ $course->lessons }} Lessons</span>
            </div>
        </div>

        <div class="course-detail-content">
            <div class="course-main">
                @if ($course->thumbnail)
                    <div class="course-video">
                        <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }} Thumbnail">
                    </div>
                @endif

             <div class="course-description">
                    <h2>Course Description</h2>
                    <p>{!! $course->description !!}</p>
                </div>

                <div class="course-topics">
                    <h2>Course Topics</h2>
                    <div class="topics-list">
                        @php
                            $topics = collect(str_getcsv(strip_tags($course->topics), ','))->map(function ($topic, $index) {
                                return ['id' => $index + 1, 'title' => trim($topic), 'duration' => '30 min'];
                            });   
                        @endphp
                        @foreach ($topics as $topic)
                            <a href="#" class="topic-item">
                                <div class="topic-info">
                                    <span class="topic-number">{{ $topic['id'] }}</span>
                                    <h4>{{ $topic['title'] }}</h4>
                                </div>
                                <div class="topic-meta">
                                    <span class="topic-duration">{{ $topic['duration'] }}</span>
                                </div>
                            </a>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="course-sidebar">
                <div class="course-info-card">
                    <div class="pricing-section">
                        <span class="course-price">${{ number_format($course->price, 2) }}</span>
                    </div>
                    <button class="enroll-btn">Enroll Now</button>
                    <ul class="course-features">
                        <li><i class="fas fa-clock"></i> {{ $course->duration }} minutes</li>
                        <li><i class="fas fa-book"></i> {{ $course->lessons }} Lessons</li>
                        <li><i class="fas fa-level-up-alt"></i> {{ $course->level }}</li>
                        <li><i class="fas fa-folder"></i> {{ $course->category }}</li>
                        <li><i class="fas fa-eye"></i> {{ $course->views }} Views</li>
                        <li><i class="fas fa-calendar"></i> Created {{ $course->created_at->format('M d, Y') }}</li>
                    </ul>
                    <div class="instructor-info">
                        <h4>Instructor</h4>
                        <div class="instructor-details">
                            <img src="{{ asset('images/default-avatar.jpg') }}" alt="Instructor Avatar" class="instructor-avatar">
                            <div>
                                <h4>{{ $course->instructor }}</h4>
                                <p class="instructor-bio">Experienced instructor in {{ $course->category }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Format duration for display
    function formatDuration(minutes) {
        if (!minutes) return 'N/A';
        const hours = Math.floor(minutes / 60);
        const mins = minutes % 60;
        return hours > 0 ? (mins > 0 ? `${hours}h ${mins}m` : `${hours}h`) : `${mins}m`;
    }
</script>
@endsection
