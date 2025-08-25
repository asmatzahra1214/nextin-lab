<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabController extends Controller
{
    // Sample lab data
    private $labs = [
        1 => [
            'id' => 1,
            'title' => 'Pricing Table Style 322',
            'image_url' => 'https://www.yahubaba.com/public/codelab/pricing-table-style-322.png',
            'likes' => 220,
            'comments' => 0,
            'status' => 'active',
            'description' => 'A modern pricing table design with clean layout and attractive styling.',
            'demo_url' => '#',
            'details_url' => '#'
        ],
        2 => [
            'id' => 2,
            'title' => 'Counter Style 302',
            'image_url' => 'https://www.yahubaba.com/public/codelab/counter-style-302.png',
            'likes' => 17,
            'comments' => 0,
            'status' => 'active',
            'description' => 'Animated counter with smooth transitions and modern design.',
            'demo_url' => '#',
            'details_url' => '#'
        ],
        3 => [
            'id' => 3,
            'title' => 'Ribbon Style 18',
            'image_url' => 'https://www.yahubaba.com/public/codelab/ribbon-style-18.png',
            'likes' => 789,
            'comments' => 0,
            'status' => 'active',
            'description' => 'Elegant ribbon design for highlighting special content or offers.',
            'demo_url' => '#',
            'details_url' => '#'
        ],
        4 => [
            'id' => 4,
            'title' => 'Preloader Style 452',
            'image_url' => 'https://www.yahubaba.com/public/codelab/preloader-style-452.png',
            'likes' => 1015,
            'comments' => 0,
            'status' => 'active',
            'description' => 'Creative loading animation with smooth transitions.',
            'demo_url' => '#',
            'details_url' => '#'
        ],
        5 => [
            'id' => 5,
            'title' => 'Buttons Style 275',
            'image_url' => 'https://www.yahubaba.com/public/codelab/buttons-style-275.png',
            'likes' => 8900,
            'comments' => 0,
            'status' => 'active',
            'description' => 'Collection of modern button styles with hover effects.',
            'demo_url' => '#',
            'details_url' => '#'
        ],
        6 => [
            'id' => 6,
            'title' => 'CSS Text Effect Style 257',
            'image_url' => 'https://www.yahubaba.com/public/codelab/css-text-effect-style-257.png',
            'likes' => 4050,
            'comments' => 0,
            'status' => 'active',
            'description' => 'Creative text effects using pure CSS with no JavaScript.',
            'demo_url' => '#',
            'details_url' => '#'
        ],
        7 => [
            'id' => 7,
            'title' => 'Service Box 340',
            'image_url' => 'https://www.yahubaba.com/public/codelab/service-box-340.png',
            'likes' => 4860,
            'comments' => 0,
            'status' => 'active',
            'description' => 'Service display boxes with icons and hover effects.',
            'demo_url' => '#',
            'details_url' => '#'
        ],
        8 => [
            'id' => 8,
            'title' => 'Product Grid Style 313',
            'image_url' => 'https://www.yahubaba.com/public/codelab/product-grid-style-313.jpg',
            'likes' => 710,
            'comments' => 0,
            'status' => 'active',
            'description' => 'Product grid layout with image hover effects and quick view.',
            'demo_url' => '#',
            'details_url' => '#'
        ],
        9 => [
            'id' => 9,
            'title' => 'Link Hover Style 283',
            'image_url' => 'https://www.yahubaba.com/public/codelab/link-hover-style-283.png',
            'likes' => 489,
            'comments' => 0,
            'status' => 'active',
            'description' => 'Creative link hover effects with smooth transitions.',
            'demo_url' => '#',
            'details_url' => '#'
        ],
        10 => [
            'id' => 10,
            'title' => 'Pricing Table Style 321',
            'image_url' => 'https://www.yahubaba.com/public/codelab/pricing-table-style-321.png',
            'likes' => 369,
            'comments' => 0,
            'status' => 'inactive',
            'description' => 'Alternative pricing table design with feature comparison.',
            'demo_url' => '#',
            'details_url' => '#'
        ]
    ];

    public function index()
    {
        $labs = $this->labs;
        return view('admin.adminpages.adminlab', compact('labs'));
    }

    public function create()
    {
        // Empty lab for create form
        $lab = (object)[
            'id' => null,
            'title' => '',
            'image_url' => '',
            'likes' => 0,
            'comments' => 0,
            'status' => 'active',
            'description' => '',
            'demo_url' => '',
            'details_url' => ''
        ];
        
        return view('admin.adminpages.addeditlab', compact('lab'));
    }

    public function edit($id)
    {
        if (array_key_exists($id, $this->labs)) {
            $lab = (object)$this->labs[$id];
            return view('admin.adminpages.addeditlab', compact('lab'));
        }
        
        abort(404, 'Lab item not found');
    }

    public function show($id)
    {
        if (array_key_exists($id, $this->labs)) {
            $lab = (object)$this->labs[$id];
            return view('admin.adminpages.viewlab', compact('lab'));
        }
        
        abort(404, 'Lab item not found');
    }
    
    public function store(Request $request)
    {
        // In a real application, we would save to database here
        // For now, we'll just redirect back to the lab index
        return redirect()->route('admin.lab')->with('success', 'Lab item created successfully!');
    }
    
    public function update(Request $request, $id)
    {
        // In a real application, we would update the database here
        // For now, we'll just redirect back to the lab index
        return redirect()->route('admin.lab')->with('success', 'Lab item updated successfully!');
    }
    
    public function destroy($id)
    {
        // In a real application, we would delete from database here
        // For now, we'll just redirect back to the lab index
        return redirect()->route('admin.lab')->with('success', 'Lab item deleted successfully!');
    }
}