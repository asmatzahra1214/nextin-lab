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
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .add-course-btn {
      background: #00695C;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .add-course-btn:hover {
      background: #004D40;
    }
    .form-container {
      background: #f9f9f9;
      padding: 25px;
      border-radius: 8px;
      margin-bottom: 30px;
      border: 1px solid #e0e0e0;
      display: none;
    }
    .form-header {
      font-size: 1.2rem;
      color: #00695C;
      margin-bottom: 20px;
      font-weight: 500;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .close-form {
      background: #dc3545;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 3px;
      cursor: pointer;
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
    .course-details ol {
      margin: 0;
      padding-left: 20px;
    }
    .course-details li {
      margin-bottom: 5px;
    }
    select.form-control {
      appearance: none;
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 1em;
    }
    .editor-container {
      grid-column: span 2;
      margin-bottom: 15px;
    }
    .editor-toolbar {
      border: 1px solid #ddd;
      border-bottom: none;
      border-radius: 4px 4px 0 0;
      padding: 8px;
      background: #f8f9fa;
      display: flex;
      flex-wrap: wrap;
      gap: 4px;
    }
    .editor-toolbar button {
      background: white;
      border: 1px solid #ddd;
      border-radius: 3px;
      padding: 5px 8px;
      cursor: pointer;
      font-size: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      min-width: 30px;
      height: 30px;
    }
    .editor-toolbar button:hover {
      background: #f0f0f0;
    }
    .editor-toolbar select {
      padding: 4px;
      border: 1px solid #ddd;
      border-radius: 3px;
      background: white;
    }
    .editor-content {
      min-height: 200px;
      border: 1px solid #ddd;
      border-radius: 0 0 4px 4px;
      padding: 12px;
      font-family: inherit;
      overflow-y: auto;
    }
    .editor-content:focus {
      outline: none;
      border-color: #00695C;
      box-shadow: 0 0 0 2px rgba(0,105,92,0.1);
    }
    .editor-content ol {
      margin: 0;
      padding-left: 20px;
    }
    .editor-content li {
      margin-bottom: 5px;
    }
    .color-picker {
      position: relative;
      display: inline-block;
    }
    .color-options {
      position: absolute;
      top: 100%;
      left: 0;
      background: white;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 8px;
      display: grid;
      grid-template-columns: repeat(8, 1fr);
      gap: 4px;
      z-index: 10;
      display: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .color-option {
      width: 20px;
      height: 20px;
      border-radius: 3px;
      cursor: pointer;
      border: 1px solid #eee;
    }
    .color-option:hover {
      transform: scale(1.1);
    }
    .show-color-options {
      display: grid !important;
    }
    .alert {
      padding: 12px 15px;
      border-radius: 4px;
      margin-bottom: 20px;
      display: none;
    }
    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
</style>

<div class="container">
    <h1>
        Courses Management
        <button class="add-course-btn" onclick="toggleCourseForm()">Add New Course</button>
    </h1>

    <!-- Success Message Alert -->
    <div id="successAlert" class="alert alert-success"></div>

    <!-- Course Form (Initially Hidden) -->
    <div class="form-container" id="courseFormContainer">
        <div class="form-header">
            Add New Course
            <button class="close-form" onclick="toggleCourseForm()">Close</button>
        </div>
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
                
                <!-- Enhanced Description Field with Rich Text Editor -->
                <div class="editor-container">
                    <label for="description">Course Description</label>
                    <div class="editor-toolbar" id="descriptionToolbar">
                        <select onchange="formatText('description', 'formatBlock', this.value)">
                            <option value="p">Paragraph</option>
                            <option value="h1">Heading 1</option>
                            <option value="h2">Heading 2</option>
                            <option value="h3">Heading 3</option>
                            <option value="h4">Heading 4</option>
                            <option value="blockquote">Quote</option>
                        </select>
                        <select onchange="formatText('description', 'fontName', this.value)">
                            <option value="Arial">Arial</option>
                            <option value="Helvetica">Helvetica</option>
                            <option value="Times New Roman">Times New Roman</option>
                            <option value="Courier New">Courier New</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Verdanaස</option>
                        </select>
                        <select onchange="formatText('description', 'fontSize', this.value)">
                            <option value="1">Small</option>
                            <option value="2">Normal</option>
                            <option value="3">Large</option>
                            <option value="4">X-Large</option>
                            <option value="5">XX-Large</option>
                        </select>
                        <button type="button" onclick="formatText('description', 'bold')" title="Bold"><strong>B</strong></button>
                        <button type="button" onclick="formatText('description', 'italic')" title="Italic"><em>I</em></button>
                        <button type="button" onclick="formatText('description', 'underline')" title="Underline"><u>U</u></button>
                        <button type="button" onclick="formatText('description', 'strikeThrough')" title="Strikethrough"><s>S</s></button>
                        <button type="button" onclick="formatText('description', 'justifyLeft')" title="Align Left">↖</button>
                        <button type="button" onclick="formatText('description', 'justifyCenter')" title="Align Center">↔</button>
                        <button type="button" onclick="formatText('description', 'justifyRight')" title="Align Right">↗</button>
                        <button type="button" onclick="formatText('description', 'justifyFull')" title="Justify">≡</button>
                        <button type="button" onclick="formatText('description', 'insertUnorderedList')" title="Bullet List">•</button>
                        <button type="button" onclick="formatText('description', 'insertOrderedList')" title="Numbered List">1.</button>
                        <button type="button" onclick="formatText('description', 'outdent')" title="Outdent">←</button>
                        <button type="button" onclick="formatText('description', 'indent')" title="Indent">→</button>
                        <div class="color-picker">
                            <button type="button" onclick="toggleColorOptions('foreColorOptions')" title="Text Color">A</button>
                            <div id="foreColorOptions" class="color-options">
                                <div class="color-option" style="background-color: #000000;" onclick="setColor('description', 'foreColor', '#000000')"></div>
                                <div class="color-option" style="background-color: #FF0000;" onclick="setColor('description', 'foreColor', '#FF0000')"></div>
                                <div class="color-option" style="background-color: #00FF00;" onclick="setColor('description', 'foreColor', '#00FF00')"></div>
                                <div class="color-option" style="background-color: #0000FF;" onclick="setColor('description', 'foreColor', '#0000FF')"></div>
                                <div class="color-option" style="background-color: #FFFF00;" onclick="setColor('description', 'foreColor', '#FFFF00')"></div>
                                <div class="color-option" style="background-color: #FF00FF;" onclick="setColor('description', 'foreColor', '#FF00FF')"></div>
                                <div class="color-option" style="background-color: #00FFFF;" onclick="setColor('description', 'foreColor', '#00FFFF')"></div>
                                <div class="color-option" style="background-color: #FFFFFF; border: 1px solid #ccc;" onclick="setColor('description', 'foreColor', '#FFFFFF')"></div>
                            </div>
                        </div>
                        <div class="color-picker">
                            <button type="button" onclick="toggleColorOptions('backColorOptions')" title="Background Color">BG</button>
                            <div id="backColorOptions" class="color-options">
                                <div class="color-option" style="background-color: #FFCCCB;" onclick="setColor('description', 'backColor', '#FFCCCB')"></div>
                                <div class="color-option" style="background-color: #ADD8E6;" onclick="setColor('description', 'backColor', '#ADD8E6')"></div>
                                <div class="color-option" style="background-color: #90EE90;" onclick="setColor('description', 'backColor', '#90EE90')"></div>
                                <div class="color-option" style="background-color: #FFFFE0;" onclick="setColor('description', 'backColor', '#FFFFE0')"></div>
                                <div class="color-option" style="background-color: #E6E6FA;" onclick="setColor('description', 'backColor', '#E6E6FA')"></div>
                                <div class="color-option" style="background-color: #FFD700;" onclick="setColor('description', 'backColor', '#FFD700')"></div>
                                <div class="color-option" style="background-color: #FFB6C1;" onclick="setColor('description', 'backColor', '#FFB6C1')"></div>
                                <div class="color-option" style="background-color: #FFFFFF; border: 1px solid #ccc;" onclick="setColor('description', 'backColor', '#FFFFFF')"></div>
                            </div>
                        </div>
                        <button type="button" onclick="formatText('description', 'removeFormat')" title="Remove Formatting">Clear</button>
                        <button type="button" onclick="formatText('description', 'undo')" title="Undo">↶</button>
                        <button type="button" onclick="formatText('description', 'redo')" title="Redo">↷</button>
                    </div>
                    <div 
                        id="description" 
                        class="editor-content" 
                        contenteditable="true"
                        oninput="updateHiddenInput('description', 'hiddenDescription')"
                    ></div>
                    <input type="hidden" id="hiddenDescription" name="description">
                </div>
                
                <!-- Enhanced Topics Field with Rich Text Editor -->
                <div class="editor-container">
                    <label for="topics">Course Topics (enter one per line or comma-separated, displayed as numbered list)</label>
                    <div class="editor-toolbar" id="topicsToolbar">
                        <button type="button" onclick="formatText('topics', 'bold')" title="Bold"><strong>B</strong></button>
                        <button type="button" onclick="formatText('topics', 'italic')" title="Italic"><em>I</em></button>
                        <button type="button" onclick="formatText('topics', 'underline')" title="Underline"><u>U</u></button>
                        <button type="button" onclick="formatText('topics', 'insertUnorderedList')" title="Bullet List">•</button>
                        <button type="button" onclick="formatText('topics', 'insertOrderedList')" title="Numbered List">1.</button>
                        <button type="button" onclick="addNumberedTopic()" title="Add Numbered Topic">+1</button>
                        <div class="color-picker">
                            <button type="button" onclick="toggleColorOptions('topicsForeColorOptions')" title="Text Color">A</button>
                            <div id="topicsForeColorOptions" class="color-options">
                                <div class="color-option" style="background-color: #000000;" onclick="setColor('topics', 'foreColor', '#000000')"></div>
                                <div class="color-option" style="background-color: #FF0000;" onclick="setColor('topics', 'foreColor', '#FF0000')"></div>
                                <div class="color-option" style="background-color: #00FF00;" onclick="setColor('topics', 'foreColor', '#00FF00')"></div>
                                <div class="color-option" style="background-color: #0000FF;" onclick="setColor('topics', 'foreColor', '#0000FF')"></div>
                                <div class="color-option" style="background-color: #FFFF00;" onclick="setColor('topics', 'foreColor', '#FFFF00')"></div>
                                <div class="color-option" style="background-color: #FF00FF;" onclick="setColor('topics', 'foreColor', '#FF00FF')"></div>
                                <div class="color-option" style="background-color: #00FFFF;" onclick="setColor('topics', 'foreColor', '#00FFFF')"></div>
                                <div class="color-option" style="background-color: #FFFFFF; border: 1px solid #ccc;" onclick="setColor('topics', 'foreColor', '#FFFFFF')"></div>
                            </div>
                        </div>
                    </div>
                    <div 
                        id="topics" 
                        class="editor-content" 
                        contenteditable="true"
                        oninput="processTopicsInput()"
                    ></div>
                    <input type="hidden" id="hiddenTopics" name="topics">
                </div>
                
                <div class="form-group">
                    <label for="views">Views</label>
                    <input type="number" id="views" name="views" class="form-control" placeholder="e.g. 3800">
                </div>
                
                <div class="form-group">
                    <label for="time">Time (minutes)</label>
                    <input type="number" id="time" name="time" class="form-control" placeholder="e.g. 120">
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
                    <label for="duration">Duration (minutes)</label>
                    <input type="number" id="duration" name="duration" class="form-control" placeholder="e.g. 480">
                </div>
                
                <div class="form-group">
                    <label for="lessons">Lessons</label>
                    <input type="number" id="lessons" name="lessons" class="form-control" placeholder="e.g. 32">
                </div>
                
                <div class="form-group">
                    <label for="price">Price (in cents)</label>
                    <input type="number" id="price" name="price" class="form-control" placeholder="e.g. 2499 for $24.99">
                </div>
                
                <div class="form-group file-upload">
                    <label for="thumbnail" class="file-upload-label">Course Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*">
                </div>
            </div>
            
            <button type="submit" class="submit-btn">Save Course</button>
        </form>
    </div>

    <!-- Courses Table -->
    <table>
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="coursesList">
            <!-- Courses will be loaded here via JavaScript -->
        </tbody>
    </table>
</div>

<script>
    // Toggle course form visibility
    function toggleCourseForm() {
        const formContainer = document.getElementById('courseFormContainer');
        formContainer.style.display = formContainer.style.display === 'none' || formContainer.style.display === '' ? 'block' : 'none';
    }

    // Text formatting functions
    function formatText(editorId, command, value = null) {
        const editor = document.getElementById(editorId);
        editor.focus();
        document.execCommand(command, false, value);
        if (editorId === 'topics') {
            updateHiddenInput('topics', 'hiddenTopics');
        }
    }
    
    // Add a new numbered topic
    function addNumberedTopic() {
        const editor = document.getElementById('topics');
        editor.focus();
        
        const selection = window.getSelection();
        const range = selection.getRangeAt(0);
        const parent = range.commonAncestorContainer;
        const isInOrderedList = parent.closest && (parent.closest('ol') || parent.nodeName === 'OL');
        
        if (!isInOrderedList) {
            document.execCommand('insertOrderedList', false, null);
        }
        
        document.execCommand('insertHTML', false, '<li>New Topic</li>');
        updateHiddenInput('topics', 'hiddenTopics');
    }
    
    // Process topics input to create numbered list
    function processTopicsInput() {
        const editor = document.getElementById('topics');
        const text = editor.innerText.trim();
        
        // Split by new lines or commas
        const topics = text.split(/[\n,]+/).map(topic => topic.trim()).filter(topic => topic !== '');
        
        if (topics.length > 0) {
            let html = '<ol>';
            topics.forEach(topic => {
                html += `<li>${topic}</li>`;
            });
            html += '</ol>';
            editor.innerHTML = html;
        } else {
            editor.innerHTML = '';
        }
        
        updateHiddenInput('topics', 'hiddenTopics');
    }
    
    // Set color for text or background
    function setColor(editorId, command, color) {
        const editor = document.getElementById(editorId);
        editor.focus();
        document.execCommand(command, false, color);
        hideAllColorOptions();
        if (editorId === 'topics') {
            updateHiddenInput('topics', 'hiddenTopics');
        }
    }
    
    // Toggle color options visibility
    function toggleColorOptions(optionsId) {
        hideAllColorOptions();
        const options = document.getElementById(optionsId);
        options.classList.toggle('show-color-options');
    }
    
    // Hide all color options
    function hideAllColorOptions() {
        const allOptions = document.querySelectorAll('.color-options');
        allOptions.forEach(option => {
            option.classList.remove('show-color-options');
        });
    }
    
    // Update hidden input with editor content
    function updateHiddenInput(editorId, hiddenInputId) {
        const editor = document.getElementById(editorId);
        const hiddenInput = document.getElementById(hiddenInputId);
        hiddenInput.value = editor.innerHTML;
    }
    
    // Form submission handler
    document.getElementById('courseForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        updateHiddenInput('description', 'hiddenDescription');
        updateHiddenInput('topics', 'hiddenTopics');
        
        const formData = new FormData(this);
        
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            showSuccessMessage(data.message || 'Course created successfully');
            this.reset();
            document.getElementById('description').innerHTML = '';
            document.getElementById('topics').innerHTML = '';
            loadCourses();
            toggleCourseForm();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while saving the course.');
        });
    });
    
    // Show success message
    function showSuccessMessage(message) {
        const alert = document.getElementById('successAlert');
        alert.textContent = message;
        alert.style.display = 'block';
        setTimeout(() => {
            alert.style.display = 'none';
        }, 5000);
    }
    
    // Close color options when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.color-picker')) {
            hideAllColorOptions();
        }
    });
    
    // Load courses data
    function loadCourses() {
        fetch('http://127.0.0.1:8000/admin/courses')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const coursesList = document.getElementById('coursesList');
                coursesList.innerHTML = '';
                
                if (data.length === 0) {
                    coursesList.innerHTML = `
                        <tr>
                            <td colspan="3" style="text-align: center;">No courses found. Click "Add New Course" to create one.</td>
                        </tr>
                    `;
                    return;
                }
                
                data.forEach(course => {
                    const row = document.createElement('tr');
                    
                    // Thumbnail column
                    const thumbnailCell = document.createElement('td');
                    if (course.thumbnail) {
                        const thumbnailImg = document.createElement('img');
                        thumbnailImg.src = course.thumbnail;
                        thumbnailImg.alt = course.title;
                        thumbnailImg.className = 'course-thumbnail';
                        thumbnailCell.appendChild(thumbnailImg);
                    } else {
                        thumbnailCell.textContent = 'No thumbnail';
                    }
                    
                    // Details column
                    const detailsCell = document.createElement('td');
                    detailsCell.className = 'course-details';
                    
                    // Preserve HTML for topics to show numbered list
                    const topicsHtml = course.topics ? course.topics : 'N/A';
                    const plainDescription = course.description ? 
                        course.description.replace(/<[^>]*>/g, '').substring(0, 100) + '...' : 'N/A';
                    
                    detailsCell.innerHTML = `
                        <strong>${course.title}</strong><br>
                        <strong>Instructor:</strong> ${course.instructor}<br>
                        <strong>Description:</strong> ${plainDescription}<br>
                        <strong>Topics:</strong> ${topicsHtml}<br>
                        <strong>Category:</strong> ${course.category} | 
                        <strong>Level:</strong> ${course.level}<br>
                        <strong>Duration:</strong> ${course.duration} minutes | 
                        <strong>Lessons:</strong> ${course.lessons}<br>
                        <strong>Price:</strong> $${(course.price / 100).toFixed(2)} | 
                        <strong>Views:</strong> ${course.views} | 
                        <strong>Time:</strong> ${course.time} minutes ago
                    `;
                    
                    // Actions column
                    const actionsCell = document.createElement('td');
                    actionsCell.className = 'actions';
                    actionsCell.innerHTML = `
                        <button class="edit" onclick="editCourse(${course.id})">Edit</button>
                        <button class="delete" onclick="deleteCourse(${course.id})">Delete</button>
                    `;
                    
                    row.appendChild(thumbnailCell);
                    row.appendChild(detailsCell);
                    row.appendChild(actionsCell);
                    coursesList.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error loading courses:', error);
                const coursesList = document.getElementById('coursesList');
                coursesList.innerHTML = `
                    <tr>
                        <td colspan="3" style="text-align: center; color: #dc3545;">
                            Error loading courses. Please check the console for details.
                        </td>
                    </tr>
                `;
            });
    }
    
    // Load courses on page load
    document.addEventListener('DOMContentLoaded', loadCourses);
    
    // Edit and Delete functions
    function editCourse(id) {
        console.log('Edit course:', id);
        // Implement edit functionality here
    }
    
    function deleteCourse(id) {
        if (confirm('Are you sure you want to delete this course?')) {
            fetch(`/admin/course/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    if (response.status === 404) {
                        throw new Error('Course not found. It may have already been deleted.');
                    }
                    throw new Error('Failed to delete course');
                }
                return response.json();
            })
            .then(data => {
                showSuccessMessage(data.message || 'Course deleted successfully');
                loadCourses();
            })
            .catch(error => {
                console.error('Error deleting course:', error);
                alert(error.message || 'An error occurred while deleting the course.');
            });
        }
    }
</script>

@endsection