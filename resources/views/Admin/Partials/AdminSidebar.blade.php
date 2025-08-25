
<div class="sidebar p-4 font-poppins bg-green-900 text-white">
    <h1 class="text-3xl font-extrabold mb-6 text-white">Admin Panel</h1>
    
    <nav>
        <ul class="space-y-2">
            <li>
                <a href="/admin" class="flex items-center p-3 rounded hover:bg-green-800 transition-colors text-sm">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.courses') }}" class="flex items-center p-3 rounded hover:bg-green-800 transition-colors text-sm">
                    <i class="fas fa-book mr-3"></i>
                    Courses
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects') }}" class="flex items-center p-3 rounded hover:bg-green-800 transition-colors text-sm">
                    <i class="fas fa-book mr-3"></i>
                    Projects
                </a>
            </li>
              <li>
                <a href="{{ route('admin.templates') }}" class="flex items-center p-3 rounded hover:bg-green-800 transition-colors text-sm">
                    <i class="fas fa-book mr-3"></i>
                    Templates
                </a>
            </li>
              <li>
                <a href="{{ route('admin.lab') }}" class="flex items-center p-3 rounded hover:bg-green-800 transition-colors text-sm">
                    <i class="fas fa-book mr-3"></i>
                    Code Lab
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 rounded hover:bg-green-800 transition-colors text-sm">
                    <i class="fas fa-users mr-3"></i>
                    Users
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 rounded hover:bg-green-800 transition-colors text-sm">
                    <i class="fas fa-cog mr-3"></i>
                    Settings
                </a>
            </li>
        </ul>
    </nav>
</div>

<style>
    @media (max-width: 768px) {
        .sidebar {
            padding: 1rem;
        }
        .text-3xl.font-extrabold {
            font-size: 1.5rem; /* text-2xl */
        }
        .text-sm {
            font-size: 0.875rem;
        }
    }
</style>
