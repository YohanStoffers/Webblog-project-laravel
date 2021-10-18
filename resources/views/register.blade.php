<x-layout>

    <x-slot name="content">

        <div class='register'>
            <h1 id="register-title">Register</h1>
            <p>
                Maak een nieuw account aan
            </p>

            <form name='register' method="POST" action="/users">
                @csrf
                <table>
                    <tr class='error'>
                        <td>@error('username'){{$message}}@enderror</td>
                        <td>@error('email'){{$message}}@enderror</td>
                        <td>@error('password'){{$message}}@enderror</td>
                        <td>@error('password'){{$message}}@enderror</td>
                        <td>@error('author'){{$message}}@enderror</td>
                        <td>@error('premium'){{$message}}@enderror</td>
                    </tr>
                    <tr>
                        <div id='register-main'>
                            <td><label for="username">Username</label><input type='text' name='username' require></td>
                            <td><label for="email">Email</label><input type='text' name='email' require></td>
                            <td><label for="password">Password</label><input type='password' name='password' require></td>
                            <td><label for="re-password">Re Password</label><input type='password' name='re-password' require></td>
                            <td><button tpye="submit" name="submit">Make Acount</button></td>
                        </div>
                        <div id='register-options'>
                    </tr>
                    <tr>
                        <td><label for="premium">Premium account</label><input type='hidden' name='premium' value="0"></td>
                        <td><input type='checkbox' name='premium' value="1"></td>
                        <td><label for="author">I am auhtor</label><input type='hidden' name='author' value="0"></td>
                        <td><input type='checkbox' name='author' value="1"></td>
                    </tr>
        </div>
        </table>
        </form>

        </div>

    </x-slot>

</x-layout>