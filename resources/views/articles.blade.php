<x-layout>

    <x-slot name="content">
        @foreach($articles as $article)
        <table class="article-tables">

            <div>
                <tr>
                    <td class="article-data">
                        <h3 class="article-title"><a class="article-links" href="{{ route('articles.show', $article->id)}}">{{'Title: '.$article->title}}</a></h3>
                        <h5 class="created-updated">{{' Author: ".$article->user->username}}</h5>

                        <p>{{$article->content}}</p>
                        <h5 class="created-updated">{{'Created at '.$article->created_at.'. Updated at '.$article->updated_at.'.'}}</h5>
                    </td>
                </tr>
            </div>


        </table>
        @endforeach

    </x-slot>

</x-layout>