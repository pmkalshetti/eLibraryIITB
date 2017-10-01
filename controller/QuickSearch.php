<?php


	function getBookId($connection)
	{
		///>--------------------------- Table -> books -------------------------<///
		// select statement
		$stmt_select = $connection -> prepare("SELECT id_book FROM books WHERE name_book = :name_book");

		// bind parameters
		$stmt_select -> bindParam(':name_book', $_POST['add_name_book'], PDO::PARAM_INT);

		// execute query
		$stmt_select -> execute();

		// get rows
		$rows = $stmt_select -> fetchAll(PDO::FETCH_ASSOC);

		// return book id
		if ($rows) {
			return $rows[0]['id_book'];
		}

		// if book absent
		return -1;
	}

	function getAuthorId($connection)
	{
		///>--------------------------- Table -> authors -----------------------<///
		// select statement
		$stmt_select = $connection -> prepare("SELECT id_author FROM authors WHERE name_author = :name_author");

		// bind parameters
		$stmt_select -> bindParam(':name_author', $_POST['add_name_author'], PDO::PARAM_STR);

		// execute query
		$stmt_select -> execute();

		// get rows
		$rows = $stmt_select -> fetchAll(PDO::FETCH_ASSOC);

		// return author id
		if ($rows) {
			return $rows[0]['id_author'];
		}

		// if author absent
		return -1;
	}


	function getSubjectId($connection)
	{
		///>--------------------------- Table -> subjects -----------------------<///
		// select statement
		$stmt_select = $connection -> prepare("SELECT id_subject FROM subjects WHERE name_subject = :name_subject");

		// bind parameters
		$stmt_select -> bindParam(':name_subject', $_POST['add_name_subject'], PDO::PARAM_STR);

		// execute query
		$stmt_select -> execute();

		// get rows
		$rows = $stmt_select -> fetchAll(PDO::FETCH_ASSOC);

		// return subject id
		if ($rows) {
			return $rows[0]['id_subject'];
		}

		// if subject absent
		return -1;
	}

	function searchBook($connection)
	{
		// select statement
		$stmt_select = $connection -> prepare("SELECT B.id_book, name_book, content,
																					GROUP_CONCAT(DISTINCT name_author ORDER BY name_author ASC SEPARATOR ', ') name_authors,
																					GROUP_CONCAT(DISTINCT name_subject ORDER BY name_subject ASC SEPARATOR ', ') name_subjects
																					FROM books as B 
																					INNER JOIN books_authors as BA ON B.id_book = BA.id_book
																					INNER JOIN authors as A ON BA.id_author = A.id_author
																					INNER JOIN books_subjects as BS ON B.id_book = BS.id_book
																					INNER JOIN subjects as S ON BS.id_subject = S.id_subject
																					WHERE name_book LIKE :name_book AND 
																					name_author LIKE :name_author AND 
																					name_subject LIKE :name_subject																					
																					GROUP BY B.id_book");

		//add appropriate wildcards for matching
		$name_book = '%' . "" . '%';
		$name_author = '%' . "" . '%';
		$name_subject = '%' . $_GET['search_name_subject'] . '%';
		$content = "";

		// handle empty keyword search case
		if (!empty($_POST['search_content'])) {
			// select statement
			$stmt_select = $connection -> prepare("SELECT B.id_book, name_book, content,
																					GROUP_CONCAT(DISTINCT name_author ORDER BY name_author ASC SEPARATOR ', ') name_authors,
																					GROUP_CONCAT(DISTINCT name_subject ORDER BY name_subject ASC SEPARATOR ', ') name_subjects
																					FROM books as B 
																					INNER JOIN books_authors as BA ON B.id_book = BA.id_book
																					INNER JOIN authors as A ON BA.id_author = A.id_author
																					INNER JOIN books_subjects as BS ON B.id_book = BS.id_book
																					INNER JOIN subjects as S ON BS.id_subject = S.id_subject
																					WHERE name_book LIKE :name_book AND 
																					name_author LIKE :name_author AND 
																					name_subject LIKE :name_subject AND
																					MATCH(content) AGAINST(:content IN BOOLEAN MODE)																	
																					GROUP BY B.id_book");

			$stmt_select -> bindParam(':content', $content, PDO::PARAM_STR);
		}

		// bind parameters
		$stmt_select -> bindParam(':name_book', $name_book, PDO::PARAM_STR);
		$stmt_select -> bindParam(':name_author', $name_author, PDO::PARAM_STR);
		$stmt_select -> bindParam(':name_subject', $name_subject, PDO::PARAM_STR);
		

		// execute query
		$stmt_select -> execute();

		// get rows
		$rows = $stmt_select -> fetchAll(PDO::FETCH_ASSOC);



		// display table
		printf("
		<div class=\"col-xs-12\">
			<table class=\"table table-striped table-bordered\">
				<tr>
					 <th> Book Name </th> <th> Authors </th> <th> Subjects </th> <th> Download Books </th>
				</tr>");
				foreach($rows as $row) {
					// get all files in the directory
					$file = glob('../data/' . $row['id_book'] . '.*');
					
					echo "<tr class=\"info\">";
						// echo "<td>" . $row['id_book'] . "</td>" .
							echo "<td>" . $row['name_book'] . "</td>" .
								 "<td>" . $row['name_authors'] . "</td>" .
								 "<td>" . $row['name_subjects'] . "</td>" .
								 "<td>" . "<form action=". $file[0]  ." method=\"POST\">
           										<button class=\"btn btn-info\" type=\"submit\">
           										<span class=\"glyphicon glyphicon-download-alt\" aria-hidden=\"true\"></span></button>
       											</form>" . "</td>";
					echo "</tr>";
				}
		printf("
			</table>
		</div>");
	}

	function performOperation()
	{
		// Credentials
		$MySQL_server_name = "localhost";
		$MySQL_username = "root";
		$MySQL_password = "";
		$MySQL_dbname = "cs699_project";

		// Perform operations on database
		try {
			// connect to databse
			$connection = new PDO("mysql:host=$MySQL_server_name;dbname=$MySQL_dbname", $MySQL_username, $MySQL_password);
			$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				searchBook($connection);
		}
		catch(PDOException $exception_pdo) {
			echo "Connection Failed: " . $exception_pdo -> getMessage();
		}
	}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>
			Book Management System
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">        
		<script src="../bootstrap/js/bootstrap.min.js"></script>

		<style>
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
          <a class="navbar-brand" href="../view/index.php">Book Management System</a>
        </div>
         <div id="navbar" class="collapse navbar-collapse">
          <ul id="nav_menu" class="nav navbar-nav">
             	<li><a href="../view/index.php?show=home"><strong>Home</strong></a></li>   
			    <li><a href="../view/index.php?show=nav_search"  data-toggle="tab"><strong>Search</strong></a></li>
			    <li><a href="../view/index.php?show=nav_add" data-toggle="tab"><strong>Add</strong></a></li>
     
          </ul>
        </div>
      </div>
    </nav>		

	<div id="content" class="col-md-12 table-responsive" style="display: flex;">	
			<?php performOperation(); ?>
	</div>

<footer class="footer text-center" style="background-color: #DCDCDC">
 
<div class="container">
			  <span class="glyphicon glyphicon-copyright-mark"></span> 2016
</div>

</footer>

</body>

<script>

	// $(document).ready(function(){
	//     $('[data-toggle="tooltip"]').tooltip(); 
	// });

	// $('#nav_menu a').click(function (e) {
	//     //console.log('clicked '+this);
	//      var target_pane=$(this).attr('href');
	     
	//         if(target_pane=='#nav_search'){
	//         	$('#nav_search').show();
	//         	$('#nav_add').hide();
	//         	$('#home').hide();
	//         }
	//         else if(target_pane=='#nav_add'){
	//         	$('#nav_search').hide();
	//         	$('#nav_add').show();
	//         	$('#home').hide();
	//         }
	//         else{
	//         	$('#nav_search').hide();
	//         	$('#nav_add').hide();
	//         	$('#home').show();
	//         }

	// });



</script>

</html>