<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;                        
use App\Models\User;
use App\Models\Category;

class UsersController extends Controller
{
    public function index($id)     
    { 
        
        $user = User::findOrFail($id);

        
        return view('users.index', [              
            'users' => $users,                  
        ]);                                                 
    }                                                   
    
   public function show()
    {

    }
    
     public function edit($id)
    {
        
        $user = User::findOrFail($id);
        
        // 取得した値をビュー「user/edit」に渡す
        return view('users.edit', [              
            'user' => $user,
        ]);                           
        
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'user' => 'required',
        ]);
        
        // パラメータで指定されたIDをキーにしてUserの情報を取得
        $category = Category::findOrFail($id);
        
            $user->name = $request->input('user');
            $user->mail = $request->input('user');
            $user->password = $request->input('user');
            $usesr->save();
        // ユーザー一覧へ
        return redirect("/categories");
    }


    
}