<?php

  if($_POST['action']=="newStory"){

    require_once('story.class.php');
    //require_once('scene.class.php');

    $inputTitle = $_POST['inputTitle'];
    $inputAuthor = $_POST['inputAuthor'];
    $inputDescription = $_POST['inputDescription'];
    $inputLayoutStyle = $_POST['inputLayoutStyle'];
    $inputLayoutSize = $_POST['inputLayoutSize'];

    $story = array(
      'title'=>$inputTitle,
      'author'=>$inputAuthor,
      'description'=>$inputDescription,
      'layout'=>$inputLayoutStyle,
      'layoutSize'=>$inputLayoutSize,
    );

    $loadedStory = new story($story);

    $loadedStory->drawLayout();

  }elseif($_POST['action']=="newScene"){
    
    //build story association
    require_once('story.class.php');
    
    $storyMetadata = $_POST['storyMetadata'];
    $loadedStory = new story($storyMetadata);

    //add new scene to existing story
    $inputSceneTitle = $_POST['inputSceneTitle'];
    $inputSceneContent = $_POST['inputSceneContent'];

    $scene = $loadedStory->createScene($inputSceneTitle,$inputSceneContent);

    //echo in a single line, cause jquery expects the first character to be a "<" in order to treat it like html.
    echo"<div><input type='hidden' id='sceneId' value = '{$scene['id']}' /><div id='sceneContent'>{$scene['html']}</div></div>";
    
  }

?>