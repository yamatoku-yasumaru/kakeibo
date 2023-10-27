<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Category;   
use App\Models\Record;

class CategoriesController extends Controller
{
    public function index()
    {
        // カテゴリー一覧を取得
        $categories = Category::where('user_id', \Auth::id())->get(); 
        
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
        'category' => 'required|max:20',
        'name'=>'unique:App\Models\Category,user_id'
        ],
         [
        'name.unique' => 'すでに同じカテゴリー名が登録されています。',
        ]);
        
       // 登録処理
        $category = new Category;
 
        $category->user_id = \Auth::id();
        $category->name = $request->category;
        $category->save();

         return redirect('/categories');
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
    
    // getでcategories/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit(string $id)
    { 
       // idの値でメッセージを検索して取得
        $category = Category::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('categories.edit', [
            'category' => $category,
        ]);
    }
 
      // putまたはpatchでcategories/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
       // バリデーション
        $request->validate([
            'category' => 'required|max:20',
            'name'=>'unique:App\Models\Category,user_id'
        ]);

        // idの値でメッセージを検索して取得
        $category = Category::findOrFail($id);
        // メッセージを更新
        $category->user_id = \Auth::id();
        $category->name = $request->category;
        $category->save();

        // トップページへリダイレクトさせる
        return redirect('/categories');

    }

    // deleteでcategories/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $category = Category::findOrFail($id);
        // 削除
        $category->delete();

        // トップページへリダイレクトさせる
        return redirect('/categories');
    }
}