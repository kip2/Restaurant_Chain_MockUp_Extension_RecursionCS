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
$chain = RandomGenerator::restaurantChain();
// $chains = RandomGenerator::restaurantChains(1, 10);

$chain->addLocation($restaurantLocation);
echo $chain->introduction();


// $restaurantLocation = RandomGenerator::restaurantLocation();
// $locations = RandomGenerator::restaurantLocations(1,5);

// echo $restaurantLocation->introduction();

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

<html>
    <head>
        <meta charset="utf-8"/>
        <title> Restaurant Chain Moclup </title>
    </head>
    <body>
        <!-- todo: 中央に寄せる必要がある -->
        <h1>Restaurant Chain List</h1>
        <div>
            <!-- todo: borderで囲う -->
            <h2>Restaurant Chain HOGEHOGE, FUGAFUGA</h2>
            <div>
                <p>restaurant name and folding infomation </p>
                <div>
                    <p>company information</p>
                    <div>
                        <p>employees:</p>
                        <div>
                            <p>employee1</p>
                            <p>employee2</p>
                            <p>employee3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

