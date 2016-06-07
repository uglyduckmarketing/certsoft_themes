<?php save_progress(); ?>
<!DOCTYPE html>
<html>
<head>
<title><?php page_title(); ?></title>
<link rel="stylesheet" media="all" href="<?php stylesheet(); ?>" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
</head>
<?php ts_head(); ?>
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
					<li><a href="<?php schoolinfo('schoolURL'); ?>/?view=dashboard">Dashboard</a></li>
					<?php nav_menu(); ?>
				<?php endif; ?>	
				</ul>
			</div>
			<div id="header_links" class="quarter1 floatright alignright">
			<?php if(LOGGED_IN): ?>
				<a href="<?php schoolinfo('schoolURL'); ?>/?view=profile">account</a> |
				<a href="<?php schoolinfo('schoolURL'); ?>/?view=help">help</a> |
				<a href="<?php schoolinfo('schoolURL'); ?>/ts-logout.php">logout</a>
			<?php endif; ?>				
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- /header -->

				

