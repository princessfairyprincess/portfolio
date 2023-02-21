<?php

/**
 * Post Display
 */

//Vars

$type = $args["type"];
$settings = get_field($type);
if ($settings) {

    $enabled = $settings["enable"];
    $style = $settings["style"];
    $swap = "";
    if ($settings["swap"] === true) {
        $swap = "swap";
    }

    $section_heading = $settings["section_heading"];
    $text_style = $settings["text_style"];
    $posts_array = [];
    $post_args = [
        "post_type" => [$type],
        "order" => "ASC",
        "meta_key" => "order",
        "order_by" => ["meta_value_num"],
    ];
    $posts_query = new WP_Query($post_args);

    if ($enabled) { ?> 
   <section class="post-display content-width <?php echo $type .
       " " .
       $style; ?>">
       <div class="section-heading inner">
           <h2 class="pink <?php echo $text_style; ?>">
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

       if ($style === "slider") { ?> 
        <div class="slider">
            <div class="slider-inner">
                <div class="slider-contents slick">
                    <?php foreach ($posts_array as $post) {

                        $post_obj = get_post($post);
                        $title = $post_obj->post_title;
                        $img = get_the_post_thumbnail_url($post);
                        $link = get_field("link", $post);
                        $note = get_field("note", $post);
                        $arrow = $note["arrow"];
                        $note_text = $note["text"];
                        ?> 

                        <div class="slide">
                            <div class="slide-inner">
                                <div class="link-outer pink">
                                    <a hreF="<?php echo $link; ?>" target="_blank">
                                        <div class="image" style="background-image:url('<?php echo $img; ?>')"></div>
                                    </a>
                                </div>
                            </div>
                            <?php if ($note_text) { ?>
                                <div class="note">
                                    <div class="note-inner">
                                        <?php if ($arrow) { ?>
                                            <div class="arrow">
                                                <img src="<?php echo $arrow; ?>">
                                             </div>
                                            <?php } ?>
                                        <div class="note-text">
                                            <span>(<?php echo $note_text; ?>)</span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
        <div class="background-motif slider-motif">
            <img src="/wp-content/themes/jessicastheme/img/svg/slider-motif.svg">
        </div>
        <?php } elseif ($style === "rows") { ?>
        <div class="rows-outer">
            <?php
            $i = 1;
            foreach ($posts_array as $post) {

                $post_obj = get_post($post);
                $title = get_field("section_heading", $post);
                $img = get_the_post_thumbnail_url($post);
                $link = get_field("link", $post);
                $note = get_field("note", $post);
                $arrow = $note["arrow"];
                $note_text = $note["text"];
                $colour = "";
                $alt = "";

                $motif = "<img src='/wp-content/themes/jessicastheme/img/svg/row-motif-1.svg'>";
                $motif_pos = "right";
                

                if ($i % 2 == 0) {
                    $alt = "alt";
                } 
                
                if ($i % 2 != 0 && $i % 3 == 0) {
                    $colour = "pink";
                    $motif = "<img src='/wp-content/themes/jessicastheme/img/svg/row-motif-2.svg'>";
                    $motif_pos = "left";
                } elseif ($i % 2 == 0 && $i % 3 != 0 && $i % 4 != 0) {
                    $colour = "blue";
                    
                } elseif ($i % 4 == 0 || $i == 1) {
                    $colour = "aqua";
                    $motif = "";
                } 
                ?>
                <div class="row-container <?php echo $swap; ?>">
                    <div class="row-heading inner <?php echo $alt;?>">
                            <h2 class="regular <?php echo $colour; ?>">
                                <?php echo $title; ?>
                            </h2>
                        </div>
                    <div class="row">
                    <div class="row-inner">
                        
                        <div class="row-contents">
                            <div class="row-item">
                                <div class="row-item-inner">
                                    <div class="content-holder <?php echo $colour .
                                        " " .
                                        $alt; ?>">
                                        <div class="content">
                                            <div class="image" style="background-image:url('<?php echo $img; ?>')"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($note_text) { ?>
                                <div class="note  <?php echo $alt; ?>">
                                    <div class="note-inner">
                                        <?php if ($arrow) { ?>
                                            <div class="arrow">
                                                <img src="<?php echo $arrow; ?>">
                                        </div>
                                            <?php } ?>
                                        <div class="note-text">
                                            <span>(<?php echo $note_text; ?>)</span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                
                
                </div>
                <?php if ($motif !== "") {?>
                <div class="background-motif <?php echo $motif_pos; ?>">
                    <?php echo "$motif"; ?>
                </div>
                <?php } ?>
                <?
            $i++
            
            ?>
        </div>
        <?php
            }
            ?>
    </div>
    <?php }
       wp_reset_postdata();
       ?>
       
   <?php }
    ?>
   </section>
   <?php return;
}

?>
