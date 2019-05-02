<?php


function getImage($project){
      $image = "https://i.imgur.com/n3bqPLe.png"; //Default image
      if( file_exists($project . "/k3lly.png") ){
        $image = $project . "/k3lly.png";
      }
      return $image;
}

function getDesc($project){
  $description = "No description provided.";
  if( file_exists($project . "/k3lly.txt") ){
    $description = file_get_contents($project . "/k3lly.txt");
  }
  return $description;
}

function noFiles($string){
  return strpos($string, '.') === false;
}

$projects = scandir(".");
$projects = array_filter($projects, 'noFiles');



?>

<html>
  <head>
    <title>Projects</title>
    <style>
    body{
      margin: 0;
      padding: 0;
      font-family: Verdana;
      /* text-align: center; */
      width: 100%;
      background: rgba(61,61,61,1);
background: -moz-linear-gradient(top, rgba(61,61,61,1) 0%, rgba(0,0,0,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(61,61,61,1)), color-stop(100%, rgba(0,0,0,1)));
background: -webkit-linear-gradient(top, rgba(61,61,61,1) 0%, rgba(0,0,0,1) 100%);
background: -o-linear-gradient(top, rgba(61,61,61,1) 0%, rgba(0,0,0,1) 100%);
background: -ms-linear-gradient(top, rgba(61,61,61,1) 0%, rgba(0,0,0,1) 100%);
background: linear-gradient(to bottom, rgba(61,61,61,1) 0%, rgba(0,0,0,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3d3d3d', endColorstr='#000000', GradientType=0 );
    }

    a{
      text-decoration: none;
    }

    h1{
      margin-top: 30px;
      margin-left: 20px;
      text-transform: uppercase;
      color: white;
    }

    #projects-container{
      width: 100%;
      display: block;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }

    .project{
      display: inline-block;
      width: calc(96%/4);
      height: 250px;
      margin: 5px;
      /* background: rgba(156, 81, 199, 0.8); */
      color: white;
      border-radius: 15px;
      border: 1px solid grey;
      background: rgba(120,7,120,0.88);
      background: -moz-linear-gradient(top, rgba(120,7,120,0.88) 0%, rgba(107,0,107,0.81) 100%);
      background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(120,7,120,0.88)), color-stop(100%, rgba(107,0,107,0.81)));
      background: -webkit-linear-gradient(top, rgba(120,7,120,0.88) 0%, rgba(107,0,107,0.81) 100%);
      background: -o-linear-gradient(top, rgba(120,7,120,0.88) 0%, rgba(107,0,107,0.81) 100%);
      background: -ms-linear-gradient(top, rgba(120,7,120,0.88) 0%, rgba(107,0,107,0.81) 100%);
      background: linear-gradient(to bottom, rgba(120,7,120,0.88) 0%, rgba(107,0,107,0.81) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#780778', endColorstr='#6b006b', GradientType=0 );
    }
    .project-image{
      margin-top: 25px;
      width: 100%;
      height: 25px;
      display: block;
      position: relative;
    }

    .project-image img{
      height: 100px;
    }
    .project-title{
      margin-top: 85px;
      position: relative;
      width: 100%;
      height: 25px;
      display: block;
    }
    </style>
  </head>
  <body>
    <h1>Projects hosted:</h1>
    <br>
    <div id="projects-container">
      <?php
        foreach($projects as $project){
        ?>
        <a href="<?php echo $project;?>">
          <div class="project">
            <div class="project-image">
              <img src="<?php echo getImage($project); ?>"><br>
            </div>
            <div class="project-title">
              <h3><?php echo $project; ?></h3>
            </div>
            <div class="project-description">
              <p><?php echo getDesc($project); ?></p>
            </div>
          </div>
        </a>
        <?php
        }
      ?>
    </div>
  </body>
</html>
