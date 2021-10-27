<x-layout>

    <x-slot name="content">

        <div class='register'>
            <h1 id="register-title">Register</h1>
            <p>
                Make a new account
            </p>

            <form name='register' method="POST" action="/users">
                @csrf
                <table>
                    <div id='register-main'>
                        <tr>
                            <td><label for="username">Username</label></td>
                            <td><input type='text' name='username' require></td>
                            <td class='error'>@error('username'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td><input type='text' name='email' require></td>
                            <td class='error'>@error('email'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="password">Password</label></td>
                            <td><input type='password' name='password' require></td>
                            <td class='error'>@error('password'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="re-password">Re Password</label></td>
                            <td><input type='password' name='re-password' require></td>
                            <td class='error'>@error('password'){{$message}}@enderror</td>
                        </tr>

                    </div>
                    <div id='register-options'>

                        <tr>
                            <td><label for="premium">Premium account</label>
                                <input type='hidden' name='premium' value="0">
                            </td>
                            <td><input type='checkbox' name='premium' value="1"></td>
                            <td class='error'>@error('premium'){{$message}}@enderror</td>
                        </tr>
                        <tr>
                            <td><label for="author">I am author</label>
                                <input type='hidden' name='author' value="0">
                            </td>
                            <td><input type='checkbox' name='author' value="1"></td>
                            <td class='error'>@error('author'){{$message}}@enderror</td>
                        </tr>
                        <td><button tpye="submit" name="submit">Make Acount</button></td>

                    </div>
                </table>
            </form>

        </div>

    </x-slot>

</x-layout>