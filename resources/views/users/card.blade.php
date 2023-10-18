

<div class="mt-4">
    @if (isset($categories))
        <ul class="list-none">
            @foreach ($categories as $category)
                <li class="flex items-start gap-x-2 mb-4">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    <div class="avatar">
                        <div class="w-12 rounded">
                            <img src="{{ Gravatar::get($category->user->email) }}" alt="" />
                        </div>
                    </div>
                    <div>
                        <div>
                            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            <a class="link link-hover text-info" href="{{ route('users.index', $category->user->id) }}">{{ $category->user->name }}</a>
                        </div>
                       
                    </div>
                </li>
            @endforeach

    @endif
</div>