<x-layout>

    <x-slot name="content">
        @if(auth()->user()->premium === 0)
        <img class="article-image" src="{{asset('images/Ideal.png')}}" alt="" />
        <form enctype="multipart/form-data" method="POST" action="{{route('users.update', auth()->user()->id)}}">
            @csrf
            <table>
                <div id='article-main'>
                    <tr>
                        <td><label class="titles" for="title">Upgrade to premium:</label></td>
                        <td>
                            <input type='hidden' name='premium' value="0">
                            <input type='checkbox' name='premium' value="1">
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <button type="submit">Pay for premium account</button>
                        </td>
                    </tr>
                </div>
            </table>

        </form>

        @else
        <img class="article-image" src="{{asset('images/sad.png')}}" alt="" width="300" />
        <form enctype="multipart/form-data" method="POST" action="{{route('users.update', auth()->user()->id)}}">
            @csrf
            <table>
                <div id='article-main'>
                    <tr>
                        <td><label class="titles" for="title">unsubscribe from premium:</label></td>
                        <td>
                            <input type='hidden' name='premium' value="1">
                            <input type='checkbox' name='premium' value="0">
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <button type="submit">unsubscribe account</button>
                        </td>
                    </tr>
                </div>
            </table>

        </form>
        @endif

    </x-slot>

</x-layout>