<header id="site-head" class="clear">
    <div class="logo">
        <img src="images/pgee-logo.svg" alt="PGEE Logo">
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Начало</a></li>
            <li>
                <a href="#">Училище</a>
                <ul class="sub-menu">
                    <?php
                    $navSchools = $this->getSchoolParams();
                    ?>
                    <?php foreach ($navSchools as $navSchool): ?>
                        <li><a href="index.php?c=school&m=show&id=<?php echo $navSchool->getId(); ?>"><?php echo $navSchool->getTitle(); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li>
                <a href="#">Проекти</a>
                <ul class="sub-menu">
                    <?php
                    $navProjects = $this->getProjectsParams();
                    ?>
                    <?php foreach ($navProjects as $navProject): ?>
                        <li><a href="index.php?c=projects&m=show&id=<?php echo $navProject->getId(); ?>"> <?php echo $navProject->getTitle(); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="index.php?c=blog">Блог</a></li>
            <li><a href="#">Профил на купувача</a></li>
            <li><a href="#">Kонтакти</a></li>
        </ul>
    </nav>
    <div class="hamburger">
        <ul>
            <li id="ham-l1"></li>
            <li id="ham-l2"></li>
            <li id="ham-l3"></li>
        </ul>
    </div>
</header>