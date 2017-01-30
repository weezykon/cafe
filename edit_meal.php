<?php include("header.inc.php"); ?>
</div>
<section class="panel panel-default" style="border:none;">
  <div class="row">
    <div class="col-md-12" style="margin-bottom:20px;">
      <div class="row">
        <?php  
            $food = $_GET['food'];
            $query44 = "SELECT * FROM meals WHERE id = '$food' and trash != 'YES'";
            $result44 = mysql_query($query44)
            or die ("Couldn't execute query44.");
            $cate = mysql_num_rows($result44);
            if ($cate == '0' ) {
                header("Location: meals.php");
            }
            while ($row44 = mysql_fetch_array($result44,MYSQL_ASSOC))
            {
        ?>
        <h3 style="text-align:left; margin-left:20px;">
          <i class="fa fa-save"></i>  Edit Meal
        </h3>
        <?php
          if(isset($_POST['addmeal'])){
            $food = $_GET['food'];
            function protect($field){
              $string=htmlentities($field,ENT_QUOTES);
              $string= mysql_real_escape_string(trim(strip_tags(addslashes($field))));
              return $string;
            }
            $meal = ucfirst($_POST['meal']);
            $price = protect($_POST['price']);
            $category = ucfirst($_POST['category']);

            $fav = $_FILES["picture"]["name"];
            if(!empty($fav)){
              $target_dir = "images/";
              $target_file = $target_dir . basename($_FILES["picture"]["name"]);
              $uploadOk = 1;
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
              // Check if image file is a actual image or fake image
              if(isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["picture"]["tmp_name"]);
                  if($check !== false) {
                      echo "File is an image - " . $check["mime"] . ".";
                      $uploadOk = 1;
                  } else {
                      echo "<div class ='alert alert-danger'>File is not an image.</div>";
                      $uploadOk = 0;
                  }
              }

               // Check file size
              if ($_FILES["picture"]["size"] > 5000000) {
                  echo "<div class ='alert alert-danger'>Sorry, your file is too large.</div>";
                  $uploadOk = 0;
              }

              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
                  echo "<div class ='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
                  $uploadOk = 0;
              }


                $filename = $_FILES["picture"]["tmp_name"];
                $rand = mt_rand();
                $picture = 'Meal'."_".$rand."".$rand."_".'CU'.".".$imageFileType;
                
                
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "<div class ='alert alert-danger'>Sorry, your file was not uploaded.</div>";
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($filename,"images/meals/" .$picture)) {

                    //Sql Insert/Update....
                    
                    $query30 = "UPDATE meals SET meal = '$meal', category = '$category', price = '$price', picture = '$picture' WHERE id = '$food'";
                    $result30 = mysql_query($query30) or die ("Couldn't execute query30");
                    echo("<script>location.href = 'meal.php?category=$category';</script>");
                    // header('Location: meals.php');

                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }
              }
            }else{
                $query30 = "UPDATE meals SET meal = '$meal', category = '$category', price = '$price' WHERE id = '$food'";
                $result30 = mysql_query($query30) or die ("Couldn't execute query30");
                echo("<script>location.href = 'meal.php?category=$category';</script>");
            }     
          }          
        ?>
        <form action="edit_meal.php?food=<?php echo $_GET['food']; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left input_mask">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                Meal Name
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="form-control has-feedback-left" name="meal" id="inputSuccess2" value="<?php echo $row44['meal']; ?>" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                Meal Price
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="number" class="form-control has-feedback-left" name="price" id="inputSuccess2" value="<?php echo $row44['price']; ?>" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                Meal Category
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="text" class="form-control has-feedback-left" name="category" id="inputSuccess2" value="<?php echo $row44['category']; ?>" required>
              </div>  
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
              <div class="col-md-2 col-sm-12 col-xs-12">
                Meal Picture
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <input type="file" class="form-control has-feedback-left" name="picture" id="inputSuccess2">
              </div> 
              <div class="col-md-2 col-sm-12 col-xs-12">
                Optional
              </div> 
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="meal.php?category=<?php echo $row44['category']; ?>" class="btn btn-default">Cancel</a>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <button type="submit" name="addmeal" class="btn btn-info"> <i class="fa fa-save"></i>  Save</button>
              </div>
            </div>
        </form>
        <?php
          }
        ?>
      </div>

    </div>
  </div>
<?php include("footer.inc.php"); ?>            