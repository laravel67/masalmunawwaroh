{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opps!</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body style="background-color: rgb(205, 205, 205)">
    <main role="main" class="flex-shrink-0">
        <div class="container">
            {{ $slot }}
        </div>
    </main>
    <script>
        document.getElementById("backButton").addEventListener("click", function(event) {
                event.preventDefault();
                history.back();
            });
    </script>
</body>

</html> --}}

<html>
<head>
    <title>404 Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .error-container {
            text-align: center;
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .error-container h1 {
            font-size: 72px;
            font-weight: bold;
            margin: 0;
        }
        .error-container p {
            font-size: 24px;
            margin: 10px 0 20px;
        }
        .error-container .btn {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .error-container .btn:hover {
            background-color: #218838;
        }
        .error-container .social-icons {
            margin-top: 20px;
        }
        .error-container .social-icons a {
            color: #6c757d;
            margin: 0 10px;
            font-size: 24px;
            text-decoration: none;
        }
        .error-container .social-icons a:hover {
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>OOPS!</h1>
        <p>Error 404 : Page Not Found</p>
        <button type="button" id="backButton" class="btn">GO BACK</button>
    </div>
    <script>
        document.getElementById("backButton").addEventListener("click", function(event) {
                event.preventDefault();
                history.back();
            });
    </script>
</body>
</html>