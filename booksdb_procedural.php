<!DOCTYPE html>

<!-- booksdb_procedural.php -->
<!-- Querying a database and displaying the results. -->
<!-- Using the mysqli API - Procedural Style -->

<html>
   <head>
      <meta charset = "utf-8">
      <title>Search Results</title>
   <style type = "text/css">
         body  { font-family: sans-serif;
                 background-color: lightyellow; } 
         table { background-color: lightblue; 
                 border-collapse: collapse; 
                 border: 1px solid gray; }
         td    { padding: 5px; }
         tr:nth-child(odd) {
                 background-color: white; }
      </style>
   </head>
   <body>
      <?php
	     require_once 'login.php'; 
         // Connect to MySQL Server
		 $dbConnection = mysqli_connect( $dbHost, $dbUser, $dbPassword, $dbName);
		 
		 if ( mysqli_connect_errno() ) {// if the connection in previous statement failed:
            die( "Could not connect to the database server: " .
				  mysqli_connect_error() . " " . "</body></html>" );
			//die() : quit or exit the program completely after displaying the error3 and the actual error
		}
         // Build a SELECT query
         $query = "SELECT Title, Price, ISBN FROM books WHERE Price > 100";
         
		 // Query the database
         if ( !( $result = mysqli_query($dbConnection, $query) ) ) 
         {
            print( "<p>Could not execute query!</p>" );
            die( mysqli_error($dbConnection) . "</body></html>" );
         } // end if
		 /*
		  If all went okay, all data returned by MySQL is now stored in the $result object.
		 */
      ?>
	  <!-- end PHP script -->
      <table>
         <caption>Results of <?php print( "$query" ) ?> </caption>
         <?php
            // Fetch each record in the result set by iterating through each record
			// mysqli_fetch_row: returns an array that contains an entire row. so, $row is an array
            while ( $row = mysqli_fetch_row($result) ) 
            {
               // build table to display results
               print( "<tr>" );
			   
               foreach ( $row as $value ) 
                  print( "<td>$value</td>" );
				  print( "</tr>" );
            } 
		     
		/* 
			Your options for fetching data:			
				mysqli_fetch_row: returned results stored in a regular array
				mysqli_fetch_assoc: returned results stored in an associative array
				mysqli_fetch_array: returned results stored in either or both types of arrays
			
			Try:
			$row = mysqli_fetch_assoc($result);
			var_dump ($row);
			echo $row["isbn"];
		*/
         ?>
      </table>
	  <!-- Display number of rows -->
      <p>Your search yielded 
         <?php print( mysqli_num_rows( $result ) ) ?> results.
		 
		 <?php
	  	  //Release the returned data to free mysql resources
		  mysqli_free_result($result);
		  		
		//Close the database connection - - free the memory you have been using
         mysqli_close( $dbConnection );
		 ?> 
	  </p>
   </body>
</html>

