<x-layout>

    <x-slot name="content">
        <table>

            @foreach($articles as $article)
            <div class="article-content">
            <tr>
                <td><h3>{{'Title '.$article->title.' Author User Id '.$article->user_id}}</h3></td>
            </tr>
            <tr>
                <td><p>{{$article->content}}<p></td>
            </tr>
            </div>
            @endforeach


        </table>

    </x-slot>

</x-layout>