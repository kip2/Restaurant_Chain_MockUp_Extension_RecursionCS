<?php

// ----- main.start ------
$count = $_POST['count'] ?? 5;
$format = $_POST['format'] ?? 'html';

$count = (int)$count;
$users = RandomGenerator::users($count, $count);

match ($format) {
    "markdown" => toMarkdown($users),
    "json" => toJson($users),
    "txt" => toText($users),
    default => toHTML($users) 
};
// ----- main.end ------

// ------ function ------

function toMarkdown($users) {
        header('Content-Type: text/markdown');
        header('Content-Disposition: attachment; filename="users.md"');
        foreach ($users as $user) {
            echo $user->toMarkdown();
        }
}

function toJson($users) {
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="users.json"');
        $userArray = array_map(fn($user) => $user->toArray(), $users);
        echo json_encode($userArray);
}

function toText($users) {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="users.md"');
    foreach ($users as $user) {
        echo $user->toMarkdown();
    }
}

function toHTML($users) {
        header('Content-Disposition: attachment; filename="users.md"');
        foreach ($users as $user) {
            echo $user->toMarkdown();
        }
}
?>