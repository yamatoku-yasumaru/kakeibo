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
            'user' => $user,                  
        ]);                                                 
    }                                                   
    
   public function show()
    {

    }
    
     public function edit(string $id)
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
            'name' => 'required',
            'email' => 'required|email:filter'
        ]);
        
        // パラメータで指定されたIDをキーにしてUserの情報を取得
        $user = User::findOrFail($id);
        
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
        
        return redirect("/categories");
    }

     // deleteでusers/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        
        Category::where('user_id',$id)->delete();
        User::destroy($id);

        return redirect('/');

    }

    
}