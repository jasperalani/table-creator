# table-creator
Table Creator for php

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

$creator->insertContents($contents, $options)->create();

```
