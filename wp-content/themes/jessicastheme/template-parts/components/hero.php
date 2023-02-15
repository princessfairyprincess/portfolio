<?php

/**
* Template Part - Hero 
*/

//Vars

$title = get_field('hero_title');
$photo = get_field('photo');
$secondary = get_field('secondary_title');

?>

<section class="hero content-width">
    <div class="hero-inner inner">
        <div class="title">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="motifs">
            <div class="motif-left">
                <div class="bubble-small" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300"></div>
                <div class="bubble-large" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400"></div>
            </div>
            <div class="motif-right" data-aos="fade-up" data-aos-duration="700" data-aos-delay="500">
                <div class="bubble-photo" style="background-image: url('<?php echo $photo;?>')"></div>
            </div>
        </div>
        <div class="text">
            <div class="text-inner">
                <h2 class='type-this'>
                    <?php echo $secondary; ?>
                </h2>
            </div>
        </div>
    </div>
    <div class="arrow">
        <svg class="bounce" width="30" height="104" viewBox="0 0 30 104" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.173 2L13.541 101.083C13.541 101.083 16.2467 97.7798 19.206 94.3782C22.5011 90.449 28 87.9722 28 87.9722C28 87.9722 22.5359 90.3693 19.6212 94.15C16.4752 98.2193 13.5604 102 13.5604 102C13.5604 102 9.05169 92.5933 2 89.0026" stroke="#474A66" stroke-opacity="0.8" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
     </div>
     <div class="background-motif left">
        <svg width="736" height="1091" viewBox="0 0 736 1091" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.46" fill-rule="evenodd" clip-rule="evenodd" d="M120.676 26.3912C232.243 -31.7424 383.184 14.2895 480.642 107.385C568.743 191.541 532.349 338.977 572.419 457.91C618.963 596.056 767.014 710.54 729.969 847.409C691.194 990.672 538.685 1055.58 403.515 1081.96C276.283 1106.79 133.334 1080.89 33.4935 983.345C-55.1222 896.769 -51.6863 754.413 -61.4057 627.743C-68.5998 533.985 -40.466 452.687 -13.9447 365.096C22.9645 243.198 15.1509 81.3763 120.676 26.3912Z" fill="url(#paint0_linear_154_3)"/>
            <defs>
            <linearGradient id="paint0_linear_154_3" x1="336.655" y1="0.648712" x2="336.655" y2="1090.79" gradientUnits="userSpaceOnUse">
            <stop stop-color="#DEE8F5"/>
            <stop offset="1" stop-color="#8DDBE0"/>
            </linearGradient>
            </defs>
        </svg>
     </div>
</section>