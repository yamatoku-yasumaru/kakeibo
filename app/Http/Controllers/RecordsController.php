<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Record;
use App\Models\Category;
use Carbon\Carbon;

class RecordsController extends Controller
{
    // getでrecords/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // 入力一覧を取得
        $records = Record::orderBy('date')->paginate(10);
        $total_amount = $records->sum("amount");
        
         // 一覧ビューでそれを表示
        return view('records.index', [
            'records' => $records,
            'total_amount' => $total_amount,
        ]); 
    }
    
    /**
     * イベントを取得
     *
     * @param  Request  $request
     */
    public function scheduleGet(Request $request)
    {
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer'
        ]);

        // カレンダー表示期間
        $start_date = $request->input('start_date') ;
        $end_date = $request->input('end_date') ;

        // 登録処理
        return Record::query()
            ->select(
                // FullCalendarの形式に合わせる
                'start_date as start',
                'end_date as end',
            )
            // FullCalendarの表示範囲のみ表示
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
    }


    // getでrecords/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
         $record = new Record;
         $categories = Category::all();

        // メッセージ作成ビューを表示
        return view('records.create', [
            'record' => $record,
            'categories' => $categories,
        ]);
    }
    
    /**
     * 新規登録処理
     *
     * @param  Request  $request
     */
    public function store(Request $request)
    {
        /*dd($request);*/
        // バリデーション
        $request->validate([
            'category_id'=> 'required|integer',
            'date'=> 'required|date',
            'amount'=> 'required|max:7',
            'memo'=> 'required|max:20'
        ]);

        // 登録処理
        $record = new Record;
       
        $record->date = $request->date;
        $record->category_id = $request->category_id;
        $record->amount = $request->amount;
        $record->memo = $request->memo;
        $record->save();

        return redirect('/');
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

    // getでrecords/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $record = Record::findOrFail($id);
        $categories = Category::all();

        // メッセージ編集ビューでそれを表示
        return view('records.edit', [
            'record' => $record,
            'categories' => $categories,
        ]);
    }

    // putまたはpatchでrecords/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'category_id'=> 'required|integer',
            'input_time'=> 'required|date',
            'amount'=> 'required|max:7',
            'memo'=> 'required|max:20'
        ]);
        
        // idの値でメッセージを検索して取得
        $record = Record::findOrFail($id);
        
        // 更新
        $record->date = $request->input('date');
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
