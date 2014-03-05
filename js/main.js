/*
File name : main.js
Author's name : Zhixiang Hu
Web site name : Zhixiang Hu Tech Space
This is the external javascript file of the web site
*/

$(document).ready(function () {
    setInterval('toggleImages()', 3000);
});

//toggle three screenshots every three seconds
function toggleImages() {
    var $active = $('#slide a img.active');
    var $next = ($('#slide a img.active').closest('a').next().find('img').length > 0) ? $('#slide .active').closest('a').next().find('img') : $('#slide a:first img');
    $next.css('z-index', 2);//move the next image up the pile
    $active.fadeOut(500, function () {//fade out the top image
        $active.css('z-index', 1).show().removeClass('active');//reset the z-index and unhide the image
        $next.css('z-index', 3).addClass('active');//make the next image the top one
    });

}