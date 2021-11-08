<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    private $admin;
    private $role;

    public function __construct()
    {
        $this->admin = new Admin();
        $this->role = new Role();
    }
    public function index(Request $request)
    {
        $admins = $this->admin->latest()->paginate(5);
        $page = 1;
        if (isset($request->page)) {
            $page = $request->page;
        }
        $index = ($page - 1) * 5;
        $headers=[
            ['name'=>'Id','sort'=>'dataTable-sorter','width'=>'10%'],
            ['name'=>'Tên danh mục','width'=>'20%'],
            ['name'=>'Email','width'=>'20%'],
            ['name'=>'Vai trò','width'=>'30%'],
            ['name'=>'Action','width'=>'20%'],

        ];
        return view('admin.user.index', compact('admins', 'index','headers'));
    }
    
   
    public function create()
    {
        $roles = $this->role->get();
        return view('admin.user.add', compact('roles'));
    }

    public function store(UserAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataStore = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            $admins = $this->admin->create($dataStore);

            $admins->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {

            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '--Line:' . $exception->getLine());
        }
    }
    
    public function edit($id)
    {
        $admin = $this->admin->find($id);
        $roles = $this->role->get();
        $roleOfAdmin = $admin->roles;
        return view('admin.user.edit', compact('admin', 'roles', 'roleOfAdmin'));
    }
    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)

            ];
            $this->admin->find($id)->update($dataUpdate);

            $admins = $this->admin->find($id);
            $admins->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('admin.users.index');
        } catch (\Exception $exception) {

            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '--Line:' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->admin->find($id)->delete();
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

    public function info()
    {
        return view('admin.user.info');
    }
  
    
}