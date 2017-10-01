<?php
if(isset($_GET['show'])) {
    $show=$_GET['show'];
}
else{
	$show="home";
}
?>
<!DOCTYPE HTML>

<html>
<head>
	<title>
		CS 699 Project - Book Management System
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>      
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  rel="stylesheet"> -->

	<script src="./../bootstrap/jquery-3.1.1.min.js"></script>
	 <link href="./../bootstrap/css/bootstrap.min.css" rel="stylesheet">        
	<script src="./../bootstrap/js/bootstrap.min.js"></script>
	
	<style>
			
		.popover-title{ 
		   	background-color: #000000;
		    color: #FFFFFF;
		    font-size: 15px;
		    text-align:center;
		}

		.popover-content{
		   	background-color: #000000;
		    padding: 0px;
		}

		.tile {
			height: 200px;
			background: rgb(66,139,202);
			margin-bottom:25px;
		}

		body {
		        overflow: hidden;
		}

	    #content {
	        max-height: calc(100% - 60px);
	        overflow-y: scroll;
	        padding: 0px 5% 60px 5% !important;
	        margin-top: 60px !important;
	    }


		html, body {
		    height: 100%;
		    width: 100%;
		    margin: 0;
		    padding: 0;
		}
		header {
		    width: 100%;
		    height: 60px;
		    position: fixed;
		    top: 0;
		}

		footer {
		    width: 100%;
		    height: 50px;
		    position: fixed;
		    bottom: 0;
		}

		.item h2{
			margin: 30px 18px 0px; 
			color:white;
		}


	</style> 		
</head>

<body data-spy="scroll">

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php?show=home" style="font-weight: bold;">E - Library IIT Bombay </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul id="nav_menu" class="nav navbar-nav">
             	<li <?php if (!strcmp($show,"home")) echo 'class="active"'; ?> ><a href="#home" data-toggle="tab"><strong>Home</strong></a></li>   
			    <li <?php if (!strcmp($show,"nav_search")) echo 'class="active"'; ?> ><a href="#nav_search"  data-toggle="tab"><strong>Search</strong></a></li>
			    <li <?php if (!strcmp($show,"nav_add")) echo 'class="active"'; ?> ><a href="#nav_add" data-toggle="tab"><strong>Add</strong></a></li>
     
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>		

