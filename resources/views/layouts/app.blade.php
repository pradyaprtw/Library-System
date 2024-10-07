<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $tittle ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLR5/AoYVI4nZ6ss4GZKw5o5zIJTk4smwrfC/i4vsP" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-0eCkllWr5z5z8t90CrShnkp6r6pFywVG65g9l6OdIBdfl2WtqfWBBnDv/EmocOtr" crossorigin="anonymous"></script>
</body>
</html>