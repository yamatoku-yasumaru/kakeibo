<!--ユーザーの情報と編集ボタン-->
<h2>プロフィール</h2>
 
<div style="margin-top: 30px;">
   
<table class="table table-striped">  
<tr>
<th>氏名</th>
<td>{{ Auth::user()->name }}</td>
</tr>  
<tr>
<th>メールアドレス</th>
<td>{{ Auth::user()->email }}</td>
</tr>  
<tr>

  
    <td><a class="btn btn-outline" href="{{ route('users.edit', Auth::user()) }}">編集</a></td>
</table>
 
          
