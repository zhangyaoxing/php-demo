<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client(
    'mongodb+srv://test:M0ngoDB20@cluster0-wy1z6.mongodb.net/sample_airbnb?retryWrites=true&w=majority'
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
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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