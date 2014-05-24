(function ($) {
    var $contenu = $('#contenu');
    var sidebar = 0;
    $contenu.hammer()
        .on('swiperight', function (e) {
            if (sidebar == 0) {
                return true;
            }
            $contenu.animate({translateX: "300px"}, 200);
            sidebar = 1;
        })
        .on('swipeleft', function (e) {
            if (sidebar == 1) {
                return true;
            }
            $contenu.animate({translateX: "0px"}, 200);
            sidebar = 0;
        })
        .on('drag', function (e) {
            if (e.gesture.deltaX > 300) {
                return false;
            }
            if (e.gesture.direction == 'right' && !sidebar) {
                $contenu.animate({translateX: e.gesture.deltaX + "px"}, 0);

            }
            if (e.gesture.direction == 'left' && sidebar) {
                $contenu.animate({translateX: (300 + e.gesture.deltaX) + "px"}, 0);
            }
        })
        .on('dragend', function (e) {
            if (e.gesture.direction == 'right' && !sidebar) {
                if (e.gesture.deltaX > 150) {
                    $contenu.animate({translateX: "300px"}, 200);
                    sidebar = 1;
                } else {
                    $contenu.animate({translateX: "0px"}, 200);

                }
            }
            if (e.gesture.direction == 'left' && sidebar) {
                if (e.gesture.deltaX < -150) {
                    $contenu.animate({translateX: "0px"}, 200);
                    sidebar = 0;
                } else {
                    $contenu.animate({translateX: "300px"}, 200);

                }
            }
        })
})(Zepto);