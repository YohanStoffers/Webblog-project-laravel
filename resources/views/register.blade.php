<x-layout>

    <x-slot name="content">

        <div class='register'>
            <h1 id="register-title">Register</h1>
            <p>
                Maak een nieuw account aan
            </p>

            <form name='register' method="POST" action="/Make-account">
                @csrf
                <div id='register-main'>
                    <label for="username">Username</label>
                    <input type='text' name='username' require>
                    <label for="email">Email</label>
                    <input type='text' name='email' require>
                    <label for="password">Password</label>
                    <input type='password' name='password' require>
                    <label for="re-password">Re Password</label>
                    <input type='password' name='re-password' require>
                    <button tpye="submit" name="submit">Make Acount</button>
                </div>
                <div id='register-options'>
                    <label for="premium">Premium account</label>
                    <input type='hidden' name='premium' value="0">
                    <input type='checkbox' name='premium' value="1">
                    <label for="author">I am auhtor</label>
                    <input type='hidden' name='author' value="0">
                    <input type='checkbox' name='author' value="1">

                </div>
            </form>

        </div>

    </x-slot>

</x-layout>