<?php

require_once('story.class.php');
//require_once('scene.class.php');

$story = array(
	'title'=>'Test',
	'author'=>'me!',
	'description'=>'me!',
	'layout'=>'verticle',
	'layoutSize'=>'2',
);

$loadedStory = new story($story);

echo"Story title: {$loadedStory->title}<br />";

$loadedStory->setDescription("This is my awesome story's description.<br />");

print_r($loadedStory);

?>