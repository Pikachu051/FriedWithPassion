<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FriedWithPassion: Table Status</title>
    <link rel="stylesheet" href="style.css">
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
            padding: 0px;
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
        h2{
            font-weight: 700;
            font-size: 40
            px;
        }
        h2, h3{
            text-align: center;
        }
        h3{
            font-weight: 500;
            margin: 24px;
        }
        @media screen and (max-width: 650px){
            .table1 {
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 20px;
            }
            .rectangle {
                width: 150px;
                height: 60px;
            }
            .circle {
                width: 40px; 
                height: 40px;
            }
            h3{
                font-weight: 500;
                margin: 18px;
            }
            h2{
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
<header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-orange-300 text-sm py-4">
  <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
    <div class="flex items-center justify-between">
      <a class="flex-none text-xl font-semibold" href="#">FriedWithPassion</a>
      <div class="sm:hidden">
        <button type="button" onclick="menu()" class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-orange-200 bg-orange-100 text-gray-800 shadow-sm hover:bg-orange-50 disabled:opacity-50 disabled:pointer-events-none" aria-label="Toggle navigation">
          <svg id="icon_open" class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg id="icon_close" class="hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>
    <div id="collapse" class="hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
      <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
        <a class="font-medium text-gray-800 hover:text-gray-400" href="main_staff.php">หน้าหลัก</a>
        <a class="font-medium text-orange-600" href="#" aria-current="page">สถานะโต๊ะ</a>
        <a class="font-medium text-gray-800 hover:text-gray-400" href="queue.php">คิวอาหาร</a>
        <a class="font-medium text-gray-800 hover:text-gray-400" href="menu_status.php">สถานะเมนู</a>
      </div>
    </div>
  </nav>
</header>
    <div>
        <div class="main">
            <h2 style="margin: 0;">สถานะโต๊ะ</h2>
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
        function menu() {
        var x = document.getElementById("collapse");
        var y = document.getElementById("icon_open");
        var z = document.getElementById("icon_close");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "block";
        } else {
            x.style.display = "none";
            y.style.display = "block";
            z.style.display = "none";
        }
        }
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