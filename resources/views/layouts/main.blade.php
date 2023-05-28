<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sapimou</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{url("/css/style.css")}}">
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
</head>
<body class="bg-primary relative">
    @yield("content")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script>
        $(document).ready(function () {
            fetch(`{{ url("/unreadChat") }}`)
                .then(response => response.json())
                .then(data => {
                    if(data > 0){
                        document.getElementById("chat-icon").innerHTML += `<span class="absolute ml-3 mb-1 bg-red-500 rounded-full w-4 h-4 text-center text-white text-xs">${data}</span>`
                    }
                })
        });
    </script>
</body>
</html>
