<?php
/**
 * Created by PhpStorm.
 * User: Davy Sheehy
 * Date: 03/12/2018
 * Time: 13:09
 */

$consumerkey = "YcSTar2h6yKS8TVCW5wKq67cw";
$consumersecret = "AxGPxUqd7NotcnKqWxq0njUrgfQ7SHI5clsTHkwpYp90zCwk7m";
$accesstoken = "714884229298012161-Sfjiz78WlelGDogLngHuTHHxCspSEdB";
$accesssecret = "uHVDgznCRmM6ynxwgfWxVwn3xVWiMJv0L8AnsXG6ziX08";

require "../twitteroauth-0.9.2/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

//Connect API
$connection = new TwitterOAuth($consumerkey,$consumersecret,$accesstoken,$accesssecret);
$content = $connection->get("account/verify_credentials");

//Create Tweet
$new_status = $connection->post("statuses/update", ["status" => "Up Munster!"]);

//Get Tweets
$statuses = $connection->get("statuses/home_timeline",["count" => 1, "exclude_replies" => true]);

?>

<a class="twitter-timeline" href="https://twitter.com/Munsterrugby?ref_src=twsrc%5Etfw">Tweets by Munsterrugby</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>