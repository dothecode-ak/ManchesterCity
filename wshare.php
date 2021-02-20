<?php
if (isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = 'Facebook';
}
if (isset($_GET['whshare_download'])) {
    $whshare_download = $_GET['whshare_download'];
} else {
    $whshare_download = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta property="fb:app_id" content="966242223397117">
    <meta property="og:url" content="https://www.newsfeedsmartapp.com/ManchesterCity/index.php?v=1.0">
    <meta property="og:title" content="Happy New Year City fans!">
    <meta name="author" content="Manchester City">
    <meta property="og:description" content="Celebrate with your friends and family in style through a personalised City holiday card. Click here to create yours">
    <meta property="og:image" content="https://www.newsfeedsmartapp.com/ManchesterCity/Thumbnail/Wshare_downloadImg/<?php echo $whshare_download . '.png' ?>">
    <meta property="og:type" content="product">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.newsfeedsmartapp.com/ManchesterCity/assets/Manchester-City-Logo.png" />
    <title>Happy New Year City fans!</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .leftFlower {
            width: 27%;
        }

        .commonButton {
            top: 75%;
            width: 70%;
        }
    </style>
</head>

<body>
    <div class="shbMain">
        <div class="startDivFrame">
            <img id="ManchesterCityLogo" src="assets/Manchester-City-Logo.png" alt="">
            <img id="shbLogo" src="assets/SHB-Logo.png" alt="" srcset="">
            <!-- start div -->
            <div class="startDiv">

                <div class="playImg_w">
                    <img style="width: 100%;" src="https://www.newsfeedsmartapp.com/ManchesterCity/Thumbnail/Wshare_downloadImg/<?php echo $whshare_download . '.png' ?>" alt="" id=" play3Img">
                </div>
                <input type="image" id="start" onclick="openMainPage();" class="commonButton" src="assets/Create-Your-Own-Greeting.png">
            </div>

            <img class="leftFlower" src="assets/Flower-Left.png" alt="">
            <img class="rightFlower" src="assets/Flower-Right.png" alt="">
        </div>
    </div>
    <script type="text/javascript">
        var source = '<?php echo $source; ?>';
        console.log(source);
    </script>


    <script>
        function openMainPage() {
            window.location = ('https://newsfeedsmartapp.com/ManchesterCity/index.php');
        }
    </script>


</body>

</html>