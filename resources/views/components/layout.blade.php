<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='/style.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <title>laravel webblog opdracht</title>

</head>


<body>
    <div class="grid-container">
        <div class="grid-header">
            <nav>
                <table class="navigation-table">
                    <td>
                        <h3 class="navigation">Navigation</h3>
                    </td>
                    <td><a href='/'>Home Page</a></td>
                    <td><a href='{{ route("Create-article") }}'>Create article</a></td>
                    <td><a href='{{ route("Articles") }}'>Published articles</a></td>
                    @guest
                    <td><a href='{{ route("users/create") }}'>Register</a></td>
                    @endguest
                </table>
            </nav>
            @guest


            <form method="post" , action="/login">
                @csrf
                <table class="login-table">
                    <tr>
                        <td>@error('username'){{$message}}@enderror</td>
                        <td>@error('password'){{$message}}@enderror</td>
                    </tr>
                    <tr>
                        <td class="login">
                            <h3>Guest</h3>
                        </td>
                        <td class="login">Username <input type='text' name='username'></td>
                        <td class="login">Password <input type='password' name='password'></td>
                        <td class="login"><button type="submit">Login</button></td>
                    </tr>
                </table>
            </form>

            @endguest
            @auth

            <table class="login-table">
                <tr>
                    <td class="logout">
                        <h3 class="welcome">Welcome, {{ ' '.auth()->user()->username }}</h3>
                    </td>

                    @if((auth()->user()->author) === 1)
                    <td class="author logout">site author</td>
                    @endif
                    @if((auth()->user()->premium) === 1)
                    <td class="premium logout">Premium account</td>
                    @endif
                    <form method="POST" action="/logout">
                        @csrf
                        <td><button type="submit">Log Out</button></td>
                    </form>

                </tr>
            </table>

            @endauth


        </div>

        <div class="grid-content">

            <!-- main content section for the blog webpage -->
            {{$content}}

        </div>
    </div>




</body>


<footer>
    <div class="grid-container">
        <div class="grid-footer">
            <p>Edit this footer later !!</p>
        </div>
    </div>
</footer>