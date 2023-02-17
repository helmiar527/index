<?php
// Path
$index = '/index/index';
$dashboard = '/index/dashboard';
$css = '/assets/css';
$cssv = '/assets/vendors/css';
$mdiv = '/assets/vendors/mdi';
$js = '/assets/js';
$jsv = '/assets/vendors/js';
$prodash = '/assets/project/dashboard';
$vendor = '/assets/vendors';
// $img = '/assets/img';
// $img1 = '/assets/images';
// $rootindex = '/index/home';
// $rootlogin = '/index/login';
// $full = '/portfolio/fullsize';
// $thumb = '/portfolio/thumbnails';


// Icon
$icon = USERURL . $index . '/assets/Profile.png';

// Link css cdn
$bootstrapicon1103 = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css';
$fontms = 'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet';
$fontm = 'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic';
// $simplelbcss = 'https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css';

// Link css source
$cssboot = USERURL . $index . $cssv . '/bootstrap.min.css';
$cssindex = USERURL . $index . $css . '/styles.css';
$csscorona = USERURL . $dashboard . $mdiv . '/css/materialdesignicons.min.css';
$csscorona0 = USERURL . $dashboard . $cssv . '/bootstrap.min.css';
$csscorona1 = USERURL . $dashboard . $cssv . '/vendor.bundle.base.css';
$csscorona2 = USERURL . $dashboard . $css . '/style.css';
$csscorona3 = USERURL . $dashboard . $vendor . '/jvectormap/css/jquery-jvectormap.css';
$csscorona4 = USERURL . $dashboard . $vendor . '/flag-icon-css/css/flag-icon.min.css';
$csscorona5 = USERURL . $dashboard . $vendor . '/owl-carousel-2/css/owl.carousel.min.css';
$csscorona6 = USERURL . $dashboard . $vendor . '/owl-carousel-2/css/owl.theme.default.min.css';


// Link js cdn
$simplelbjs = 'https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js';
// $form = 'https://cdn.startbootstrap.com/sb-forms-latest.js';

// Link js source
$bootjs = USERURL . $index . $jsv . '/bootstrap.bundle.min.js';
$jsindex = USERURL . $index . $js . '/scripts.js';
$validation = USERURL . $index . $jsv . '/validation.js';
$jsvalidation = USERURL . $dashboard . $jsv . '/validation.js';
$jscorona = USERURL . $dashboard . $jsv . '/vendor.bundle.base.js';
$jscorona0 = USERURL . $dashboard . $jsv . '/bootstrap.bundle.min.js';
$jscorona1 = USERURL . $dashboard . $js . '/off-canvas.js';
$jscorona2 = USERURL . $dashboard . $js . '/hoverable-collapse.js';
$jscorona3 = USERURL . $dashboard . $js . '/misc.js';
$jscorona4 = USERURL . $dashboard . $js . '/settings.js';
$jscorona5 = USERURL . $dashboard . $js . '/todolist.js';
$jscorona6 = USERURL . $dashboard . $vendor . '/chart.js/Chart.min.js';
$jscorona7 = USERURL . $dashboard . $vendor . '/progressbar.js/progressbar.min.js';
$jscorona8 = USERURL . $dashboard . $vendor . '/jvectormap/js/jquery-jvectormap.min.js';
$jscorona9 = USERURL . $dashboard . $vendor . '/jvectormap/js/jquery-jvectormap-world-mill-en.js';
$jscorona10 = USERURL . $dashboard . $vendor . '/owl-carousel-2/js/owl.carousel.min.js';
$jscorona11 = USERURL . $dashboard . $js . '/dashboard.js';


// Link img
$dashboard1 = USERURL . $index . $prodash . '/register.png';
$dashboard2 = USERURL . $index . $prodash . '/login.png';
$dashboard3 = USERURL . $index . $prodash . '/dashboard.png';
$dashboard4 = USERURL . $index . $prodash . '/setting.png';
// $noProfile = USERURL . $index . '/no-profile.png';


// Icon Company
define('ICON', $icon);


// Define css
define('CSSBOOT', $cssboot);
define('BOOTICON', $bootstrapicon1103);
define('FONTGMS', $fontms);
define('FONTGM', $fontm);
// define('SIMPLELBCSS', $simplelbcss);
define('CSSINDEX', $cssindex);
define('CSSCORONA', $csscorona);
define('CSSCORONA0', $csscorona0);
define('CSSCORONA1', $csscorona1);
define('CSSCORONA2', $csscorona2);
define('CSSCORONA3', $csscorona3);
define('CSSCORONA4', $csscorona4);
define('CSSCORONA5', $csscorona5);
define('CSSCORONA6', $csscorona6);


// Define js
define('BOOTJS', $bootjs);
define('JSINDEX', $jsindex);
define('SIMPLELBJS', $simplelbjs);
// define('FORM', $form);
define('JSVALIDATION', $jsvalidation);
define('VALIDATION', $validation);
define('JSCORONA', $jscorona);
define('JSCORONA0', $jscorona0);
define('JSCORONA1', $jscorona1);
define('JSCORONA2', $jscorona2);
define('JSCORONA3', $jscorona3);
define('JSCORONA4', $jscorona4);
define('JSCORONA5', $jscorona5);
define('JSCORONA6', $jscorona6);
define('JSCORONA7', $jscorona7);
define('JSCORONA8', $jscorona8);
define('JSCORONA9', $jscorona9);
define('JSCORONA10', $jscorona10);
define('JSCORONA11', $jscorona11);


// Define img
define('DASHBOARD1', $dashboard1);
define('DASHBOARD2', $dashboard2);
define('DASHBOARD3', $dashboard3);
define('DASHBOARD4', $dashboard4);
// define('NOPROFILE', $noProfile);