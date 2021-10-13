<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='/style.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <title>Opdracht Boodschappenlijst</title>

</head>


<body>
    <div class="grid-container">
        <div class="grid-nav">
            <nav>
                <h3>navigation</h3>
                <a href='/'>Home Page</a>
                <a href='{{ route("Articles") }}'>Articles</a>
                <a href='{{ route("Register") }}'>Register</a>
            </nav>
        </div>

        <div class="grid-login">
            <login>
                <h3>login</h3>
                <form id='login'>
                    Username <input type='text' name='username'>
                    Password <input type='password' name='password'>
                </form>
            </login>
        </div>

        <div class="grid-content">

            <!-- main content section for the blog webpage -->
            {{$content}}

        </div>




</body>


<footer>
    <div class="grid-container">
        <div class="grid-footer">
            <p>Edit this footer later !!</p>
        </div>
    </div>
</footer>