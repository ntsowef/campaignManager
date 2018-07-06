<?php
$db_server   = '196.37.186.21';
$db_username = 'root';
$db_password = 'n4u2cc';
$db_name     = 'hollard_sms_data';
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$base_url = 'http://'.$host.$uri.'/';

$job = '';
$id  = '';
$customer_group=$_GET['customer_group'];
if (isset($_GET['job'])){
  $job = $_GET['job'];
  if ($job == 'get_camps') {
    if (isset($_GET['id'])){
      $id = $_GET['id'];
      if (!is_numeric($id)){
        $id = '';
      }
    }
  } else {
    $job = '';
  }
}

$mysql_data = array();


if ($job != ''){

  // Connect to database
  $db_connection = mysqli_connect($db_server, $db_username, $db_password, $db_name);
  if (mysqli_connect_errno()){
    $result  = 'error';
    $message = 'Failed to connect to database: ' . mysqli_connect_error();
    $job     = '';
  }

  // Execute job
  if ($job == 'get_camps'){

    // Get companies
    $query1 = "SELECT * FROM ".$customer_group." ORDER BY id";
    
    $query = mysqli_query($db_connection, $query1);
    if (!$query){
      $result  = 'error';
      $message = 'query error'.$query;
    } else {
      $result  = 'success';
      $message = 'query success';
      $current_date = date('Y-m-d H:i:s');
      while ($campaign = mysqli_fetch_array($query)){
          $schedule_date = $campaign['schedule_date'];

        $functions  = '<div class="function_buttons"><ul>';
        $functions .= '<li class="function_edit"><a data-id="'   . $campaign['id'] . '" data-name="' . $campaign['campaign_name'] . '"><span>Edit</span></a></li>';
        $functions .= '<li class="function_delete"><a data-id="' . $campaign['id'] . '" data-name="' . $campaign['campaign_name'] . '"><span>Delete</span></a></li>';
       
       if ($campaign['scheduled']==0){

        $functions .= '<li class="function_rerun"><a data-id="' . $campaign['id'] . '" data-name="' . $campaign['campaign_name'] . '"><span>ReRun</span></a></li>';
       }elseif ($campaign['scheduled']==1 && (strtotime($current_date) < strtotime($schedule_date))  ){
         $functions .= '<li class="function_run"><a data-id="'   . $campaign['id'] . '" data-name="' . $campaign['campaign_name'] . '"><span>Run</span></a></li>';

       }
        $functions .= '</ul></div>';
        $mysql_data[] = array(
          
          "msisdn"  => $campaign['msisdn'],
       
          "functions"     => $functions
        );
      }
    }

  } elseif ($job == 'get_camp'){

    // Get company
    if ($id == ''){
      $result  = 'error';
      $message = 'id missing';
    } else {
      $query = "SELECT * FROM sms_campaign WHERE id = '" . mysqli_real_escape_string($db_connection, $id) . "'";
      $query = mysqli_query($db_connection, $query);
      if (!$query){
        $result  = 'error';
        $message = 'query error';
      } else {
        $result  = 'success';
        $message = 'query success';
        while ($campaign = mysqli_fetch_array($query)){
          $mysql_data[] = array(
          "campaign_name"  => $campaign['campaign_name'],
          "customer_group"    => $campaign['customer_group'],
          "campaign_text"       => $campaign['campaign_text'],
          "schedule_date"   => $campaign['schedule_date'],
          "total_messages"     => $campaign['total_messages'],
          "scheduled"    => $campaign['scheduled'],
          "status"  => $campaign['status']
          );
        }
      }
    }

  } elseif ($job == 'add_company'){

    // Add company
    $query = "INSERT INTO sms_campaign SET ";
    
    if (isset($_GET['company_name'])) { $query .= "company_name = '" . mysqli_real_escape_string($db_connection, $_GET['company_name']) . "', "; }
    if (isset($_GET['customer_group']))   { $query .= "customer_group   = '" . mysqli_real_escape_string($db_connection, $_GET['customer_group'])   . "', "; }
    if (isset($_GET['revenue']))      { $query .= "revenue      = '" . mysqli_real_escape_string($db_connection, $_GET['revenue'])      . "', "; }
    if (isset($_GET['fiscal_year']))  { $query .= "fiscal_year  = '" . mysqli_real_escape_string($db_connection, $_GET['fiscal_year'])  . "', "; }
    if (isset($_GET['employees']))    { $query .= "employees    = '" . mysqli_real_escape_string($db_connection, $_GET['employees'])    . "', "; }
    if (isset($_GET['market_cap']))   { $query .= "market_cap   = '" . mysqli_real_escape_string($db_connection, $_GET['market_cap'])   . "', "; }
    if (isset($_GET['headquarters'])) { $query .= "headquarters = '" . mysqli_real_escape_string($db_connection, $_GET['headquarters']) . "'";   }
    $query = mysqli_query($db_connection, $query);
    if (!$query){
      $result  = 'error';
      $message = 'query error';
    } else {
      $result  = 'success';
      $message = 'query success';
    }

  } elseif ($job == 'edit_camp'){

    // Edit company
    if ($id == ''){
      $result  = 'error';
      $message = 'id missing';
    } else {
      $query1 = "UPDATE sms_campaign SET ";
      
      if (isset($_GET['campaign_name'])) { $query1 .= "campaign_name = '" . mysqli_real_escape_string($db_connection, $_GET['campaign_name']) . "', "; }
      if (isset($_GET['customer_group']))   { $query1 .= "customer_group   = '" . mysqli_real_escape_string($db_connection, $_GET['customer_group'])   . "', "; }
      if (isset($_GET['campaign_text']))      { $query1 .= "campaign_text      = '" . mysqli_real_escape_string($db_connection, $_GET['campaign_text'])      . "', "; }
      if (isset($_GET['schedule_date']))  { $query1 .= "schedule_date  = '" . mysqli_real_escape_string($db_connection, $_GET['schedule_date'])  . "', "; }
      if (isset($_GET['scheduled']))    { $query1 .= "scheduled    = '" . mysqli_real_escape_string($db_connection, $_GET['scheduled'])    . "' "; }
      /*if (isset($_GET['market_cap']))   { $query .= "market_cap   = '" . mysqli_real_escape_string($db_connection, $_GET['market_cap'])   . "', "; }
      if (isset($_GET['headquarters'])) { $query .= "headquarters = '" . mysqli_real_escape_string($db_connection, $_GET['headquarters']) . "'";   }*/
      $query1 .= "WHERE id = " . mysqli_real_escape_string($db_connection, $id) . "";
      $query  = mysqli_query($db_connection, $query1);
      if (!$query){
        $result  = 'error';
        $message = 'query error  = '.$query1;
      } else {
        $result  = 'success';
        $message = 'query success';
      }
    }

  }



  elseif($job=='run_camp'){
      if ($id == ''){
      $result  = 'error';
      $message = 'id missing';
    } else {



      $query = "SELECT * FROM sms_campaign WHERE id = $id";
      $query1 = mysqli_query($db_connection, $query);
      $group ="";
      $campaign_text="";
       while ($campaign= mysqli_fetch_array($query1)){
            $group = $campaign['customer_group'];
            $campaign_text = $campaign['campaign_text'];
            $scheduled = $campaign['scheduled'];
            $campaign_name = $campaign['campaign_name'];
       }
        $camp_text =  $campaign_text;
        $needle ="'";
        $needle1 ="`";
        $needle2 = "â€™";


       if(contains($camp_text,$needle) || contains($camp_text, $needle1)){
          $message = addslashes($camp_text);
       }else{
	 $message = $camp_text;
       }

        $query =  "SELECT msisdn from sms_group_".$group;
        $result_q  = mysqli_query($db_connection, $query);
        while ($row = mysqli_fetch_array($result_q)) {
            $msisdn = internationalization($row['msisdn']);
            $company="Hollard";
            $username ="Admin";
           // $query1="INSERT INTO bulkmessages(id, message, msisdn, queued, message_date, company, username) VALUES('','$message','$msisdn', 'Q',NOW(),'$company','$username')";
            $query1="INSERT INTO customer_messages(id, message,campaign_name,customer_group, msisdn, queued, message_date, company, username) VALUES('','$message','$campaign_name','$group','$msisdn', 'Q',NOW(),'$company','$username')";
            $res = mysqli_query($db_connection, $query1);
            
        }

        if ($scheduled ==1){
           $sql = "UPDATE sms_campaign set  schedule_date = NOW(), scheduled=0 where id=$id";
        }else{
            $sql = "UPDATE sms_campaign set  schedule_date = NOW() where id=$id";
        }
       $rest  = mysqli_query($db_connection, $sql);
       $result  = 'success';
       $message = 'query success.... run camp';
    }
  }
  elseif($job=='rerun_camp'){
      if ($id == ''){
      $result  = 'error';
      $message = 'id missing';
    } else {




      $query = "SELECT * FROM sms_campaign WHERE id = $id";
      $query1 = mysqli_query($db_connection, $query);
      $group ="";
      $campaign_text="";
       while ($campaign= mysqli_fetch_array($query1)){
            $group = $campaign['customer_group'];
            $campaign_text = $campaign['campaign_text'];
            $scheduled = $campaign['scheduled'];
             $campaign_name = $campaign['campaign_name'];
       }
        $camp_text =  $campaign_text;
        $needle ="'";
        $needle1 ="`";
        $needle2 = "â€™";


       if(contains($camp_text,$needle) || contains($camp_text, $needle1)){
          $message = addslashes($camp_text);
       }else{
	 $message = $camp_text;
       }
      
        $query =  "SELECT msisdn from sms_group_".$group;
        $result_q  = mysqli_query($db_connection, $query);
        while ($row = mysqli_fetch_array($result_q)) {
            $msisdn = internationalization($row['msisdn']);
            $company="Hollard";
            $username ="Admin";
            $query1="INSERT INTO customer_messages(id, message,campaign_name,customer_group, msisdn, queued, message_date, company, username) VALUES('','$message','$campaign_name','$group','$msisdn', 'Q',NOW(),'$company','$username')";
            $res = mysqli_query($db_connection, $query1);
             
        }

        if ($scheduled ==1){
           $sql = "UPDATE sms_campaign set  schedule_date = NOW(), scheduled=0 where id=$id";
        }else{
            $sql = "UPDATE sms_campaign set  schedule_date = NOW() where id=$id";
        }
         $rest  = mysqli_query($db_connection, $sql);
         $query = "DELETE FROM scheduled_messages WHERE sms_group = '" . mysqli_real_escape_string($db_connection, $group) . "' and status='Q'";
         $query = mysqli_query($db_connection, $query);

             
        
       $result  = 'success';
       $message = 'query success.... REEEErun camp ';
    }
  }


  elseif ($job == 'delete_camp'){

    // Delete company
    if ($id == ''){
      $result  = 'error';
      $message = 'id missing';
    } else {
      $query = "DELETE FROM sms_campaign WHERE id = '" . mysqli_real_escape_string($db_connection, $id) . "'";
      $query = mysqli_query($db_connection, $query);
      if (!$query){
        $result  = 'error';
        $message = 'query error';
      } else {
        $result  = 'success';
        $message = 'query success';
      }
    }

  }

  // Close database connection
  mysqli_close($db_connection);

}


// Prepare data
$data = array(
  "result"  => $result,
  "message" => $message,
  "data"    => $mysql_data
);

// Convert PHP array to JSON array
$json_data = json_encode($data);
print $json_data;


function rerun_campaign($id){
    
}


function internationalization($msisdn)
{  /*if (substr($msisdn, 0, 1) == '+') {
		$msisdn = preg_replace('/^\+/', '', $msisdn);
	}*/

	if (strlen($msisdn) == 9){
		$msisdn = "+27".$msisdn;
	}
	 else{
		if(substr($msisdn, 0, 1) == '0')
		{
			$msisdn = preg_replace('/^0/', '27', $msisdn);
		}

		if (substr($msisdn,0,2) == '27'){
			$msisdn = "+".$msisdn;
		}
	}
	return $msisdn;
}

 function contains($string, $needle, $caseSensitive = true)
    {
        $encoding = 'UTF-8';

        if ($caseSensitive) {
            return (mb_strpos($string, $needle, 0, $encoding) !== false);
        }

        return (mb_stripos($string, $needle, 0, $encoding) !== false);
    }



?>
