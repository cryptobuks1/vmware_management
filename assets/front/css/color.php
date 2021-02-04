<?php
header ("Content-Type:text/css");
$color = "#746EF1"; // Change your Color Here
$color2 = "#746EF1"; // Change your Color Here

function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}
function checkhexcolor2($color2) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color2);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#746EF1";
}


if( isset( $_GET[ 'color2' ] ) AND $_GET[ 'color2' ] != '' ) {
    $color2 = "#".$_GET[ 'color2' ];
}

if( !$color OR !checkhexcolor2( $color2 ) ) {
    $color2 = "#746EF1";
}


function hex2rgba( $color, $opacity) {

    if ($color[0] == '#') {
        $color = substr($color, 1);
    }
    if (strlen($color) == 6) {
        list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return false;
    }
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);
    $rgb = 'rgba('.$r. ',' .$g .',' .$b. ',' . $opacity.')';

    return $rgb;
}

function hex2rgba2( $color2, $opacity2) {

    if ($color2[0] == '#') {
        $color2 = substr($color2, 1);
    }
    if (strlen($color2) == 6) {
        list($r, $g, $b) = array($color2[0] . $color2[1], $color2[2] . $color2[3], $color2[4] . $color2[5]);
    } elseif (strlen($color2) == 3) {
        list($r, $g, $b) = array($color2[0] . $color2[0], $color2[1] . $color2[1], $color2[2] . $color2[2]);
    } else {
        return false;
    }
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);
    $rgb = 'rgba('.$r. ',' .$g .',' .$b. ',' . $opacity2.')';

    return $rgb;
}


?>

.navbar-area,
.contact-area .contact-from-wrapper input[type=submit]:hover, .contact-area .contact-from-wrapper button[type=submit]:hover,
.list-group-item,
.header-bottom,
.about-right-img .hover,
.account_details .accounts_info .full_profile_btn #btn,
.header-area .right-content .invest-box-wrapper,
.all-transation-area .tab-content-area .payout table thead,
.why-us-area .right-content .singl-why-us-box.yellow:hover .icon,
.all-transation-area .tab-navbar-area .nav-tabs .nav-link.red, .all-transation-area .tab-navbar-area .nav-tabs .nav-link:focus.red, .all-transation-area .tab-navbar-area .nav-tabs .nav-link:hover.red,
.support-bar{
 background: <?php echo $color; ?> !important;
}

.why-us-area .right-content .singl-why-us-box.yellow .icon i,
.main-menu li .sub-menu li.active > a, .main-menu .sub-menu li a:hover,
.main-menu li .sub-menu li.active > a, .main-menu .sub-menu li a:hover{
    color: <?php echo $color; ?> !important;
}


.header-area .right-content .invest-form-wrapper input[type=submit], .pranto-anchor,
.why-us-area .right-content .singl-why-us-box.yellow .content .header:after,
.all-transation-area .tab-content-area .deposit table thead,
input[type=submit], .pranto-anchor, button[type=submit],
.clients-feedbacks-area .testimonial-carousel .owl-dots div.active,
.faq-area .accordion-wrapper .card .card-header h5 button:after,
.button.primary,
.back-to-top,
.navbar-area ul li.boxed-btn-rounded,
.road-map .road-map-wrapper .timeline .item .item-content .content,
.all-transation-area .tab-navbar-area .nav-tabs .nav-link.yellow, .all-transation-area .tab-navbar-area .nav-tabs .nav-link:focus.yellow, .all-transation-area .tab-navbar-area .nav-tabs .nav-link:hover.yellow,
.double-your-coin-area .single-coin-box.yellow .icon{
background: <?php echo $color2; ?>;
}

.double-your-coin-area .single-coin-box.yellow:hover,
.package:hover,
.double-your-coin-area .single-coin-box.yellow:hover, .package:hover, .why-us-area .right-content .singl-why-us-box.yellow .icon,
.why-us-area .right-content .singl-why-us-box.yellow .icon{
border-color: <?php echo $color2; ?> !important;
}

.back-to-top,
.back-to-top:hover{
border: 2px solid <?php echo $color2; ?> ;
}

.package:hover::before {
border-color: <?php echo $color2; ?> transparent transparent transparent;

}

.double-your-coin-area .single-coin-box.yellow:hover .content h4,
.package-trial,
.back-to-top:hover,
.package-list li::before,
.clients-feedbacks-area .testimonial-carousel .single-testimonial-item .content h6{
color: <?php echo $color2; ?> !important;
}

#clockdiv > div{
background: <?php echo $color2; ?>;
}

#clockdiv div > span{
background: <?php echo $color2; ?>;
}

.road-map .road-map-wrapper .timeline .row:nth-child(odd) .item .item-content .content:after{
border-right: 10px solid <?php echo $color2; ?>;
}

.road-map .road-map-wrapper .timeline .item .item-icon {
background-color: <?php echo $color; ?>;
border: 2px solid <?php echo hex2rgba2($color2, 0.5); ?>;
-webkit-box-shadow: 0px 0px 5px 5px <?php echo hex2rgba2($color, 0.5); ?>;
box-shadow: 0px 0px 5px 5px <?php echo $color2; ?>;
}
.road-map .road-map-wrapper .timeline .row:nth-child(even) .item .item-content .content:after{
border-left: 10px solid <?php echo $color2; ?>;
}

.support-bar .support-bar-left span i, .support-bar .support-bar-right .support-item i {
    color: <?php echo $color; ?>;
}

#langSel {
    background: #000;
    color: <?php echo $color; ?>;
    border: 1px solid #000;
}

.card-header {
    background: <?php echo $color; ?>;
    text-align:center;
}
.card-header > .panel-title {
    color: #fff;
}

.btn-primary{
    background:  <?php echo $color2; ?>;
    border: 1px solid  <?php echo $color2; ?>;
}


.btn-primary:hover{
    background:  <?php echo $color; ?>;
    border: 1px solid  <?php echo $color; ?>;
}

.color{
    color: <?php echo $color; ?>;
}

.showbal {
    font-size: 15px;
    letter-spacing: normal;
    font-weight: 600;
}