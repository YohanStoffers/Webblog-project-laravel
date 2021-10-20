<x-layout>

    <x-slot name="content">

        <h1>You're published articles</h1>

        @foreach($userAccount->articles as $article)

        <table class="article-tables">

            <div>
                <tr>
                    <td class="article-data">
                        <h3 class="article-title"><a class="article-links" href="{{ route('articles.show', $article->id)}}">{{'Title: '.$article->title}}</a></h3>
                        <h5 class="created-updated">{{' Author: '.$userAccount->username}}</h5>

                        <p>{{$article->content}}</p>
                        <h5 class="created-updated">{{'Created at '.$article->created_at.'. Updated at '.$article->updated_at.'.'}}</h5>
                        <a class="edit-button" href="{{route('articles.edit', $article->id)}}">Edit article</a>
                    </td>
                </tr>
            </div>


        </table>

        @endforeach

    </x-slot>

</x-layout>