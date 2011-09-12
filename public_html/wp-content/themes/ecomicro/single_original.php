<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) { ?>
	<?php the_post(); ?>

		<div class="post">
			<div class="strip">
				<?php echo get_avatar( get_the_author_email(), '40' ); ?>
				<p class="day"><?php the_time('d'); ?></p>
				<p class="month"><?php the_time('M'); ?></p>
			</div>

			<div class="content">
				<h1 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<div class="text">
					<?php the_content('(continue reading...)'); ?>
					<div class="clear"> </div>
				</div>

					<div class="meta">
						<?php if ( comments_open() && pings_open() ) { ?>
							<p><?php comments_popup_link('0 comments', '1 comment', '% comments', '', ''); ?></p>
						<?php } ?>
						
						<p><?php the_category(', '); ?></p>

						<?php if(has_tag()) { ?><p class="tags"><?php the_tags(); ?></p><?php }; ?>
						<div class="clear"> </div>
					</div>
				
				<?php if(ide_option('post_fullmeta')): ?>
				<ul class="postmetadata">
						<li>This entry was posted
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_category(', ') ?>.</li>

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							<li>You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.</li>

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							<li>Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.</li>

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							<li>You can skip to the end and leave a response. Pinging is currently not allowed.</li>

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							<li>Both comments and pings are currently closed.</li>

						<?php } edit_post_link('Edit this entry','','.'); ?>
				</ul>
				<?php endif; ?>
					
					
				<?php comments_template(); ?>
			
			</div><!-- content //-->
		</div><!-- post //-->

<?php } else {
		_e('<h1>Sorry!</h1>Sorry, the requested content was not found.');
	}
?>
</div><!-- content //-->

<?php ide_sidebar(); ?>

<?php get_footer(); ?>