	<div id="footer">
		<div class="container">
			<div class="padded_top40 padded_bottom40">
				<?php 
				$school_lic = get_schoolinfo('license');
				$course_lic = get_courseinfo('courseLicense',$_SESSION['school']['active_course']);
				$course_disclaimer = get_courseinfo('courseDisclaimer',$_SESSION['school']['active_course']);
				
				?>
				<a href="<?php schoolinfo('schoolURL'); ?>"><?php schoolinfo('schoolName'); ?></a>
				<?php if($course_disclaimer): ?>
				| <a href="./?view=module&path=school&action=course-disclaimer">Course Disclaimer</a> <?php //echo $course_disclaimer; ?>
				<?php endif; ?>
				<?php if($school_lic): ?>
				| Company License #<?php echo $school_lic; ?>
				<?php endif; ?>
				<?php if($course_lic): ?>
				| Course License #<?php echo $course_lic; ?>
				<?php endif; ?>
			</div>
		</div>
		<!-- /footer container -->
	</div>	
	<!-- /footer -->
</div>
<?php ts_footer(); ?>
<script>
jQuery(document).ready(function($){
		$('.btn_close_overlay').click(function(){
			$('#cs_overlay').fadeOut();
			return false;
		});
});	
</script>
</body>
</html>