<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Laravel';

        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About Us';
        // Mapper::map(
        //   53.3,
        //   -1.4,
        //   [
        //      'zoom' => 16,
        //      'draggable' => true,
        //      'marker' => false,
        //      'eventAfterLoad' => 'circleListener(maps[0].shapes[0].circle_0);'
        //   ]
        // );

        Mapper::map(
          53.2806584,
          -6.1544496,
          [
            'zoom' => 16,
            'markers' => ['title' => 'IADT', 'animation' => 'DROP'],
            'clusters' => ['size' => 10, 'center' => false, 'zoom' => 20]
          ]
        );

        // won't work??

        // Mapper::location('Sheffield')->map(['zoom' => 15, 'center' => false, 'marker' => false, 'type' => 'HYBRID', 'overlay' => 'TRAFFIC']);

        return view('pages.about')->with('title', $title);
    }
    public function services(){
      $data = array(
        'title' => 'Services',
        'services' => ['Bookings', '', '']
      );

        return view('pages.services')->with($data);
    }
}
