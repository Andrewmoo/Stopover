<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Laravel';
        $counties = array(
            "Antrim", "Armagh", "Carlow", "Cavan", "Clare", "Cork", "Derry",
            "Donegal", "Down", "Dublin", "Fermanagh", "Galway", "Kerry", "Kildare",
            "Kilkenny", "Laois", "Leitrim", "Limerick", "Longford", "Louth", "Mayo",
            "Meath", "Monaghan", "Offaly", "Roscommon", "Sligo", "Tipperary", "Tyrone",
            "Waterford", "Westmeath", "Wexford", "Wicklow"
        );

        return view('pages.index')->with(['title' => $title, 'counties' => $counties]);
    }
}
