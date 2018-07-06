<html>

        <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=Edge">
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                <title>Welcom to Splitz Campaign Manager</title>
                <!-- Favicon-->
                <link rel="icon" href="favicon.ico" type="image/x-icon">
            
                <!-- Google Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Oxygen:400,700">
                <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
                <!-- Bootstrap Core Css -->
                <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
            
        
             
                <!-- Custom Css -->
                <link href="css/style.css" rel="stylesheet">
             
                <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
                <link href="css/themes/all-themes.css" rel="stylesheet" />
                
                <link rel="stylesheet" href="css/layout.css">
                <link href="css/loading_stuff.css" rel="stylesheet">
                
                
                
        	<script charset="utf-8" type="text/javascript"  language="javascript">
	
          <!-- Jquery Core Js -->
         <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>

    
        <!-- Bootstrap Core Js -->
          <!-- Bootstrap JS file -->
          <script type="text/javascript" src="js/bootstrap.min.js"></script>

           <script charset="utf-8" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="js/dataTables.tableTools.js"></script>
    
        <!-- Slimscroll Plugin Js -->
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    
        <!-- Waves Effect Plugin Js -->
        <script src="plugins/node-waves/waves.js"></script>
    
       <!-- Bootstrap Material Datetime Picker Plugin Js -->
        
        <!-- Custom Js -->
        <script src="js/admin.js"></script>
        <!--script src="js/pages/index.js"></script-->
        <!-- Demo Js -->
        <script src="js/demo.js"></script>
      
        
        
        <script src="js/add_msisdn.js"></script>
   	<script charset="utf-8" type="text/javascript"  language="javascript">
     
	$(document).ready(function(){
//var QueryString = getRequests();
        var customer = '<?php  echo $customer;?>'; //logs t1
 
         var url = "php/get_customer_group.php?customer_group="+customer;

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
            

            <body class="theme-red">
                    <div class="page-loader-wrapper">
                            <div class="loader">
                                <div class="preloader">
                                    <div class="spinner-layer pl-red">
                                        <div class="circle-clipper left">
                                            <div class="circle"> </div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>
                                <p>Please wait...</p>
                            </div>
                        </div>

                          <!-- #END# Page Loader -->
                        <!-- Overlay For Sidebars -->
                        <div class="overlay"></div>
                        <!-- #END# Overlay For Sidebars -->
                        <!-- Search Bar -->
                        <div class="search-bar">
                            <div class="search-icon">
                                <i class="material-icons">search</i>
                            </div>
                            <input type="text" placeholder="START TYPING...">
                            <div class="close-search">
                                <i class="material-icons">close</i>
                            </div>
                        </div>
                        
                        
                        <nav class="navbar">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                                        <a href="javascript:void(0);" class="bars"></a>
                                        <a class="navbar-brand" href="index.html">Campaign Manager</a>
                                    </div>
                                    <div class="collapse navbar-collapse" id="navbar-collapse">
                                        <ul class="nav navbar-nav navbar-right">
                                            <!-- Call Search -->
                                            <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                                            <!-- #END# Call Search -->
                                            <!-- Notifications -->
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                                    <i class="material-icons">notifications</i>
                                                    <span class="label-count">7</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="header">NOTIFICATIONS</li>
                                                    <li class="body">
                                                        <ul class="menu">
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="icon-circle bg-light-green">
                                                                        <i class="material-icons">person_add</i>
                                                                    </div>
                                                                    <div class="menu-info">
                                                                        <h4>12 new members joined</h4>
                                                                        <p>
                                                                            <i class="material-icons">access_time</i> 14 mins ago
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="icon-circle bg-cyan">
                                                                        <i class="material-icons">add_shopping_cart</i>
                                                                    </div>
                                                                    <div class="menu-info">
                                                                        <h4>4 sales made</h4>
                                                                        <p>
                                                                            <i class="material-icons">access_time</i> 22 mins ago
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="icon-circle bg-red">
                                                                        <i class="material-icons">delete_forever</i>
                                                                    </div>
                                                                    <div class="menu-info">
                                                                        <h4><b>Nancy Doe</b> deleted account</h4>
                                                                        <p>
                                                                            <i class="material-icons">access_time</i> 3 hours ago
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="icon-circle bg-orange">
                                                                        <i class="material-icons">mode_edit</i>
                                                                    </div>
                                                                    <div class="menu-info">
                                                                        <h4><b>Nancy</b> changed name</h4>
                                                                        <p>
                                                                            <i class="material-icons">access_time</i> 2 hours ago
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="icon-circle bg-blue-grey">
                                                                        <i class="material-icons">comment</i>
                                                                    </div>
                                                                    <div class="menu-info">
                                                                        <h4><b>John</b> commented your post</h4>
                                                                        <p>
                                                                            <i class="material-icons">access_time</i> 4 hours ago
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="icon-circle bg-light-green">
                                                                        <i class="material-icons">cached</i>
                                                                    </div>
                                                                    <div class="menu-info">
                                                                        <h4><b>John</b> updated status</h4>
                                                                        <p>
                                                                            <i class="material-icons">access_time</i> 3 hours ago
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="icon-circle bg-purple">
                                                                        <i class="material-icons">settings</i>
                                                                    </div>
                                                                    <div class="menu-info">
                                                                        <h4>Settings updated</h4>
                                                                        <p>
                                                                            <i class="material-icons">access_time</i> Yesterday
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="footer">
                                                        <a href="javascript:void(0);">View All Notifications</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <!-- #END# Notifications -->
                                            <!-- Tasks -->
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                                    <i class="material-icons">people</i>
                                                    <span class="label-count">9</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                
                                                <li class="header">Profile</li>
                                                 <li class="body">
                                                      <ul class="menu">
                                                      <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="image">
                                                                        <img src="#" width="48" height="48" alt="User" />
                                                                     </div>
                                                                    <div class="menu-info">
                                                                          <h4><b>Joe Doe</b></h4>
                        
                                                                        
                                                                    </div>
                                                                </a>
                                                       </li>
                                                    <li role="seperator" class="divider"></li>
                                                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                                                     <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                                                    <li role="seperator" class="divider"></li>
                                                    <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                                                      </ul>     
                                                </li>         
                                                </ul>
                                                
                                            </li>
                                            <!-- #END# Tasks -->
                                            <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>



                            <section>
                                    <!-- Left Sidebar -->
                                    <aside id="leftsidebar" class="sidebar">
                                      
                                        <!-- #User Info -->
                                        <!-- Menu -->
                                        <div class="menu">
                                            <ul class="list">
                                                <li class="header">MAIN NAVIGATION</li>
                                                <li class="active">
                                                    <a href="campaign_manager.html">
                                                        <i class="material-icons">home</i>
                                                        <span>Home</span>
                                                    </a>
                                                </li>
                                                
                                                 <li>
                                                    <a href="add_bulk_sms_group.html">
                                                        <i class="material-icons">text_fields</i>
                                                        <span>New Customer Group</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="create_new_campaign1.html">
                                                        <i class="material-icons">text_fields</i>
                                                        <span>Create Campaign</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="active_campaign.html">
                                                        <i class="material-icons">assignment</i>
                                                        <span>View Active Campaign</span>
                                                    </a>
                                                </li>
                                                
                                               
                                              
                                            </ul>
                                        </div>
                                        <!-- #Menu -->
                                        <!-- Footer -->
                                        <div class="legal">
                                            <div class="copyright">
                                                &copy; 2018 <a href="javascript:void(0);">Splitz Enterprises Campaign Manager</a>.
                                            </div>
                                          
                                        </div>
                                        <!-- #Footer -->
                                    </aside>
                                    <!-- #END# Left Sidebar -->
                                    <!-- Right Sidebar -->
                                    <aside id="rightsidebar" class="right-sidebar">
                                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                                            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                                                <ul class="demo-choose-skin">
                                                    <li data-theme="red" class="active">
                                                        <div class="red"></div>
                                                        <span>Red</span>
                                                    </li>
                                                    <li data-theme="pink">
                                                        <div class="pink"></div>
                                                        <span>Pink</span>
                                                    </li>
                                                    <li data-theme="purple">
                                                        <div class="purple"></div>
                                                        <span>Purple</span>
                                                    </li>
                                                    <li data-theme="deep-purple">
                                                        <div class="deep-purple"></div>
                                                        <span>Deep Purple</span>
                                                    </li>
                                                    <li data-theme="indigo">
                                                        <div class="indigo"></div>
                                                        <span>Indigo</span>
                                                    </li>
                                                    <li data-theme="blue">
                                                        <div class="blue"></div>
                                                        <span>Blue</span>
                                                    </li>
                                                    <li data-theme="light-blue">
                                                        <div class="light-blue"></div>
                                                        <span>Light Blue</span>
                                                    </li>
                                                    <li data-theme="cyan">
                                                        <div class="cyan"></div>
                                                        <span>Cyan</span>
                                                    </li>
                                                    <li data-theme="teal">
                                                        <div class="teal"></div>
                                                        <span>Teal</span>
                                                    </li>
                                                    <li data-theme="green">
                                                        <div class="green"></div>
                                                        <span>Green</span>
                                                    </li>
                                                    <li data-theme="light-green">
                                                        <div class="light-green"></div>
                                                        <span>Light Green</span>
                                                    </li>
                                                    <li data-theme="lime">
                                                        <div class="lime"></div>
                                                        <span>Lime</span>
                                                    </li>
                                                    <li data-theme="yellow">
                                                        <div class="yellow"></div>
                                                        <span>Yellow</span>
                                                    </li>
                                                    <li data-theme="amber">
                                                        <div class="amber"></div>
                                                        <span>Amber</span>
                                                    </li>
                                                    <li data-theme="orange">
                                                        <div class="orange"></div>
                                                        <span>Orange</span>
                                                    </li>
                                                    <li data-theme="deep-orange">
                                                        <div class="deep-orange"></div>
                                                        <span>Deep Orange</span>
                                                    </li>
                                                    <li data-theme="brown">
                                                        <div class="brown"></div>
                                                        <span>Brown</span>
                                                    </li>
                                                    <li data-theme="grey">
                                                        <div class="grey"></div>
                                                        <span>Grey</span>
                                                    </li>
                                                    <li data-theme="blue-grey">
                                                        <div class="blue-grey"></div>
                                                        <span>Blue Grey</span>
                                                    </li>
                                                    <li data-theme="black">
                                                        <div class="black"></div>
                                                        <span>Black</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="settings">
                                                <div class="demo-settings">
                                                    <p>GENERAL SETTINGS</p>
                                                    <ul class="setting-list">
                                                        <li>
                                                            <span>Report Panel Usage</span>
                                                            <div class="switch">
                                                                <label><input type="checkbox" checked><span class="lever"></span></label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <span>Email Redirect</span>
                                                            <div class="switch">
                                                                <label><input type="checkbox"><span class="lever"></span></label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <p>SYSTEM SETTINGS</p>
                                                    <ul class="setting-list">
                                                        <li>
                                                            <span>Notifications</span>
                                                            <div class="switch">
                                                                <label><input type="checkbox" checked><span class="lever"></span></label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <span>Auto Updates</span>
                                                            <div class="switch">
                                                                <label><input type="checkbox" checked><span class="lever"></span></label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <p>ACCOUNT SETTINGS</p>
                                                    <ul class="setting-list">
                                                        <li>
                                                            <span>Offline</span>
                                                            <div class="switch">
                                                                <label><input type="checkbox"><span class="lever"></span></label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <span>Location Permission</span>
                                                            <div class="switch">
                                                                <label><input type="checkbox" checked><span class="lever"></span></label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
                                    <!-- #END# Right Sidebar -->
                                </section>



                                <section class="content">
                                <div class="container-fluid">
                                    <div class="block-header">
                                        <h2>Create new campaign</h2>
                                    </div>

         
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
             <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   
                    <div class="card">
                   
                   
                        <div class="body">
                      
                                <button type="button" class="button" id="add_company">Add Cell Number</button>
      <!--button type="button" class="button" id="add_company">Add Campaigns</button-->

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
                      

                    </div>
                </div>
            </div>
             
            <!-- #END# CPU Usage -->
                <!-- #END# Answered Tickets -->
            </div>

      
    </section>
                        
                        
                                                     
<div class="loader">
    <div class="inner one"></div>
    <div class="inner two"></div>
    <div class="inner three"></div>
   <p>Please wait...</p>
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

                        
                        
                        
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Campain Creation Response</h4>
          </div>
          <div class="modal-body" style="max-height: 300px; overflow-y: auto;">
            <br/>
              <p> Campaign Created Successfully </p>  
              <div class="form-group">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>

          </div>
        </div>
      </div>
    </div>
    
                                    
      
         
</html>    