<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thẻ bài may mắn</title>
    <link rel="icon" href="{{ asset('img/Lucky_card.png') }}">
    <!-- My style -->
</head>
<style>
    :root {
    --blue: #0096FF;
    --green: #3FA796;
    --white: #FFFFFF;
    --card-column: 4;
    --card-width: 720px;
    --card-height: calc(var(--card-width) / var(--card-column) * 1.3);
    --background-main: url("{{ asset('img/background-main.png') }}");
    /* --background-card-back: url("../img/card-img.png"); */
    --background-card-back: url("{{ asset('img/Untitled-5.svg') }}");
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    width: 100%;
    height: 100%;
    min-height: 100vh;
    line-height: 1.5;
    font-size: 16px;
    font-family: Arial, Helvetica, sans-serif;
    background: center / cover no-repeat var(--background-main);
}

.d-flex-center {
    display: flex;
    align-items: center;
    justify-content: center;
}

.header__title {
    padding: 16px;
    text-align: center;
}

.group__box {
    width: var(--card-width);
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.card {
    flex: 0 0 calc(100% / var(--card-column));
    position: relative;
    cursor: pointer;
    overflow: hidden;
    transition: transform 0.8s;
}

.card__visible {
    transform: rotateY(360deg);
}

.card__visible .card__back {
    display: none;
}

.card:not(.card__visible) .card__front {
    display: none;
}

.card__front,
.card__back {
    position: relative;
    width: auto;
    height: var(--card-height);
    padding: 16px;
    margin: 8px;
    border: 2px solid var(--blue);
    border-radius: 16px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
}

.card__front {
    background-color: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.card__gift--name {
    font-weight: bold;
    margin: 8px;
    text-align: center;
    z-index: 2;
}

.card__gift--img {
    width: 100%;
    z-index: 2;
}

.card__back {
    background: center / cover no-repeat var(--background-card-back);
}

.btn {
    width: 100%;
    line-height: inherit;
    background-color: var(--white);
    font-size: inherit;
    margin: 16px;
    padding: 8px 16px;
    text-align: center;
    border: none;
    display: block;
    text-decoration: none;
    outline: none;
    cursor: pointer;
}

.btn.btn__hide {
    display: none;
}

#btn--start {
    width: auto;
    background-color: var(--green);
    color: var(--white);
    border: 2px solid var(--green);
    border-radius: 8px;
}

#btn--start:hover {
    background-color: var(--white);
    color: var(--green);
    font-weight: bold;
}

/* For tablet */
@media screen and (max-width: 767.98px) {
    :root {
        --card-column: 3;
    }
}

/* For mobile */
@media screen and (max-width: 575.98px) {
    :root {
        --card-column: 2;
    }
}
</style>
<body onresize="resize()">
    <h1 class="header__title">Thẻ bài may mắn</h1>
    <div class="d-flex-center">
        <div class="group__box"></div>
    </div>
    <div class="d-flex-center">
        <button id="btn--start" class="btn">Trộn thẻ</button>
    </div>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- My script -->
    <script>
        const giftList = [
@foreach ($luckycards as $luckycard)
{
    'name': '{{ $luckycard->name }}',
    'image': 'http://localhost/minigame/public/storage/photos/Luckycard/{{ $luckycard->url }}',
    'percent': {{ $luckycard->percent }},
},
@endforeach


        ]
        const groupBox = $('.group__box')[0];
        const btnStart = $('#btn--start')[0];
        var isPlay = false;
        // Khởi tạo giá trị
        giftList.forEach((e) => {
            var card = document.createElement('div');
            card.classList.add('card', 'card__visible');
            card.innerHTML = `<div class="card__front">
                        <h4 class="card__gift--name">${e.name}</h4>
                        <img class="card__gift--img" src="${e.image}" alt="">
                    </div>
                    <div class="card__back"></div>`;
            card.onclick = function () {
                if (isPlay) {
                    const item = getGift(Math.random() * 100);
                    this.querySelector('.card__gift--name').innerHTML = item.name;
                    this.querySelector('.card__gift--img').src = item.image;
                    Swal.fire({
                        title: item.name,
                        imageUrl: item.image,
                        imageHeight: 200,
                    });
                    this.classList.add('card__visible');
                    isPlay = false;
                    btnStart.classList.toggle('btn__hide');
                }
            }
            groupBox.appendChild(card);
        });
        btnStart.onclick = function () {
            const cardList = $('.card');
            for (i = 0; i < cardList.length; i++) {
                cardList[i].classList.remove('card__visible');
            }
            isPlay = true;
            btnStart.classList.toggle('btn__hide');
        }
        // Lấy quà
        const getGift = (randomNumber) => {
            let currentPercent = 0;
            let list = [];
            giftList.forEach((item, index) => {
                currentPercent += item.percent;
                randomNumber <= currentPercent && list.push({
                    ...item,
                    index
                });
            });
            return list[0];
        }

        function resize() {
            var width = $(window).width();
            document.documentElement.style.setProperty('--card-width', width > 720 ? "720px" : width + "px");
        }
        resize();
    </script>
</body>

</html>
