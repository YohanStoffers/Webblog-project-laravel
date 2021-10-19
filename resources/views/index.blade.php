<x-layout>

    <x-slot name="content">

        <h1>title page </h1>
        <div class="published-articles">
            <p>
                Published articles here!
            </p>
        </div>

        <show-user-test>
            <h2>All users in DB (testing)</h2>
            <table>
                @foreach($articles as $article)

                <table class="article-tables">

                    <div>
                        <tr>
                            <td class="article-data">
                                <h3 class="article-title">{{'Title: '.$article->title}}</h3>
                                <h5 class="created-updated">{{' Author: '.$article->user_id .' id'}}</h5>

                                <p>{{$article->content}}</p>
                                <h5 class="created-updated">{{'Created at '.$article->created_at.'. Updated at '.$article->updated_at.'.'}}</h5>
                            </td>
                        </tr>
                    </div>


                </table>

                @endforeach

            </table>
        </show-user-test>




    </x-slot>

</x-layout>