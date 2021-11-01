<x-layout>

    <x-slot name="content">

        <h1>articles</h1>
        <div>
            <form method="POST" enctype="multipart/form-data" action="{{route('articles.store')}}">
                @csrf
                <table>
                    <div id='article-main'>
                        <tr>
                            <td><label for="title">Article title</label></td>
                            <td><input type='text' name='title' require></td>
                            <td class='error'>@error('title'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="content">Article</label></td>
                            <td><textarea name='content' rows="20" cols="100" require></textarea></td>
                            <td class='error'>@error('article'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="categories">categories</label></td>
                            <td>
                                @foreach($categories as $category )
                                <input type='checkbox' name='categories[]' value="{{$category->id}}">{{$category->name}}
                                @endforeach
                            </td>
                            <td class='error'>@error('categories'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <label for="img">Upload image:</label>
                                <input type="file" name='image'>
                                <button type="submit">Publish article</button>
                            </td>
                        </tr>



                    </div>
                </table>



            </form>
        </div>

    </x-slot>

</x-layout>