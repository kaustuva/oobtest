<?php

/**

 * The main template file

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * For example, it puts together the home page when no home.php file exists.

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */



get_header(); ?>

<div class="page-content">

	<section class="section blog page-section-ptb gray-bg3">

    	<div class="container">

        	<div class="row">

            	<div class="col-sm-7 col-md-8">

					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', get_post_format() ); ?>

						<?php endwhile; ?>

			

						<div class="pagination">

     						<?php

                				/*if(function_exists('wp_pagenavi')) {

      								wp_pagenavi();

     							}*/
								
								if(function_exists('wp_pagenavi')) {
									 if( wp_is_mobile() ){
									  $wp_pagenavi_opt = array(
									   'options' => array(
										'pages_text'                  => '',
										'current_text'                => '%PAGE_NUMBER%',
										'page_text'                   => '%PAGE_NUMBER%',
										// 'first_text'                  => __( '&laquo; First', 'wp-pagenavi' ),
										'first_text'                  => '<i class="fa fa-fast-backward"></i>',
										'last_text'                   => '<i class="fa fa-fast-forward"></i>',
										'prev_text'                   => '<i class="fa fa-backward"></i>',
										'next_text'                   => '<i class="fa fa-forward"></i>',
										'dotleft_text'                => '',
										'dotright_text'               => '',
										'num_pages'                   => 1,
										'num_larger_page_numbers'     => 0,
										'larger_page_numbers_multiple'=> 1,
										'always_show'                 => false,
										'use_pagenavi_css'            => true,
										'style'                       => 1,
									   )
									  );
									  wp_pagenavi($wp_pagenavi_opt);
									 }else{
									  wp_pagenavi();
									 }
									}

     						?>

						</div>
                        
                        



					<?php else : ?>

						<article id="post-0" class="post no-results not-found">

							<?php if ( current_user_can( 'edit_posts' ) ) :

								// Show a different message to a logged-in user who can add posts.

							?>

							<header class="entry-header">

								<h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>

							</header>

							

                            <div class="entry-content">

								<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>

							</div><!-- .entry-content -->

							

							<?php else :

								// Show the default message to everyone else.

							?>

							<header class="entry-header">

								<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>

							</header>



							<div class="entry-content">

								<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>

								<?php get_search_form(); ?>

							</div><!-- .entry-content -->

							<?php endif; // end current_user_can() check ?>

						</article><!-- #post-0 -->

					<?php endif; // end have_posts() check ?>

				</div>

				

                <div class="col-sm-5 col-md-4">

    				<div class="sidebar">

						<?php get_sidebar(); ?>

					</div>

				</div>

			</div>

		</div>

	</section>

</div>

<?php get_footer(); ?>

