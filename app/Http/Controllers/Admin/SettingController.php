<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingAddRequest;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    protected $setting;
    public function __construct()
    {
        $this->setting = new Setting();
    }
    public function index(Request $request)
    {
        $headers=[
            ['name'=>'STT','sort'=>'dataTable-sorter','width'=>'10%'],
            ['name'=>'Config Key','width'=>'20%'],
            ['name'=>'Config Value','width'=>'50%'],
            ['name'=>'Action','width'=>'20%'],
        ];
        $settings = $this->setting->latest()->get();
        return view('admin.setting.index', compact( 'settings','headers'));
    }
    
    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingAddRequest $request)
    {
        $dataInsert = [
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type,
        ];
        $this->setting->create($dataInsert);
        return redirect()->back();
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }
    

    public function update($id, Request $request)
    {
        $dataUpdate = [
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
        ];
        $this->setting->find($id)->update($dataUpdate);
        return redirect()->route('admin.settings.index');
    }
    

    public function delete($id)
    {
        try {
            $this->setting->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    
}