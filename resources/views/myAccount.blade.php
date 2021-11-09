<x-layout>

    <x-slot name="content">
        <h3 class="type-article0">
            Account Type:
            @if(auth()->user()->premium===1)
            <text class="premium ">Premium</text>
            <h5><a href="{{ route('users.edit', auth()->user()->id)}}" class="article-links0">unsubscribe Premium</a></h5>
            @else
            <text class="type-article">Basic</text>
            <h5><a href="{{ route('users.edit', auth()->user()->id)}}" class="article-links0">subscribe Premium</a></h5>
            @endif
        </h3>
        <h1>You're published articles</h1>

        @foreach($userAccount->articles->sortByDesc('updated_at') as $article)

        <table class="article-tables{{$article->premium}}">

            <div>
                <tr>
                    <td class="article-data">
                        <h3 class="article-title{{$article->premium}}"><a class="article-links{{$article->premium}}" href="{{ route('articles.show', $article->id)}}">{{'Title: '.$article->title}}</a></h3>
                        <h5 class="type-article{{$article->premium}}">
                            Article Type:
                            @if($article->premium===1)
                            <text class="premium ">Premium</text>
                            @else
                            <text class="type-article">Basic</text>
                            @endif
                        </h5>
                        <h5 class="categories-article{{$article->premium}}">
                            Categories:
                            @foreach($article->categories as $category)
                            {{$category->name.' '}}
                            @endforeach
                        </h5>
                        <h5 class="created-updated{{$article->premium}}">{{' Author: '.$userAccount->username}}</h5>

                        <p>{{$article->content}}</p>
                        <h5 class="created-updated{{$article->premium}}">{{'Created at '.$article->created_at.'. Updated at '.$article->updated_at.'.'}}</h5>
                        <a class="edit-button{{$article->premium}}" href="{{route('articles.edit', $article->id)}}">Edit article</a>
                        <a class="edit-button{{$article->premium}}" href="{{route('articles.destroy', $article->id)}}">Delete article</a>
                    </td>
                </tr>
            </div>


        </table>

        @endforeach

    </x-slot>

</x-layout>