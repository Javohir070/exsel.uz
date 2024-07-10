<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){

        // $page = Page::where('slug','home')->get();
        // $menu = new Menu();

        return view('frontend.home');
    }

    public function about()
    { 
        return view('frontend.page.about');
    }
    public function contact()
    {
        return view("frontend.page.contact");
    }
    public function news()
    {
        return view('frontend.page.news');
    }
    public function team()
    {
        return view('frontend.page.team');
    }
    public function portfolio()
    {
        return view('frontend.page.portfolio');
    }
    public function studies()
    {
        return view('frontend.page.studies');
    }

    // public function views($id, Page $page, Menu $menu){

    //     return view('frontend.page', compact(['page','menu','id']));
    // }
}
