<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <style>
        .body{
            background-image: url("bg.jpg");
        }
        .border-style {
            width: 200px;
            height: 200px;
            position: relative;
            background-clip: padding-box;
            border: 10px solid transparent;
            background-color: #191a28;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: red;
            font-size: 4rem;
            font-weight: bold;
            margin: 10px;
        }

        .border-style::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            margin: -10px;
            background-image: linear-gradient(to right top, #2979ff, #07a787);
            border-radius: inherit;
        }

        button {
            width: 200px;
            height: 70px;
            background: linear-gradient(to left top, #c32c71 50%, #b33771 50%);
            border-style: none;
            color: #fff;
            font-size: 23px;
            letter-spacing: 3px;
            font-family: 'Lato';
            font-weight: 600;
            outline: none;
            cursor: pointer;
            position: relative;
            padding: 0px;
            overflow: hidden;
            transition: all .5s;
            box-shadow: 0px 1px 2px rgba(0,0,0,.2);
        }

        button span {
            position: absolute;
            display: block;
        }

        button span:nth-child(1) {
            height: 3px;
            width: 200px;
            top: 0px;
            left: -200px;
            background: linear-gradient(to right, rgba(0,0,0,0), #f6e58d);
            border-top-right-radius: 1px;
            border-bottom-right-radius: 1px;
            animation: span1 2s linear infinite;
            animation-delay: 1s;
        }

        @keyframes span1 {
            0% {
                left: -200px
            }

            100% {
                left: 200px;
            }
        }

        button span:nth-child(2) {
            height: 70px;
            width: 3px;
            top: -70px;
            right: 0px;
            background: linear-gradient(to bottom, rgba(0,0,0,0), #f6e58d);
            border-bottom-left-radius: 1px;
            border-bottom-right-radius: 1px;
            animation: span2 2s linear infinite;
            animation-delay: 2s;
        }

        @keyframes span2 {
            0% {
                top: -70px;
            }

            100% {
                top: 70px;
            }
        }

        button span:nth-child(3) {
            height: 3px;
            width: 200px;
            right: -200px;
            bottom: 0px;
            background: linear-gradient(to left, rgba(0,0,0,0), #f6e58d);
            border-top-left-radius: 1px;
            border-bottom-left-radius: 1px;
            animation: span3 2s linear infinite;
            animation-delay: 3s;
        }

        @keyframes span3 {
            0% {
                right: -200px;
            }

            100% {
                right: 200px;
            }
        }

        button span:nth-child(4) {
            height: 70px;
            width: 3px;
            bottom: -70px;
            left: 0px;
            background: linear-gradient(to top, rgba(0,0,0,0), #f6e58d);
            border-top-right-radius: 1px;
            border-top-left-radius: 1px;
            animation: span4 2s linear infinite;
            animation-delay: 4s;
        }

        @keyframes span4 {
            0% {
                bottom: -70px;
            }

            100% {
                bottom: 70px;
            }
        }

        button:hover {
            transition: all .5s;
            transform: rotate(-3deg) scale(1.1);
            box-shadow: 0px 3px 5px rgba(0,0,0,.4);
        }

        button:hover span {
            animation-play-state: paused;
        }

        footer {
            background-color: #222;
            color: #fff;
            font-size: 14px;
            bottom: 0;
            position: fixed;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 999;
        }

        footer p {
            margin: 10px 0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        footer .fa-heart {
            color: red;
        }

        footer .fa-dev {
            color: #fff;
        }

        footer .fa-twitter-square {
            color: #1da0f1;
        }

        footer .fa-instagram {
            color: #f0007c;
        }

        fotter .fa-linkedin {
            color: #0073b1;
        }

        footer .fa-codepen {
            color: #fff
        }

        footer a {
            color: #3c97bf;
            text-decoration: none;
            margin-right: 5px;
        }

        .youtubeBtn {
            position: fixed;
            left: 50%;
            transform: translatex(-50%);
            bottom: 45px;
            cursor: pointer;
            transition: all .3s;
            vertical-align: middle;
            text-align: center;
            display: inline-block;
        }

        .youtubeBtn i {
            font-size: 20px;
            float: left;
        }

        .youtubeBtn a {
            color: #ff0000;
            text-shadow: 0px 2px 5px rgba(0,0,0,.5);
            animation: youtubeAnim 1000ms linear infinite;
            float: right;
        }

        .youtubeBtn a:hover {
            color: #c9110f;
            transition: all .3s ease-in-out;
            text-shadow: none;
        }

        .youtubeBtn i:active {
            transform: scale(.9);
            transition: all .3s ease-in-out;
        }

        .youtubeBtn span {
            font-family: 'Lato';
            font-weight: bold;
            color: #fff;
            display: block;
            font-size: 12px;
            float: right;
            line-height: 20px;
            padding-left: 5px;
        }
        .result {
        margin-top: 20px;
        font-size: 18px;
        text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="col-md-12 text-center mt-5 fw-bold">
                Quay số may mắn!
            </h1>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="d-flex justify-content-center">
                <div class="border-style" id="number1">
                    1
                </div>
                <div class="border-style" id="number2">
                    2
                </div>
                <div class="border-style" id="number3">
                    3
                </div>
                <div class="border-style" id="number4">
                    4
                </div>
                <div class="border-style" id="number5">
                    5
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 text-center fw-bold">
                <button id="quayso">
                    Quay số !!
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-center">Hạng 1</h2>
                <div class="result" id="rank1"></div>
            </div>
            <div class="col-md-4">
                <h2 class="text-center">Hạng 2</h2>
                <div class="result" id="rank2"></div>
            </div>
            <div class="col-md-4">
                <h2 class="text-center">Hạng 3</h2>
                <div class="result" id="rank3"></div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            let allResults = [];
            $('#quayso').click(function() {
                const sequences = [
                    '11223',
                    '13576',
                    '25253',
                    '99965',
                    '77896',
                    '99999',
                ];

                const updateNumbers = () => {
                    const randomSequence = sequences[Math.floor(Math.random() * sequences.length)];
                    $('#number1').text(randomSequence[0]);
                    $('#number2').text(randomSequence[1]);
                    $('#number3').text(randomSequence[2]);
                    $('#number4').text(randomSequence[3]);
                    $('#number5').text(randomSequence[4]);
                };

                const intervalId = setInterval(updateNumbers, 100);

                setTimeout(() => {
                    clearInterval(intervalId);
                    updateNumbers();
                    const result = $('#number1').text() + $('#number2').text() + $('#number3').text() + $('#number4').text() + $('#number5').text();
                    addToTopResults(result);
                    $('#rank1').text(allResults[0] || '');
                    $('#rank2').text(allResults[1] || '');
                    $('#rank3').text(allResults[2] || '');
                }, 3000);
                function addToTopResults(newResult) {
                    allResults.push(newResult);
                    allResults.sort((a, b) => {
                        return parseInt(b) , parseInt(a);
                    });
                    allResults = Array.from(new Set(allResults)).slice(0, 3);
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
