<?php get_header('id_'.$_GET['id']); ?>
<div id="cs_page">
	<div class="padding20 padding">
		<h1><?php echo cs_page_title($_GET['id']); ?></h1>
		<div class="content_box">
			<div class="padding20">
				<?php echo cs_page_content($_GET['id']); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>