<div id="content">	

	 <div class="tab-content">
			<div id="home" class="tab-pane fade <?php if (!strcmp($show,'home')) echo 'in active'; ?> ">
				
					<h3  class="text-center" style="font-weight: bold;"> Quick Search </h3>
			
					<div>
					    <div class="col-sm-3 col-xs-4">
					    	<div id="tile1" class="tile">
					        
					         <div class="carousel slide" data-ride="carousel">
					          <!-- Wrapper for slides -->
					          <a href="../controller/QuickSearch.php?search_name_subject=Machine_Learning">
					          <div class="carousel-inner">
					            <div class="item active">
					               <h2> Machine Learning </h2>
					            </div>
					            <div class="item">
					              <!--  <img src="" class="img-responsive"/> -->
					            	 <h2> CS 729 </h2>
					            </div>
					          </div>
					          </a>
					        </div>
					         
					    	</div>
						</div>
						<div class="col-sm-3 col-xs-4">
							<div id="tile2" class="tile">
					    	 
					         <div class="carousel slide" data-ride="carousel">
					          <!-- Wrapper for slides -->
					           <a href="../controller/QuickSearch.php?search_name_subject=Software_Lab">
					          <div class="carousel-inner">
					            <div class="item active">
					               <h2> Software Lab </h2>
					            </div>
					            <div class="item">
					             <!--  <img src="images/graphics.jpg" class="img-responsive"/> -->
					              <h2> CS 699 </h2>
					            </div>
					          </div>
					          </a>
					        </div>
					         
							</div>
						</div>
						<div class="col-sm-3 col-xs-4">
							<div id="tile3" class="tile">
					    	 
					        <div class="carousel slide" data-ride="carousel">
					          <!-- Wrapper for slides -->
					           <a href="../controller/QuickSearch.php?search_name_subject=Algorithms">
					          <div class="carousel-inner">
					            <div class="item active">
					                <h2> Algorithms </h2>
					            </div>
					            <div class="item">
					               <!-- <img src="images/algo.jpg" class="img-responsive"/> -->
					               <h2> CS 601 </h2>
					            </div>
					            </div>
					            </a>
					         </div>
							</div>
						</div>
						<div class="col-sm-3 col-xs-4">
							<div id="tile4" class="tile">
					    	 
					        <div class="carousel slide" data-ride="carousel">
					          <!-- Wrapper for slides -->
					           <a href="../controller/QuickSearch.php?search_name_subject=Computer_Networks">
					          <div class="carousel-inner">
					            <div class="item active">
					                <h2> Computer Networks </h2>
					            </div>
					            <div class="item">
					              <!--  <img src="" class="img-responsive"/> -->
					               <h2> CS 641 </h2>
					            </div>
					            </div>
					            </a>
					         </div>
							</div>
						</div>
					</div>

					<!-- second row -->

					<div>
					    <div class="col-sm-3 col-xs-4">
					    	<div id="tile5" class="tile">
					        
					         <div class="carousel slide" data-ride="carousel">
					          <!-- Wrapper for slides -->
					           <a href="../controller/QuickSearch.php?search_name_subject=Embedded_Systems">
					          <div class="carousel-inner">
					            <div class="item active">
					                <h2> Embedded Systems </h2>
					            </div>
					            <div class="item">
					               <!-- <img src="" class="img-responsive"/> -->
					                <h2> CS 684 </h2>
					            </div>
					          </div>
					          </a>
					        </div>
					         
					    	</div>
						</div>
						<div class="col-sm-3 col-xs-4">
							<div id="tile6" class="tile">
					    	 
					         <div class="carousel slide" data-ride="carousel">
					          <!-- Wrapper for slides -->
					           <a href="../controller/QuickSearch.php?search_name_subject=Database_Systems">
						          <div class="carousel-inner">
						            <div class="item active">
						                <h2> Database Systems </h2>
						            </div>
						            <div class="item">
						              <!-- <img src="" class="img-responsive"/> -->
						               <h2> CS 631  </h2>
						            </div>
						          </div>
						        </a>
					        </div>
					         
							</div>
						</div>
						<div class="col-sm-3 col-xs-4">
							<div id="tile7" class="tile">
					    	 
					        <div class="carousel slide" data-ride="carousel">
					          <!-- Wrapper for slides -->
					          <a href="../controller/QuickSearch.php?search_name_subject=Computer_Graphics">
					          <div class="carousel-inner">
					            <div class="item active">
					                <h2> Computer Graphics </h2>
					            </div>
					            <div class="item">
					               <!-- <img src="" class="img-responsive"/> -->
					                <h2> CS 663 </h2>
					            </div>
					            </div>
					            </a>
					         </div>
							</div>
						</div>
						<div class="col-sm-3 col-xs-4">
							<div id="tile8" class="tile">
					    	 
					        <div class="carousel slide" data-ride="carousel">
					          <!-- Wrapper for slides -->
					           <a href="../controller/QuickSearch.php?search_name_subject=Other">
					          <div class="carousel-inner">
					            <div class="item active">
					                <h2> Others </h2>
					            </div>
					            <div class="item">
					              <!--  <img src="" class="img-responsive"/> -->
					               <h2> Others </h2>
					            </div>
					            </div>
					            </a>
					         </div>
							</div>
						</div>
					</div>
			</div>
	</div>


  	<div class="tab-content">
		<div id="nav_add" class="tab-pane fade <?php if (!strcmp($show,'nav_add')) echo 'in active'; ?> ">
			
				<h3 class="text-center"> Add Book </h3>
		
				<form class="form" action="../controller/search.php" method="POST"  onsubmit="return validateAdd()" enctype="multipart/form-data">
				
					<div class="control-group form-group col-md-6" id="control_add_name_book">
						<label> Book Name: </label>
						<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="required" id="add_name_book" name="add_name_book" placeholder="Enter Book Name"> 
					</div>
				
					<div class="control-group form-group col-md-6" id="control_add_name_author">
						<label> Author Name: </label>
						<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="required" id="add_name_author" name="add_name_author" placeholder="Enter Author Name">
					</div> 
					<div class="control-group form-group col-md-6" id="control_add_subject" >
						<label> Subject: </label>
						<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="enter 'Others' if no subject" id="add_name_subject"  name="add_name_subject" placeholder="Enter Subject Name">
					</div> 				
					
					<!-- <div class="hidden-sm hidden-md hidden-xs"> <br> </div> -->
					<div class="control-group form-group col-md-6" id="control_add_content">
						<label> Content: </label>
						<input type="file" class="form-control" data-toggle="tooltip" data-placement="top" title="required,only pdf/txt files" id="add_content" name="add_content" value="Upload File">
					</div> 
				
					<br/>
					<br/>
					
					<div class="form-group  col-md-6">
						<input type="submit" class="btn btn-info" id="add_button" name="add_button" value="Add Book">
					</div> 
					
				
				</form>
			</div>
	</div>


    
		<!-- Search Section -->
		<div class="tab-content">
			<div id="nav_search" class="tab-pane fade <?php if (!strcmp($show,'nav_search')) echo 'in active'; ?> ">
		
				<h3  class="text-center"> Search Book </h3>
		
				<form class="form"  action="../controller/search.php" method="POST" onsubmit="return validateSearch()">
					<div class="form-group col-md-6">
						<label> Book Name: </label>
						<input type="text" class="form-control  col-md-6" name="search_name_book" placeholder="Enter Book Name"> 
					</div>
					<div class="form-group  col-md-6">
						<label> Author Name: </label>
						<input type="text" class="form-control" name="search_name_author" placeholder="Enter Author Name">
					</div> 
					<div class="form-group  col-md-6">
						<label> Subject: </label>
						<input type="text"  class="form-control" name="search_name_subject" placeholder="Enter Subject Name">
					</div> 
					<div class="control-group form-group col-md-6" id="control_content">
						<label> Content: </label>
						<input type="text" id="search_content" data-toggle="tooltip_search_content" title="use a keyword of length atleast 4 characters"  class="form-control" name="search_content" placeholder="Enter Content">
					</div> 
					<br/>
					<br/>
					<div class="form-group  col-md-6" >
						<input type="submit"  id="search_button" class="btn btn-info" name="search_button" value="Search Book">
					</div> 
				</form>	

		
			</div>
		</div>

