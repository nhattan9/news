<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccountRequest;
use App\Traits\StorageImageTrait;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UserController extends Controller
{
  use StorageImageTrait;
  public function create(Request $request)
  {
        
        $validator = FacadesValidator::make($request->all(),[
          'fname' => 'required',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|min:5|max:30',
          'cpassword' => 'required|same:password',
        ],[
          'fname.required' => "Tên không được để trống ",

          'email.unique' => "Email này đã được đăng kí rồi ",
          'email.required' => "Email không được để trống ",
          'email.email' => "Email phải có dạng admin@gmail.com",

          'password.required' => "Mật khẩu không được phép trống ",
          'password.min' => "Mật khẩu phải có ít nhất 5 kí tự ",
          'password.max' => "Mật khẩu không vượt quá 12 kí tự ",

          'cpassword.required' => "Mật khẩu không được phép trống ",
          'cpassword.same'=> 'Mật khẩu không khớp',
        ]
      );

      if(!$validator->passes()){
          return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
      }else{

        $userCreate = User::create([
          'name' => $request->fname,
          'email' => $request->email,
          'password' => Hash::make($request->password),
        ]);
        if ($userCreate) {
          Auth::guard('web')->login($userCreate);
          return response()->json(['status'=>1, 'msg'=>'Đăng kí thành công']);
        } else {
          return response()->json(['status'=>1,'msg'=>'Đăng kí thất bại']);

        }
      }

 
  }
  public function check(Request $request)
  {
        $validator = FacadesValidator::make($request->all(),[
          'email'=>'required|email|exists:users,email',
          'password'=>'required|min:5|max:12'
        ],[
          'email.exists' => "Email chưa được đăng kí sử dung ",
          'email.required' => "Emial không được để trống ",
          'email.email' => "Email phải có dạng admin@gmail.com",

          'password.required' => "Mật khẩu không được phép trống ",
          'password.min' => "Mật khẩu phải có ít nhất 5 kí tự ",
          'password.max' => "Mật khẩu không vượt quá 12 kí tự ",
        ]
      );

      if(!$validator->passes()){
          return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
      }else{
          $creds = $request->only('email', 'password');
          if (Auth::guard('web')->attempt($creds)) {
            return response()->json(['status'=>1, 'msg'=>'Đăng hập thành công','to'=>1]);
          }else{
            return response()->json(['status'=>1, 'msg'=>' Tài khoản hoặc mật khẩu không chính xác ','to'=>0]);
          } 
      }
  }
  
  public function logout()
  {
    Auth::guard('web')->logout();
    return redirect()->back();
  }
  
  public function info()
  {
    $categories = Category::where([['parent_id', 0], ['show_on_menu', 0]])
            ->orderBy('menu_order', 'asc')
            ->get();
    return view('user.userInfo',compact('categories'));
  }
  public function myAccount()
  {
    $categories = Category::where([['parent_id', 0], ['show_on_menu', 0]])
            ->orderBy('menu_order', 'asc')
            ->get();
    return view('user.myAccount',compact('categories'));
  }
  public function updateAccount(Request $request)
  {
    $dataArticleUpdate=[
      'name' => $request->username,
      'email'=>$request->email,
    ];
    $dataUploadFeatureImage = $this->storageTraitUpload($request, 'avatar', 'avatarUser');
      if (!empty($dataUploadFeatureImage)) {
          $dataArticleUpdate['avatar'] = $dataUploadFeatureImage['file_path'];
        }
    User::find(Auth::user()->id)->update($dataArticleUpdate);
    return redirect()->back();
  }
  public function changePassword(UpdateAccountRequest $request)
  {
    
    $hashedPassword = Auth::user()->password;
    if (Hash::check($request->current_password , $hashedPassword)) {
      
      $user = User::find(Auth::user()->id);
      $user->password = Hash::make($request->new_password);
      $user->save();
      return redirect()->back()->with('success',' Mật khẩu đã được thay đổi thành công ');

    }else{
      return redirect()->back()->with('fail','Mật khẩu hiện tại không đúng');
    }
  }
  
}