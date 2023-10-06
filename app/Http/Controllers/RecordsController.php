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

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
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
            'date'=> 'required|integer',
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

        return;
    }
    
      // getでmessages/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        //
    }

    // getでmessages/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //
    }

    // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //
    }

    // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        //
    }
}
