<div clas="text-2xl text-center my-16"><b>プロフィール</b></div>


<div class="card-body">  
    <table class="table table-striped flex justify-center">  
        <tr>
            <th>氏名</th>
            <td>{{ Auth::user()->name }}</td>
        </tr>  
        <tr>
            <th>メールアドレス</th>
            <td>{{ Auth::user()->email }}</td>
        </tr>
    </table>
  
    <a class="btn btn-outline bg-lime-400" href="{{ route('users.edit', Auth::user()) }}">編集</a>
</div>