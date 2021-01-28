<?php get_header();
$featureImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?> 

<div id="containerMain">  
    <section id="banner" <?php if ( has_post_thumbnail() ) { ?> style="background-image:url(<?php echo $featureImg[0]; ?>);" <?php } ?>>
        <div class="container">
             <div class="row align-items-center">
                  <aside class="col-sm-12 col-md-6">
                       <?php if (have_posts()) : the_post(); ?>                         
                           <h1><?php the_title(); ?></h1>
                           <?php the_content(); ?> 
                        <?php endif; ?>                    
                  </aside>
             </div>
        </div>
    </section> <!-- end of banner -->     

    <section class="contentMain">
        <div class="container">
            <div class="row">
                <?php if( get_field('second_section_img') ): ?>
                    <aside class="col-sm-6 order-md-last">
                <?php else : ?>
                    <aside class="col-sm-12">
                <?php endif; ?>
                      <?php if( get_field('second_section_title') ): ?><h3 class="paddingTop20"><?php the_field('second_section_title'); ?></h3><?php endif; ?>                       
                      <?php the_field('second_section_content'); ?>                    
                </aside>
                <?php if( get_field('second_section_img') ): ?>
                <aside class="col-sm-6 home-img-margin order-md-first">
                    <p><img src="<?php the_field('second_section_img'); ?>" alt="" /></p>
                </aside>     
                <?php endif; ?>                 
            </div>
        </div>
    </section> <!-- end of contentMain -->

    <?php if(!(get_field('section_third_img'))): ?>
    <style>       
        .contentBlack:before{display:none}
    </style>
     <?php else : ?>
    <style>       
        .contentBlack:before{background-image:url(<?php the_field('section_third_img'); ?>);}
    </style>
    <?php endif; ?>

    <section class="contentBlack">
        <div class="container">
            <div class="row">
                 <?php if( get_field('section_third_img') ): ?>
                    <aside class="col-sm-6 home-img-margin">
                 <?php else : ?>
                    <aside class="col-sm-12">
                 <?php endif; ?>                
                     <?php if( get_field('section_third_title') ): ?><h2><?php the_field('section_third_title'); ?></h2><?php endif; ?>  
                     <?php the_field('section_third_content'); ?> 
                 </aside>
                 <?php if( get_field('section_third_img') ): ?>
                 <aside class="col-sm-6 img-spacer"></aside>
                 <?php endif; ?>
            </div>
        </div>
    </section> <!-- end of contentBlack -->

    <section class="contentMain">
        <div class="container">
            <div class="row">
                 <div class="col-12 paddingTop20 text-center">
                      <?php if( get_field('cta_label') ): ?><h2 class="margin-heading-sml"><?php the_field('team_title'); ?></h2><?php endif; ?> 
                      <?php the_field('team_content'); ?>
                </div>
            </div>
            <div class="row paddingTop30">
                <?php query_posts("post_type=team&posts_per_page=-1'"); ?>
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <?php $teamImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
                     <aside class="col-6 col-md-3">
                        <div class="team-holder">
                            <figure><img src="<?php echo $teamImg[0]; ?>" alt="" /></figure>
                            <h4><?php the_title(); ?></h4>
                            <?php the_content(); ?>
                        </div>
                     </aside>                   
                <?php endwhile; endif; wp_reset_query(); ?> 
            </div>
        </div>
    </section> <!-- end of contentMain -->
    
    <?php if( get_field('cta_label') ): ?>     
    <section class="ctaPink">
        <div class="container">
            <div class="row align-items-center">
                 <aside class="col-12 col-md-8">
                     <h3><?php the_field('cta_label'); ?></h3>
                 </aside>
                 <aside class="col-12 col-md-4">
                    <p class="text-right"><a class="btn btn-lg btn-outline-light hvr-sweep-to-right" href="<?php the_field('cta_link'); ?>"><?php the_field('cta_link_caption'); ?></a></p>
                 </aside>
            </div>
        </div>
    </section> <!-- end of ctaPink -->
    <?php endif; ?>  

    <?php get_footer(); ?>

   