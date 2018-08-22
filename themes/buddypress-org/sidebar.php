</div>
<div class="sidebar">

	<?php if ( function_exists( 'is_buddypress' ) && is_buddypress() ) : ?>

		<?php if ( bp_is_user() ) : ?>

			<div id="item-header-avatar">
				<a href="<?php bp_displayed_user_link(); ?>">

					<?php bp_displayed_user_avatar( array( 'type' => 'full', 'width' => 238, 'height' => 238 ) ); ?>

				</a>
			</div><!-- #item-header-avatar -->

			<?php bp_nav_menu(); ?>

		<?php endif; ?>

	<?php elseif ( ( function_exists( 'is_bbpress' ) && is_bbpress() && ! is_front_page() ) || is_page( 'new-topic' ) ) : ?>

		<?php if ( bbp_is_single_forum() || bb_base_topic_search_query( false ) ) : ?>

			<div>
				<h3><?php _e( 'Forum Info', 'bporg' ); ?></h3>
				<ul class="forum-info">
					<?php bb_base_single_forum_description(); ?>
				</ul>
			</div>

			<?php bb_base_topic_search_form(); ?>

			<div>
				<h3><?php _e( 'Forum Feeds', 'bporg' ); ?></h3>
				<ul>
					<li><a class="feed" href="<?php bbp_forum_permalink(); ?>feed/"><?php _e( 'Recent Posts', 'bporg' ); ?></a></li>
					<li><a class="feed" href="<?php bbp_forum_permalink(); ?>feed/?type=topic"><?php _e( 'Recent Topics', 'bporg' ); ?></a></li>
				</ul>
			</div>

		<?php elseif ( bbp_is_single_topic() || bbp_is_topic_edit() || bbp_is_reply_edit() ) : ?>

			<div>
				<h3><?php _e( 'Topic Info', 'bporg' ); ?></h3>
				<ul class="topic-info">
					<?php bb_base_single_topic_description(); ?>
				</ul>
			</div>

			<div>
				<?php bbp_topic_tag_list( 0, array(
					'before' => '<h3>' . __( 'Topic Tags', 'bporg' ) . '</h3><ul class="topic-tags"><li>',
					'after'  => '</li></ul>',
					'sep'    => '</li><li>',
				) ); ?>
			</div>

			<?php bb_base_reply_search_form(); ?>

			<?php if ( current_user_can( 'moderate', bbp_get_topic_id() ) ) : ?>

				<div>
					<?php bbp_topic_admin_links( array (
						'id'     => bbp_get_topic_id(),
						'before' => '<h3>' . __( 'Topic Admin', 'bporg' ) . '</h3><ul class="topic-admin-links"><li>',
						'after'  => '</li></ul>',
						'sep'    => '</li><li>',
						'links'  => array()
					) ); ?>
				</div>

			<?php endif; ?>

		<?php else : ?>

			<div>
				<h3><?php _e( 'Forums', 'bporg' ); ?></h3>
				<?php echo do_shortcode( '[bbp-forum-index]' ); ?>
			</div>
			<hr class="hidden" />

			<div>
				<h3><?php _e( 'Views', 'bporg' ); ?></h3>
				<ul>

					<?php foreach ( bbp_get_views() as $view => $args ) : ?>

						<li><a class="bbp-view-title" href="<?php bbp_view_url( $view ); ?>"><?php bbp_view_title( $view ); ?></a></li>

					<?php endforeach; ?>

				</ul>
			</div>

			<div>
				<h3><?php _e( 'Feeds', 'bporg' ); ?></h3>
				<ul>
					<li><a class="feed" href="<?php bbp_forums_url(); ?>feed/"><?php _e( 'All Recent Posts', 'bporg' ); ?></a></li>
					<li><a class="feed" href="<?php bbp_topics_url(); ?>feed/"><?php _e( 'All Recent Topics', 'bporg' ); ?></a></li>
				</ul>
			</div>

			<div>
				<h3><?php _e( 'Tags', 'bporg' ); ?></h3>
				<?php echo do_shortcode( '[bbp-topic-tags]' ); ?>
			</div>

		<?php endif; ?>

	<?php elseif ( is_front_page() || is_404() ) : ?>

		<div class="feature">
			<h3><?php _e( 'Theme Development', 'bporg' ); ?></h3>
			<p><a href="https://www.packtpub.com/web-development/buddypress-theme-development"><img width="225" alt="<?php esc_attr_e( 'BuddyPress Theme Development. A book by Tammie Lister', 'bporg' ); ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/images/buddypress-packt.jpg"/></a></p>
			<p class="book-description"><?php _e( 'An in-depth guide to designing, developing, and testing your very own custom BuddyPress theme.', 'bporg' ); ?></p>
		</div>

	<?php elseif ( is_page( array( 'plugins' ) ) ) : ?>

		<?php bb_base_plugin_search_form(); ?>

		<div>
			<h3><?php _e( 'Legacy', 'bporg' ); ?></h3>
			<ul>
				<li><a href="https://buddypress.org/support/forum/plugin-forums/"><?php _e( 'Legacy Plugin Forums', 'bporg' ); ?></a></li>
			</ul>
		</div>

	<?php elseif ( ( ! is_page( 'login' ) && ! is_page( 'register' ) && ! is_page( 'lost-password' ) ) || is_home() || is_singular( 'post' ) || is_archive() ) : ?>

		<div>
			<h3><?php _e( 'Categories', 'bporg' ); ?></h3>
			<ul>
				<?php wp_list_categories( array( 'title_li' => false ) ); ?>
			</ul>
		</div>

		<div>
			<h3><?php _e( 'Tags', 'bporg' ); ?></h3>
			<?php wp_tag_cloud(); ?>
		</div>

	<?php endif; ?>

</div>
