<?php
require_once 'common/header.php'
?>

<?php
if (!isset($_GET['id'])) {
    header('Location: projectsListing.php');
}

$projectsCollection = new ProjectsCollection();
$projects = $projectsCollection->getOne($_GET['id']);

if (is_null($projects->getId())) {
    header('Location: projectsListing.php');
}

$projectsCollection->delete($projects->getId());
header('Location: projectsListing.php');
?>