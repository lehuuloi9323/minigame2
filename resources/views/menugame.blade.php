<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game template</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            min-height: 100vh;
            background-image: radial-gradient(circle farthest-corner at 7.2% 13.6%, rgba(37, 249, 245, 1) 0%, rgba(8, 70, 218, 1) 90%);
        }

        .card {
            border-radius: 16px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .rounded-16 {
            border-radius: 16px;
        }

        .scroll-img:hover {
            animation: scrollImg 1s both;
        }

        @keyframes scrollImg {
            0% {
                transform: translateY(0px);
            }

            100% {
                transform: translateY(calc(-100% + 160px));
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center text-white p-3">
            <h1>Mini Game Niso</h1>
            <p>Giải trí</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <a href="{{ route('lucky_wheel') }}" class="card text-decoration-none border-0">
                    <div style="height: 160px" class="overflow-hidden rounded-16">
                        <img src="{{ asset('img/Luck_wheel.png') }}" class="card-img-top scroll-img">
                    </div>
                    <div class="card-body text-center text-success"><b>Vòng quay may mắn</b></div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('lucky_card') }}" class="card text-decoration-none border-0">
                    <div style="height: 160px" class="overflow-hidden rounded-16">
                        <img src="{{ asset('img/Lucky_card.png') }}" class="card-img-top scroll-img">
                    </div>
                    <div class="card-body text-center text-success"><b>Thẻ bài may mắn</b></div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('lucky_number') }}" class="card text-decoration-none border-0">
                    <div style="height: 160px" class="overflow-hidden rounded-16">
                        <img src="{{ asset('img/quaysomayman.png') }}" class="card-img-top scroll-img">
                    </div>
                    <div class="card-body text-center text-success"><b>Quay số may mắn</b></div>
                </a>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
