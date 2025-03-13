<?php
require_once 'PHPClasses/PHPGateway/PageContactsGetData.php';
require_once 'PHPClasses/PHPGateway/PageContactsTable.php';
require_once 'PHPClasses/PHPGateway/PageContactsSetData.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	PageContactsSetData::go($_POST);

}

$contacts = PageContactsGetData::get();

echo PageContactsTable::table($contacts);
?>
