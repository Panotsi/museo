<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        $activities = [
            [
                'title' => 'Pagsasanay sa Pagsasaka',
                'description' => 'Isang aktibidad kung saan ang mga mag-aaral ay mag-aaral ng traditional na paggamit ng plow at kulturayan.',
                'date' => '2024-12-25',
                'image' => 'images/activity1.jpg'
            ],
            [
                'title' => 'Pag-iikot sa Museo',
                'description' => 'Libre na pagpasok para sa mga senior citizens at may kapansanan.',
                'date' => '2024-11-15',
                'image' => 'images/activity2.jpg'
            ],
            [
                'title' => 'Feast of the Bicol Harvest',
                'description' => 'Celebration of the harvest season with traditional dances and food tasting.',
                'date' => '2025-01-10',
                'image' => 'images/activity3.jpg'
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}