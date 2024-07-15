<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('img/Luck_wheel.png') }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    :root {
        --size-wheel: 25rem;

    }

    html {
        box-sizing: border-box;
        height: 100%;
        overflow: hidden;

    }

    body {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        //background-image: url('public/img/sports-car-futuristic-mountain-sunset-scenery-digital-art-hd-wallpaper-uhdpaper.com-537@0@i.jpg');
        background-color: {{ $color->color_background }};
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .msg {
        min-height: 4rem;
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 0.5rem;
        text-transform: capitalize;
        text-align: center;
    }

    ul {
        position: relative;
        padding: 0;
        margin: 1rem 0;
        width: var(--size-wheel);
        height: var(--size-wheel);
        /*border: 10px solid rgb(0, 12, 184);*/
        border: 10px solid {{ $color->color_border }};
        border-radius: 50%;
        list-style: none;
        overflow: hidden;
        transition: cubic-bezier(0.075, 0.8, 0.2, 1) 21s; /* Update transition duration to 21 seconds */
    }

    span {
        display: inline-block;
        position: relative;
        padding: 0.5rem;
    }

    span::before {
        content: '';
        position: absolute;
        top: 0rem;
        left: 50%;
        border-left: 2rem solid transparent;
        border-right: 2rem solid transparent;
        border-top: 4rem solid {{ $color->color_pointer }};
        z-index: 2;
        transform: translateX(-50%);
        animation: arrow ease-out 0.6s infinite;
    }

    @keyframes arrow {
        0% {
            top: -2rem;
        }
        80% {
            top: 0;
        }
        100% {
            top: -1.5rem;
        }
    }

    span::after {
        content: '';
        width: 2rem;
        height: 2rem;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: {{ $color->color_center }};
        border-radius: 50%;
    }

    li {
        overflow: hidden;
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 50%;
        transform-origin: 0% 100%;
    }

    .text {
        font-family: Arial, Helvetica, sans-serif;
        position: absolute;
        left: -100%;
        width: 200%;
        height: 200%;
        display: block;
        text-align: center;
        padding-top: 1.7rem;
        font-weight: 600;
        color: #fff;
    }

    .text>b {
        display: inline-block;
        word-break: break-word;
        max-width: 20%;
    }

    .text-1 {
        background-color: {{ $color->color_tab1 }}; /*màu ô tab 1*/
    }

    .text-2 {
        background-color: {{ $color->color_tab2 }}; /*màu ô tab 2*/
    }

    .main {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    button {
        display: inline-block;
        text-align: center;
        border: 0;
        background-color: #333;
        color: #fff;
        font-size: 1.5rem;
        border-radius: 4rem;
        padding: 0.5rem 1.5rem;
        width: auto;
        cursor: pointer;
        outline: none;
    }

    button:hover {
        opacity: 0.8;
    }
</style>

<body style="background-image: url('asset('img/sports-car-futuristic-mountain-sunset-scenery-digital-art-hd-wallpaper-uhdpaper.com-537@0@i.jpg')')">
    <h1 style="color: {{ $color->color_title }}">Vòng quay may mắn</h1>
    {{--  <h1 style="color: {{ $color->color_title }}">Vòng quay may mắn</h1>  --}}
    <main class="mt-2">
        <section class="main">
            <span>
                <ul class="wheel"></ul>
            </span>
            <button class="btn--wheel">Quay thưởng</button>
        </section>
        <h2 class="msg"></h2>
    </main>

    <audio id="spin-sound" src="{{ asset('mp3/am-thanh-vong-quay-may-man-www_tiengdong_com.mp3') }}"></audio> <!-- Add the audio element -->

    <script>
        (() => {
            const $ = document.querySelector.bind(document);
            const spinSound = $('#spin-sound'); // Get the audio element

            let timeRotate = 21000; //21 seconds
            let currentRotate = 0;
            let isRotating = false;
            const wheel = $('.wheel');
            const btnWheel = $('.btn--wheel');
            const showMsg = $('.msg');

            //=====< Danh sách phần thưởng >=====
            const listGift = [
                @foreach( $lists as $list)
                {
                    text: '{{ $list->name }}',
                    percent: {{ $list->percent }} / 100,
                },
                @endforeach
            ];

            //=====< Số lượng phần thưởng >=====
            const size = listGift.length;

            //=====< Số đo góc của 1 phần thưởng chiếm trên hình tròn >=====
            const rotate = 360 / size;

            //=====< Số đo góc cần để tạo độ nghiêng, 90 độ trừ đi góc của 1 phần thưởng chiếm >=====
            const skewY = 90 - rotate;

            listGift.map((item, index) => {
                //=====< Tạo thẻ li >=====
                const elm = document.createElement('li');

                //=====< Xoay và tạo độ nghiêng cho các thẻ li >=====
                elm.style.transform = `rotate(${rotate * index}deg) skewY(-${skewY}deg)`;

                //=====< Thêm background-color so le nhau và căn giữa cho các thẻ text>=====
                if (index % 2 == 0) {
                    elm.innerHTML = `<p style="transform: skewY(${skewY}deg) rotate(${rotate / 2}deg);" class="text text-1">
                    <b>${item.text}</b>
                </p>`;
                } else {
                    elm.innerHTML = `<p style="transform: skewY(${skewY}deg) rotate(${rotate / 2}deg);" class="text text-2">
                <b>${item.text}</b>
                </p>`;
                }

                //=====< Thêm vào thẻ ul >=====
                wheel.appendChild(elm);
            });

            /********** Hàm bắt đầu **********/
            const start = () => {
                showMsg.innerHTML = '';
                isRotating = true;
                spinSound.play(); // Play the spin sound
                //=====< Lấy 1 số ngầu nhiên 0 -> 1 >=====
                const random = Math.random();

                //=====< Gọi hàm lấy phần thưởng >=====
                const gift = getGift(random);

                //=====< Số vòng quay: 360 độ = 1 vòng (Góc quay hiện tại) >=====
                currentRotate += 360 * 10;

                //=====< Gọi hàm quay >=====
                rotateWheel(currentRotate, gift.index);

                //=====< Gọi hàm in ra màn hình >=====
                showGift(gift);
            };

            /********** Hàm quay vòng quay **********/
            const rotateWheel = (currentRotate, index) => {
                $('.wheel').style.transform = `rotate(${
                //=====< Góc quay hiện tại trừ góc của phần thưởng>=====
                //=====< Trừ tiếp cho một nửa góc của 1 phần thưởng để đưa mũi tên về chính giữa >=====
                currentRotate - index * rotate - rotate / 2
            }deg)`;
            };

            /********** Hàm lấy phần thưởng **********/
            const getGift = randomNumber => {
                let currentPercent = 0;
                let list = [];

                listGift.forEach((item, index) => {
                    //=====< Cộng lần lượt phần trăm trúng của các phần thưởng >=====
                    currentPercent += item.percent;

                    //=====< Số ngẫu nhiên nhỏ hơn hoặc bằng phần trăm hiện tại thì thêm phần thưởng vào danh sách >=====
                    if (randomNumber <= currentPercent) {
                        list.push({
                            ...item,
                            index
                        });
                    }
                });

                //=====< Phần thưởng đầu tiên trong danh sách là phần thưởng quay được>=====
                return list[0];
            };

            /********** In phần thưởng ra màn hình **********/
            const showGift = gift => {
                let timer = setTimeout(() => {
                    isRotating = false;

                    showMsg.innerHTML = `Chúc mừng bạn đã nhận được "${gift.text}"`;

                    clearTimeout(timer);
                }, timeRotate);
            };

            /********** Sự kiện click button start **********/
            btnWheel.addEventListener('click', () => {
                if (!isRotating) start();
            });
        })();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
