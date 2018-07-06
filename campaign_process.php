<?php
 include "connect.php";

 if(@$_POST['submit']){
             $user = $username;
             $group_name = $_POST['group_name'];
             $filename = $_FILES['file']['name'];

             echo $filename. "   FILENAME <br>";
             $fileo =  $_FILES['file']['tmp_name'];//$_FILES["file"]["name"]; //
	     $content = fopen($fileo, "r") or exit("Unable to open file!");
              fclose($fileo);
             $company = "Hollard";
       
             $table_group = "sms_group";
             if(empty($group_name))
		 {
		  $msg=$msg."All fields must be completed  <br>";
		  $status="False";
		 }
                 if($status=='Ok')
		  {
		   $insert="INSERT into ".$table_group." values('','$company','$group_name','$username',now(),'$content','$type','1')";



                   $result=mysql_query($insert) or die("Could not insert sms_group table ");
                //   echo $result. "<br>";

                   if ($result == 1){
                   $createtable= "CREATE TABLE sms_group_".$group_name."
                                                        (

                                                        msisdn VARCHAR(20)

                                                        )";
                  // echo $createtable;

                  $createRes = mysql_query($createtable) or die("could not create sms_group_".$group_name."");


                     if ($createRes){

                         $directory = "_uploads/";

                         if (!file_exists($directory)){
                           mkdir($directory, 0777, true);
                           echo "The directory {$directory} was successfully created.";
                         }

                         $target_path = $directory. basename( $_FILES['file']['name']);


                        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                         //   echo "The file ".  basename( $_FILES['file']['name']).
                           // " has been uploaded to " . $target_path."<br>";
                            } else{
                            echo "There was an error uploading the file, please try again!";
                        }
                        // echo "<p> Glad it successfully created the table</p>";


                         $temp = $fileo;

                        //$sqlstatement="LOAD DATA LOCAL INFILE '$target_path' INTO TABLE sms_group_".$group_name." FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\r\n' IGNORE 1 LINES";

                         $sqlstatement="LOAD DATA LOCAL INFILE '$target_path' INTO TABLE sms_group_".$group_name." FIELDS TERMINATED BY '' LINES TERMINATED BY '\r\n' ";
                         echo $sqlstatement;
                        mysql_query($sqlstatement) or die(mysql_error());
                     }else{

                     }
                   }

      echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button'  value='Retry' onClick='history.go(-1)'>";


                  ?>
		     <!--script language = "javascript" style = "text/javascript">
			 window.location = "bulkmsgs.php>";
		    </script-->
                     

		   <?php
		  }
                  else {
                       {echo "<font face='Verdana' size='2' color=red>$msg</font><br><input type='button'  value='Retry' onClick='history.go(-1)'>"; }

                  }

         }

?>
