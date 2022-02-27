<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\News;
use App\Models\Backend\Product;
use App\Models\Backend\Slider;
use App\Models\Backend\Color;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    private $product;
    private $slider;
    private $new;
    private $color;
    public function __construct(Product $product, Slider $slider, News $new, Color $color) {
        $this->product = $product;
        $this->slider = $slider;
        $this->new = $new;
        $this->color = $color;
    }

    public function index() {
        $slidersMain = $this->slider->get();
        $listNews = $this->new->get();
        $newProducts = $this->product->limit(8)->get();
        $bestProducts = $this->product->where('discount', '=', 0)->get();
        $featureProducts = $this->product->where('category_id', '=', 1)->get();
        $saleProducts = $this->product->where('discount', '>', 0)->get(); 
        $rateProducts = $this->product->where('category_id', '=', 2)->get();
        return view('frontend.home', compact('slidersMain', 'listNews','newProducts', 'bestProducts', 'featureProducts','saleProducts', 'rateProducts'));
    }

    public function categories() {
        $listProducts = $this->product->all();
        return view('frontend.categories', compact('listProducts'));
    }

    public function category($id) {
        $listProducts = $this->product->where('category_id', $id)->get();
        return view('frontend.category', compact('listProducts'));
    }

    public function detail($id) {
        $product = $this->product->find($id);
        $relatedProducts = $this->product->where('category_id', $product->category_id)->limit(8)->get();
        return view('frontend.detail', compact('product', 'relatedProducts'));
    }

    public function modal() {
        return view('frontend.modal1');
    }
}
