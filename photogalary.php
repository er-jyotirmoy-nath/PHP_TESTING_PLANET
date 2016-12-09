<?php
require_once "file_handling_classes.php" ;
class viewphoto extends file_handling
{

  public function viewphotos($l1,$l2)
  {
    try
    {
      $con = new PDO("mysql:host=localhost;dbname=a_database","root","");
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $stmt_getph = $con->prepare("select * from panorama ");
      $stmt_getph->execute();
      if($result = $stmt_getph->fetchAll()){
        $list = '';
        $f =0;
        foreach ($result as $value) {
      # code...
          if ($f ==0) {
        # code...
            $list .= '<div class="row">';
          }
          $list .= ' <div class="col-md-3">
          <a href="uploads/'.$value['PHOTO_FILE'].'"  class="thumbnail">
            <p>'.substr(file_handling::readafile($value['USER_COMM']),0,55).'....</p>
            <img src="uploads/'.$value['PHOTO_FILE'].'" alt="'.$value['PHOTO_FILE'].'" style="width:150px;height:150px">
          </a>
        </div>';
        $f = $f + 1;
        if($f == 4)
        {
          $list.= '</div>';
          $f = 0;
        }


      }
      echo $list;
    }
    
    else
    {
      echo '<h3>Nothing to display</h3>';
    }
  }
  catch(Exception $ex){
    echo $ex->getMessage();
  }
}
}

?>



<?php
// $photo1->viewphotos(4,4);  

?>
