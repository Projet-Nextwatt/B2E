$(function ($) {
    var contenu = document.getElementById("contenu");
    var sidebar = 0;
    Hammer(contenu).on("swiperight", function () {
        if (sidebar) {
            return true;
        }
        $(this).animate({translateX: "300px"}, 200);
        sidebar = 1;
    });
    Hammer(contenu).on("swipeleft", function () {
        if (!sidebar) {
            return true;
        }
        $(this).animate({translateX: "0px"}, 200);
        sidebar = 0;
    });
    Hammer(contenu).on('drag', function (e) {
        if (e.gesture.deltaX > 300) {
            return false;
        }
        if (e.gesture.direction == 'right' && !sidebar) {
            $(this).animate({translateX: e.gesture.deltaX + "px"}, 0);

        }
        if (e.gesture.direction == 'left' && sidebar) {
            $(this).animate({translateX: (300 + e.gesture.deltaX) + "px"}, 0);
        }
    });
    Hammer(contenu).on('dragend', function (e) {
        if (e.gesture.direction == 'right' && !sidebar) {
            if (e.gesture.deltaX > 150) {
                $(this).animate({translateX: "300px"}, 200);
                sidebar = 1;
            } else {
                $(this).animate({translateX: "0px"}, 200);

            }
        }
        if (e.gesture.direction == 'left' && sidebar) {
            if (e.gesture.deltaX < -150) {
                $(this).animate({translateX: "0px"}, 200);
                sidebar = 0;
            } else {
                $(this).animate({translateX: "300px"}, 200);

            }
        }
    });
})