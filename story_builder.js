
/**
 * Configures the coumnso n the layout to be jquerysortable
 */
function configureColumns(){
  $( ".column" ).sortable({
    connectWith: ".column"
  });
  $( ".column" ).disableSelection();
}

/**
 * Configures a specific scene's portlet to have the necessary css classes and js functions
 */
function configurePortlet(sceneId){

  $( "#scene_"+sceneId ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
    .find( ".portlet-header" )
    .addClass( "ui-widget-header ui-corner-all" )
    .prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
    .end()
    .find( ".portlet-content" );

  $( "#sceneHeader_"+sceneId+" .ui-icon" ).click(function() {
    $( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
    $( this ).parents( ".portlet:first" ).find( ".portlet-content" ).toggle();
  });

}

/**
 * AJAX call to controller.php : newStory(); to create a new story object.
 */
function newStory(){

  var $formNewStory = $("#newStoryForm"),
    inputTitle = $formNewStory.find( 'input[id="inputTitle"]' ).val(),
    inputAuthor = $formNewStory.find( 'input[id="inputAuthor"]' ).val(),
    inputDescription = $formNewStory.find( 'textarea[id="inputDescription"]' ).val(),
    inputLayoutStyle = $formNewStory.find( 'select[id="inputLayoutStyle"]' ).val(),
    inputLayoutSize = $formNewStory.find( 'select[id="inputLayoutSize"]' ).val(),
    action = "newStory",
    url = "controller.php";

  //Send the data using post
  var posting = $.post( url, { 
    action: action, 
    inputTitle: inputTitle,
    inputAuthor: inputAuthor,
    inputDescription: inputDescription,
    inputLayoutStyle: inputLayoutStyle,
    inputLayoutSize: inputLayoutSize
  } );

  //Put the results in a div
  posting.done(function(data) {
    $("#mainStoryContent").empty().append(data);
    configureColumns();
  });
  $('#newStoryModal').modal('hide');
  
}

/**
 * AJAX call to controller.php : newScene(); to create a new scene object for the currently loaded story.
 */
function newScene(){
  
  //check to see if we have a loaded story
  if($("#storyMetaData")){

    var $formNewScene = $("#newSceneForm"),
      inputSceneTitle = $formNewScene.find( 'input[id="inputSceneTitle"]' ).val(),
      inputSceneContent = $formNewScene.find( 'textarea[id="inputSceneContent"]' ).val(),
      storyMetadata = $("#storyMetaData").val(),
      action = "newScene",
      url = "controller.php";

    //Send the data using post
    var posting = $.post( url, { 
      action: action, 
      storyMetadata: storyMetadata,
      inputSceneTitle: inputSceneTitle,
      inputSceneContent: inputSceneContent
    } );

    //Put the results in a div
    posting.done(function(data) {

      //get the scene id from the result, via the sceneId input element
      var sceneId = $(data).find('#sceneId').val();

      //get the div fron the results, place in the unsorted column
      var portletContent = $(data).find('#sceneContent');
      $("#sortableColumn_unSorted").append(portletContent);

      //add style classes and drag and drop functionality to the portlet
      configurePortlet(sceneId);

      $formNewScene.find( 'input[id="inputSceneTitle"]' ).val("");
      $formNewScene.find( 'textarea[id="inputSceneContent"]' ).val("");
    });

  }
}

