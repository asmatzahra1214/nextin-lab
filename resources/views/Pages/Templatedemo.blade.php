<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amaze: HTML5 Responsive Bootstrap 4 Template</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #00695C;
            --secondary-color: #004D40;
            --sidebar-color: #35978D;
            --accent-color: #E0F2F1;
            --highlight-color: #B2DFDB;
            --extra-color: #80CBC4;
            --text-color: #333333;
            --background-color: #F8F9FA;
            --card-background: #FFFFFF;
            --border-color: #E0E0E0;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 28px;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo i {
            margin-right: 8px;
            color: var(--highlight-color);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 25px;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 5px;
            position: relative;
        }

        .nav-links a:hover {
            color: white;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--highlight-color);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links .highlight {
            color: var(--highlight-color);
            font-weight: 600;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 105, 92, 0.9), rgba(0, 77, 64, 0.9)), url('https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80') center/cover no-repeat;
            padding: 120px 0 100px;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero h2 {
            font-size: 28px;
            font-weight: 300;
            margin-bottom: 30px;
            color: #e6e6e6;
        }

        .hero p {
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto 40px;
            color: #d9d9d9;
        }

        .cta-button {
            display: inline-block;
            background: var(--extra-color);
            color: var(--secondary-color);
            padding: 14px 36px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .cta-button:hover {
            background: var(--highlight-color);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background-color: var(--card-background);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 36px;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .section-title p {
            color: var(--text-color);
            max-width: 700px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: var(--accent-color);
            border-radius: 10px;
            padding: 35px 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px var(--shadow-color);
            border-color: var(--primary-color);
        }

        .feature-icon {
            font-size: 50px;
            color: var(--primary-color);
            margin-bottom: 25px;
        }

        .feature-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--secondary-color);
        }

        .feature-card p {
            color: var(--text-color);
            margin-bottom: 20px;
            font-size: 15px;
        }

        .feature-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
        }

        .feature-link i {
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .feature-link:hover i {
            transform: translateX(3px);
        }

        /* Preview Section */
        .preview {
            padding: 100px 0;
            background: var(--accent-color);
        }

        .preview-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .preview-text {
            flex: 1;
        }

        .preview-text h2 {
            font-size: 36px;
            color: var(--secondary-color);
            margin-bottom: 20px;
            font-weight: 700;
        }

        .preview-text p {
            color: var(--text-color);
            margin-bottom: 25px;
            font-size: 17px;
        }

        .highlight {
            color: var(--primary-color);
            font-weight: 600;
        }

        .features-list {
            margin-top: 30px;
        }

        .features-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            color: var(--text-color);
        }

        .features-list li i {
            color: var(--primary-color);
            margin-right: 10px;
            margin-top: 5px;
        }

        .preview-image {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .preview-image img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 15px 40px var(--shadow-color);
        }

        .mobile-showcase {
            position: absolute;
            bottom: -50px;
            right: 0;
            width: 180px;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border: 5px solid var(--card-background);
        }

        /* Info Section */
        .info {
            padding: 100px 0;
            background-color: var(--card-background);
        }

        .info-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .note-box {
            background: var(--accent-color);
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin-bottom: 40px;
            border-radius: 0 5px 5px 0;
        }

        .note-box p {
            color: var(--text-color);
            font-size: 16px;
        }

        .credits {
            margin-bottom: 40px;
        }

        .credits h3 {
            font-size: 24px;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        .credit-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .credit-item {
            padding: 12px 15px;
            background: var(--accent-color);
            border-radius: 5px;
            font-size: 15px;
            color: var(--text-color);
        }

        /* Download Section */
        .download {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            text-align: center;
        }

        .download h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .download p {
            max-width: 600px;
            margin: 0 auto 40px;
            color: #e6e6e6;
            font-size: 18px;
        }

        .download-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 32px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-primary {
            background: var(--extra-color);
            color: var(--secondary-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background: var(--highlight-color);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            backdrop-filter: blur(5px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
        }

        .download-count {
            margin-top: 20px;
            font-size: 14px;
            color: #b3b3b3;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .download-count i {
            margin-right: 8px;
            color: var(--highlight-color);
        }

        /* Footer */
        footer {
            background: var(--secondary-color);
            color: rgba(255, 255, 255, 0.7);
            padding: 40px 0 20px;
            text-align: center;
        }

        .footer-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            list-style: none;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .footer-links li {
            margin: 0 15px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--highlight-color);
        }

        .copyright {
            font-size: 14px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .preview-content {
                flex-direction: column;
            }
            
            .mobile-showcase {
                position: relative;
                bottom: 0;
                margin-top: 30px;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
            }
            
            .nav-links {
                margin-top: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .nav-links li {
                margin: 5px 10px;
            }
            
            .hero h1 {
                font-size: 36px;
            }
            
            .hero h2 {
                font-size: 22px;
            }
            
            .download-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 576px) {
            .hero {
                padding: 80px 0 60px;
            }
            
            .section-title h2 {
                font-size: 28px;
            }
            
            .feature-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-magic"></i>
                Amaze
            </a>
            <ul class="nav-links">
                <li><a href="#">HOME</a></li>
                <li><a href="#">SHORTCODES</a></li>
                <li><a href="#">PAGES</a></li>
                <li><a href="#">PORTFOLIO</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">CONTACT</a></li>
                <li><a href="#" class="highlight">IN_Amazon</a></li>
            </ul>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Say Hello to Amaze</h1>
            <h2>Creative and Elegant Solutions</h2>
            <p>Amaze is Simple And Elegant Packet With Tons of features</p>
            <a href="#" class="cta-button">GET STARTED</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Amaze Template Features</h2>
                <p>Discover the powerful features that make Amaze the perfect choice for your next project</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>BRAND BUILDING</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipisci id materialus necrositatibus, prostitut quam sapge seduta. Assumeratis laborum efficit nisi.</p>
                    <a href="#" class="feature-link">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3>WEB DESIGN</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipisci id materialus necrositatibus, prostitut quam sapge seduta. Assumeratis laborum efficit nisi.</p>
                    <a href="#" class="feature-link">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>RESPONSIVE DESIGN</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipisci id materialus necrositatibus, prostitut quam sapge seduta. Assumeratis laborum efficit nisi.</p>
                    <a href="#" class="feature-link">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Section -->
    <section class="preview">
        <div class="container">
            <div class="preview-content">
                <div class="preview-text">
                    <h2>Live Preview</h2>
                    <p>Amaze is a <span class="highlight">responsive WordPress theme</span> built on Twitter Bootstrap. It contains <span class="highlight">39+ unique pages</span> that can be customized for any business or creative agency, it also looks great as a blog. Designed from mobile up so your site will look great from 1200px down to iPhone!</p>
                    
                    <ul class="features-list">
                        <li><i class="fas fa-check-circle"></i> HTML5 and CSS3</li>
                        <li><i class="fas fa-check-circle"></i> Bootstrap 4.1</li>
                        <li><i class="fas fa-check-circle"></i> Grid System and Responsive Design</li>
                        <li><i class="fas fa-check-circle"></i> Touch Swipe Support</li>
                        <li><i class="fas fa-check-circle"></i> Animated Layers Slider</li>
                        <li><i class="fas fa-check-circle"></i> Blog Pages (Not Functional)</li>
                        <li><i class="fas fa-check-circle"></i> SEO Optimized</li>
                        <li><i class="fas fa-check-circle"></i> Over 500 Icons Fonts (Font Awesome & Glyphicons)</li>
                        <li><i class="fas fa-check-circle"></i> 39 HTML Pages</li>
                        <li><i class="fas fa-check-circle"></i> Google Fonts Support</li>
                        <li><i class="fas fa-check-circle"></i> Working PHP Contact Form</li>
                        <li><i class="fas fa-check-circle"></i> Responsive Pricing Tables</li>
                        <li><i class="fas fa-check-circle"></i> Responsive Sorting Gallery in Grid & Masonry Style</li>
                        <li><i class="fas fa-check-circle"></i> New pages for Shopping and Cart</li>
                    </ul>
                </div>
                <div class="preview-image">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Amaze Template Preview">
                    <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Mobile Preview" class="mobile-showcase">
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info">
        <div class="container">
            <div class="info-content">
                <div class="note-box">
                    <p><strong>Note:</strong> Images which are used in demo of the template are not included in the download package.</p>
                </div>
                
                <div class="credits">
                    <h3>Credits</h3>
                    <div class="credit-grid">
                        <div class="credit-item">jQuery</div>
                        <div class="credit-item">Bootstrap Framework</div>
                        <div class="credit-item">jQuery Flickr Plugin</div>
                        <div class="credit-item">jQuery Easing v1.3</div>
                        <div class="credit-item">GMAP3 Plugin for JQuery</div>
                        <div class="credit-item">Isotope JS</div>
                        <div class="credit-item">jQuery Validation Plugin 1.9.0</div>
                        <div class="credit-item">Magnific Popup v0.8.9</div>
                        <div class="credit-item">Jssor Slider</div>
                        <div class="credit-item">SmartMenus</div>
                        <div class="credit-item">Font Awesome</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section class="download">
        <div class="container">
            <h2>Download Template (Amaze)</h2>
            <p>Join thousands of satisfied users who have transformed their websites with Amaze</p>
            
            <div class="download-buttons">
                <a href="#" class="btn btn-primary" id="downloadBtn">
                    <i class="fas fa-download"></i> Download Template
                </a>
                <a href="#" class="btn btn-secondary">Add To Favorites</a>
            </div>
            
            <div class="download-count">
                <i class="fas fa-download"></i> 5127 Downloads
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <p class="copyright">© 2025 Amaze Template. All rights reserved. Designed with <i class="fas fa-heart" style="color:var(--highlight-color);"></i> by NextIn Lab</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple animation for feature cards on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const featureCards = document.querySelectorAll('.feature-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            featureCards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
            
            // Add hover effect to buttons
            const buttons = document.querySelectorAll('.btn, .cta-button');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Download functionality
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
        });
    </script>
</body>
</html>