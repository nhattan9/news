<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Components\Recusive;
use App\Http\Requests\CategoryAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    protected $category;

    public function __construct(){
        $this -> category = new Category();
    }
    public function index(Request $request){
        $categories = $this->category->latest()
                                     ->where('name', 'LIKE', '%' .$request->search. '%')
                                     ->paginate(10);
        $categories->appends(['search' => $request->search]);
        $headers=[
            ['name'=>'STT','sort'=>'dataTable-sorter','width'=>'10%'],
            ['name'=>'Tên','width'=>'20%'],
            ['name'=>'Order','width'=>'5%'],
            ['name'=>'Danh mục cha ','width'=>'15%'],
            ['name'=>'Color','width'=>'10%'],
            ['name'=>'ShowOnMenu','width'=>'10%'],
            ['name'=>'ShowOnHomePage','width'=>'10%'],
            ['name'=>'Ngày tạo','width'=>'10%'],
            ['name'=>'Action','width'=>'20%'],


        ];
        return view('admin.category.index',compact('categories','headers'));
    }
    public function create(){
        $categories = $this->category->latest()->get();
        $htmlOption  = $this->getCategory($parent_id="");
        return view('admin.category.add',compact('categories','htmlOption'));
    }
    public function store( CategoryAddRequest $request){
       
        try {
            DB::beginTransaction();
            $slugConvert = Str::slug($request->name,'-');
            $dataStore = [
                'name' => $request->name,
                'slug' => $request->slug ?? $slugConvert,
                'descriptions' => $request->description,
                'keywords'=>$request->keywords,
                'color' => $request->color,
                'parent_id' => $request->parent_id,
                'menu_order' => $request->menu_order,
                'show_on_menu'=>($request->show_on_menu == 'on') ? "0" : "1" ,
                'show_on_homepage'=>($request->show_on_homepage == 'on') ? "0" : "1" ,
            ];
            
            $this->category->create($dataStore);
            DB::commit();
            return redirect()->back()->with('status','Thêm thành công ');
           
            
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '_____Line:' .$exception->getLine());
        }
      
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();

        $recusive = new Recusive($data);
        $htmlOption = $recusive->CategoryRecusive($parent_id);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption  = $this->getCategory($category->parent_id);
        return view('admin.category.edit',compact('category','htmlOption'));
    }
    public function update($id,Request $request)
    {
        try {
            DB::beginTransaction();
            $slugConvert = Str::slug($request->name,'-');
            $dataUpdate = [
                'name' => $request->name,
                'slug' => $request->slug ?? $slugConvert,
                'descriptions' => $request->description,
                'keywords'=>$request->keywords,
                'color' => $request->color,
                'parent_id' => $request->parent_id,
                'menu_order' => $request->menu_order,
                'show_on_menu'=>($request->show_on_menu == 'on') ? "0" : "1" ,
                'show_on_homepage'=>($request->show_on_homepage == 'on') ? "0" : "1" ,
            ];
            
            $this->category->find($id)->update($dataUpdate);
            DB::commit();
            return redirect()->route('admin.categories.index')->with('status','Update thành công ');
           
            
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '_____Line:' .$exception->getLine());
        }
    }

    public function delete($id) {
        try {
            $this->category->find($id)->delete();
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