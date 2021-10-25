<x-layout>

    <x-slot name="content">

        <h1>articles</h1>

        <div>
            <form name='article-post' method="POST" action="/articles/{{$article->id}}">
                @csrf
                <table>
                    <div id='article-main'>
                        <tr>
                            <td><label for="title">Article title</label></td>
                            <td><input type='text' name='title' value="{{$article->title}}" require></td>
                            <td class='error'>@error('title'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="content">Article</label></td>
                            <td><textarea name='content' rows="20" cols="100" require>{{$article->content}}</textarea></td>
                            <td class='error'>@error('article'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="categories">categories</label></td>
                            <td>
                                @foreach($categories as $category)
                                
                                @if($category->id === $articleCategories[$i]->id)
                                <input type='checkbox' name='categories' checked="yes" value="{{$category->id}}">{{$category->name}}
                                {{$i++}}
                                @else
                                <input type='checkbox' name='categories' value="{{$category->id}}">{{$category->name}}
                                @endif
                                
                                @endforeach
                            </td>
                            <td class='error'>@error('categories'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit">Edit article</button></td>
                        </tr>



                    </div>
                </table>
                {{$article->categorie}}



            </form>
        </div>

    </x-slot>

</x-layout>