<?php
set_time_limit(900);

include "connect.php";
if(@$_POST['submit']){
       $group_name = $_POST['group_name'];
       $type='bulk';
       $content="";
       $company="Hollard";
       $directory = "_uploads/";

       $filename = $_FILES['file']['name'];
       $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // echo " Filename ".$filename.'  ext '.$ext." ".PHP_EOL;

       
          $insert="INSERT into sms_group values('','$company','$group_name','Admin',now(),'$content','$type','1')";
          


               $result=mysql_query($insert) or die("Could not insert sms_group table ");
              
             if ($result == 1){
               $createtable= "CREATE TABLE sms_group_".$group_name."
                                                                (msisdn VARCHAR(20))";
 

             $createRes = mysql_query($createtable) or die("could not create sms_group_".$group_name."");
             if ($createRes == 1){
               

                 if ($ext == "xls" || $ext == "xlsx"){
					 
					 echo "Inside EXCEL FILE UPLOAD".PHP_EOL;
                    process_xcel($filename, $group_name);
					       
                  ?>
						<script language = "javascript" style = "text/javascript"> 
						window.location = "bulk_group.php";
						</script>
                     
                  
					<?php
					
                 }else{
                         echo "Inside CSV FILE UPLOAD".PHP_EOL;
                     process_csv($filename, $group_name);
					        
					?>
					 <script language = "javascript" style = "text/javascript"> 
					 window.location = "bulk_group.php";
					</script>
							 
						  
				   <?php
                 }


             }else{
                 echo " Process failed";
             }
       }
	   
	    mysql_close();
}

function process_csv($filename, $group_name){

 echo " INSIDE FUNCTION process_CSV".$filename."".PHP_EOL;

                         $directory = "_uploads/";

                         if (!file_exists($directory)){
                           mkdir($directory, 0777, true);
                         //  echo "The directory {$directory} was successfully created.";
                         }
                         $basefile = $filename;
                         echo $filename;
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
    return;
}

function process_xcel($filename, $group_name){
    
    require('php-excel-reader/excel_reader2.php');
    require('SpreadsheetReader.php');
    $directory = "_uploads/";
    //echo " Inside process excel ".$filename;
    $target_path = $directory. basename($filename);
	 if (!file_exists($directory)){
                           mkdir($directory, 0777, true);
                           echo "The directory {$directory} was successfully created."; 
                         }
			   if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                         //   echo "The file ".  basename( $_FILES['file']['name']).
                           // " has been uploaded to " . $target_path."<br>";
                            } else{
                            echo "There was an error uploading the file, please try again!";
                        }			 
						 
						 
	

	try
	{    echo "  Target path = ".$target_path."".PHP_EOL;
		$Spreadsheet = new SpreadsheetReader($target_path);
	    echo "  Target path2  = ".$target_path."".PHP_EOL;

		$Sheets = $Spreadsheet -> Sheets();	
		
		
		echo '---------------------------------'.PHP_EOL;
		echo 'Spreadsheets:'.PHP_EOL;
		print_r($Sheets);
		echo '---------------------------------'.PHP_EOL;
		echo '---------------------------------'.PHP_EOL;

		foreach ($Sheets as $Index => $Name)
		{
			//echo '---------------------------------'.PHP_EOL;
			//echo '*** Sheet ---> '.$Name.' ***'.PHP_EOL;
		//	echo '---------------------------------'.PHP_EOL;

			$Time = microtime(true);

			$Spreadsheet -> ChangeSheet($Index);

			foreach ($Spreadsheet as $Key => $Row)
			{
			
				if ($Row)
				{  
					foreach($Row as $val) { 
					 // echo "  --- ". $val."".PHP_EOL;
					  $msisdn = internationalization($val);
					  echo "  --- ". $msisdn."".PHP_EOL;
                       $sql = "INSERT INTO sms_group_".$group_name."(msisdn) VALUES('$msisdn'); ";
					   echo $sql." ".PHP_EOL;
                        $result = mysql_query($sql) ;
                //   echo $result. "<br>";
                       //  if ($result == 1){
							 
					}
					
					
				}
				else
				{
					var_dump($Row);
				}
				$CurrentMem = memory_get_usage();
		
				//echo 'Memory: '.($CurrentMem - $BaseMem).' current, '.$CurrentMem.' base'.PHP_EOL;
				//echo '---------------------------------'.PHP_EOL;
		
				if ($Key && ($Key % 500 == 0))
				{
					echo '---------------------------------'.PHP_EOL;
					echo 'Time: '.(microtime(true) - $Time);
					echo '---------------------------------'.PHP_EOL;
				}
			}
		
			//echo PHP_EOL.'---------------------------------'.PHP_EOL;
			//echo 'Time: '.(microtime(true) - $Time);
			//echo PHP_EOL;

			//echo '---------------------------------'.PHP_EOL;
		//echo '*** End of sheet '.$Name.' ***'.PHP_EOL;
		//	echo '---------------------------------'.PHP_EOL;
		}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
	}

    
    return;
}

function internationalization($msisdn)
{  /*if (substr($msisdn, 0, 1) == '+') {
		$msisdn = preg_replace('/^\+/', '', $msisdn);
	}*/
	if(substr($msisdn, 0, 1) == '0')
	{
		$msisdn = preg_replace('/^0/', '27', $msisdn);
	}
	
	if (substr($msisdn,0,2) == '27'){
		$msisdn = "+".$msisdn;
	}
	return $msisdn;
}
?>
