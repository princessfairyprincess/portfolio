<?php

/** 
 * Copy Section
 **/

 $section_title = get_field('section_title');
 $text = get_field('text_area');
 $table = get_field('table');
 $settings = $table['table_settings'];
 $table_enable = $settings['enable'];
 $table_style = $settings['style'];
 $columns = '';

 if ($table_enable) {
    //Would have preferred a repeater field here, but I'm using the free version of ACF
    $columns = array(
        $table['column_1'],
        $table['column_2'],
        $table['column_3']
    );
 } 

 ?>

 <section class="copy-section content-width">
    <div class="copy-title-outer inner">
        <div class="copy-title">
            <h2><?php echo $section_title; ?></h2>
        </div>
    </div>
    <?php 
    if ($text) {
        ?>
        <div class="text-container">
            <?php echo $text; ?>
        </div>
        <?php
    }
    ?>
    <?php 
    if ($table_enable) {
        ?>
        <div class="table-container <?php echo $table_style; ?>">
            <div class="table-inner">
                <?php 
                $i = 0;
                foreach ($columns as $column) {
                    $col_heading = $column['heading'];
                    $content = $column['content'];
                    $middle = '';
                    if ($table_style === "dynamic" && $i == 1) {
                        $middle = "middle";
                    }
                    ?>
                    <div class="column <?php echo $middle; ?>">
                        <div class="column-inner">
                            <div class="heading">
                                <h3><?php echo $col_heading; ?></h3>
                            </div>
                            <div class="content">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?> 
 </section>