<?php
// Path
$index = '/index/index';
$css = '/assets/css';
$cssv = '/assets/vendors/css';
$js = '/assets/js';
$jsv = '/assets/vendors/js';
$prodash = '/assets/project/dashboard';
$dashboard = '/index/dashboard';
$mdiv = '/assets/vendors/mdi';
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
$cdncssindex = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css';
$cdncssindex0 = 'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700';
$cdncssindex1 = 'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic';
$cdncssindex2 = 'https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css';
$cdncssaosindex = 'https://unpkg.com/aos@next/dist/aos.css';

// Link css source
$cssindex = USERURL . $index . $css . '/styles.css';
$cssindex0 = USERURL . $index . $cssv . '/bootstrap.min.css';
$csscorona = USERURL . $dashboard . $cssv . '/bootstrap.min.css';
$csscorona0 = USERURL . $dashboard . $mdiv . '/css/materialdesignicons.min.css';
$csscorona1 = USERURL . $dashboard . $cssv . '/vendor.bundle.base.css';
$csscorona2 = USERURL . $dashboard . $css . '/style.css';
$csscorona3 = USERURL . $dashboard . $vendor . '/jvectormap/css/jquery-jvectormap.css';
$csscorona4 = USERURL . $dashboard . $vendor . '/flag-icon-css/css/flag-icon.min.css';
$csscorona5 = USERURL . $dashboard . $vendor . '/owl-carousel-2/css/owl.carousel.min.css';
$csscorona6 = USERURL . $dashboard . $vendor . '/owl-carousel-2/css/owl.theme.default.min.css';
$csscorona7 = USERURL . $dashboard . $vendor . '/select2/css/select2.min.css';
$csscorona8 = USERURL . $dashboard . $vendor . '/select2-bootstrap-theme/select2-bootstrap.min.css';


// Link js cdn
$cdnjsindex = 'https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js';
$cdnjsaosindex = 'https://unpkg.com/aos@next/dist/aos.js';
$cdnjsgsapindex = 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js';
$cdnjsgsapindex0 = 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/TextPlugin.min.js';
$cdnjsgsapindex1 = 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js';

// Link js source
$jsindex = USERURL . $index . $js . '/scripts.js';
$jsindex0 = USERURL . $index . $jsv . '/bootstrap.bundle.min.js';
$validationindex = USERURL . $index . $js . '/validation.js';
$jsjqueryindex = USERURL . $index . $jsv . '/jquery-3.6.4.min.js';
$jsajaxindex = USERURL . $index . $js . '/ajax.js';
$jsanimatedindex = USERURL . $index . $js . '/animated.js';
$jscorona = USERURL . $dashboard . $jsv . '/bootstrap.bundle.min.js';
$jscorona0 = USERURL . $dashboard . $jsv . '/vendor.bundle.base.js';
$jscorona1 = USERURL . $dashboard . $js . '/off-canvas.js';
$jscorona2 = USERURL . $dashboard . $js . '/misc.js';
$jscorona3 = USERURL . $dashboard . $js . '/hoverable-collapse.js';
$jscorona4 = USERURL . $dashboard . $js . '/todolist.js';
$jscorona5 = USERURL . $dashboard . $js . '/settings.js';
$jscorona6 = USERURL . $dashboard . $vendor . '/chart.js/Chart.min.js';
$jscorona7 = USERURL . $dashboard . $vendor . '/progressbar.js/progressbar.min.js';
$jscorona8 = USERURL . $dashboard . $vendor . '/jvectormap/js/jquery-jvectormap.min.js';
$jscorona9 = USERURL . $dashboard . $vendor . '/jvectormap/js/jquery-jvectormap-world-mill-en.js';
$jscorona10 = USERURL . $dashboard . $vendor . '/owl-carousel-2/js/owl.carousel.min.js';
$jscorona11 = USERURL . $dashboard . $js . '/dashboard.js';
$jscorona12 = USERURL . $dashboard . $vendor . '/select2/select2.min.js';
$jscorona13 = USERURL . $dashboard . $vendor . '/typeahead.js/typeahead.bundle.min.js';
$jscorona14 = USERURL . $dashboard . $js . '/file-upload.js';
$jscorona15 = USERURL . $dashboard . $js . '/typeahead.js';
$jscorona16 = USERURL . $dashboard . $js . '/select2.js';
$jsformvalidation = USERURL . $dashboard . $jsv . '/validation.js';
$jspassvalidation = USERURL . $dashboard . $jsv . '/validation.pass.js';


// Link img
$dashboard1 = USERURL . $index . $prodash . '/register.png';
$dashboard2 = USERURL . $index . $prodash . '/login.png';
$dashboard3 = USERURL . $index . $prodash . '/dashboard.png';
$dashboard4 = USERURL . $index . $prodash . '/setting.png';
// $noProfile = USERURL . $index . '/no-profile.png';


// Icon Company
define('ICON', $icon);


// Define css
define('CSSINDEX', $cssindex);
define('CSSINDEX0', $cssindex0);
define('CDNCSSINDEX', $cdncssindex);
define('CDNCSSINDEX0', $cdncssindex0);
define('CDNCSSINDEX1', $cdncssindex1);
define('CDNCSSINDEX2', $cdncssindex2);
define('CDNCSSAOSINDEX', $cdncssaosindex);
define('CSSCORONA', $csscorona);
define('CSSCORONA0', $csscorona0);
define('CSSCORONA1', $csscorona1);
define('CSSCORONA2', $csscorona2);
define('CSSCORONA3', $csscorona3);
define('CSSCORONA4', $csscorona4);
define('CSSCORONA5', $csscorona5);
define('CSSCORONA6', $csscorona6);
define('CSSCORONA7', $csscorona7);
define('CSSCORONA8', $csscorona8);


// Define js
define('JSINDEX', $jsindex);
define('JSINDEX0', $jsindex0);
define('CDNJSINDEX', $cdnjsindex);
define('VALIDATIONINDEX', $validationindex);
define('JSFORMVALIDATION', $jsformvalidation);
define('JSPASSVALIDATION', $jspassvalidation);
define('JSAJAXINDEX', $jsajaxindex);
define('JSJQUERYINDEX', $jsjqueryindex);
define('CDNJSAOSINDEX', $cdnjsaosindex);
define('CDNJSGSAPINDEX', $cdnjsgsapindex);
define('CDNJSGSAPINDEX0', $cdnjsgsapindex0);
define('CDNJSGSAPINDEX1', $cdnjsgsapindex1);
define('JSANIMATEDINDEX', $jsanimatedindex);
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
define('JSCORONA12', $jscorona12);
define('JSCORONA13', $jscorona13);


// Define img
define('DASHBOARD1', $dashboard1);
define('DASHBOARD2', $dashboard2);
define('DASHBOARD3', $dashboard3);
define('DASHBOARD4', $dashboard4);
// define('NOPROFILE', $noProfile);