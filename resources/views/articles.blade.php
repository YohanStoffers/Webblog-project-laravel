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
        <table class="article-tables">

            <div>
                <tr>
                    <td class="article-data">
                        <h3 class="article-title"><a class="article-links" href="{{ route('articles.show', $article->id)}}">{{'Title: '.$article->title}}</a></h3>
                        <h5 class="categories-article">
                            Categories:
                            @foreach($article->categories as $category)
                            {{$category->name.' '}}
                            @endforeach
                        </h5>
                        <h5 class="created-updated">{{' Author: '.$article->user->username}}</h5>

                        <p>{{$article->content}}</p>
                        <h5 class="created-updated">{{'Created at '.$article->created_at.'. Updated at '.$article->updated_at.'.'}}</h5>
                    </td>
                </tr>
            </div>

        </table>

        @endforeach

    </x-slot>

</x-layout>