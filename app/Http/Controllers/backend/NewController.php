<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\News;
use Illuminate\Http\Request;
use App\Components\StorageImage;

class NewController extends Controller
{
    //
    use StorageImage;
    private $news;
    public function __construct(News $news) {
        $this->news = $news;
    }

    public function index() {
        $news = $this->news->latest()->paginate(5);
        return view('backend.news.index', compact('news'));
    }

    public function create() {
        return view('backend.news.add');
    }

    public function store(Request $request) {
        $dataNewsCreate = [
            'name' => $request->name,
            'description' => $request->description,
            'content' => $request->content,
        ];
        $newsImage = $this->storageUpload($request, 'image','news');
        if(!empty($newsImage)) {
            $dataNewsCreate['image'] = $newsImage['file_path'];
        }   
        $this->news->create($dataNewsCreate);    
        return redirect()->route('news.index');
    }

    public function edit($id) {
        $new = $this->news->find($id);
        return view('backend.news.edit', compact('new'));
    }

    public function update($id, Request $request) {
        $dataNewsUpdate = [
            'name' => $request->name,
            'description' => $request->description,
            'content' => $request->content,
        ];
        $newsImage = $this->storageUpload($request, 'image','news');
        if(!empty($newsImage)) {
            $dataNewsUpdate['image'] = $newsImage['file_path'];
        }   
        $this->news->find($id)->update($dataNewsUpdate);    
        return redirect()->route('news.index');        
    }
    public function delete($id) {

    }
}
