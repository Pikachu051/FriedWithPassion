<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Prompt', sans-serif;
            background-color: #FFECD9;
        }
        .main{
            padding: 20px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .table1 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 60px;
            justify-content: center;
            padding: 20px;
            margin-left: 50%;
            margin-right: 50%;
        }

        .column1 {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-gap: 60px;
            justify-content: center;
            padding: 20px;
        }

        .shape-container {
            display: flex;
            align-items: center;
        }

        .rectangle {
            width: 190px;
            height: 75px;
            background-color: #FFB871;
            justify-content: center;
            /* Initial color */
            cursor: pointer;
            border-radius: 5px;
            filter: drop-shadow(0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(0 8px 5px rgb(0 0 0 / 0.08));
        }

        .circle {
            width: 50px;
            height: 50px;
            background-color: rgb(0, 177, 0);
            /* Initial color */
            border-radius: 50%;
            cursor: pointer;
            margin-left: 20px;
            transition: all 0.3s;
            box-shadow: 0 0 5px 5px #00bf46;/* inner white */
        }
        h3{
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <div class="main">

            <h2 style="margin: 0; font-size: 44px;">สถานะโต๊ะ</h2>
        </div>
        <div class="table1">
            <div class="column1">
                <div class="shape-container">
                    <div class="rectangle" id="rectangle1" onclick="changeColor('circle1')">
                        <h3>โต๊ะ 1</h3>
                    </div>
                    <div class="circle" id="circle1"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle2" onclick="changeColor('circle2')">
                        <h3>โต๊ะ 2</h3>
                    </div>
                    <div class="circle" id="circle2"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle3" onclick="changeColor('circle3')">
                        <h3>โต๊ะ 3</h3>
                    </div>
                    <div class="circle" id="circle3"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle4" onclick="changeColor('circle4')">
                        <h3>โต๊ะ 4</h3>
                    </div>
                    <div class="circle" id="circle4"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle5" onclick="changeColor('circle5')">
                        <h3>โต๊ะ 5</h3>
                    </div>
                    <div class="circle" id="circle5"></div>
                </div>
            </div>
            <div class="column1">
                <div class="shape-container">
                    <div class="rectangle" id="rectangle6" onclick="changeColor('circle6')">
                        <h3>โต๊ะ 6</h3>
                    </div>
                    <div class="circle" id="circle6"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle7" onclick="changeColor('circle7')">
                        <h3>โต๊ะ 7</h3>
                    </div>
                    <div class="circle" id="circle7"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle8" onclick="changeColor('circle8')">
                        <h3>โต๊ะ 8</h3>
                    </div>
                    <div class="circle" id="circle8"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle9" onclick="changeColor('circle9')">
                        <h3>โต๊ะ 9</h3>
                    </div>
                    <div class="circle" id="circle9"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle10" onclick="changeColor('circle10')">
                        <h3>โต๊ะ 10</h3>
                    </div>
                    <div class="circle" id="circle10"></div>
                </div>
            </div>
            <div class="column1">
                <div class="shape-container">
                    <div class="rectangle" id="rectangle11" style="background-color: #833F00;"
                        onclick="changeColor('circle11')">
                        <h3 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ 11</h3>
                    </div>
                    <div class="circle" id="circle11"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle12" style="background-color: #833F00;"
                        onclick="changeColor('circle12')">
                        <h3 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ 12</h3>
                    </div>
                    <div class="circle" id="circle12"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle13" style="background-color: #833F00;"
                        onclick="changeColor('circle13')">
                        <h3 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ 13</h3>
                    </div>
                    <div class="circle" id="circle13"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle14" style="background-color: #833F00;"
                        onclick="changeColor('circle14')">
                        <h3 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ 14</h3>
                    </div>
                    <div class="circle" id="circle14"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle15" style="background-color: #833F00;"
                        onclick="changeColor('circle15')">
                        <h3 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ 15</h3>
                    </div>
                    <div class="circle" id="circle15"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeColor(id) {
            var shape = document.getElementById(id);

            // Check if clicked shape is a rectangle or a circle
            if (shape.classList.contains('rectangle') || shape.classList.contains('circle')) {
                var currentColor = shape.style.backgroundColor;

                // Change color of the shape
                if (currentColor === 'rgb(0, 177, 0)' || currentColor === '') {
                    shape.style.backgroundColor = 'rgb(230, 0, 0)';
                    shape.style.boxShadow = 'rgb(255, 0, 0) 0px 0px 5px 5px';
                } else {
                    shape.style.backgroundColor = 'rgb(0, 177, 0)';
                    shape.style.boxShadow = 'rgb(0, 191, 70) 0px 0px 5px 5px';      
                }
            }
        }
    </script>
</body>

</html>