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

                <tr>
                    <td>{{'article title '.$article->title.' User Id '.$article->user_id}}</td>
                    <td>{{$article->content}}</td>
                 
                    
                </tr>

                @endforeach

            </table>
        </show-user-test>




    </x-slot>

</x-layout>