</div>
<footer class="footer text-center" style="background-color: #DCDCDC">
 
<div class="container">
			  <span class="glyphicon glyphicon-copyright-mark"></span> 2016
</div>

</footer>


<script>

	// $(document).ready(function(){
	//     $('[data-toggle="tooltip"]').tooltip(); 
	// });



 	function validateAdd(){
 		
 	
 	var ok=1;
		if($("#add_name_book").val().length<=0){
			$("#control_add_name_book").addClass("has-error");
			$("#add_name_book").popover('show');
			ok=0;
		}
		else{
			$("#control_add_name_book").removeClass("has-error");
			$("#add_name_book").popover('hide');
		}

		if($("#add_name_author").val().length==0){
			$("#control_add_name_author").addClass("has-error");
			$("#add_name_author").popover('show');
			ok=0;
		}
		else{
			$("#control_add_name_author").removeClass("has-error");
			$("#add_name_author").popover('hide');
		}

		if($("#add_content").val().length==0){
			$("#control_add_content").addClass("has-error");
			$("#add_content").popover('show');
			ok=0;
		}
		else{
				var filename=document.getElementById("add_content").value;
		        var ext=filename.split('.').pop();
		        // window.alert(ext);
		        if(ext == "pdf" || ext == "txt" ){
		        	$("#control_add_content").removeClass("has-error");
		        	$("#add_content").popover('hide');		           
		        }
		        else{
    	       		$("#control_add_content").addClass("has-error");
    				$("#add_content").popover('show');   
    				ok=0; 
		        }		
		}

		if($("#add_name_subject").val().length==0){
			$("#control_add_subject").addClass("has-error");
			$("#add_name_subject").popover('show');
			ok=0;
		}
		else{
			$("#control_add_subject").removeClass("has-error");
			$("#add_name_subject").popover('hide');
		}


		if(ok==1){
			return true;
		}
		return false;

	}

	function validateSearch(){
 	
		var search_key=document.getElementById("search_content").value;
		 
		if(search_key.length>0){	
			if(search_key.length<4){
					
				$("#control_content").addClass("has-error");

			    $('[data-toggle="tooltip_search_content"]').tooltip(); 
				 return false;
			}
		}
		return true;
	}


	$('#nav_menu a').click(function (e) {
	    //console.log('clicked '+this);
	     var target_pane=$(this).attr('href');
	     
	        if(target_pane=='#nav_search'){
	        	$('#nav_search').show();
	        	$('#nav_add').hide();
	        	$('#home').hide();
	        }
	        else if(target_pane=='#nav_add'){
	        	$('#nav_search').hide();
	        	$('#nav_add').show();
	        	$('#home').hide();
	        }
	        else{
	        	$('#nav_search').hide();
	        	$('#nav_add').hide();
	        	$('#home').show();
	        }

	});



</script>
	</body>

</html>