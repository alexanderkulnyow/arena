<?php
// Установка переменной текущего автора $curauth
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

	<div class="author-profile-card">
		<h2>Обо мне: <?php echo $curauth->nickname; ?></h2>
		<div class="author-photo">
			<?php echo get_avatar( $curauth->user_email, '90 '); ?>
		</div>
		<p><strong>Вебсайт:</strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a><br />
			<strong>Биография:</strong> <?php echo $curauth->user_description; ?></p>
	</div>

	<h2>Посты <?php echo $curauth->nickname; ?>:</h2>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h3>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка: <?php the_title(); ?>">
			<?php the_title(); ?></a>
	</h3>
	<p class="posted-on">Опубликована: <?php the_time('d M Y'); ?></p>

	<?php the_excerpt(); ?>

<?php endwhile;

// Предыдущая/следующая навигация по страницам.
	the_posts_pagination();


else: ?>
	<p><?php _e('У автора нет постов.'); ?></p>

<?php endif; ?>
