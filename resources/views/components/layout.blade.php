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
                    <td><a href='{{ route("articles.create") }}'>Create article</a></td>
                    @auth
                    
                    <td><a href='{{ route("articles.index") }}'>Published articles</a></td>
                    
                    @endauth
                    <td>
                        @guest
                        <a href='{{ route("user.create") }}'>Register</a>
                        @endguest

                        @auth
                        <a href="{{ route('users.show', auth()->user()->id)}}">My Account</a>
                        @endauth

                    </td>
                    <td>
                        @auth
                        @if(auth()->user()->premium === 0)
                        <a href="{{ route('users.edit', auth()->user()->id)}}">Upgrade account</a>
                        @endif
                        @endauth
                    </td>
                </table>
            </nav>
            @guest
            <table class="login-table">
                <form method="post" , action="/login">
                    @csrf
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
                </form>
            </table>

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
            <table class="search-table">
                <form method='post' action="/">
                    <tr>
                        <td>
                            <h3 class="welcome">Search</h3>
                        </td>
                        <td>
                            <input type="text" name="title">
                        </td>
                        <td>
                            <button type="submit">find it</button>
                        </td>
                    </tr>
                </form>
            </table>


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