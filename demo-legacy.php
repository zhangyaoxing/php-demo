<?php
$connection = new MongoClient( "mongodb://test:M0ngoDB20@cluster0-shard-00-00.wy1z6.mongodb.net:27017,cluster0-shard-00-01.wy1z6.mongodb.net:27017,cluster0-shard-00-02.wy1z6.mongodb.net:27017/sample_analytics?ssl=true&replicaSet=atlas-vnfeuv-shard-0&authSource=admin" );
$db = $connection->sample_analytics;
$collection = $db->accounts;
$cursor = $collection->aggregate(array(array('$sample' => array('size' => 1))), 
    array("cursor" => array("batchSize" => 10)));
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
                        Random Document Selected from sample_analytics.accounts
                    </h1>
                    <hr />
                    <div class="card-text">
                        <pre><code><?php
                        print_r($cursor["cursor"]["firstBatch"]);
                        ?></code></pre>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>