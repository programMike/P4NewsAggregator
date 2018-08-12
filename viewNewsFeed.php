<?php
//
/**
 * viewNewsFeed.php provide a feed from database connection                 @80 
 *
 * @package p4news
 * @author This guy <mwemig02@seattlecentral.edu>
 * @version 1.0 8.5.2018
 * @link http://itc250sum18.000webhostapp.com/sm18/
 * @license https://www.apache.org/licenses/LICENSE-2.0
 * @see config_inc.php 
 * @todo todone
 */
require '../inc_0700/config_inc.php';
get_header();

$postedProvidersRSS = $_GET['postProviderRSS'];

  $request = $postedProvidersRSS;
  $response = file_get_contents($request);
  $xml = simplexml_load_string($response);
  print '<h1>' . $xml->channel->title . '</h1>';
  foreach($xml->channel->item as $story)
  {
    echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
    echo '<p>' . $story->description . '</p><br /><br />';
  }


get_footer();