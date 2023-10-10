<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Record;

class RecordsController extends Controller
{
    // getでrecords/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // 入力一覧を取得
        $records = Record::all(); 
        
         // 一覧ビューでそれを表示
        return view('records.index', [
            'records' => $records,
        ]);                              
    }

    // getでrecords/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
         $record = new Record;

        // メッセージ作成ビューを表示
        return view('records.create', [
            'record' => $record,
        ]);
    }
    
    /**
     * 新規登録処理
     *
     * @param  Request  $request
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'category_id'=> 'required|integer',
            'date'=> 'required|date',
            'amount'=> 'required|max:7',
            'memo'=> 'required|max:20'
        ]);

        // 登録処理
        $record = new Record;
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        $record->date = date('Y-m-d', $request->input('date') / 1000);
        $record->category_id = $request->input('category_id');
        $record->amount = $request->input('amount');
        $record->memo = $request->input('memo');
        $record->save();

        return back();
    }
    
      // getでrecords/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
      // idの値で検索して取得
        $record = Record::findOrFail($id);

        // 詳細ビューでそれを表示
        return view('records.show', [
            'record' => $record,
        ]);

    }

    // getでrecords/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
     public function edit(Request $request)
     {
        // どのレコードを編集するか取得
        $id = $request->input('id');
        $data = Record::find($id);
     
    }

    // putまたはpatchでrecords/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'category_id'=> 'required|integer',
            'date'=> 'required|integer',
            'amount'=> 'required|integer',
            'memo'=> 'required|max:20'
        ]);
        
        // idの値でメッセージを検索して取得
        $record = Record::findOrFail($id);
        // 更新
        $record->date = date('Y-m-d', $request->input('date') / 1000);
        $record->category_id = $request->input('category_id');
        $record->amount = $request->input('amount');
        $record->memo = $request->input('memo');
        $record->save();
        
        return redirect('/');

    }

    // deleteでrecords/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $record = Record::findOrFail($id);
        // メッセージを削除
        $record->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
