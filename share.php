<?php
if (isset($_GET['thumbnail_name'])) {
    if (preg_match('/[^a-zA-z0-9\s\-_\.\?]/', $_GET['thumbnail_name'])) {
        echo "Not Get";
    } else {
        $thumbnail = filter_var($_GET['thumbnail_name'], FILTER_SANITIZE_STRING);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Happy New Year City fans!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta property="fb:app_id" content="966242223397117">
    <meta property="og:url" content="https://www.newsfeedsmartapp.com/ManchesterCity/share.php?thumbnail_name=<?php echo $thumbnail ?>">
    <meta property="og:title" content="Happy New Year City fans!">
    <meta name="author" content="">
    <meta property="og:description" content="Celebrate with your friends and family in style through a personalised City holiday card. Click here to create yours">
    <meta property="og:type" content="product">
    <meta property="og:image" content="https://www.newsfeedsmartapp.com/ManchesterCity/Thumbnail/<?php echo $thumbnail . '.png' ?>">
    <script>
        window.location = "https://www.newsfeedsmartapp.com/ManchesterCity/";
    </script>
</head>

<body>
    <img src="https://www.newsfeedsmartapp.com/ManchesterCity/Thumbnail/<?php echo $thumbnail . '.png' ?>" />
</body>

</html>