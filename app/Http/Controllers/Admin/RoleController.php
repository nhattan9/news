<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleAddRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class RoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct()
    {
        $this->role = new Role();
        $this->permission = new Permission();
    }
    public function index()
    {
        $headers=[
            ['name'=>'STT','sort'=>'dataTable-sorter','width'=>'10%'],
            ['name'=>'Tên','width'=>'20%'],
            ['name'=>'Tên hiển thị','width'=>'20%'],
            ['name'=>'Vai trò','width'=>'20%'],
            ['name'=>'Action','width'=>'20%'],

        ];
        $roles=$this->role->latest()->get();
        return view('admin.role.index',compact('roles','headers'));
    }
    public function create()
    {
        $permissionParent = $this->permission->where('parent_id',0)->get();
        return view('admin.role.add',compact('permissionParent'));
    }
    public function store(RoleAddRequest $request)
    {
    try {
        DB::beginTransaction();
        $dataInsert = [
            'name'=>$request->name,
            'display_name'=>$request->display_name,
        ];
        $role = $this->role->create($dataInsert);
        $role->pers()->attach($request->permission_id);
        DB::commit();
        return redirect()->route('admin.roles.index')->with('status','Thêm thành công');
    } catch (\Exception $exception) {
       DB::rollBack();
       Log::error('----------Messages----------'.$exception->getMessage().'-----Line------'.$exception->getLine());
    }
       
    }
    public function edit($id)
    {
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        $role= $this->role->find($id);
        $permissionChecked = $role->pers;
        return view('admin.role.edit',compact('role','permissionParent','permissionChecked'));
    }
    public function update($id,RoleAddRequest $request)
    {
        try {
            DB::beginTransaction();
            
           $this->role->find($id)->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            $role = $this->role->find($id);
            $role->pers()->sync($request->permission_id);
            
            DB::commit();
            return redirect()->route('admin.roles.index')->with('status','Cập nhật thành công');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('---Message error : ' . $e->getMessage() . ' ---Line:  ' . $e->getLine());
        }
    }
   
    public function delete($id)
    {
        try {
            $this->role->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => "Delete Success"
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . '---Dòng :' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => "Delete Fail"
            ], 500);
        }
    }
}