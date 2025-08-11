<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <!-- resources/views/topbar.blade.php -->
<!-- resources/views/topbar.blade.php -->
<div style="background-color: #caddf5ff; padding: 8px 20px; display: flex; align-items: center; justify-content: space-between; color: white;">

    <!-- Social Icons -->
    <div style="display: flex; gap: 12px; align-items: center;">
        <!-- WhatsApp -->
        <a href="https://wa.me/1234567890" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; background-color: #25D366; border-radius: 50%; text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="16" height="16"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.472-.148-.67.15-.198.297-.767.966-.94 1.164-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.654-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.149-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51-.173-.007-.372-.009-.571-.009s-.52.074-.793.372c-.273.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.262.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.414.248-.694.248-1.288.173-1.414-.074-.124-.272-.198-.57-.347z"/><path d="M20.52 3.48A11.957 11.957 0 0012 0C5.373 0 0 5.373 0 12c0 2.118.553 4.152 1.602 5.94L0 24l6.207-1.627A11.94 11.94 0 0012 24c6.627 0 12-5.373 12-12a11.957 11.957 0 00-3.48-8.52zM12 22a9.94 9.94 0 01-5.209-1.44l-.373-.223-3.692.967.986-3.6-.242-.379A9.94 9.94 0 012 12c0-5.514 4.486-10 10-10s10 4.486 10 10-4.486 10-10 10z"/></svg>
        </a>

        <!-- Facebook -->
        <a href="https://facebook.com" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; background-color: #1877F2; border-radius: 50%; text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="14" height="14"><path d="M22.675 0H1.325C.593 0 0 .593 0 1.326v21.348C0 23.407.593 24 1.325 24H12.82v-9.293H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.464.099 2.795.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116C23.407 24 24 23.407 24 22.674V1.326C24 .593 23.407 0 22.675 0z"/></svg>
        </a>

        <!-- Instagram -->
        <a href="https://instagram.com" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; background-color: #E1306C; border-radius: 50%; text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="14" height="14"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.345 3.608 1.32.975.975 1.258 2.242 1.32 3.608.058 1.266.07 1.646.07 4.84s-.012 3.574-.07 4.84c-.062 1.366-.345 2.633-1.32 3.608-.975.975-2.242 1.258-3.608 1.32-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.345-3.608-1.32-.975-.975-1.258-2.242-1.32-3.608C2.175 15.574 2.163 15.194 2.163 12s.012-3.574.07-4.84c.062-1.366.345-2.633 1.32-3.608.975-.975 2.242-1.258 3.608-1.32C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.74 0 8.332.013 7.052.072 5.77.131 4.57.37 3.515 1.425 2.46 2.48 2.221 3.68 2.162 4.962.013 8.332 0 8.74 0 12c0 3.26.013 3.668.072 4.948.059 1.282.298 2.482 1.353 3.537 1.055 1.055 2.255 1.294 3.537 1.353C8.332 23.987 8.74 24 12 24s3.668-.013 4.948-.072c1.282-.059 2.482-.298 3.537-1.353 1.055-1.055 1.294-2.255 1.353-3.537.059-1.28.072-1.688.072-4.948s-.013-3.668-.072-4.948c-.059-1.282-.298-2.482-1.353-3.537C19.43 2.46 18.23 2.221 16.948 2.162 15.668 2.103 15.26 2.09 12 2.09z"/><circle cx="12" cy="12" r="3.5"/></svg>
        </a>

        <!-- LinkedIn -->
        <a href="https://linkedin.com" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; background-color: #0A66C2; border-radius: 50%; text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="14" height="14"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zM7.5 20h-3v-10h3v10zM6 8.64c-.966 0-1.75-.784-1.75-1.75S5.034 5.14 6 5.14c.965 0 1.75.784 1.75 1.75S6.965 8.64 6 8.64zM20 20h-3v-5.5c0-1.104-.896-2-2-2s-2 .896-2 2V20h-3v-10h3v1.262c.592-.868 1.641-1.262 2.738-1.262 2.071 0 3.262 1.492 3.262 3.477V20z"/></svg>
        </a>
    </div>

    <!-- Search Bar -->
    <form action="{{ url('/search') }}" method="GET" style="display: flex; align-items: center; background: white; border-radius: 20px; overflow: hidden; padding: 2px 5px;">
        <input type="text" name="q" placeholder="Search..." 
            style="border: none; outline: none; padding: 6px 10px; font-size: 0.9rem; flex: 1; min-width: 180px;">
        <button type="submit" 
            style="background-color: #f1f1edff; border: none; padding: 6px 12px; cursor: pointer; border-radius: 20px; font-weight: bold; color: #004aad;">
            🔍
        </button>
    </form>

</div>


</body>
</html>