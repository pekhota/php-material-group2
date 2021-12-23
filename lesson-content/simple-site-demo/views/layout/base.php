<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Blog Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">


    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.1/examples/blog/blog.css" rel="stylesheet">
</head>
<body>

<?php
    echo view("layout/header", [
        'bitcoinPrice' => $bitcoinPrice,
    ]);
?>
<main class="container" id="main">
<?php
    echo $content;
?>
</main>
<?php
    echo view("layout/footer");
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let counter = 1

        cb = function () {
            $.post( "/ajax",
                {
                    message: "hello world" + counter
                },
                function( data ) {
                    // document.getElementById('btc-price-block').innerHTML = httpRequest.responseText
                    $("#btc-price-block").html(data);
                    counter++
                }
            );
        }

        cb()
        setInterval(cb, 5*1000)
    })

    // document.addEventListener('DOMContentLoaded', function(){
    //     console.log('Готов!');
    // });

    // let httpRequest;
    // if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    //     httpRequest = new XMLHttpRequest();
    // } else if (window.ActiveXObject) { // IE
    //     httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    // }
    //
    // // let counter = 1
    //
    // cb = function () {
    //     httpRequest.open('GET', 'http://localhost:8080/ajax/' + counter, true);
    //     httpRequest.send(null);
    //     counter++
    // }
    //
    // cb()
    // setInterval(cb, 5*1000)
    //
    // httpRequest.onreadystatechange = function(){
    //     if (httpRequest.readyState == 4) {
    //         if (httpRequest.status == 200) {
    //             let elem = document.getElementById('btc-price-block')
    //             elem.innerHTML = httpRequest.responseText
    //         } else {
    //             alert('С запросом возникла проблема.');
    //         }
    //     } else {
    //         // все ещё не готово
    //     }
    // };
    //
    // console.log(httpRequest)
</script>
</body>
</html>
