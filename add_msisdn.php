<?php
session_start();
$customer = $_REQUEST['customer_group'];

$_SESSION["customer_group"] = $customer;
//echo $customer;
?>


<html lang="en" dir="ltr">
  <head>
    <title>Add cellNo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1000, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Oxygen:400,700">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.css">
    <link rel="stylesheet" href="css/layout.css">
    <script charset="utf-8" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script charset="utf-8" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.tableTools.js"></script>
    <script charset="utf-8" src="//cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script>
    <script charset="utf-8" src="js/add_msisdn.js"></script>
	
	<script charset="utf-8" type="text/javascript"  language="javascript">
	
	$(document).ready(function(){
//var QueryString = getRequests();
        var customer = '<?php  echo $customer;?>'; //logs t1
 
         var url = "get_customer_group.php?customer_group="+customer;

         var table_companies = $('#active_campaign').DataTable( {
                    dom: 'T<"clear">lfrtip',
			   		"tableTools": {
			   	   	"sSwfPath": "swf/copy_csv_xls_pdf.swf",
			   	    	"sRowSelect": "multi",
				    	"aButtons": [
					        	"select_all",
					        	"select_none",
							{
						    		"sExtends":    "collection",
						    		"sButtonText": "Export",
						    		"aButtons":    [ "csv", "xls", "pdf" ]
							}
                                                    ]
                                        },
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :url, // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".active_campaign-error").html("");
							$("#active_campaign").append('<tbody class="active_campaign-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#active_campaign_processing").css("display","none");

						}
					}
             
              });


              

         
       });
	</script>
  </head>
  <body>

    <div id="page_container">
        <h1>Customer Group <?php echo $customer;?></h1>
    <button type="button" class="button" id="add_company">Add Cell Number</button>


      <table class="datatable" id="active_campaign">
        <thead>
          <tr>
          
            <th>MSISDN</th>
                
         
            
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>

    </div>

    <div class="lightbox_bg"></div>

    <div class="lightbox_container">
      <div class="lightbox_close"></div>
      <div class="lightbox_content">
        
        <h2>Add Cell Number</h2>
        <form class="form add" id="form_company" data-id="" novalidate>
        
          
          <div class="input_container">
            <label for="campaign_name">Cell Number: <span class="required">*</span></label>
            <div class="field_container">
              <input type="text" class="text" name="msisdn" id="msisdn" value="" required>
            </div>
          </div>
          
        
          <div class="button_container">
          <button type="submit">Add CellNO</button>
          </div>
        </form>
        
      </div>
    </div>




    <noscript id="noscript_container">
      <div id="noscript" class="error">
        <p>JavaScript support is needed to use this page.</p>
      </div>
    </noscript>

    <div id="message_container">
      <div id="message" class="success">
        <p>This is a success message.</p>
      </div>
    </div>

    <div id="loading_container">
      <div id="loading_container2">
        <div id="loading_container3">
          <div id="loading_container4">
            Loading, please wait...
          </div>
        </div>
      </div>
    </div>

  </body>
</html>