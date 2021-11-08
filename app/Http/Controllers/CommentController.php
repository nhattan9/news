<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $commnent = Comment::create([
            'content'=>$request->message,
            'article_id'=>$request->article_id,
            'user_id'=>Auth::guard('web')->user()->id,
        ]);
        if(!empty($commnent)){
            $commnent['avatar'] = $commnent->user->avatar;
            $commnent['name'] = $commnent->user->name;

            return response()->json(['commnent' => $commnent]);
        }
    }
    public function delete($id)
    {
        try {
            Comment::find($id)->delete();
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