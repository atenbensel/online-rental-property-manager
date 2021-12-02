<?php
// This script and data application were generated by AppGini 5.98
// Download AppGini for free from https://bigprof.com/appgini/download/

	include_once(__DIR__ . '/lib.php');
	@include_once(__DIR__ . '/hooks/properties.php');
	include_once(__DIR__ . '/properties_dml.php');

	// mm: can the current member access this page?
	$perm = getTablePermissions('properties');
	if(!$perm['access']) {
		echo error_message($Translation['tableAccessDenied']);
		exit;
	}

	$x = new DataList;
	$x->TableName = 'properties';

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = [
		"`properties`.`id`" => "id",
		"`properties`.`property_name`" => "property_name",
		"`properties`.`photo`" => "photo",
		"`properties`.`type`" => "type",
		"`properties`.`number_of_units`" => "number_of_units",
		"IF(    CHAR_LENGTH(`rental_owners1`.`first_name`) || CHAR_LENGTH(`rental_owners1`.`last_name`), CONCAT_WS('',   `rental_owners1`.`first_name`, ' ', `rental_owners1`.`last_name`), '') /* Owner */" => "owner",
		"`properties`.`operating_account`" => "operating_account",
		"CONCAT('$', FORMAT(`properties`.`property_reserve`, 2))" => "property_reserve",
		"`properties`.`lease_term`" => "lease_term",
		"`properties`.`country`" => "country",
		"`properties`.`street`" => "street",
		"`properties`.`City`" => "City",
		"`properties`.`State`" => "State",
		"`properties`.`ZIP`" => "ZIP",
	];
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = [
		1 => '`properties`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => '`properties`.`number_of_units`',
		6 => 6,
		7 => 7,
		8 => '`properties`.`property_reserve`',
		9 => 9,
		10 => 10,
		11 => 11,
		12 => 12,
		13 => 13,
		14 => '`properties`.`ZIP`',
	];

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = [
		"`properties`.`id`" => "id",
		"`properties`.`property_name`" => "property_name",
		"`properties`.`photo`" => "photo",
		"`properties`.`type`" => "type",
		"`properties`.`number_of_units`" => "number_of_units",
		"IF(    CHAR_LENGTH(`rental_owners1`.`first_name`) || CHAR_LENGTH(`rental_owners1`.`last_name`), CONCAT_WS('',   `rental_owners1`.`first_name`, ' ', `rental_owners1`.`last_name`), '') /* Owner */" => "owner",
		"`properties`.`operating_account`" => "operating_account",
		"CONCAT('$', FORMAT(`properties`.`property_reserve`, 2))" => "property_reserve",
		"`properties`.`lease_term`" => "lease_term",
		"`properties`.`country`" => "country",
		"`properties`.`street`" => "street",
		"`properties`.`City`" => "City",
		"`properties`.`State`" => "State",
		"`properties`.`ZIP`" => "ZIP",
	];
	// Fields that can be filtered
	$x->QueryFieldsFilters = [
		"`properties`.`id`" => "ID",
		"`properties`.`property_name`" => "Property Name",
		"`properties`.`type`" => "Type",
		"`properties`.`number_of_units`" => "Number of units",
		"IF(    CHAR_LENGTH(`rental_owners1`.`first_name`) || CHAR_LENGTH(`rental_owners1`.`last_name`), CONCAT_WS('',   `rental_owners1`.`first_name`, ' ', `rental_owners1`.`last_name`), '') /* Owner */" => "Owner",
		"`properties`.`operating_account`" => "Operating account",
		"`properties`.`property_reserve`" => "Property reserve",
		"`properties`.`lease_term`" => "Lease term",
		"`properties`.`country`" => "Country",
		"`properties`.`street`" => "Street",
		"`properties`.`City`" => "City",
		"`properties`.`State`" => "State",
		"`properties`.`ZIP`" => "ZIP",
	];

	// Fields that can be quick searched
	$x->QueryFieldsQS = [
		"`properties`.`id`" => "id",
		"`properties`.`property_name`" => "property_name",
		"`properties`.`type`" => "type",
		"`properties`.`number_of_units`" => "number_of_units",
		"IF(    CHAR_LENGTH(`rental_owners1`.`first_name`) || CHAR_LENGTH(`rental_owners1`.`last_name`), CONCAT_WS('',   `rental_owners1`.`first_name`, ' ', `rental_owners1`.`last_name`), '') /* Owner */" => "owner",
		"`properties`.`operating_account`" => "operating_account",
		"CONCAT('$', FORMAT(`properties`.`property_reserve`, 2))" => "property_reserve",
		"`properties`.`lease_term`" => "lease_term",
		"`properties`.`country`" => "country",
		"`properties`.`street`" => "street",
		"`properties`.`City`" => "City",
		"`properties`.`State`" => "State",
		"`properties`.`ZIP`" => "ZIP",
	];

	// Lookup fields that can be used as filterers
	$x->filterers = ['owner' => 'Owner', ];

	$x->QueryFrom = "`properties` LEFT JOIN `rental_owners` as rental_owners1 ON `rental_owners1`.`id`=`properties`.`owner` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm['view'] == 0 ? 1 : 0);
	$x->AllowDelete = $perm['delete'];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm['insert'];
	$x->AllowUpdate = $perm['edit'];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation['quick search'];
	$x->ScriptFileName = 'properties_view.php';
	$x->RedirectAfterInsert = 'properties_view.php?SelectedID=#ID#';
	$x->TableTitle = 'Properties';
	$x->TableIcon = 'resources/table_icons/application_home.png';
	$x->PrimaryKey = '`properties`.`id`';
	$x->DefaultSortField = '1';
	$x->DefaultSortDirection = 'desc';

	$x->ColWidth = [50, 60, 80, 50, 100, 120, 70, 120, 70, 50, 50, ];
	$x->ColCaption = ['Property Name', 'Cover photo', 'Type', 'Number of units', 'Owner', 'Operating account', 'Property reserve', 'Street', 'City', 'State', 'ZIP', ];
	$x->ColFieldName = ['property_name', 'photo', 'type', 'number_of_units', 'owner', 'operating_account', 'property_reserve', 'street', 'City', 'State', 'ZIP', ];
	$x->ColNumber  = [2, 3, 4, 5, 6, 7, 8, 11, 12, 13, 14, ];

	// template paths below are based on the app main directory
	$x->Template = 'templates/properties_templateTV.html';
	$x->SelectedTemplate = 'templates/properties_templateTVS.html';
	$x->TemplateDV = 'templates/properties_templateDV.html';
	$x->TemplateDVP = 'templates/properties_templateDVP.html';

	$x->ShowTableHeader = 0;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HasCalculatedFields = false;
	$x->AllowConsoleLog = false;
	$x->AllowDVNavigation = true;

	// hook: properties_init
	$render = true;
	if(function_exists('properties_init')) {
		$args = [];
		$render = properties_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: properties_header
	$headerCode = '';
	if(function_exists('properties_header')) {
		$args = [];
		$headerCode = properties_header($x->ContentType, getMemberInfo(), $args);
	}

	if(!$headerCode) {
		include_once(__DIR__ . '/header.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/header.php');
		echo str_replace('<%%HEADER%%>', ob_get_clean(), $headerCode);
	}

	echo $x->HTML;

	// hook: properties_footer
	$footerCode = '';
	if(function_exists('properties_footer')) {
		$args = [];
		$footerCode = properties_footer($x->ContentType, getMemberInfo(), $args);
	}

	if(!$footerCode) {
		include_once(__DIR__ . '/footer.php'); 
	} else {
		ob_start();
		include_once(__DIR__ . '/footer.php');
		echo str_replace('<%%FOOTER%%>', ob_get_clean(), $footerCode);
	}
