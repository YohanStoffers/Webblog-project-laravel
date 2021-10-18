<x-layout>

    <x-slot name="content">

        <h1>title page </h1>
        <div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu urna vestibulum, viverra sapien vel, imperdiet metus. Vivamus dictum volutpat est, id porta purus blandit vitae. Donec ipsum sem, malesuada sed viverra ac, aliquam sit amet felis. Nulla fringilla, enim vel rhoncus molestie, lacus nisl semper neque, id porta augue metus a sem. Maecenas accumsan nisl id posuere tempor. Donec velit lacus, tempor vitae lacus sit amet, pulvinar laoreet arcu. Quisque id imperdiet ante. Pellentesque porta, felis quis imperdiet iaculis, leo magna vestibulum nulla, sed vehicula nibh mauris nec mauris.
            </p>
        </div>

        <show-user-test>
            <h2>All users in DB (testing)</h2>
            <table>
                @foreach($names as $name)

                <tr>
                    <td>{{'user id '.$name->id.' Username '.$name->username}}</td>
                    <td>email {{$name->email}}</td>
                    <td>premium {{$name->premium}}</td>
                    <td>author {{$name->author}}</td>
                </tr>

                @endforeach

            </table>
        </show-user-test>




    </x-slot>

</x-layout>