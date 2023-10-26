
    <figure>
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img src="{{ Gravatar::get(Auth::user()->email, ['size' => 200]) }}" alt="">
    </figure>
 
    <table class="table border w-3/5">            
        <tr>
            <th>氏名</th>
            <td>{{ Auth::user()->name }}</td>
        </tr>  
        <tr>
            <th>メールアドレス</th>
            <td>{{ Auth::user()->email }}</td>
        </tr>
    </table>
