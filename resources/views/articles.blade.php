<x-layout>

    <x-slot name="content">
        <h2>All articles</h2>
        <table>
            <form method="POST" action="{{route('categories.show')}}">
                @csrf
                <tr>
                    <td>
                        @foreach($categories as $category)

                        <input type="checkbox" name="categories[]" value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                    </td>
                    <td>
                        <button type="sumbit">search</button>
                    </td>
                </tr>
            </form>
        </table>
        @foreach($articles as $article)
        @if(!(auth()->user()->premium === 0 && $article->premium === 1))
        <table class="article-tables{{$article->premium}}">

            <div>
                <tr>
                    <td class="article-data">
                        <h3 class="article-title{{$article->premium}}"><a class="article-links{{$article->premium}}" href="{{ route('articles.show', $article->id)}}">{{'Title: '.$article->title}}</a></h3>
                        <h5 class="type-article{{$article->premium}}">
                            Article Type:
                            @if($article->premium===1)
                            <text class="premium">Premium</text>
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
                        <h5 class="created-updated{{$article->premium}}">{{' Author: '.$article->user->username}}</h5>

                        <p>{{$article->content}}</p>

                        <h5 class="created-updated{{$article->premium}}">{{'Created at '.$article->created_at.'. Updated at '.$article->updated_at.'.'}}</h5>
                    </td>
                </tr>
            </div>

        </table>

        @endif
        @endforeach

    </x-slot>

</x-layout>