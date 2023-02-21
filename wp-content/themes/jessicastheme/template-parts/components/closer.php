<?php

/**
* Template Part - Hero 
*/

//Vars

$copy = get_field('closer_copy');
$socials = get_field('add_socials')

?>

<section class="feat content-width">
    <div class="feat-inner inner">
        <div class="motifs no-img">
            <div class="motif-left">
                <div class="bubble-small"></div>
                <div class="bubble-large"></div>
            </div>
            <div class="motif-right">
                <div class="bubble-large"></div>
            </div>
        </div>
        <div class="text white">
            <div class="text-inner">
                <p>
                    <?php echo $copy; ?>
                </p>
            </div>
            <?php 
            if ($socials) {
                ?>
                <div class="socials">
                <?php jm_output_socials(); ?>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="background-motif right top">
        <img src='/wp-content/themes/jessicastheme/img/svg/copy-motif.svg'>
    </div>
</section>