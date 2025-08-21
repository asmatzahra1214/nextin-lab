@extends('layouts.admin')

@section('content')


<style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 1000px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    h1 {
      color: #00695C;
      margin-bottom: 25px;
      font-weight: 600;
      border-bottom: 2px solid #e0e0e0;
      padding-bottom: 10px;
    }
    .form-container {
      background: #f9f9f9;
      padding: 25px;
      border-radius: 8px;
      margin-bottom: 30px;
      border: 1px solid #e0e0e0;
    }
    .form-header {
      font-size: 1.2rem;
      color: #00695C;
      margin-bottom: 20px;
      font-weight: 500;
    }
    .form-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
      margin-bottom: 15px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 500;
      color: #555;
    }
    .form-control {
      width: 100%;
      padding: 10px 12px;
      font-size: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      transition: border-color 0.3s;
    }
    .form-control:focus {
      outline: none;
      border-color: #00695C;
      box-shadow: 0 0 0 2px rgba(0,105,92,0.1);
    }
    textarea.form-control {
      min-height: 80px;
      resize: vertical;
    }
    .file-upload {
      grid-column: span 2;
      margin-top: 10px;
    }
    .file-upload-label {
      display: block;
      margin-bottom: 5px;
    }
    .image-preview {
      margin-top: 10px;
      max-width: 200px;
      max-height: 150px;
      border-radius: 4px;
      display: none;
    }
    .submit-btn {
      background: #00695C;
      color: white;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      transition: background 0.3s;
      grid-column: span 2;
      margin-top: 10px;
    }
    .submit-btn:hover {
      background: #004D40;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }
    th {
      background: #35978d;
      color: white;
      font-weight: 500;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    .actions {
      white-space: nowrap;
    }
    .actions button {
      margin-right: 5px;
      padding: 6px 12px;
      font-size: 14px;
      border-radius: 3px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .edit {
      background: #FF8A65;
      color: white;
      border: none;
    }
    .edit:hover {
      background: #f57c55;
    }
    .delete {
      background: #dc3545;
      color: white;
      border: none;
    }
    .delete:hover {
      background: #c82333;
    }
    .course-thumbnail {
      width: 100px;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .course-details {
      line-height: 1.5;
    }
    .course-details strong {
      font-size: 1.1rem;
      color: #333;
    }
    select.form-control {
      appearance: none;
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 1em;
    }
</style>
<div class="container">
    <h1>Courses Management</h1>

    <div class="form-container">
        <div class="form-header">Add New Course</div>
        <form id="courseForm" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="title">Course Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter course title" required>
                </div>
                
                <div class="form-group">
                    <label for="instructor">Instructor</label>
                    <input type="text" id="instructor" name="instructor" class="form-control" placeholder="Enter instructor name" required>
                </div>
                
                <div class="form-group">
                    <label for="views">Views</label>
                    <input type="text" id="views" name="views" class="form-control" placeholder="e.g. 3.8K views">
                </div>
                
                <div class="form-group">
                    <label for="time">Published</label>
                    <input type="text" id="time" name="time" class="form-control" placeholder="e.g. 2 weeks ago">
                </div>
                
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <option value="Frontend">Frontend</option>
                        <option value="Backend">Backend</option>
                        <option value="Full Stack">Full Stack</option>
                        <option value="Framework">Framework</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="level">Level</label>
                    <select id="level" name="level" class="form-control" required>
                        <option value="">Select Level</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" id="duration" name="duration" class="form-control" placeholder="e.g. 8 hours">
                </div>
                
                <div class="form-group">
                    <label for="lessons">Lessons</label>
                    <input type="number" id="lessons" name="lessons" class="form-control" placeholder="e.g. 32">
                </div>
                
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" class="form-control" placeholder="e.g. $24.99">
                </div>
                
                <div class="form-group file-upload">
                    <label for="thumbnail" class="file-upload-label">Course Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*">
                </div>
            </div>
            
            <button type="submit" class="submit-btn">Save Course</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="coursesList"></tbody>
    </table>
</div>
@endsection