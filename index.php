<?php

require_once 'vendor/autoload.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
error_reporting(0);

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";


if (!isset($_GET['id']) || empty(trim($_GET['id']))) {
    echo 'Bad Request!';
    exit();
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}


$id = trim($_GET['id']);

use Goutte\Client;

$client = new Client();

$arr = get($conn, $id);


if ($arr) {

    // to make it safe
    unset($arr['id']);

    // if is in database just reformat it and show it
    foreach ($arr as $key => $item) {
        if (isJson($item)) {
            $arr[$key] = json_decode($item);
        }
    }


} else {

    $url = "https://mydramalist.com/$id";


    $photo_url = null;

    $crawler = $client->request('GET', $url);

    $h1 = $crawler->filter('h1');

    $error_404 = 'The requested page was not found';

    if ($h1->text() === $error_404) {
        echo 'Wrong Id!';
        exit();
    }

    $crawler->filter('img')->each(function ($node) {

        global $photo_url;

        if ($node->attr('itempropx')) {
            $photo_url = $node->attr('src');
        }
    });


    $filename = ($id . '.jpg');
    $filepath = (__DIR__ . '/images/' . $filename);


    file_put_contents($filepath, file_get_contents($photo_url));


    $name = $h1->text();

    $title = $h1->innerText();

    $year = (str_replace($title, '', $name));
    $year = (str_replace('(', '', $year));
    $year = (str_replace(')', '', $year));


    $details = $crawler->filter('#show-detailsxx');

    $arr['mydrama'] = $id;

    $arr['name'] = $name;
    $arr['title'] = $title;
    $arr['year'] = $year;

    $arr['your_rating'] = null;

    $arr['rating'] = null;
    $arr['watchers'] = null;
    $arr['reviews'] = null;

    $arr['screenwriter'] = null;
    $arr['director'] = null;
    $arr['genres'] = null;
    $arr['tags'] = null;
    $arr['country'] = null;
    $arr['type'] = null;
    $arr['episodes'] = null;
    $arr['aired'] = null;
    $arr['aired_on'] = null;
    $arr['original_network'] = null;
    $arr['duration'] = null;
    $arr['score'] = null;
    $arr['ranked'] = null;
    $arr['popularity'] = null;
    $arr['content_rating'] = null;
    $arr['favorites'] = null;


    $arr['score'] = $score ?? trim($details->filter('.col-film-rating')->text()) ?? null;

    $details->filter('.txt')->each(function ($node) {
        global $arr;

        if (stristr($node->text(), 'Your Rating')) {
            $arr['your_rating'] = trim(str_replace('Your Rating:', '', ($node->text())));
        }

    });

    $arr['ranked'] = str_replace('Ranked', '', $details->filter('.ranked')->text()) ?? null;

    $arr['popularity'] = str_replace('Popularity', '', $details->filter('.popularity')->text()) ?? null;


    $details->filter('.hfs')->each(function ($node) {
        global $arr;

        if (stristr($node->text(), 'Ratings')) {
            $arr['rating'] = trim(str_replace('Ratings:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Reviews')) {
            $arr['reviews'] = trim(str_replace('Reviews:', '', ($node->text())));
        }

    });

    $details->filter('.list-item')->each(function ($node) {

        global $arr;

        if (stristr($node->text(), 'Screenwriter')) {
            $arr['screenwriter'] = trim(str_replace('Screenwriter:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Director')) {
            $arr['director'] = trim(str_replace('Director:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Genres')) {
            $arr['genres'] = trim(str_replace('Genres:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Tags')) {
            $arr['tags'] = trim(str_replace('Tags:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Country')) {
            $arr['country'] = trim(str_replace('Country:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Type')) {
            $arr['type'] = trim(str_replace('Type:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Episodes')) {
            $arr['episodes'] = trim(str_replace('Episodes:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Aired On')) {

            $arr['aired_on'] = trim(str_replace('Aired On:', '', ($node->text())));

        } else if (stristr($node->text(), 'Aired')) {

            $arr['aired'] = trim(str_replace('Aired:', '', ($node->text())));

        }

        if (stristr($node->text(), 'Original Network')) {
            $arr['original_network'] = trim(str_replace('Original Network:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Duration')) {
            $arr['duration'] = trim(str_replace('Duration:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Score')) {
            $arr['score'] = trim(str_replace('Score:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Ranked')) {
            $arr['ranked'] = trim(str_replace('Ranked:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Popularity')) {
            $arr['popularity'] = trim(str_replace('Popularity:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Content Rating')) {
            $arr['content_rating'] = trim(str_replace('Content Rating:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Watchers')) {
            $arr['watchers'] = trim(str_replace('Watchers:', '', ($node->text())));
        }

        if (stristr($node->text(), 'Favorites')) {
            $arr['favorites'] = trim(str_replace('Favorites:', '', ($node->text())));
        }

    });

    $story = $details->filter('.show-synopsis')->text();

    $arr['story'] = $story;


    $crawler = $client->request('GET', ($url . '/cast'));

    $box_body = $crawler->filter('.box-body');

    $casts = [];

    $box_body->filter('h3.header')->each(function ($node) {


        global $casts;

        $key = strtolower(trim($node->text()));

        $casts[$key] = [];

    });


    $box_body->filter('.list.no-border.p-b.clear')->each(function ($node, $index) {

        global $casts;

        $keys = array_keys($casts);

        $key = $keys[$index];

        $casts[$key] = str_replace(ucwords($key), ', ', trim($node->text()));

    });


    $casts_reformat = [];

    foreach ($casts as $key => $cast) {

        $casts_reformat[str_replace(' ', '_', $key)] = $cast;

    }

    $arr['casts'] = json_encode($casts_reformat, JSON_UNESCAPED_UNICODE);

    // make mysql query
    $sql = query($arr);

    // save in database
    $conn->query($sql);

    $conn->close();

    // print for user

}


$json = json_encode($arr, JSON_UNESCAPED_UNICODE);

echo $json;
exit();


function query($arr): string
{
    $sql = "";

    $counter_one = 0;

    $sql .= 'INSERT INTO `movies`(';

    foreach ($arr as $key => $item) {
        $sql .= "`$key`";
        if (($counter_one + 1) != count($arr)) {
            $sql .= ', ';
        }
        $counter_one++;
    }

    $sql .= ') VALUES (';

    $counter_two = 0;

    foreach ($arr as $item) {
        $sql .= "'";
        if (is_array($item)) {
            $json = json_encode($item, JSON_UNESCAPED_UNICODE);
            $json = str_replace("'", "", $json);
            $sql .= $json;
        } else {
            $item = str_replace("'", "", $item);
            $sql .= $item;
        }
        $sql .= "'";

        if (($counter_two + 1) != count($arr)) {
            $sql .= ', ';
        }
        $counter_two++;

    }
    $sql .= ")";

    return $sql;
}


function get($conn, $id)
{
    $sql = "SELECT * FROM `movies` WHERE `mydrama` = '$id' LIMIT 1;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        return $result->fetch_assoc();

    }

    return false;
}


function isJson($string): bool
{
    json_decode($string);
    return json_last_error() === JSON_ERROR_NONE;
}