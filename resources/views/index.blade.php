<x-layout>

    <x-slot name="content">

        <h1>Home page </h1>
        <div class="published-articles">
            <p>
                Published articles here!
            </p>
        </div>

        <show-user-test>
            <h2>All users in DB (testing)</h2>
            @guest
            @foreach($articles as $article)
            @if( $article->premium === 0)
            <table class="article-tables{{$article->premium}}">

                <div>
                    <tr>
                        <td class="article-data">
                            <h3 class="article-title{{$article->premium}}"><a class="article-links{{$article->premium}}" href="{{ route('articles.show', $article->id)}}">{{'Title: '.$article->title}}</a></h3>
                            <h5 class="categories-article">
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
            @endguest

            @auth
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
                            <h5 class="created-updated{{$article->premium}}">{{' Author: '.$article->user->username}}</h5>

                            <p>{{$article->content}}</p>
                            <h5 class="created-updated{{$article->premium}}">{{'Created at '.$article->created_at.'. Updated at '.$article->updated_at.'.'}}</h5>
                        </td>
                    </tr>
                </div>

            </table>
            @endif
            @endforeach
            @endauth

        </show-user-test>




    </x-slot>

</x-layout>