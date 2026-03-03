<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'id' => 1,
                'title' => 'USIP',
                'description' => 'Stories and Myths in Agriculture',
                'image' => asset('images/image1.jpg'),
                'button_text' => 'Learn More',
                'button_link' => '#tickets'
            ],
            [
                'id' => 2,
                'title' => 'UMA',
                'description' => 'Trade and Farming',
                'image' => asset('images/image2.jpg'),
                'button_text' => 'Learn More',
                'button_link' => '#gallery'
            ],
            [
                'id' => 3,
                'title' => 'UNOG',
                'description' => 'Rice and Life',
                'image' => asset('images/image3.jpg'),
                'button_text' => 'Learn More',
                'button_link' => '#dinosaurs'
            ],
            [
                'id' => 4,
                'title' => 'UGMA',
                'description' => 'Celebrations of Plentiful Harvest',
                'image' => asset('images/image4.jpg'),
                'button_text' => 'Learn More',
                'button_link' => '#dinosaurs'
            ],
            [
                'id' => 5,
                'title' => 'USWAG',
                'description' => 'Progress through Agriculture',
                'image' => asset('images/image5.jpg'),
                'button_text' => 'Learn More',
                'button_link' => '#dinosaurs'
            ],
        ];
        $activities = Activity::orderBy('date', 'asc')->get();

        return view('museum.index', compact('slides', 'activities'));

    }
}
