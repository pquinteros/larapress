<?php

namespace App\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\MenuItem;
use App\Models\Service;

class PageController extends Controller
{

    // Home
    public function home()
    {

        $articles= Article::orderBy('date','DESC')->paginate(3);

        

        $this->data['menu_items'] = MenuItem::getTree();
        return view('home', $this->data, compact('articles', 'articles'));
    }


    // Page
    public function index($slug)
    {
        $page = Page::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();
        $this->data['menu_items'] = MenuItem::getTree();

        return view('pages.'.$page->template, $this->data);
    }

    // Services
    public function services()
    {

        $services= Service::orderBy('date','DESC')->get();

        $this->data['menu_items'] = MenuItem::getTree();

        return view('services', $this->data, compact('services', 'services'));
    }


    // Service
    public function service($slug)
    {
        $page = Service::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();
        $this->data['menu_items'] = MenuItem::getTree();

        return view('service', $this->data);
    }
   
    // Articulo
    public function articulo($slug)
    {
        $page= Article::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Pleasee go back to our <a href="'.url('').'">homepage</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['resumen'] = $page->resumen;
        $this->data['date'] = $page->date;
        $this->data['image'] = $page->image;
        $this->data['content'] = $page->content;

        if ( !empty ( $page->user->name ) ) {
            $this->data['user'] = $page->user->name;
        }
        
        
        $this->data['page'] = $page->withFakes();
        $this->data['menu_items'] = MenuItem::getTree();

        return view('articulo', $this->data);
    }


        // Service
        public function contact()
        {
          
    
            
            $this->data['menu_items'] = MenuItem::getTree();
    
            return view('contact', $this->data);
        }

}