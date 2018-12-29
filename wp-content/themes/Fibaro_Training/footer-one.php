	<footer id="colophon" class="site-footer" role="contentinfo">
    
    	<div class="responsive-container">
            	
            <div class="site-info">
            
            	<?php do_action( 'alexandria_credits' ); ?>
                <h3><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h3>
                <div class="footer-search"><?php get_search_form(); ?></div>

                
            </div><!-- .site-info -->
            
            <div class="footer-widget-three">
            	<?php if ( dynamic_sidebar('footer-left') ){ } else { ?>
                
                    <aside id="archives" class="widget">
                        <h1 class="widget-title"><?php _e( 'Archives', 'alexandria' ); ?></h1>
                        <ul>
                            <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>
            </div>
            
            <div class="footer-widget-three">
            	<?php if ( dynamic_sidebar('footer-center') ){ } else { ?>

                    <aside id="meta" class="widget">
                        <h1 class="widget-title"><?php _e( 'Meta', 'alexandria' ); ?></h1>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>            
            </div>
            
            <div class="footer-widget-three">
            	<?php if ( dynamic_sidebar('footer-right') ){ } else { ?>

                    <aside id="archives" class="widget">
                        <h1 class="widget-title"><?php _e( 'Archives', 'alexandria' ); ?></h1>
                        <ul>
                            <?php wp_list_pages('title_li='); ?>
                        </ul>
                    </aside>                                                                                 
                                                                                
                <?php } ?>            
            </div>            
            
    	</div><!-- #Responsive-Container -->
                    
	</footer><!-- #colophon -->