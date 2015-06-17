var images = [];

$(document).ready(function () {
    $("#uploadbtn").ajaxUploadPrompt({
        url: '/?action=load',
        success: function (data, status, xhr) {
            $('#uploadbtn').show();
            $('#loadstatus').hide();
            if (data.status) {
                images = data.images;
                addImages();
            } else {
                alert(data.error);
            }
        },
        dataType: "json"
    });
});

function addImages() {
    $('#images').html('');

    var imwidth = $('#images').width();
    var comwidth = 0;
    var _imgs = [];

    for (i = 0; i < images.length; i++) {
        if (comwidth < imwidth) {
            comwidth += parseInt(images[i][1]) + 8;
            _imgs.push(images[i]);
            if (i == images.length - 1) {
                imgFill(imwidth, comwidth, _imgs);
            }
        } else {
            imgFill(imwidth, comwidth, _imgs);
            _imgs = [];
            comwidth = 0;
            i--;
        }
    }
}

function imgFill(imwidth, comwidth, _imgs)
{
    var _correct = 0;
    if (comwidth > imwidth) {
        imwidth -= 25;
        _correct = (comwidth - imwidth) / _imgs.length;
    }
    $.each(_imgs, function () {
        var _w = this[1] - _correct;
        $('#images').append('<div class="prev" style="width: ' + _w + 'px;"><img src="./images/' + this[0] + '" style="margin-left: -' + _correct / 2 + 'px;" /></div>');
    });
}

var time;
window.onresize = function () {
    if (time)
        clearTimeout(time);
    time = setTimeout(function () {
        addImages();
    }, 500);
};
