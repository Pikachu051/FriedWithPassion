<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
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
            width: 200px;
            height: 100px;
            background-color: #FFB871;
            justify-content: center;
            /* Initial color */
            cursor: pointer;
        }

        .circle {
            width: 50px;
            height: 50px;
            background-color: #007528;
            /* Initial color */
            border-radius: 50%;
            cursor: pointer;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div>
        <div class="main">
            <h1 style="margin: 0; font-size: 70px; text-decoration: underline;">สถานะโต๊ะ</h1>
        </div>
        <div class="table1">
            <div class="column1">
                <div class="shape-container">
                    <div class="rectangle" id="rectangle1" onclick="changeColor('circle1')">
                        <h1>โต๊ะ1</h1>
                    </div>
                    <div class="circle" id="circle1"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle2" onclick="changeColor('circle2')">
                        <h1>โต๊ะ2</h1>
                    </div>
                    <div class="circle" id="circle2"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle3" onclick="changeColor('circle3')">
                        <h1>โต๊ะ3</h1>
                    </div>
                    <div class="circle" id="circle3"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle4" onclick="changeColor('circle4')">
                        <h1>โต๊ะ4</h1>
                    </div>
                    <div class="circle" id="circle4"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle5" onclick="changeColor('circle5')">
                        <h1>โต๊ะ5</h1>
                    </div>
                    <div class="circle" id="circle5"></div>
                </div>
            </div>
            <div class="column1">
                <div class="shape-container">
                    <div class="rectangle" id="rectangle6" onclick="changeColor('circle6')">
                        <h1>โต๊ะ6</h1>
                    </div>
                    <div class="circle" id="circle6"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle7" onclick="changeColor('circle7')">
                        <h1>โต๊ะ7</h1>
                    </div>
                    <div class="circle" id="circle7"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle8" onclick="changeColor('circle8')">
                        <h1>โต๊ะ8</h1>
                    </div>
                    <div class="circle" id="circle8"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle9" onclick="changeColor('circle9')">
                        <h1>โต๊ะ9</h1>
                    </div>
                    <div class="circle" id="circle9"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle10" onclick="changeColor('circle10')">
                        <h1>โต๊ะ10</h1>
                    </div>
                    <div class="circle" id="circle10"></div>
                </div>
            </div>
            <div class="column1">
                <div class="shape-container">
                    <div class="rectangle" id="rectangle11" style="background-color: #833F00;"
                        onclick="changeColor('circle11')">
                        <h1 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ11</h1>
                    </div>
                    <div class="circle" id="circle11"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle12" style="background-color: #833F00;"
                        onclick="changeColor('circle12')">
                        <h1 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ12</h1>
                    </div>
                    <div class="circle" id="circle12"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle13" style="background-color: #833F00;"
                        onclick="changeColor('circle13')">
                        <h1 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ13</h1>
                    </div>
                    <div class="circle" id="circle13"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle14" style="background-color: #833F00;"
                        onclick="changeColor('circle14')">
                        <h1 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ14</h1>
                    </div>
                    <div class="circle" id="circle14"></div>
                </div>
                <div class="shape-container">
                    <div class="rectangle" id="rectangle15" style="background-color: #833F00;"
                        onclick="changeColor('circle15')">
                        <h1 style="-webkit-text-fill-color: rgb(255, 255, 255);">โต๊ะ15</h1>
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
                if (currentColor === 'rgb(0, 128, 0)' || currentColor === '') {
                    shape.style.backgroundColor = 'red';
                } else {
                    shape.style.backgroundColor = 'rgb(0, 128, 0)';
                }
            }
        }
    </script>
</body>

</html>