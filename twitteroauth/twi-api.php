<?php
require_once 'twitteroauth/twitteroauth.php';
 
define('CONSUMER_KEY', 'UmuJ7d7LLhNunWZXqZsn2jv1p');
define('CONSUMER_SECRET', 'IQKU69wOIQh06Lyyjq10kAlVFBvBzJ8fKtFAjukazYeS7R7hkQ');
define('ACCESS_TOKEN', '452063951-rFyL4a8pMZ6IW2Wo4MVmwaZikNpUq0TdWYgXyREr');
define('ACCESS_TOKEN_SECRET', 'D6zrVZgqL9a8xbch9zzKl41wUM7TGWo3Zlc694I5y6CRS');
 
$twitterOAuth = new TwitterOAuth(
CONSUMER_KEY,
CONSUMER_SECRET,
ACCESS_TOKEN,
ACCESS_TOKEN_SECRET
);
 
$keywords = 'コンビニ';
 
$param = array(
    "q"=>$keywords,                  // keyword
    "lang"=>"ja",                   // language
    "count"=>10,                   // number of tweets
    "result_type"=>"recent");       // result type
  
$json = $twitterOAuth->OAuthRequest(
    "https://api.twitter.com/1.1/search/tweets.json",
    "GET",
    $param);
  
$result = json_decode($json, true);
 
if($result['statuses']){
    foreach($result['statuses'] as $tweet){
     echo $tweet['user']['name']; ユーザーネーム
     echo $tweet['text']; つぶやき
     echo $tweet['user']['profile_image_url']; アイコンURL
?>
  <?php } ?>
    <?php }else{ ?>
    <div class="twi_box">
        <p class="twi_tweet">関連したつぶやきがありません。</p>
    </div>
<?php } ?>
