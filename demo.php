<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client(
    "mongodb://test:M0ngoDB20@cluster0-shard-00-00.wy1z6.mongodb.net:27017,cluster0-shard-00-01.wy1z6.mongodb.net:27017,cluster0-shard-00-02.wy1z6.mongodb.net:27017/sample_analytics?ssl=true&replicaSet=atlas-vnfeuv-shard-0&authSource=admin"
);
$db = $client->sample_airbnb;
$collection = $db->listingsAndReviews;
$cursor = $collection->aggregate([
    ['$sample' => ['size' => 1]]
])->toArray();
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body style="margin: 30px;">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">
                        Random Document Selected from sample_airbnb.listingsAndReviews
                    </h1>
                    <hr />
                    <div class="card-text">
                        <pre><code><?php
                        print_r(json_encode($cursor, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT));
                        ?></code></pre>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>