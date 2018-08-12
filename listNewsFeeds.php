<?php
//
/**
 * listNewsFeeds.php provide feeds from database connection                 @80 
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

$postedNewsCategoryId = $_GET['postNewsFeedCategory'];

$sql = "SELECT Provider,ProviderRSS, idNewsCategories
	FROM sm18_NewsFeeds
	WHERE idNewsCategories = $postedNewsCategoryId";

$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));

if (mysqli_num_rows($result) > 0)//at least one record!
	{//show results
		echo '<table align="center" border="0" cellpadding="8" cellspacing="8">';
		echo '<tr>
				<th>Provider</th>
				<th>View it</th>
			</tr>
			';
		while ($row = mysqli_fetch_assoc($result))
		{//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
			echo '<tr>
				    <td>' . dbOut($row['Provider']) . '</td>
				    <td><a href="viewNewsFeed.php?postProviderRSS=' . 
				    	dbOut($row['ProviderRSS']) . '"
					    target="_self">Click to View</a></td>
				</tr>
				';
		}
		echo '</table>';
	}else{//no records
      echo '<div align="center">
      			<h3>Currently No News Feeds in Database.</h3>
      		</div>';
	}
	@mysqli_free_result($result); //free resources
get_footer();