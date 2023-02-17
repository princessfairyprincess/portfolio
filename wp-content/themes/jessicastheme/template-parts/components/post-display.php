<?php

/**
 * Post Display
 */

 //Vars

 $type = $args['type'];
 $settings = get_field($type);
 if ($settings) {
    $enabled = $settings['enable'];
    $style = $settings['style'];
    $section_heading = $settings['section_heading'];
    $text_style = $settings['text_style'];
    $posts_array = array();
    $post_args = array(
       'post_type' => array($type),
       'order' => 'ASC',
       'meta_key' => 'order',
       'order_by' => array("meta_value_num")
    );
    $posts_query = new WP_Query($post_args);
   
    ?>
   
    <?php 
    if ($enabled) {

    ?> 
   <section class="post-display content-width <?php echo $type . ' ' . $style; ?>">
       <div class="section-heading">
           <h2 class="<?php echo $text_style; ?>">
               <?php echo $section_heading; ?>
           </h2>
       </div>
       <?php
         if ($posts_query->have_posts()) {
            while ($posts_query->have_posts()) {
                $posts_query->the_post();
                $post_id = get_the_id();
                array_push($posts_array, $post_id);
            }
            
        } 

   
       if ($style === 'slider') {
        ?> 
        <div class="slider">
            <div class="slider-inner">
                <div class="slider-contents slick">
                    <?php 
                    foreach ($posts_array as $post) {
                        $post_obj = get_post($post);
                        $title = $post_obj->post_title;
                        $img = get_the_post_thumbnail_url($post);
                        $link = get_field('link', $post);
                        $note = get_field('note', $post);
                        $arrow = $note['arrow'];
                        $note_text = $note['text'];
                        ?> 

                        <div class="slide">
                            <div class="slide-inner">
                                <div class="link-outer">
                                    <a hreF="<?php echo $link; ?>" target="_blank">
                                        <div class="image" style="background-image:url('<?php echo $img;?>')"></div>
                                    </a>
                                </div>
                            </div>
                            <?php if ($note_text) {
                                ?>
                                <div class="note">
                                    <div class="note-inner">
                                        <?php 
                                        if ($arrow) {
                                            ?>
                                            <div class="arrow">
                                                <img src="<?php echo $arrow; ?>">
                                        </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="note-text">
                                            <span>(<?php echo $note_text;?>)</span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
   
       } elseif ($style === 'rows') {
   
       }
       ?>
    </section>
    <?php
    } 
    wp_reset_postdata();
   ?>
   <?php 
   return;
 }

?>
