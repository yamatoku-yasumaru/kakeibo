@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>id = {{ $record->id }} の詳細ページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>id</th>
            <td>{{ $record->id }}</td>
        </tr>

        <tr>
            <th>メッセージ</th>
            <td>{{ $record->content }}</td>
        </tr>
    </table>
    