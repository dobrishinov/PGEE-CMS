<?php
require_once 'common/header.php'
?>

<?php
if (!isset($_GET['id'])) {
    header('Location: postsListing.php');
}

$postsCollection = new PostsCollection();
$posts = $postsCollection->getOne($_GET['id']);

if (is_null($posts->getId())) {
    header('Location: postsListing.php');
}

$postsCollection->delete($posts->getId());
header('Location: postsListing.php');
?>