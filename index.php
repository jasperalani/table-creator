<?php

include_once 'table-creator.php';

$creator = new TableCreator();

// Incorrect uses
$contents = [];

$contents = [
        'content'
];

$contents = [
        ['content'],
];

// Correct use
$contents = [
    [
        "post_id" => 1,
        "title" => "The title",
        "description" => "This is the description"
    ],
    [
        "post_id" => 2,
        "title" => "The title",
        "description" => "This is the description"
    ],
    [
        "post_id" => 3,
        "title" => "The title",
        "description" => "This is the description"
    ],
];

$options = [
    "id" => "chicken",
    "class" => "noodle fish bump"
];

// Load options and contents into created object
$creator->load($contents, $options);

// Echo table html
// $creator->create();

// Get table html string
$table = $creator->getTable();
$html = $table->build()->getHtml();

var_dump($html);