<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Story Builder</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <style>
		body {
		  padding-top: 50px;
		}
		.content {
		  padding: 40px 15px;
		  text-align: center;
		}
    .form-control{
      width:75%;
    }
    </style>

<!-- Header Stuff from Drag and Drop -->

        <link rel="stylesheet" href="jquery-ui-1.10.3.custom/css/vader/jquery-ui-1.10.3.custom.min.css" />
        <!--
        <script src=\"jquery-ui-1.10.3.custom/js/jquery-1.9.1.js\"></script>
        -->
        <script src="jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
        <style>

        .column { width: 300px; float: left; padding-bottom: 100px; font-size: 10px;}
        .portlet { margin: 0 1em 1em 0; }
        .portlet-header { margin: 0.3em; padding-bottom: 4px; padding-left: 0.2em; }
        .portlet-header .ui-icon { float: right; }
        .portlet-content { padding: 0.4em; }
        .ui-sortable-placeholder { border: 1px dotted black; visibility: visible !important; height: 50px !important; }
        .ui-sortable-placeholder * { visibility: hidden; }
        </style>

<!-- End Drag and Drop -->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Story Builder</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Story Menu <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#newStoryModal" data-toggle="modal">New Story</a></li>
                <li><a href="#newSceneModal" data-toggle="modal">New Scene</a></li>
                <li><a href="#">Open Story</a></li>
                <li><a href="#">Save Story</a></li>
                <li><a href="#">Publish Story</a></li>
                <li><a href="#">Export Story</a></li>
                <li class="divider"></li>
                <!--<li class="dropdown-header">Nav header</li>-->
                <li><a href="#">Properties</a></li>
              </ul>
            </li>
            <li><a href="#aboutModal" data-toggle="modal">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="content" style='width:1280px;' id="mainStoryContent">
      </div>

    </div><!-- /.container -->


    <!-- About Modal -->
    <div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="aboutModalLabel">About</h3>
          </div>
          <div class="modal-body">
          <p>
            SugarES is designed to enable users to maintain their ElasticSearch server in relation to SugarCRM data.<br />
            <ul>
              <li>
                Navigate multiple indicies and browse data through the Tree interface.
              </li>
              <li>
                Create data into an index in ElasticSearch through the Inject interface.
              </li>
              <li>
                Perform manual searches on the data in ElasticSearch through the Search interface.
              </li>
            </ul>
          </p>
          <p><a href="https://github.com/meveridge/SugarES">https://github.com/meveridge/SugarES</a></p>
          <p>
            Third party packages used: <br />
            <ul>
              <li><a href="http://jquery.com/">jQuery</a> -- jQuery is a fast and concise JavaScript Library that simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development.</li>
              <li><a href="http://getbootstrap.com/">Twitterbootstrap</a> -- HTML, CSS, and JS toolkit from Twitter.</li>
            </ul>
          </p>
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End About Modal -->
    <!-- New Story Modal -->
    <div id="newStoryModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newStoryModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="newStoryModalLabel">New Story</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" id="newStoryForm">
              <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputTitle" placeholder="My Story Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAuthor" class="col-sm-2 control-label">Author</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputAuthor" placeholder="Your Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputDescription" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="inputDescription"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputLayoutStyle" class="col-sm-2 control-label">Layout Style</label>
                <div class="col-sm-10">
                  <select class="form-control" id="inputLayoutStyle">
                    <option>Horizontal</option>
                    <option>Verticle</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputLayoutSize" class="col-sm-2 control-label">Layout Size</label>
                <div class="col-sm-10">
                  <select class="form-control" id="inputLayoutSize">
                    <option>2</option>
                    <option>3</option>
                  </select>
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="button" class="btn btn-primary" onClick="newStory();">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End New Story Modal -->
    <!-- New Scene Modal -->
    <div id="newSceneModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newSceneModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="newSceneModalLabel">New Scene</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" id="newSceneForm">
              <div class="form-group">
                <label for="inputSceneTitle" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputSceneTitle" placeholder="Scene Title">
                </div>
              </div>
              <div class="form-group">
                <label for="inputSceneContent" class="col-sm-2 control-label">Content</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="inputSceneContent" rows="20"></textarea>
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="newScene();">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End New Scene Modal -->

    <script src="story_builder.js"></script>

  </body>
</html>