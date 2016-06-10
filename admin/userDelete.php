<?php
require_once 'common/header.php';
?>

<?php
if (!isset($_GET['id'])) {
    header('Location: usersListing.php');
}

$usersCollection = new UsersCollection();
$user = $usersCollection->getOne($_GET['id']);

if (is_null($user->getId())) {
    header('Location: usersListing.php');
}

$usersCollection->delete($user->getId());
header('Location: usersListing.php');
?>