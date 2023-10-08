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

// todo: 各クラスの呼び出し
// todo: viewの作成
// todo: 

// echo "Hello!";

$restaurantLocation = RandomGenerator::restaurantLocation();
$locations = RandomGenerator::restaurantLocations(1,5);

echo $restaurantLocation->introduction();

// $company = RandomGenerator::company();
// echo $company->introduction();
// $companies = RandomGenerator::companies(1, 5);



// $employee = RandomGenerator::employee();
// echo $employee->introduction();

// $award = RandomGenerator::awards();
// echo $award[0];

// $user = RandomGenerator::user();
// echo $user->toString();


?>
