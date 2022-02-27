<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    private $setting;
    public function __construct(Setting $setting) {
        $this->setting = $setting;
    }

    public function index() {
        $settings = $this->setting->latest()->paginate(5);
        return view('backend.setting.index', compact('settings'));
    }

    public function create() {
        return view('backend.setting.add');
    }

    public function store(Request $request) {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);
        return redirect()->route('settings.index');
    }

    public function edit($id) {
        $setting = $this->setting->find($id);
        return view('backend.setting.edit', compact('setting'));
    }

    public function update($id, Request $request) {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ]);
        return redirect()->route('settings.index');
    }

    public function delete($id) {
        $this->setting->find($id)->delete();
        return redirect()->route('settings.index');
    }
}
