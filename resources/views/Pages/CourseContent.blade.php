@extends('layouts.app')

@section('title', $courseTitle ?? 'Course Content')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
<div class="course-content-container">
    <!-- Course Header -->
    <div class="course-header">
        <div class="breadcrumb">
            <a href="/courses">Courses</a> &gt; 
            <a href="/courses/{{ $courseId ?? '1' }}">{{ $courseTitle ?? 'Web Development' }}</a> &gt;
            <span>{{ $topicTitle ?? 'Current Topic' }}</span>
        </div>
        <h1>{{ $topicTitle ?? 'Topic Title' }}</h1>
    </div>

    <!-- Topic Content -->
    <div class="topic-content">
        <div class="topic-intro">
            <h2>Introduction</h2>
            <p>{{ $topicDescription ?? 'This section will introduce you to the fundamental concepts of this topic. You\'ll learn the basic syntax and how to apply it in real-world scenarios.' }}</p>
        </div>

        <!-- Code Example Section -->
        <div class="code-example">
            <h2>Example</h2>
            <div class="code-tabs">
                <button class="tab-button active" onclick="openTab(event, 'html')">HTML</button>
                <button class="tab-button" onclick="openTab(event, 'css')">CSS</button>
                <button class="tab-button" onclick="openTab(event, 'js')">JavaScript</button>
            </div>

            <div id="html" class="tab-content" style="display:block">
                <pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;{{ $topicTitle ?? 'Example' }}&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Hello World!&lt;/h1&gt;
    &lt;p&gt;This is a sample HTML document.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
            </div>

            <div id="css" class="tab-content">
                <pre><code class="language-css">body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 20px;
    color: #333;
}

h1 {
    color: #0066cc;
}</code></pre>
            </div>

            <div id="js" class="tab-content">
                <pre><code class="language-javascript">document.addEventListener('DOMContentLoaded', function() {
    console.log('Page loaded!');
    
    function greet(name) {
        alert('Hello ' + name);
    }
    
    greet('World');
});</code></pre>
            </div>
        </div>

        <!-- Try It Yourself Section -->
        <div class="try-it">
            <h2>Try it Yourself</h2>
            <p>Edit the code below and click "Run" to see the result:</p>
            <div class="code-editor">
                <div class="editor-header">
                    <span class="editor-title">Live Code Editor</span>
                    <button class="run-button">Run &raquo;</button>
                </div>
                <textarea class="editor-input" spellcheck="false">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;Try It&lt;/title&gt;
    &lt;style&gt;
        body { font-family: Arial; }
        h1 { color: blue; }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;My First Heading&lt;/h1&gt;
    &lt;p&gt;My first paragraph.&lt;/p&gt;
    
    &lt;script&gt;
        document.write("Hello World!");
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</textarea>
                <iframe class="editor-output"></iframe>
            </div>
        </div>

        <!-- Video Tutorial Section -->
        <div class="video-tutorial">
            <h2>Video Tutorial</h2>
            <div class="video-container">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="content-navigation">
            <a href="#" class="nav-button prev">&laquo; Previous Topic</a>
            <a href="#" class="nav-button next">Next Topic &raquo;</a>
        </div>
    </div>
</div>

<style>
/* Base Styles */
.course-content-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    line-height: 1.6;
}

/* Course Header */
.course-header {
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 1px solid #e0e0e0;
}

.breadcrumb {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 10px;
}

.breadcrumb a {
    color: #0066cc;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.course-header h1 {
    font-size: 2.2rem;
    color: #222;
    margin: 0;
}

/* Topic Content Sections */
.topic-content h2 {
    font-size: 1.8rem;
    color: #222;
    margin: 30px 0 15px;
    padding-bottom: 5px;
    border-bottom: 1px solid #e0e0e0;
}

.topic-intro p {
    font-size: 1.1rem;
    margin-bottom: 20px;
}

/* Code Example Section */
.code-example {
    background: #f5f5f5;
    border-radius: 5px;
    overflow: hidden;
    margin-bottom: 30px;
}

.code-tabs {
    display: flex;
    background: #e0e0e0;
    padding: 0 10px;
}

.tab-button {
    background: none;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 0.9rem;
    color: #555;
}

.tab-button.active {
    background: #f5f5f5;
    color: #222;
    font-weight: bold;
}

.tab-content {
    display: none;
    padding: 15px;
}

.tab-content pre {
    margin: 0;
    overflow-x: auto;
}

.tab-content code {
    font-family: Consolas, Monaco, 'Andale Mono', monospace;
    font-size: 0.95rem;
    line-height: 1.5;
    color: #333;
}

/* Try It Yourself Section */
.try-it {
    margin-bottom: 30px;
}

.code-editor {
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
}

.editor-header {
    background: #f5f5f5;
    padding: 8px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ddd;
}

.editor-title {
    font-weight: bold;
    font-size: 0.9rem;
}

.run-button {
    background: #4CAF50;
    color: white;
    border: none;
    padding: 5px 15px;
    border-radius: 3px;
    cursor: pointer;
    font-size: 0.9rem;
}

.run-button:hover {
    background: #45a049;
}

.editor-input {
    width: 100%;
    height: 200px;
    padding: 15px;
    border: none;
    font-family: Consolas, Monaco, 'Andale Mono', monospace;
    font-size: 0.95rem;
    resize: vertical;
    background: #f9f9f9;
}

.editor-output {
    width: 100%;
    height: 200px;
    border: none;
    border-top: 1px solid #ddd;
}

/* Video Tutorial Section */
.video-tutorial {
    margin-bottom: 30px;
}

.video-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}

/* Navigation Buttons */
.content-navigation {
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid #e0e0e0;
}

.nav-button {
    padding: 10px 20px;
    background: #0066cc;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 0.95rem;
}

.nav-button:hover {
    background: #0055aa;
}

/* Responsive Design */
@media (max-width: 768px) {
    .course-header h1 {
        font-size: 1.8rem;
    }
    
    .topic-content h2 {
        font-size: 1.5rem;
    }
    
    .content-navigation {
        flex-direction: column;
        gap: 10px;
    }
    
    .nav-button {
        width: 100%;
        text-align: center;
    }
}
</style>

<script>
// Tab functionality
function openTab(evt, tabName) {
    const tabContents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = "none";
    }
    
    const tabButtons = document.getElementsByClassName("tab-button");
    for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].className = tabButtons[i].className.replace(" active", "");
    }
    
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Code editor functionality
document.addEventListener('DOMContentLoaded', function() {
    const runButton = document.querySelector('.run-button');
    const editorInput = document.querySelector('.editor-input');
    const editorOutput = document.querySelector('.editor-output');
    
    if (runButton && editorInput && editorOutput) {
        runButton.addEventListener('click', function() {
            const code = editorInput.value;
            editorOutput.srcdoc = code;
        });
        
        // Run the initial code
        runButton.click();
    }
});
</script>
@endsection