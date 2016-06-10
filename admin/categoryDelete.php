<?php
require_once 'common/header.php';
?>

<?php
if (!isset($_GET['id'])) {
    header('Location: categoriesListing.php');
}

$categoriesCollection = new CategoriesCollection();
$category = $categoriesCollection->getOne($_GET['id']);

if (is_null($category->getId())) {
    header('Location: categoriesListing.php');
}

$categoriesCollection->delete($category->getId());
header('Location: categoriesListing.php');
?>