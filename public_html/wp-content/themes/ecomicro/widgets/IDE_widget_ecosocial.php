<?php

	/*
		Copyright 2010, idesigneco.com
		http://idesigneco.com
	*/


class IDE_widget_ecosocial extends WP_Widget {

	// register the widget
	function IDE_widget_ecosocial() {
		$widget_ops = array(
						'classname' => 'ide_widget_ecosocial',
						'description' => __( 'FeedBurner, Twitter and other social media options to publicize your blog.')
		);
		$this->WP_Widget('IDE_widget_ecosocial', __('ecoSocial'), $widget_ops);
	}


	// print the widget
	function widget( $args, $instance ) {
		echo $args['before_widget'];
	?>
		<ul class="list">
			<li><a href="#" class="feed">&rsaquo; <?php _e('Subscribe'); ?></a></li>
			<?php if($instance['share'] == 'on') { ?><li><a href="#" class="share">&rsaquo; <?php _e('Share'); ?></a></li><?php } ?>
			<?php if($instance['twitter']) { ?><li><a href="#" class="twitter">&rsaquo; <?php _e('Twitter'); ?></a></li><?php } ?>
		</ul>
		<ul class="stats noul">
			<li class="feed">
			<?php if($instance['feedurl']) { ?>
				<a href="<?php echo $instance['feedurl']; ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico_feed.png" alt="Subscribe"/><span class="caption">Subscribe to feed</span></a>
			<?php } else { ?>
				<a class="a2a_dd" href="http://www.addtoany.com/subscribe?linkname=<?php bloginfo('name'); ?>&amp;linkurl=<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico_feed.png" alt="Subscribe"/><span class="caption">Subscribe to feed</span></a>
				<script type="text/javascript">a2a_linkname="<?php bloginfo('name'); ?>";a2a_linkurl="<?php bloginfo('rss2_url'); ?>";</script>
				<script type="text/javascript" src="http://static.addtoany.com/menu/feed.js"></script>
			<?php } ?>
			</li>
			
			<?php if($instance['share'] == 'on') { ?>
			<li class="share">
				<a class="a2a_dd" href="http://www.addtoany.com/share_save"><img src="<?php bloginfo('template_url'); ?>/images/ico_share.png" alt="Share/Bookmark" /><span class="caption">Share / Bookmark</span></a>
				<script type="text/javascript">a2a_linkname=document.title;a2a_linkurl='<?php bloginfo('home'); ?>';a2a_hide_embeds=0;</script>
				<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
			</li>
			<?php } ?>
			
			<?php if($instance['twitter']) { ?>
			<li class="twitter">
				<script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script type="text/javascript">
<!--
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 1,
  interval: 6000,
  width: 100,
  height: 75,
  theme: {
    shell: {
      background: 'transparent',
	  color: 'inherit'
    },
    tweets: {
      background: 'transparent',
	  color: 'inherit'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('<?php echo htmlspecialchars($instance['twitter']); ?>').start();
//-->
</script>
			</li>
			<?php } ?>
		</ul>
		<script type="text/javascript">
		<!--
			jQuery(document).ready(function($) {
			
				$('.ide_widget_ecosocial .stats li:first').show();
			
				$('.ide_widget_ecosocial .list a').each(function() {

					$(this).click(function() {
						$('.ide_widget_ecosocial .stats li').each(function() {
							$(this).hide();
						});
						$('.ide_widget_ecosocial .stats .' + $(this).attr('class')).fadeIn();

						$('.ide_widget_ecosocial .list a').removeClass('sel');
						$(this).addClass('sel');
						
						return false;
					});
					
				});
				
				$('.ide_widget_ecosocial .list a:first').addClass('sel');
			});
		//-->
		</script>
		<div class="clear"> </div>
<?php
		echo $args['after_widget'];
	}


	// save widget settings
	function update( $new_instance, $old_instance ) {
		return $new_instance;		
	}

	// show widget options form
	function form( $instance ) {
		$twitter = htmlspecialchars($instance['twitter']);
		$feedurl = htmlspecialchars($instance['feedurl']);
		$share = $instance['share'] ? 'checked="checked"' : '';
?>
		<p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter username:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('feedurl'); ?>"><?php _e('Feedburner url (optional):'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('feedurl'); ?>" name="<?php echo $this->get_field_name('feedurl'); ?>" type="text" value="<?php echo esc_attr($feedurl); ?>" /></p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $share; ?> id="<?php echo $this->get_field_id('share'); ?>" name="<?php echo $this->get_field_name('share'); ?>" /> <label for="<?php echo $this->get_field_id('share'); ?>"><?php _e('Enable sharing options?'); ?></label>
		</p>
<?php
	}
}
?>