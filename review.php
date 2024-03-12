<?php
    class MyDB extends SQLite3 {
        function __construct() {
        $this->open('fwp.db');
        }
    }

    $db = new MyDB();
    if(!$db) {
        die($db->lastErrorMsg());
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rating = $_POST['hs-ratings-readonly'];
        if ($rating == 5) {
            $rating = 1;
        } elseif ($rating == 4) {
            $rating = 2;
        } elseif ($rating == 3) {
            $rating = 3;
        } elseif ($rating == 2) {
            $rating = 4;
        } elseif ($rating == 1) {
            $rating = 5;
        }
        $comment = $_POST['comment'];
        $sql = "INSERT INTO review (comment, score) VALUES ('$comment', $rating)";
        $ret = $db->exec($sql);
        $sql2 = "INSERT INTO order_history (review_id) VALUES ((SELECT MAX(review_id) FROM review))";
        $ret2 = $db->exec($sql2);
        if(!$ret || !$ret2) {
            echo $db->lastErrorMsg();
        } else {
            header('Location: selfservice.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWP: Review</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-orange-100">
    <div class="bg-white p-5 rounded-lg mx-auto w-[450px] shadow-md mt-10">
        <h2 class="font-semibold mb-4 text-lg text-center">โปรดให้คะแนนการบริการของพวกเรา<br>พร้อมคำติชมได้เลย</h2>
        <form action="review.php" method="post">

        <div class="flex justify-center">

            <div class="flex flex-row-reverse justify-end items-center">
            <input id="hs-ratings-readonly-1" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="hs-ratings-readonly" required value="1">
            <label for="hs-ratings-readonly-1" class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none">
                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </label>
            <input id="hs-ratings-readonly-2" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="hs-ratings-readonly" required value="2">
            <label for="hs-ratings-readonly-2" class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none">
                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </label>
            <input id="hs-ratings-readonly-3" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="hs-ratings-readonly" required value="3">
            <label for="hs-ratings-readonly-3" class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none">
                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </label>
            <input id="hs-ratings-readonly-4" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="hs-ratings-readonly" required value="4">
            <label for="hs-ratings-readonly-4" class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none">
                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </label>
            <input id="hs-ratings-readonly-5" type="radio" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" name="hs-ratings-readonly" required value="5">
            <label for="hs-ratings-readonly-5" class="peer-checked:text-yellow-400 text-gray-300 pointer-events-none">
                <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </label>
            </div>
        </div>
        <div class="item-center">
                <label for="textarea-label" class="block text-sm font-medium mb-2 mt-6">คำติชม</label>
                <textarea name="comment" id="textarea-label" class="py-3 px-4 block w-full border border-gray-300 rounded-lg text-sm focus:border focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" rows="3" placeholder="อาหารอร่อยมาก"></textarea>
                <button type="submit" class="bg-orange-400 hover:bg-orange-500 text-white px-4 py-2 rounded-lg mt-6 mx-auto flex">ส่งคะแนน</button>
            </div>
        </form>
    </div>
</body>
</html>