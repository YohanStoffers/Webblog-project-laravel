<x-layout>

    <x-slot name="content">


        <div class="article-fully">

            <h5 class="type-article{{$article->premium}}">
                Article Type:
                @if($article->premium===1)
                <text class="premium ">Premium</text>
                @else
                <text class="type-article">Basic</text>
                @endif
            </h5>

            <h3 class="article-title0">{{'Title: '.$article->title}}</h3>
            <h5 class="categories-article0">
                Categories:
                @foreach($article->categories as $category)
                {{$category->name.' '}}
                @endforeach
            </h5>
            <h5 class="created-updated0">{{' Author: '.$article->user->username}}</h5>
            <p>{{$article->content}}</p>
            <img class="article-image" src="{{asset('storage/'.$article->image)}}" alt="" />
            <h5 class="created-updated0">
                {{'Created at '.$article->created_at.'. Updated at '.$article->updated_at.'.'}}
            </h5>



        </div>

        <div class="comments">
            <h3 class="article-title">Comments</h3>
            <form method="post" action="{{route('comment.store', $article->id)}}">
                @csrf
                <table class="comment">
                    <tr>
                        <td>
                            <h5 class="created-updated">Write a comment</h5>
                        </td>
                    </tr>
                    <tr>
                        <td><textarea name="comment" rows="5" cols="100"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><button type="submit">Post comment</button>
                            @error('content'){{$message}}@enderror
                        </td>
                    </tr>
                </table>
            </form>
            @foreach($article->comments as $comment)
            <table>
                <tr>
                    <td>
                        <h5 class="comment-username">{{$comment->user->username}}</h5>
                    </td>
                </tr>
                <tr>
                    <td class='comment-text'>
                        {{$comment->comment}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="created-updated0">Posted on: {{$comment->created_at}}</h5>
                    </td>
                </tr>
            </table>
            @endforeach
        </div>



    </x-slot>

</x-layout>