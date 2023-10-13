<?php

// ----- main.start ------
// $count = $_POST['count'] ?? 5;

// $count = (int)$count;
// $users = RandomGenerator::users($count, $count);

// format
$format = $_POST['format'] ?? 'html';

// numbers
$numberOfUsers = $_POST['numberOfUsers'] ?? 5;
$numberOfUsers = (int)$numberOfUsers;

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
$minZipCode = $_POST['minZipCode'] ?? 5;
$maxZipCode = $_POST['maxZipCode'] ?? 10;

// ----- validations -----
// is null?
if (is_null($numberOfUsers)
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
if (!is_numeric($numberOfUsers) || $numberOfUsers < 1 || $numberOfUsers > 100) {
    exit("Invalid number of users. Must be a number between 1 and 100.");
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
if (!in_array($format, $allowdTypes)) {
    exit('Invalied type. Must be one of: ' . implode(', ' , $allowdFormats));
}

// formatによって処理を分岐
match ($format) {
    "markdown" => toMarkdown($users),
    "json" => toJson($users),
    "txt" => toText($users),
    default => toHTML($users) 
};
// ----- main.end ------


// ------ function ------

// markdown形式でダウンロード処理
function toMarkdown($users) {
        header('Content-Type: text/markdown');
        header('Content-Disposition: attachment; filename="users.md"');
        foreach ($users as $user) {
            echo $user->toMarkdown();
        }
}

// JSON形式でダウンロード処理
function toJson($users) {
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="users.json"');
        $userArray = array_map(fn($user) => $user->toArray(), $users);
        echo json_encode($userArray);
}

// text形式でダウンロード処理
function toText($users) {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="users.txt"');
    foreach ($users as $user) {
        echo $user->toString();
    }
}

// HTML形式で表示
function toHTML($users) {
        header('Content-Type: text/html');
        foreach ($users as $user) {
            echo $user->toHTML();
        }
}
?>