<?php

class story{
	
	var $id = "";
	var $title = "";
	var $author = "";
	var $description = "";
	var $layout = "verticle";
	var $layoutSize = 3;

	public function __construct($data){

		if(isset($data['id'])){
			$this->loadStory($data['id']);
		}else{
			$this->newStory($data['title'],$data['author']);
			if(isset($data['description'])) $this->setDescription($data['description']);
			if(isset($data['layout'])) $this->setLayout($data['layout'],$data['layoutSize']);
			echo"<div><input type='hidden' id = 'storyMetaData' value='{$this->convertStoryToJSON()}' />";
		}

		//$this->printLayoutHeader();
		//$this->drawLayout();
	}

	//create a new story item
	public function newStory($title,$author){
		$this->id = uniqid();
		$this->title = $title;
		$this->author = $author;
	}

	//load an existing story
	public function loadStory($id){

	}
	
	public function setDescription($description){
		$this->description = $description;
	}

	public function setLayout($layout,$size=""){

		//****************************/
		//possible layouts = 
		//horizontal - scenes proceede left to right, top to bottom
		//verticle - scenes proceede top to bottom, left to right
		//****************************/
		$possibleLayouts = array(
			'horizontal',
			'verticle'
		);

		if(in_array($layout, $possibleLayouts)) $this->layout = $layout;
		if($size != "") $this->layoutSize = $size;
	}

	public function printLayoutHeader(){

		echo"<h1 style=\"text-align:left;\">{$this->title}</h1>";

		echo"<blockquote style=\"text-align:left;\"><p><small>{$this->description}</small></p></blockquote>";
	}

	public function drawLayout(){

		$this->printLayoutHeader();

		$currentColumn = 1;
		$currentRow = 1;

		$sizeCounter = 1;
		while($currentColumn <= $this->layoutSize){
			echo"<div class=\"column\" id='sortableColumn_{$currentColumn}'>Column {$currentColumn} : ";
			/*
			echo"
				<div class=\"portlet\">
    				<div class=\"portlet-header\">Feeds</div>
    				<div class=\"portlet-content\">Lorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elitLorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
 				</div>
 			";
 			*/
			echo"</div>";
			$currentColumn++;
		}
		echo"<div class=\"column\" id='sortableColumn_unSorted'>Column Unsorted : </div>";
	}

	private function convertStoryToJSON(){
		return json_encode($this);
	}

	public function saveStory(){
		$encodedStory = $this->convertStoryToJSON();
		echo"<br><hr>Encoded:$encodedStory<br>";
	}

	public function exportStory(){

	}
	
	public function publishStory(){

	}

	public function createScene($inputSceneTitle, $inputSceneContent){
		//sortableColumn_unSorted
		
		$scene = array();
		$sceneId = uniqid();

		$scene['id'] = $sceneId;		

		$scene['html'] = "
			<div id = \"scene_{$sceneId}\" class=\"portlet\">
				<div id = \"sceneHeader_{$sceneId}\" class=\"portlet-header\">$inputSceneTitle</div>
				<div id = \"sceneContent_{$sceneId}\" class=\"portlet-content\">$inputSceneContent</div>
			</div>
		";

		return $scene;
 			
	}

	public function moveScene(){

	}


	
}

?>