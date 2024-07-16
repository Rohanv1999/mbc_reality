<?php
header("Content-Type:text/css");
$color = "#f0f"; // Change your Color Here
$secondColor = "#ff8"; // Change your Color Here

function checkhexcolor($color){
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) AND $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

if (!$color OR !checkhexcolor($color)) {
    $color = "#336699";
}


function checkhexcolor2($secondColor){
    return preg_match('/^#[a-f0-9]{6}$/i', $secondColor);
}

if (isset($_GET['secondColor']) AND $_GET['secondColor'] != '') {
    $secondColor = "#" . $_GET['secondColor'];
}

if (!$secondColor OR !checkhexcolor2($secondColor)) {
    $secondColor = "#336699";
}
?>

.bg--base {
    background-color: <?php echo $color ?> !important;
}

.property-details-meta li i, .hero-list-item-list .single i, .property-card .price, .property-card .property-meta li i, .read-more,.new-list-card__footer .price, a:hover, .link-list li a:hover {
    color: <?php echo $color ?>;
}

.btn--base, .btn--base:hover, .property-card__thumb .property-badge, .subscribe-form .subscribe-form-btn, .footer-widget .social-link-list li a, .card-view-btn-area button.active, .pagination .page-item.active .page-link, .custom-file-upload::after, .property-card__thumb .property-badge::after, .custom--nav-tabs.style--two .nav-item .nav-link.active::after, .blog-details__thumb .post__date .date, .sidebar .widget .widget__title::after, .custom--accordion .accordion-button:not(.collapsed), .preloader .preloader-container .animated-preloader, .preloader .preloader-container .animated-preloader:before, .select2-container--default .select2-results__option--highlighted[aria-selected], .details-thumb-slider .slick-arrow:hover, .blog-details__footer .social__links li a:hover {
    background-color: <?php echo $color ?>;
}
.property-card__thumb .property-badge::before {
    border-color: transparent <?php echo $color ?>ef transparent transparent;
}
.pagination .page-item .page-link {
    border-color: <?php echo $color ?>25;
}
.custom--accordion .accordion-item {
    border-color: <?php echo $color ?>50;
}
.action-sidebar {
    background-color: <?php echo $color ?>08;
}
.custom--accordion .accordion-button {
    background-color: <?php echo $color ?>05;
}

.text--base {
    color: <?php echo $color ?> !important;
}
.pagination .page-item .page-link:hover {
    background-color: <?php echo $color ?>;
    border-color: <?php echo $color ?>;
    color: #fff;
}
.box--border {
    border: 4px solid <?php echo $color ?>8c;
}

.header.menu-fixed .header__bottom, .hero-list-item, .main-search-area, .footer__bottom::after, .footer::before, .search-area {
    background-color: <?php echo $secondColor ?>;
}

.form--control:focus {
    border-color: <?php echo $color ?> !important;
    box-shadow: 0 0 5px <?php echo $color ?>35;
}


a.text-white:hover {
    color: <?php echo $color ?> !important;
}