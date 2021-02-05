# table-creator
Table Creator for php (7.4)

```php

$creator = new TableCreator();

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
$creator->create();

// Get table html string
$table_html = $creator->getTable()->getHtml();

```
