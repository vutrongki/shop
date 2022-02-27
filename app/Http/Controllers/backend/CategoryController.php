<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Support\Str;
use App\Components\Recusive;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public $category;

    public function __construct(Category $category) {

        $this->category = $category;
        $this->middleware('auth');
    }

    public function index() {
        $categories = $this->category->latest()->paginate(5);
        return view('backend.category.index', compact('categories'));
    }

    public function create() {
        $data = $this->category->all();
        $recusive = new Recusive();
        $htmlOption = $recusive->categoryRecusive($data, $parent_id = 0, $char = '', null);
        return view('backend.category.add', compact('htmlOption',));
    }

    public function store(Request $request) {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('categories.index');
    }

    public function edit($id) {
        $category = $this->category->find($id); 
        $data = $this->category->all();
        $recusive = new Recusive();
        $htmlOption = $recusive->categoryRecusive($data, $parent_id = 0, $char = '', $category); 
        return view('backend.category.edit', compact('category', 'htmlOption'));
    }

    public function update(Request $request, $id) {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id) {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }

}
