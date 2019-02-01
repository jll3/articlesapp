<?php
echo '
<style>
   body{
  	width:99%;
  	length:150%;
  	margin:0 auto;
  	background: #F3F3F3;
	}
	table{
  	width:50%;
  	float: left;
  	padding: 30;
  	border: 1px solid #CCC;
  	color: #333;
	}
	td{
	overflow:auto;	
	width:10%;
	border: 1px solid #CCC;
	}
	th{
		font-size: 40px;
	}
</style>';


$articles = file_get_contents("articles.json");
$articlesarray = json_decode($articles, true);
echo "<table><br><th>Articles</th>";
foreach ($articlesarray as $row => $item) {
   		$text = '<div style="margin-left:auto; margin-right:auto; width:450; height: 130; overflow-y: auto;">
   		<p>'.$item["content"].'</p></div>';

   		$image = '<p><a href="'.$item["url"].'">
			<img border="0" src="'.$item["image"].'" height="130" width="450">
			</a></p>';

      echo '<tr><td>'.$item["title"].'<br>'.$image.'<br>'.$text.'<br></td></tr>';
}    
echo "</table>";

$events = file_get_contents("events.json");
$eventsarray = json_decode($events, true);

echo "<table><th>Events</th>";
foreach ($eventsarray as $row => $item) {
	$book = '<a href="'.$item["url"].'"><button type="button">Book</button></a>';
	echo '
	<table>
	  <tr>
	    <td>Event: '.$item["title"].'<br>Location: '.$item["location"].'<br>Date: '.date('l d F Y', strtotime($item["date"])).'<br>'.$book.'</td>
	</table>
	</body>';
}    
echo "</table>";
