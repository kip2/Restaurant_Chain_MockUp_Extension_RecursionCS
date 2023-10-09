<?php

// autoloader設定
spl_autoload_extensions(".php");
spl_autoload_register(function ($class) {
    $base_dir = __DIR__ . '/src/';
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

require_once __DIR__ . "/src/Helpers/RandomGenerator.php";

$restaurantChain = RandomGenerator::restaurantChains(3,5);
?>

<html>
    <head>
        <meta charset="utf-8"/>
        <!-- cssの読み込み -->
        <link rel="stylesheet" href="css/styles.css">
        <title> Restaurant Chain Moclup </title>
    </head>
    <body>
        <div class="vh-100">
            <?php foreach ($restaurantChain as $chain): ?>
                <div class="justify-content-center">
                    <h1 class="text-center">Restaurant Chain <?php echo $chain->getName() ?></h1>
                    <div class="p-10">
                        <div class="border-line bg-gray">
                            <h3 class="pl-20">Restaurant Chain information</h3>
                        <div>
                        <div class="border-line bg-white">
                            <div class="pl-20 d-flex flex-column">
                                <?php foreach ($chain->getRestaurantLocations() as $location): ?>
                                    <h3 class="bg-blue text-blue pl-10"><?php echo $location->getName() ?></h3>
                                    <div class="pt-0">
                                        <p class="pl-20 pt-0"><?php echo $location->shortIntroduction() ?></p>
                                        <h4>Employee:</h4>
                                        <?php foreach ($location->getEmployees() as $employee): ?>
                                            <p class="employee border-line"><?php echo $employee->introduction() ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- jsvascriptの呼び出し -->
        <script src="js/script.js"></script>

    </body>
</html>

