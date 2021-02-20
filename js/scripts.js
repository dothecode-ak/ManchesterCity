//event
var savefileName;
var _url = "https://newsfeedsmartapp.com/ManchesterCity/webservices.php";
var current_thumnail;
var current_thumnailWshare;
var thumbnail_name;
var wshare_download;
var blankarr = [];
var user_id;
var wrongText;
$.ajax({
    url: _url,
    type: "POST",
    data: {
        "action": "create_user",
        "source": source
    },
    success: (function (data) {
        user_id = data;
        console.log(user_id);

    })
});


$.ajax({
    url: _url,
    type: "POST",
    data: {
        "action": "getWrongText"
    },
    success: (function (data) {
        wrongText = data;
        // console.log(wrongText);

    })
});

$('#start').click(function () {
    $.ajax({
        url: _url,
        type: "POST",
        data: {
            "user_id": user_id,
            "action": "start",
        },
        success: (function (data) {
            console.log(data);

        })
    });
    $('.startDiv').hide();
    $('.firstInputBannerDiv').show();
});

var c_username, username;
function jersyUser() {
    c_username = document.getElementById('enterName').value;
    username = c_username.toLowerCase();
    // console.log("Yes---------------", username)
    $('.jersryUserDisplay').text(c_username);

}

function jersyNameValidaion() {
    var finalText = JSON.parse(wrongText)
    console.log(finalText[0].wrong_text);

    var checkStatus = false;
    if (username == null || username == '') {

        document.getElementById('inputJersyError').innerHTML = 'Please Enter Name *'
    }
    else if (username != null || username != '') {

        for (var m in finalText) {

            blankarr.push(finalText[m].wrong_text)

        }

        console.log(blankarr);


        if (blankarr.includes(username)) {
            blankarr.length = 0;
            console.log("Yes");
            document.getElementById('inputJersyError').innerHTML = 'Please Enter Name *'
        }
        else {
            console.log('N0')
            goFun();
        }


    }


}


function goFun() {

    $.ajax({
        url: _url,
        type: "POST",
        data: {
            "user_id": user_id,
            "action": "next",
        },
        success: (function (data) {
            console.log(data);

        })
    });
    $('.finalJersyName').val(username);
    $('.startDiv').hide();
    $('.firstInputBannerDiv').hide();
    $('.shareScreenDiv').show();
    $('#myCanvas').show();
    $.ajax({
        url: _url,
        type: "POST",
        data: {
            "user_id": user_id,
            "action": "userData",
            "jersy_name": c_username
        },
        success: (function (data) {
            console.log(data);

        })
    });

    var d = new Date();
    var random = d.getSeconds();
    $.ajax({
        url: _url,
        type: "POST",
        data: {
            "user_id": user_id,
            "action": "custom_thumbnail_store",
            "jersy_name": c_username,
            "random": random,
        },
        success: (function (data) {
            console.log(data);
            thumbnail_name = data;

        })
    });



    $.ajax({
        url: _url,
        type: "POST",
        data: {
            "user_id": user_id,
            "action": "whshare_download",
            "jersy_name": c_username,
            "random": random,
        },
        success: (function (data) {
            console.log(data);
            wshare_download = data;

        })
    });
    setTimeout(function () {

        savefileName = JSON.parse(thumbnail_name);
        // console.log('XXXXXXXXXXXXXX' + savefileName.thumbnail_name)
        $.ajax({
            url: _url,
            type: "POST",
            data: {
                "user_id": user_id,
                "action": "saveImgFileName",
                "share_Img_File": savefileName.thumbnail_name + ".png"
            },
            success: (function (data) {
                console.log(data);

            })

        });
    }, 2000);
}




function fbShare() {
    current_thumnail = JSON.parse(thumbnail_name);

    var share_url = "https://www.newsfeedsmartapp.com/ManchesterCity/share.php?thumbnail_name=" + current_thumnail.thumbnail_name;
    $.ajax({
        url: _url,
        type: "POST",
        data: {
            "user_id": user_id,
            "action": "fshare",
        },
        success: (function (data) {
            console.log(data);

        })

    });


    console.log(share_url);
    window.open('https://www.facebook.com/sharer.php?u=' + share_url);


}

function wShare() {
    // var obj = { wshare_download };
    current_thumnailWshare = JSON.parse(wshare_download);
    console.log(current_thumnailWshare);
    var wShareLink = 'https://www.newsfeedsmartapp.com/ManchesterCity/wshare.php?whshare_download=' + current_thumnailWshare.wshare_download;
    $.ajax({
        url: _url,
        type: "POST",
        data: {
            "user_id": user_id,
            "action": "wshare",
        },
        success: (function (data) {
            console.log(data);

        })
    });
    window.open('https://wa.me/?text=Happy New Year City fans! Celebrate with your friends and family in style through a personalised City holiday card. Click here to create yours  ' + wShareLink);
    console.log(wShareLink);
}
function downloadLink() {
    current_thumnailWshare = JSON.parse(wshare_download);
    window.location.href = 'https://www.newsfeedsmartapp.com/ManchesterCity/download.php?download_key=' + current_thumnailWshare.wshare_download;
    $.ajax({
        url: _url,
        type: "POST",
        data: {
            "user_id": user_id,
            "action": "download_link",
        },
        success: (function (data) {
            console.log(data);

        })
    });

}