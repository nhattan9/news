<?php

namespace App\Http\Controllers\Admin;

use App\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PermissionController extends Controller
{
    private $permission;
    public function __construct()
    {
        $this->permission = new Permission();
    }
    public function index()
    {
        $pers = $this->permission->orderBy('parent_id','asc')->get();
        $htmlOption = $this->getPermissions($parent_id="");
        $headers=[
            ['name'=>'STT','sort'=>'dataTable-sorter','width'=>'10%'],
            ['name'=>'Tên hiển thị','width'=>'20%'],
            ['name'=>'KeyCode','width'=>'20%'],
            ['name'=>'Thuộc','width'=>'20%'],
            ['name'=>'Action','width'=>'20%'],

        ];
        return view('admin.permission.index', compact('pers','htmlOption','headers'));
    }
    public function getPermissions($parent_id)
    {
        $data = $this->permission->all();

        $recursive = new Recusive($data);
        $htmlOption = $recursive->CategoryRecusive($parent_id);
        return $htmlOption;
    }
    public function store(Request $request)
    {
         $validator = FacadesValidator::make($request->all(),[
        'display_name'=>'required',
        'key_code'=>'required|unique:permissions,key_code',
         ],[
            'display_name.required'=>'Tên module không được để trống ',
            'key_code.required'=>'Tên keycode không được để trống ',
            'key_code.unique'=>'Tên keycode bị trùng  ',

         ]
         );

    if(!$validator->passes()){
        return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
        $this->permission->create([
            'display_name'=>$request->display_name,
            'name'        =>$request->display_name,
            'key_code'    =>$request->key_code,
            'parent_id'   =>$request->parent_id,
        ]);
        return response()->json(['status'=>1, 'msg'=>'Thêm thành công ']);
    }
        // return redirect()->back()->with('status','Thêm thành công');
    }


    public function delete($id) {
        try {
            $this->permission->find($id)->delete();
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