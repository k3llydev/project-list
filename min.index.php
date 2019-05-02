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
<html><head><style>body{margin:0;padding:0;font-family:Verdana;width:100%;background:rgba(61,61,61,1);background:-moz-linear-gradient(top,rgba(61,61,61,1) 0,rgba(0,0,0,1) 100%);background:-webkit-gradient(left top,left bottom,color-stop(0,rgba(61,61,61,1)),color-stop(100%,rgba(0,0,0,1)));background:-webkit-linear-gradient(top,rgba(61,61,61,1) 0,rgba(0,0,0,1) 100%);background:-o-linear-gradient(top,rgba(61,61,61,1) 0,rgba(0,0,0,1) 100%);background:-ms-linear-gradient(top,rgba(61,61,61,1) 0,rgba(0,0,0,1) 100%);background:linear-gradient(to bottom,rgba(61,61,61,1) 0,rgba(0,0,0,1) 100%)}a{text-decoration:none}h1{margin-top:30px;margin-left:20px;text-transform:uppercase;color:#fff}#projects-container{width:100%;display:block;margin-left:auto;margin-right:auto;text-align:center}.project{display:inline-block;width:calc(96%/4);height:250px;margin:5px;color:#fff;border-radius:15px;border:1px solid grey;background:rgba(120,7,120,.88);background:-moz-linear-gradient(top,rgba(120,7,120,.88) 0,rgba(107,0,107,.81) 100%);background:-webkit-gradient(left top,left bottom,color-stop(0,rgba(120,7,120,.88)),color-stop(100%,rgba(107,0,107,.81)));background:-webkit-linear-gradient(top,rgba(120,7,120,.88) 0,rgba(107,0,107,.81) 100%);background:-o-linear-gradient(top,rgba(120,7,120,.88) 0,rgba(107,0,107,.81) 100%);background:-ms-linear-gradient(top,rgba(120,7,120,.88) 0,rgba(107,0,107,.81) 100%);background:linear-gradient(to bottom,rgba(120,7,120,.88) 0,rgba(107,0,107,.81) 100%)}.project-image{margin-top:25px;width:100%;height:25px;display:block;position:relative}.project-image img{height:100px}.project-title{margin-top:85px;position:relative;width:100%;height:25px;display:block}
</style></head> <body> <h1>Projects hosted:</h1> <br><div id="projects-container"> <?php foreach($projects as $project){?> <a href="<?php echo $project;?>"> <div class="project"> <div class="project-image"> <img src="<?php echo getImage($project); ?>"><br></div><div class="project-title"> <h3><?php echo $project; ?></h3> </div><div class="project-description"> <p><?php echo getDesc($project); ?></p></div></div></a> <?php}?> </div></body></html>
