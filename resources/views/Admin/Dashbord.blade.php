@extends('layouts.admin')

@section('content')
<div class="dashboard-container">
    <h1 class="dashboard-title">NextIn Lab Admin Dashboard</h1>
    
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card blue">
            <div class="icon-circle"><i class="fas fa-code"></i></div>
            <div class="stat-content">
                <h3>Total Projects</h3>
                <p class="stat-value">1,245</p>
                <p class="stat-change up">↑ 10% from last month</p>
            </div>
        </div>
        
        <div class="stat-card green">
            <div class="icon-circle"><i class="fas fa-file-alt"></i></div>
            <div class="stat-content">
                <h3>Total Templates</h3>
                <p class="stat-value">542</p>
                <p class="stat-change up">↑ 15% from last month</p>
            </div>
        </div>
        
        <div class="stat-card yellow">
            <div class="icon-circle"><i class="fas fa-chart-pie"></i></div>
            <div class="stat-content">
                <h3>Conversion Rate</h3>
                <p class="stat-value">3.8%</p>
                <p class="stat-change up">↑ 0.5% from last month</p>
            </div>
        </div>
        
        <div class="stat-card purple">
            <div class="icon-circle"><i class="fas fa-users"></i></div>
            <div class="stat-content">
                <h3>Total Users</h3>
                <p class="stat-value">5,678</p>
                <p class="stat-change up">↑ 12% from last month</p>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="section-card">
        <h2 class="section-title"><i class="fas fa-history"></i> Recent Activities</h2>
        <div class="overflow-x-auto">
            <table class="activities-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="user-cell">
                            <div class="user-avatar"></div>
                            <div>
                                <p class="user-name">John Doe</p>
                                <p class="user-email">john@example.com</p>
                            </div>
                        </td>
                        <td>Downloaded Template</td>
                        <td>May 16, 2025</td>
                        <td><span class="status delivered">Completed</span></td>
                    </tr>
                    <tr>
                        <td class="user-cell">
                            <div class="user-avatar"></div>
                            <div>
                                <p class="user-name">Jane Smith</p>
                                <p class="user-email">jane@example.com</p>
                            </div>
                        </td>
                        <td>Enrolled in Course</td>
                        <td>May 15, 2025</td>
                        <td><span class="status delivered">Completed</span></td>
                    </tr>
                    <tr>
                        <td class="user-cell">
                            <div class="user-avatar"></div>
                            <div>
                                <p class="user-name">Alice Johnson</p>
                                <p class="user-email">alice@example.com</p>
                            </div>
                        </td>
                        <td>Uploaded Project</td>
                        <td>May 14, 2025</td>
                        <td><span class="status delivered">Completed</span></td>
                    </tr>
                    <tr>
                        <td class="user-cell">
                            <div class="user-avatar"></div>
                            <div>
                                <p class="user-name">Bob Brown</p>
                                <p class="user-email">bob@example.com</p>
                            </div>
                        </td>
                        <td>Viewed Code Lab</td>
                        <td>May 13, 2025</td>
                        <td><span class="status delivered">Completed</span></td>
                    </tr>
                    <tr>
                        <td class="user-cell">
                            <div class="user-avatar"></div>
                            <div>
                                <p class="user-name">Charlie Davis</p>
                                <p class="user-email">charlie@example.com</p>
                            </div>
                        </td>
                        <td>Downloaded Project</td>
                        <td>May 12, 2025</td>
                        <td><span class="status delivered">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
    }

    .dashboard-title {
        font-size: 2rem; /* Decreased text size */
        font-weight: 700;
        color: #1a2e44;
        text-align: center;
        margin-bottom: 40px;
        border-bottom: 3px solid #e0e7ff;
        padding-bottom: 15px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Smaller card size */
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: #ffffff;
        border-radius: 10px;
        padding: 20px; /* Reduced padding for smaller size */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        align-items: center;
        height: 140px; /* Reduced height for smaller cards */
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .stat-card.blue { background: #dbeafe; border-left: 5px solid #3b82f6; }
    .stat-card.green { background: #d1fae5; border-left: 5px solid #10b981; }
    .stat-card.yellow { background: #fefcbf; border-left: 5px solid #f59e0b; }
    .stat-card.purple { background: #e9d5ff; border-left: 5px solid #8b5cf6; }

    .icon-circle {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #1a2e44;
    }

    .stat-content {
        margin-left: 15px;
    }

    .stat-content h3 {
        font-size: 0.9rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 5px;
    }

    .stat-value {
        font-size: 1.8rem; /* Reduced font size for smaller cards */
        font-weight: 600;
        color: #1a2e44;
    }

    .stat-change {
        font-size: 0.8rem;
        margin-top: 5px;
    }

    .stat-change.up {
        color: #10b981;
    }

    .section-card {
        background: #ffffff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 40px;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a2e44;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .section-title i {
        margin-right: 10px;
        color: #3b82f6;
    }

    .activities-table {
        width: 100%;
        border-collapse: collapse;
    }

    .activities-table th, .activities-table td {
        padding: 12px;
        text-align: left;
        font-size: 0.95rem;
        color: #1a2e44;
    }

    .activities-table th {
        background: #f1f5f9;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
    }

    .activities-table td {
        border-bottom: 1px solid #e0e7ff;
    }

    .user-cell {
        display: flex;
        align-items: center;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        background: #e2e8f0;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-name {
        font-weight: 500;
        color: #1a2e44;
    }

    .user-email {
        font-size: 0.8rem;
        color: #64748b;
    }

    .status {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status.delivered {
        background: #d1fae5;
        color: #10b981;
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 20px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .stat-card {
            height: 130px; /* Adjusted for mobile */
            padding: 15px;
        }

        .icon-circle {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }

        .stat-content h3 {
            font-size: 0.8rem;
        }

        .stat-value {
            font-size: 1.5rem;
        }

        .section-title {
            font-size: 1.3rem;
        }

        .activities-table {
            font-size: 0.9rem;
        }

        .activities-table th, .activities-table td {
            padding: 8px;
        }
    }
</style>
@endsection