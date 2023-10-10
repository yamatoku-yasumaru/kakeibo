<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            
            $categories = $user->categories()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'categoriess' => $categories,
            ];
        }
        
        return view('categories.index', $data);
    }
    
     public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:20',
            'user_id' => 'required|integer',
        ]);
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->categories()->create([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    
     public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }
 
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }


}
