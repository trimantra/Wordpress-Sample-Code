<?php
/*
Template Name:  Portfolio template
*/
?>
<?php get_header(); ?>  
    
<?php
    $args = array(  'post_type' => 'portfolio',
                    'posts_per_page' => 5,
                    'paged' => $paged,
                    'meta_query' =>array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS',
                    ),
                    'meta_key' => '_thumbnail_id'
    );

    $additional_loop = new WP_Query($args);
    if($additional_loop->have_posts()) {
?>
                                         
        <div id="content" class="padding-zero">     <!-- start content -->
            <section id="portfolios-masonry">
                <div class="container">             <!-- start container-fluid -->
                    <div class="row-fluid">         <!-- start row-fluid -->
                                         
                        <!--Portfolio detail container box-->
                        <div class="portfolio-detail close-box"></div>
                                                    
                        <div class="post-area <?php echo $article_span_col; ?> margin-zero padding-zero" id="portfolio-container">     <!-- start post-area -->
                            <?php 
                                while ($additional_loop->have_posts()) : $additional_loop->the_post();
                            ?>
                                <div id="post-<?php the_ID(); ?>" class="element <?php echo $on_draught_class; ?> col-xs-12 col-sm-6 col-md-3 col-lg-3 margin-zero padding-zero masonry-porfolio-content" data-category='<?php echo $on_draught_class; ?>' data-id="<?php echo get_the_ID(); ?>"><!--Start element-->
                                    <div class="element_wrap">
                                        <?php the_post_thumbnail( 'medium' ); ?>
                                        <a href="<?php the_permalink() ?>" class="display_details" target="_blank"><i class="fa fa-search"></i></a>
                                        <div class="mask-description">
                                            <div style="width: 80%;float:left;min-height:1px;" class="title">
                                                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endwhile;
                                wp_reset_query(); // Reset Query
                            ?>
                        </div>    <!-- end post-area -->
                    </div>        <!-- end row-fluid -->
                </div>            <!-- end container-fluid -->
            </section>
        </div>                    <!-- end content -->
        
    <?php } else { ?>
        
        <div class="no-post-found-container">
            <div class="full-page-no-content-found">
                <h1>NO Posts Found</h1>
            </div>
        </div>
    
    <?php } ?>

<?php get_footer(); ?>
