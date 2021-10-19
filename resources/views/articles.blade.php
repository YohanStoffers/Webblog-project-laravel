<x-layout>

    <x-slot name="content">

        <h1>articles</h1>
        <div>
            <form name='article-post' method="POST" action="/articles">
                @csrf
                <table>
                    <div id='article-main'>
                        <tr>
                            <td><label for="title">Article title</label></td>
                            <td><input type='text' name='title' require></td>
                            <td class='error'>@error('title'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="article">Article</label></td>
                            <td><textarea name='article' rows="20" cols="100" require></textarea></td>
                            <td class='error'>@error('article'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="categories">categories</label></td>
                            <td><input type='text' name='categories' require></td>
                            <td class='error'>@error('categories'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit">Publish article</button></td>
                        </tr>
    
                      

                    </div>
                </table>



            </form>
        </div>

    </x-slot>

</x-layout>