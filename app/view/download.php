<?php

// require_once __DIR__ . "/../src/Helpers/DonwloadRandomGenerator.php";
require_once __DIR__ . "/../src/Helpers/DownloadRandomGenerator.php";

// ----- @@main.start ------
// $users = RandomGenerator::users($count, $count);

// format
$format = $_POST['format'] ?? 'html';

// numbers
$numberOfChains = $_POST['numberOfChains'] ?? 5;
$numberOfChains = (int)$numberOfChains;

$numberOfEmployees = $_POST['numberOfEmployees'] ?? 5;
$numberOfEmployees = (int)$numberOfEmployees;

$numberOfLocations = $_POST['numberOfLocations'] ?? 5;
$numberOfLocations = (int)$numberOfLocations;

// salary
$minSalary = $_POST['minSalary'] ?? 5;
$minSalary = (int)$minSalary;
$maxSalary = $_POST['maxSalary'] ?? 10;
$maxSalary = (int)$maxSalary;

// zipcode
// $minZipCode = $_POST['minZipCode'] ?? 5;
// $maxZipCode = $_POST['maxZipCode'] ?? 10;

// ----- @@validations.start -----
// is null?
if (is_null($numberOfChains)
    || is_null($numberOfEmployees)
    || is_null($numberOfLocations)
    || is_null($minSalary)
    || is_null($maxSalary)
    || is_null($format)
    ) {
    exit("Missing parameters.");
}

// is in range?
// count
if (!is_numeric($numberOfChains) || $numberOfChains < 1 || $numberOfChains > 100) {
    exit("Invalid number of restaurant chains. Must be a number between 1 and 100.");
}
// employees
if (!is_numeric($numberOfEmployees) || $numberOfEmployees < 1 || $numberOfEmployees > 100) {
    exit("Invalid number of employees. Must be a number between 1 and 100.");
}
// locations
if (!is_numeric($numberOfLocations) || $numberOfLocations < 1 || $numberOfLocations > 10) {
    exit("Invalid number of locations. Must be a number between 1 and 10.");
}
// min salary
if (!is_numeric($minSalary) || $minSalary < 1 || $minSalary > 9999) {
    exit("Invalid number of min Salary. Must be a number between 1 and 9999.");
}
// max salary
if (!is_numeric($maxSalary) || $maxSalary < 1 || $maxSalary <= $minSalary || $maxSalary > 9999) {
    exit("Invalid number of max Salary. Must be a number between min salary and 9999.");
}

// is in allowed formats?
$allowedFormats = ['json', 'txt', 'html', 'md'];
if (!in_array($format, $allowedFormats)) {
    exit('Invalied type. Must be one of: ' . implode(', ' , $allowedFormats));
}
// ----- @@validations.end -----


// random generate
// $users = RandomGenerator::users($count, $count);
$restaurantChains = RandomGenerator::downloadRestaurantChains($numberOfChains, $numberOfEmployees, $numberOfLocations, $minSalary, $maxSalary);

// echo "test ok!";

// formatによって処理を分岐
match ($format) {
    "md" => toMarkdown($restaurantChains),
    "json" => toJson($restaurantChains),
    "txt" => toText($restaurantChains),
    default => toHTML($restaurantChains) 
};
// ----- @@main.end ------


// ------ @@function.start ------

// markdown形式でダウンロード処理
function toMarkdown($restaurantChains) {
        header('Content-Type: text/markdown');
        header('Content-Disposition: attachment; filename="restaurant_chains.md"');
        foreach ($restaurantChains as $user) {
            echo $user->toMarkdown();
        }
}

// JSON形式でダウンロード処理
function toJson($restaurantChains) {
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="restaurant_chains.json"');
        $userArray = array_map(fn($user) => $user->toArray(), $restaurantChains);
        echo json_encode($userArray);
}

// text形式でダウンロード処理
function toText($restaurantChains) {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="restaurant_chains.txt"');
    foreach ($restaurantChains as $user) {
        echo $user->toString();
    }
}

// HTML形式で表示
function toHTML($restaurantChains) {
        header('Content-Type: text/html');
        foreach ($restaurantChains as $user) {
            echo $user->toHTML();
        }
}
// ------ @@function.end ------
?>