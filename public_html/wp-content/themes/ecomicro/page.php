<?php get_header(); ?>

<div id="content"<?php if(!ide_option('page_sidebar')) { ?> class="page"<?php } ?>>
<?php if (have_posts()) { ?>
	<?php the_post(); ?>

		<div class="post">
			<h1 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<div class="clear"> </div>

			<div class="text">
				<?php the_content('(continue reading...)'); ?>
				<div class="clear"> </div>
			</div>
			
			<div class="clear"> </div>

			<?php comments_template(); ?><!-- modified 20110407 -->

		</div><!-- post //-->

<?php } else {
		_e('<h1>Sorry!</h1>Sorry, the requested content was not found.');
	}
?>
</div><!-- content //-->

<?php ide_sidebar(); ?>

<?php get_footer(); ?>