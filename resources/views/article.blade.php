<x-layout>

    <x-slot name="content">


        <div class="article-fully">

            <h3 class="article-title">{{'Title: '.$article->title}}</h3>
            <h5 class="created-updated">{{' Author: '.$article->user->username}}</h5>
            <p>{{$article->content}}</p>
            <h5 class="created-updated">{{'Created at '.$article->created_at.'. Updated at '.$article->updated_at.'.'}}</h5>

        </div>



    </x-slot>

</x-layout>