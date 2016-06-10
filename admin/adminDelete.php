<?php
require_once 'common/header.php';
?>

<?php
if (!isset($_GET['id'])) {
    header('Location: adminsListing.php');
}

$adminsCollection = new AdminsCollection();
$admin = $adminsCollection->getOne($_GET['id']);

if (is_null($admin->getId())) {
    header('Location: adminsListing.php');
}

$adminsCollection->delete($admin->getId());
header('Location: adminsListing.php');
?>