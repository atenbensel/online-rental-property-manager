<?php if(function_exists('set_headers')) { set_headers(); } ?>
<?php if(!isset($Translation)) die('No direct access allowed!'); ?><!DOCTYPE html>
<?php if(!defined('PREPEND_PATH')) define('PREPEND_PATH', ''); ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="<?php echo datalist_db_encoding; ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?php echo APP_TITLE . (isset($x->TableTitle) ? ' | ' . $x->TableTitle : ''); ?></title>
		<link id="browser_favicon" rel="shortcut icon" href="<?php echo PREPEND_PATH; ?>resources/images/appgini-icon.png">

		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/initializr/css/bootstrap.css">
		<!--[if gt IE 8]><!-->
			<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/initializr/css/bootstrap-theme.css">
		<!--<![endif]-->
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/lightbox/css/lightbox.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/select2/select2.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/timepicker/bootstrap-timepicker.min.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/datepicker/css/datepicker.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>resources/bootstrap-datetimepicker/bootstrap-datetimepicker.css" media="screen">
		<link rel="stylesheet" href="<?php echo PREPEND_PATH; ?>dynamic.css">

		<!--[if lt IE 9]>
			<script src="<?php echo PREPEND_PATH; ?>resources/initializr/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<![endif]-->
		<script src="<?php echo PREPEND_PATH; ?>resources/jquery/js/<?php echo latest_jquery(); ?>"></script>
		<script>var $j = jQuery.noConflict();</script>
		<script src="<?php echo PREPEND_PATH; ?>resources/moment/moment-with-locales.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/jquery/js/jquery.mark.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/initializr/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/lightbox/js/prototype.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/lightbox/js/scriptaculous.js?load=effects"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/select2/select2.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/timepicker/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/datepicker/js/datepicker.packed.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>resources/hotkeys/jquery.hotkeys.min.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>nicEdit.js"></script>

		<script>
			<?php
				// make a UTF8 version of $Translation
				$translationUTF8 = $Translation;
				if(datalist_db_encoding != 'UTF-8')
					$translationUTF8 = array_map(function($str) {
						return iconv(datalist_db_encoding, 'UTF-8', $str);
					}, $translationUTF8);

				$imgFolder = rtrim(config('adminConfig')['baseUploadPath'], '\\/') . '/';
			?>
			var AppGini = AppGini || {};

			/* translation strings */
			AppGini.Translate = {
				_map: <?php echo json_encode($translationUTF8, JSON_PRETTY_PRINT); ?>,
				_encoding: '<?php echo datalist_db_encoding; ?>'
			}

			AppGini.imgFolder = <?php echo json_encode($imgFolder, JSON_PARTIAL_OUTPUT_ON_ERROR); ?>;
		</script>

		<script src="<?php echo PREPEND_PATH; ?>common.js"></script>
		<script src="<?php echo PREPEND_PATH; ?>shortcuts.js"></script>
		<?php if(isset($x->TableName) && is_file(__DIR__ . "/hooks/{$x->TableName}-tv.js")) { ?>
			<script src="<?php echo PREPEND_PATH; ?>hooks/<?php echo $x->TableName; ?>-tv.js"></script>
		<?php } ?>

	</head>
	<body>
		<div class="users-area container theme-bootstrap theme-3d theme-compact">
			<?php if(function_exists('handle_maintenance')) echo handle_maintenance(true); ?>

			<?php if(!Request::val('Embedded')) { ?>
				<?php if(function_exists('htmlUserBar')) echo htmlUserBar(); ?>
				<div style="height: 70px;" class="hidden-print"></div>
			<?php } ?>

			<?php if(class_exists('Notification', false)) echo Notification::placeholder(); ?>

			<?php 
				// process notifications
				if(function_exists('showNotifications')) echo showNotifications();
			?>

			<?php if(Request::val('Embedded')) { ?>
				<div style="height: 2rem;"></div>
			<?php } ?>

			<?php if(!defined('APPGINI_SETUP') && is_file(__DIR__ . '/hooks/header-extras.php')) { include(__DIR__ . '/hooks/header-extras.php'); } ?>
			<!-- Add header template below here .. -->

