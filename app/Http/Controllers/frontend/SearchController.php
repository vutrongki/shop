<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    private $product;
    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function searchProduct(Request $request) {
        $searchText = $_GET['search'];
        $products = $this->product->where('name', 'LIKE', '%'.$searchText.'%')->get();
        return view('frontend.search', compact('products'));
    }
}
