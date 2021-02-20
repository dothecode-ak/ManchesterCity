<?php
if (isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = 'Facebook';
}
if (isset($_GET['thumbnail_name'])) {
    $thumbnail_name = $_GET['thumbnail_name'];
} else {
    $thumbnail_name = '';
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
    <meta property="og:image" content="https://www.newsfeedsmartapp.com/ManchesterCity/Thumbnail/<?php echo $thumbnail_name . '.png' ?>">
    <meta property="og:type" content="product">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.newsfeedsmartapp.com/ManchesterCity/assets/Manchester-City-Logo.png" />
    <title>Happy New Year City fans!</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="shbMain">
        <div class="startDivFrame">
            <img id="ManchesterCityLogo" src="assets/Manchester-City-Logo.png" alt="">
            <img id="shbLogo" src="assets/SHB-Logo.png" alt="" srcset="">
            <!-- start div -->
            <div class="startDiv">
                <div class="startHeadText">
                    <p id="">Chúc mừng năm mới từ <br> Manchester City và SHB! <br> Cung Chúc Tân Xuân</p>
                    <p class="subText2">Thay lời chúc người thân và bạn bè Năm mới 2021 <br> An Khang Thịnh Vượng bằng
                        cách gửi thiệp
                        chúc
                        mừng có hình ảnh riêng của
                        bạn!</p>
                </div>
                <div class="playImg">
                    <img src="assets/3-Players.png" alt="" id="play3Img">
                </div>
                <input type="image" id="start" class="commonButton" src="assets/Start-Button.png">
            </div>

            <!-- first input Banner Div -->

            <div class="firstInputBannerDiv">

                <div class="bannerTextDiv">
                    <p>Nhập tên của bạn</p>
                </div>
                <div class="inputTag">
                    <input id="enterName" type="text" placeholder="ENTER NAME" onkeyup="jersyUser();" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="text" maxlength="6">
                </div>
                <div id="inputJersyError">

                </div>
                <div class="jersy">
                    <img id="jersyImg" src="assets/jersey.png" alt="" srcset="">
                </div>
                <div class="jersryUserDisplay">

                </div>
                <input type="image" id="next" onclick="jersyNameValidaion();" class="commonButton" src="assets/Next-button.png">
            </div>


            <!-- share screen Div -->
            <div class="shareScreenDiv">
                <div class="bannerTextDiv">
                    <p>Hãy chia sẻ tấm thiệp để gửi tặng những <br> người thân yêu của bạn lời chúc <br> Năm mới Vạn Sự
                        Như Ý!
                    </p>

                </div>
                <div class="finalCardImg">
                    <!-- <p class="finalJersyName"></p> -->
                    <input type="text" class="finalJersyName" style="text-align: center;" value="" readonly>
                    <img id="finalShareImg" src="assets/Final-Card.png" alt="" srcset="">

                </div>

                <div class="shareImg">
                    <img src="assets/Share.png" alt="" srcset="">
                </div>
                <div class="shareScreenButton">
                    <img src="assets/Facebook-Icon.png" alt="" srcset="" onclick="fbShare();">
                    <img src="assets/Whatsapp-Icon.png" alt="" srcset="" onclick="wShare();">
                    <img src="assets/Download-Icon.png" alt="" srcset="" onclick="downloadLink();">
                </div>
            </div>



            <img class="leftFlower" src="assets/Flower-Left.png" alt="">
            <img class="rightFlower" src="assets/Flower-Right.png" alt="">
        </div>
    </div>
    <script type="text/javascript">
        var source = '<?php echo $source; ?>';
        console.log(source);
    </script>
    <script src="js/scripts.js"></script>

    <script>
        $("#enterName").blur(function() {
            $(window).scrollTop(0);
        });

        // var $input = $('#enterName')
        // $input.keyup(function(e) {
        //     var max = 6;
        //     var username = document.getElementById('enterName').value;
        //     if ($input.val().length > max) {
        //         $input.val($input.val().substr(0, max));

        //     }
        //     if ($input.val.length <= max) {
        //         $('.jersryUserDisplay').text(username);
        //     }
        //     console.log($input.val())
        // });
    </script>
</body>

</html>