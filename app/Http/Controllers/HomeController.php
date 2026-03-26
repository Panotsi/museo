<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Artifact;

class HomeController
{
    public function index()
    {
        //carousel slide (because i didnt use database)
        $slides = [
            [
                'id' => 1,
                'title' => 'USIP',
                'description' => 'Stories and Myths in Agriculture',
                'image' => asset('images/image1.jpeg'),
                'button_text' => 'Learn More',
                'button_link' => route('usip')
            ],
            [
                'id' => 2,
                'title' => 'UMA',
                'description' => 'Trade and Farming',
                'image' => asset('images/image2.jpeg'),
                'button_text' => 'Learn More',
                'button_link' => '#gallery'
            ],
            [
                'id' => 3,
                'title' => 'UNOG',
                'description' => 'Rice and Life',
                'image' => asset('images/image3.png'),
                'button_text' => 'Learn More',
                'button_link' => '#dinosaurs'
            ],
            [
                'id' => 4,
                'title' => 'UGMA',
                'description' => 'Celebrations of Plentiful Harvest',
                'image' => asset('images/image4.jpeg'),
                'button_text' => 'Learn More',
                'button_link' => '#dinosaurs'
            ],
            [
                'id' => 5,
                'title' => 'USWAG',
                'description' => 'Progress through Agriculture',
                'image' => asset('images/image5.jpeg'),
                'button_text' => 'Learn More',
                'button_link' => '#dinosaurs'
            ],
        ];

        //to get the activities from the database on ascending order by date
        $activities = Activity::orderBy('date', 'asc')->get();

        $artifacts = Artifact::latest()->take(3)->get();

        //to return the index page and pass the data to the view
        return view('museum.index', compact('slides', 'activities', 'artifacts'));

    }
}
