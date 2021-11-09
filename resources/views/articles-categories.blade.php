<x-layout>

    <x-slot name="content">
        <div>
            <h2>Articles filter</h2>
            <table>
                <tr>
                    @foreach($categories as $category)
                    <td class="filters">{{$category->name}}
                    <td>
                        @endforeach
                </tr>
            </table>
            <div>



                @foreach($categories as $category)
                <h3 class="article-title0">{{$category->name}}</h3>
                @foreach($category->articles as $article)
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

                @endforeach
                @endforeach

    </x-slot>

</x-layout>