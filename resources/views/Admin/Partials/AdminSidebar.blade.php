<div class="sidebar p-4 ">
    <div class="text-xl font-bold mb-8">Admin Panel</div>
    
    <nav>
        <ul class="space-y-2">
            <li>
                <a href="/admin" class="flex items-center p-3 rounded hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.course') }}" class="flex items-center p-3 rounded hover:bg-gray-700">
                 <i class="fas fa-book mr-3"></i>
                  Course
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 rounded hover:bg-gray-700">
                    <i class="fas fa-users mr-3"></i>
                    Users
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 rounded hover:bg-gray-700">
                    <i class="fas fa-cog mr-3"></i>
                    Settings
                </a>
            </li>
        </ul>
    </nav>
</div>