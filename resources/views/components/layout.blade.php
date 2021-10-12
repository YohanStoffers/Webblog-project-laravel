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

    <nav>
        <h2>login and navigation</h2>
        <a href='/'>Home Page</a>
        <a href='{{ route("Articles") }}'>Articles</a>
    </nav>


    <!-- main content section for the blog webpage -->
    {{$content}}




</body>


<footer>
    <p>this site is copyrighted by Yohan Stoffers INC. no distrubting allowed.</p>
</footer>