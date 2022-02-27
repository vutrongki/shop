<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Components\StorageImage;
use App\Models\Backend\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    use StorageImage;
    private $slider;
    public function __construct(Slider $slider) {
        $this->middleware('auth');
        $this->slider = $slider;
    }

    public function index() {
        $sliders = $this->slider->latest()->paginate(5);
        return view('backend.slider.index', compact('sliders'));
    }

    public function create() {
        return view('backend.slider.add');
    }

    public function store(Request $request) {
        $dataSliderCreate = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        $sliderImage = $this->storageUpload($request, 'image','sliders');
        if(!empty($sliderImage)) {
            $dataSliderCreate['image'] = $sliderImage['file_path'];
        }   
        $this->slider->create($dataSliderCreate);    
        return redirect()->route('sliders.index');
    }

    public function edit($id) {
        $slider = $this->slider->find($id);
        return view('backend.slider.edit', compact('slider'));
    }

    public function update($id, Request $request) {
        $dataSliderUpdate = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        $sliderImage = $this->storageUpload($request, 'image','sliders');
        if(!empty($sliderImage)) {
            $dataSliderUpdate['image'] = $sliderImage['file_path'];
        }   
        $this->slider->find($id)->update($dataSliderUpdate);    
        return redirect()->route('sliders.index');
    }

    public function delete($id) {
        $this->slider->find($id)->delete();
        return redirect()->route('sliders.index');
    }
}
