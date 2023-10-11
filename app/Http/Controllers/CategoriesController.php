<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;   

class CategoriesController extends Controller
{
    public function index()
    {
        // カテゴリー一覧を取得
        $categories = Category::all(); 
        
         // 一覧ビューで表示
        return view('categories.index', [
            'categories' => $categories,
        ]);                            

    }
    
     public function create()
    {
        $category = new Category;
        
         return view('categories.create', [
            'category' => $category,
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:20',
            'user_id' => 'required|integer',
        ]);
        
       // 登録処理
        $category = new Category;
 
        $category->user_id = $request->user_id;
        $category->name = $request->name;
        $category->save();

         return redirect('/');
    }
    
     public function show(string $id)
    {
      // idの値で検索して取得
        $category = Category::findOrFail($id);

        // 詳細ビューでそれを表示
        return view('categories.show', [
            'category' => $category,
        ]);

    }

    public function edit(string $id)
    { 
       // idの値でメッセージを検索して取得
        $record = Record::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('records.edit', [
            'record' => $record,
        ]);
    }
 
     // putまたはpatchでrecords/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
       // バリデーション
        $request->validate([
            'name' => 'required|max:20',
            'user_id' => 'required|integer',
        ]);

        // idの値でメッセージを検索して取得
        $category = Category::findOrFail($id);
        // メッセージを更新
        $category->name = $request->input('name');
        $category->user_id = $request->input('user_id');

        dd($category);   

        $category->save();

        // トップページへリダイレクトさせる
        return redirect('/');

    }

    // deleteでrecords/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $record = Category::findOrFail($id);
        // メッセージを削除
        $category->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
