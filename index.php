<?php

session_start();

// includes
require 'inc/bladeconfigure.php';
require 'inc/functions.php';
require 'inc/connection.php';


$sth = $db->prepare("SELECT * FROM githubaccounts ORDER BY id ASC");
$sth->execute();
$accounts = $sth->fetchAll(PDO::FETCH_ASSOC);

// create scrapers from urls
$scrapers = [];
foreach ($accounts as $account)
{
    $scraper = new githubscraper($account['diagramlink'], $account['naam']);
    $scraper->Process();        // retrieve HTML page and pick content to display
    $scrapers[] = $scraper;
}

echo $blade->view()->make('index')->with('html')->with('scrapers', $scrapers)->render();

?>