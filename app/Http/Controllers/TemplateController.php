<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    // Sample template data
    private $templates = [
        1 => [
            'id' => 1,
            'title' => 'Amaze',
            'framework' => 'Bootstrap',
            'likes' => 26301,
            'downloads' => 5127,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/amaze.jpg',
            'status' => 'active',
            'demo_url' => '/demo/amaze',
            'details_url' => '/details/amaze',
            'description' => 'A modern and responsive admin template with a clean design.',
            'credits' => ['Design: John Doe', 'Development: Jane Smith'],
            'features' => ['Responsive Design', 'Bootstrap 5', 'Light/Dark Mode', 'Chart Libraries']
        ],
        2 => [
            'id' => 2,
            'title' => 'ProBusiness',
            'framework' => 'Bootstrap',
            'likes' => 19812,
            'downloads' => 3898,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/probusiness.jpg',
            'status' => 'active',
            'demo_url' => '/demo/probusiness',
            'details_url' => '/details/probusiness',
            'description' => 'Professional business template with advanced features.',
            'credits' => ['Design: Alex Johnson', 'Development: Sarah Wilson'],
            'features' => ['CRM Integration', 'E-commerce Ready', 'Advanced Tables', 'Custom Forms']
        ],
        3 => [
            'id' => 3,
            'title' => 'Fortune',
            'framework' => 'Bootstrap',
            'likes' => 12731,
            'downloads' => 2208,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/fortune.jpg',
            'status' => 'active',
            'demo_url' => '/demo/fortune',
            'details_url' => '/details/fortune',
            'description' => 'Finance and accounting dashboard template.',
            'credits' => ['Design: Mike Thompson', 'Development: Emily Davis'],
            'features' => ['Financial Charts', 'Invoice Management', 'Tax Calculator', 'Budget Planning']
        ],
        4 => [
            'id' => 4,
            'title' => 'Electrify',
            'framework' => 'Bootstrap',
            'likes' => 8243,
            'downloads' => 1960,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/electrify.jpg',
            'status' => 'active',
            'demo_url' => '/demo/electrify',
            'details_url' => '/details/electrify',
            'description' => 'Energy and utility management dashboard template.',
            'credits' => ['Design: Chris Brown', 'Development: Lisa Miller'],
            'features' => ['Energy Monitoring', 'Utility Tracking', 'Consumption Reports', 'Billing System']
        ],
        5 => [
            'id' => 5,
            'title' => 'Edge',
            'framework' => 'Bootstrap',
            'likes' => 7430,
            'downloads' => 1846,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/edge.jpg',
            'status' => 'active',
            'demo_url' => '/demo/edge',
            'details_url' => '/details/edge',
            'description' => 'Cutting-edge technology dashboard with modern UI.',
            'credits' => ['Design: Ryan Lee', 'Development: Kevin White'],
            'features' => ['AI Integration', 'Real-time Analytics', 'API Dashboard', 'System Monitoring']
        ],
        6 => [
            'id' => 6,
            'title' => 'Dreamz',
            'framework' => 'Bootstrap',
            'likes' => 6322,
            'downloads' => 1517,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/dreamz.jpg',
            'status' => 'active',
            'demo_url' => '/demo/dreamz',
            'details_url' => '/details/dreamz',
            'description' => 'Creative agency portfolio and management template.',
            'credits' => ['Design: Amy Wilson', 'Development: David Taylor'],
            'features' => ['Portfolio Showcase', 'Client Management', 'Project Tracking', 'Invoice System']
        ],
        7 => [
            'id' => 7,
            'title' => 'Stylo',
            'framework' => 'Bootstrap',
            'likes' => 6960,
            'downloads' => 1574,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/stylo.jpg',
            'status' => 'active',
            'demo_url' => '/demo/stylo',
            'details_url' => '/details/stylo',
            'description' => 'Fashion and retail management dashboard template.',
            'credits' => ['Design: Sophia Martinez', 'Development: James Anderson'],
            'features' => ['Inventory Management', 'Sales Tracking', 'Customer Database', 'Trend Analysis']
        ],
        8 => [
            'id' => 8,
            'title' => 'Everest',
            'framework' => 'Bootstrap',
            'likes' => 7170,
            'downloads' => 1430,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/everest.jpg',
            'status' => 'active',
            'demo_url' => '/demo/everest',
            'details_url' => '/details/everest',
            'description' => 'Travel and tourism management dashboard template.',
            'credits' => ['Design: Olivia Brown', 'Development: Daniel Clark'],
            'features' => ['Booking Management', 'Destination Catalog', 'Customer Reviews', 'Revenue Reports']
        ],
        9 => [
            'id' => 9,
            'title' => 'Velocity',
            'framework' => 'Bootstrap',
            'likes' => 6488,
            'downloads' => 1537,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/velocity.jpg',
            'status' => 'active',
            'demo_url' => '/demo/velocity',
            'details_url' => '/details/velocity',
            'description' => 'Sports and fitness tracking dashboard template.',
            'credits' => ['Design: Robert Harris', 'Development: Jennifer Lewis'],
            'features' => ['Workout Tracking', 'Member Management', 'Class Scheduling', 'Progress Analytics']
        ],
        10 => [
            'id' => 10,
            'title' => 'Rainy',
            'framework' => 'Bootstrap',
            'likes' => 8777,
            'downloads' => 1622,
            'image_url' => 'https://www.yahubaba.com/public/freetemplates/rainy.jpg',
            'status' => 'inactive',
            'demo_url' => '/demo/rainy',
            'details_url' => '/details/rainy',
            'description' => 'Weather and environmental data dashboard template.',
            'credits' => ['Design: Thomas Walker', 'Development: Michelle Young'],
            'features' => ['Weather Data', 'Environmental Metrics', 'Forecast System', 'Historical Data']
        ]
    ];

    public function index()
    {
        $templates = $this->templates;
        return view('admin.adminpages.admintemplates', compact('templates'));
    }

    public function create()
    {
        // Empty template for create form
        $template = (object)[
            'id' => null,
            'title' => '',
            'framework' => 'Bootstrap',
            'likes' => 0,
            'downloads' => 0,
            'image_url' => '',
            'status' => 'active',
            'demo_url' => '',
            'details_url' => '',
            'description' => '',
            'credits' => [],
            'features' => []
        ];
        
        return view('admin.adminpages.addedittemplates', compact('template'));
    }

    public function edit($id)
    {
        if (array_key_exists($id, $this->templates)) {
            $template = (object)$this->templates[$id];
            return view('admin.adminpages.addedittemplates', compact('template'));
        }
        
        abort(404, 'Template not found');
    }

    public function show($id)
    {
        if (array_key_exists($id, $this->templates)) {
            $template = (object)$this->templates[$id];
            return view('admin.adminpages.viewtemplate', compact('template'));
        }
        
        abort(404, 'Template not found');
    }
}