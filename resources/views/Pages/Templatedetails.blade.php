@extends('layouts.app')

@section('title', 'template')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
    <style>
        :root {
            --primary-color: #00695C;
            --secondary-color: #004D40;
            --text-color: #333333;
            --background-color: #F8F9FA;
            --card-background: #FFFFFF;
        }

        .main-content {
            padding: 40px;
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .template-header {
            background: var(--card-background);
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .template-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 10px;
        }

        .template-meta {
            color: #666;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .template-description {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        .template-preview img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            margin-bottom: 20px;
        }

        .template-features {
            background: var(--card-background);
            padding: 20px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .feature-item i {
            color: var(--primary-color);
            margin-right: 10px;
            font-size: 18px;
        }

        .note-box {
            background: #E0F2F1;
            border-left: 4px solid var(--primary-color);
            padding: 15px;
            margin-bottom: 20px;
        }

        .note-box p {
            color: var(--text-color);
            font-size: 15px;
        }

        .credits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }

        .credit-item {
            padding: 10px;
            background: #E0F2F1;
            font-size: 15px;
            color: var(--text-color);
        }

        .download-section {
            background: var(--card-background);
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .download-section a {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            font-weight: 600;
            color: white;
            background-color: var(--primary-color);
            border-radius: 5px;
        }

        .download-section a:hover {
            background-color: var(--secondary-color);
        }

        .download-count {
            font-size: 15px;
            color: #666;
            margin-top: 10px;
        }

        .favorite-btn {
            background-color: #e74c3c;
        }

        .favorite-btn:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>

    <main class="main-content">
        <div class="template-header">
            <h1 class="template-title">Amaze : HTML5 Responsive Bootstrap 4 Template</h1>
            <div class="template-meta">
                <span>FRAMEWORK : <strong>BOOTSTRAP</strong></span>
            </div>
            <p class="template-description">
                Amaze is a <strong>responsive WordPress theme</strong> built on Twitter Bootstrap. 
                It contains <strong>39+ unique pages</strong> that can be customized for any business 
                or creative agency, it also looks great as a blog. Designed from mobile up so your 
                site will look great from 1200px down to iPhone!
            </p>
            <img src="https://www.yahubaba.com/public/freetemplates/amaze.jpg" alt="Amaze Template Preview">
        </div>

        <div class="template-features">
            <h2 class="section-title">Template Features</h2>
            <div class="features-grid">
                <div class="feature-list">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>HTML5 and CSS3</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Bootstrap 4.1</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Grid System and Responsive Design</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Touch Swipe Support</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Animated Layers Slider</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Blog Pages (Not Functional)</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>SEO Optimized</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Over 500 Icons Fonts (Font Awesome & Glyphicons)</span>
                    </div>
                </div>
                <div class="feature-list">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>39 HTML Pages</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Google Fonts Support</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Working PHP Contact Form</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Responsive Pricing Tables</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Responsive Sorting Gallery in Grid & Masonry Style</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>New pages for Shopping and Cart</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Blog Page in Classic & Masonry Style</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Bootstrap Components Compatible</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Twitter & Flickr Feeds</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>All files are well commented and organized</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Crossbrowser Compatible (Firefox, Google Chrome, IE, Safari)</span>
                    </div>
                </div>
            </div>
            <div class="note-box">
                <p><strong>Note :</strong> Images which are used in demo of the template are not included in the download package.</p>
            </div>
            <h3 class="section-title">Credits</h3>
            <div class="credits-grid">
                <div class="credit-item">jQuery</div>
                <div class="credit-item">Bootstrap Framework</div>
                <div class="credit-item">jQuery Flickr Plugin</div>
                <div class="credit-item">jQuery Easing v1.3</div>
                <div class="credit-item">GMAP3 Plugin for jQuery</div>
                <div class="credit-item">Isotope JS</div>
                <div class="credit-item">jQuery Validation Plugin 1.9.0</div>
                <div class="credit-item">Magnific Popup v0.8.9</div>
                <div class="credit-item">Jssor Slider</div>
                <div class="credit-item">SmartMenus</div>
                <div class="credit-item">Font Awesome</div>
            </div>
        </div>

        <div class="download-section">
            <h1>Download Template (Amaze)</h1>
            <a href="#" class="download-btn" id="downloadBtn">Download Amaze</a>
            <!-- <div class="download-count">Downloads = <strong>5127 Downloads</strong></div> -->
            <a href="#" class="favorite-btn">Add to Favorite ❤</a>
            <h3 class="download-count">Downloads = <strong>5127 Downloads</strong> </h3>
        </div>
    </main>

    <script>
        document.getElementById('downloadBtn').addEventListener('click', function(e) {
            e.preventDefault();
            const content = document.documentElement.outerHTML;
            const blob = new Blob([content], { type: 'text/html' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'amaze_template.html';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        });
    </script>
@endsection