<x-mail>
    <x-slot name="content">
        <h1>Hello, {{$user->username}} how are you</h1>
        <h5>
            @if($user->premium === 1)
            You're account type: premium
            @else
            You're account type: basic
            @endif
        </h5>
        <h3>This weeks articles are here.</h3>
        <br>

        @foreach($articles as $article)
        @if(!($user->premium === 0 && $article->premium === 1))

        <h2>Title: {{$article->title}}</h2>
        <h5>
            @if($article->premium === 1)
            Premium article
            @else
            Basic article
            @endif
        </h5>
        <h5>Author: {{$article->user->username}}</h5>
        <p>{{$article->content}}</p>
        <h5>Published at: {{$article->created_at}}</h5>
        <hr>
        <br>
        @endif
        @endforeach

    </x-slot>
</x-mail>