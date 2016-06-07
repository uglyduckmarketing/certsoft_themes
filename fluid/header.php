<?php save_progress(); ?>
<!DOCTYPE html>
<html>
<head>
<title><?php page_title(); ?></title>
<link rel="stylesheet" media="all" href="<?php schoolinfo('schoolURL'); ?>/<?php echo SCHOOL_DIR; ?>/themes/base.css" />
<link rel="stylesheet" media="all" href="<?php stylesheet(); ?>" />

<link href="<?php schoolinfo('schoolURL'); ?>/<?php echo INCLUDES_DIR; ?>/cropper-master/css/cropper.min.css" rel="stylesheet">
<link href="<?php schoolinfo('schoolURL'); ?>/<?php echo INCLUDES_DIR; ?>/cropper-master/css/main.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../ts-includes/js/cs.main.js"></script>
<?php 
if(!empty($settings->additionalStyles)){
	echo '<style>'."\n";
	echo $settings->additionalStyles; 
	echo "\n".'</style>'."\n";
} 
if($settings->disableRightClick == 'true'):
?>

<script language=JavaScript>
    var message="Function Disabled!";         
    function clickIE4(){
        if (event.button==2){ alert(message); return false; }
    }
    function clickNS4(e){
        if (document.layers||document.getElementById&&!document.all){ 
            if (e.which==2||e.which==3){ 
                alert(message);
                return false; 
            } 
        }
    }
    if (document.layers){ 
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown=clickNS4;
    } else if (document.all&&!document.getElementById){
        document.onmousedown=clickIE4; 
    } 
    document.oncontextmenu=new Function("alert(message); return false") 
</script>
<style>
	.no-select {
    user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    -o-user-select: none;
}
</style>
<?php endif; ?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<?php cs_head(); ?>
</head>
<body>
<?php if(LOGGED_IN): ?>
<?php session_timer($settings->sessionMaxIdleTime,$settings->sessionAlertTime); ?>
<?php endif; ?>
<div id="container" <?php echo $page_class; ?>>
	<div id="header">
		<div class="container">
			<div class="quarter3 floatleft">
				<ul class="menu">
				<li id="logo" class="logo"><a href="<?php //admininfo('schoolURL'); ?>"><span><?php 
				if(empty($settings->logo)) page_title(); 
				else{
					logo();
				} 
				?></span></a></li>
				<?php if(LOGGED_IN): ?>
					<!--<li><a href="<?php schoolinfo('schoolURL'); ?>/?view=dashboard">Dashboard</a></li>-->
					<?php //nav_menu(); ?>
				<?php endif; ?>	
				</ul>
			</div>
			<div id="header_links" class="quarter1 floatright alignright">
			<?php if(LOGGED_IN): ?>
				<div id="account-menu">
					<div id="account-menu-toggle">
						<?php echo get_profile_photo(); ?>
					<?php $greeting = get_option('user_greeting','first_name'); ?>
					<?php if($greeting == 'first_name'): ?>
					<?php echo get_user_data($_SESSION['school']['user'],'firstName'); ?>
					<?php else: ?>
					<?php echo $_SESSION['school']['user_name']; ?>
					
					
					<?php endif; ?>	
					<i class="fa fa-angle-down"></i>
					</div>
					<ul class="account-options">
						<li><a href="<?php schoolinfo('schoolURL'); ?>/?view=profile">Profile</a></li>
						<li><a href="<?php schoolinfo('schoolURL'); ?>/?view=profile-photo">Profile Photo</a></li>
						<li><a href="<?php schoolinfo('schoolURL'); ?>/?view=account">Account Settings</a></li>
						<li><a href="<?php schoolinfo('schoolURL'); ?>/?view=help">Help</a></li>
						<li><a href="<?php schoolinfo('schoolURL'); ?>/ts-logout.php">Logout</a></li>
					</ul>
				</div>
				<!-- <a href="<?php schoolinfo('schoolURL'); ?>/?view=profile">account</a> | -->
				<!-- <a href="<?php schoolinfo('schoolURL'); ?>/?view=help">help</a> | -->
				<!-- <a href="<?php schoolinfo('schoolURL'); ?>/ts-logout.php">logout</a> -->
				<script>
					jQuery(document).ready(function($){
						$('#account-menu-toggle').click(function(){
							$( "#account-menu .account-options" ).toggleClass( "account-options-open" );
						});
						$('#content').click(function(){
							$( "#account-menu .account-options" ).removeClass( "account-options-open" )
						});
					});
				</script>
			<?php else:?>
				<?php if($_GET['view'] != 'login'): ?>
				<a href="<?php schoolinfo('schoolURL'); ?>/?view=login">Log In</a>
				<?php endif; ?>
			<?php endif; ?>				
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- /header -->


	<div id="content">
		<div id="panel_center" class="transition <?php echo (empty($_SESSION['school']['mini-nav']))?'collapsed':'expanded'; ?>">
			<?php if(LOGGED_IN): ?>
			<div id="panel_left" class="transition <?php echo (empty($_SESSION['school']['mini-nav']))?'expanded':'collapsed'; ?>">
				<div class="padded_top40">
					<a id="toggle-left" href="#"><span class="label">Collapse Menu</span><i class="fa fa-toggle-left"></i></a>
					<hr />
					<div>
						<ul class="menu">
							<!--<li><a href="<?php schoolinfo('schoolURL'); ?>/?view=dashboard"><span class="icon"><i class="fa fa-home"></i></span><span class="label">Dashboard</span></a></li>-->
							<?php nav_menu(); ?>
						</ul>
					</div>
				</div>
			</div>
			<?php endif; ?>	
			<div class="workspace">	
			<?php run_callbacks('workspace_init'); ?>	
			<?php if(!empty($sub_menu_slug)) get_sub_menu($sub_menu_slug); ?>