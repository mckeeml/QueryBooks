<!DOCTYPE html>

<!-- booksdb_oo.php -->
<!-- Querying a database and displaying the results. -->
<!-- Using the mysqli API - Object Oriented Style -->

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
$selection = ($_POST['bookselection']);
$authorselection = ($_POST['authorselection']);
$displayform = TRUE;
if ($selection=='Select' & $authorselection=='Select'){
    echo 'You must select one of the options';
    $displayform = FALSE;
}
else if ($selection!='Select' & $authorselection!='Select'){
    echo 'You can only choose on of the options';
    $displayform = FALSE;
}
else{
    require_once 'login.php';
    //Connect to MySQL Server: create a new object named $dbConnection
    $dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    //Check the status of the connection:

    if ($dbConnection->connect_error) { //-> specifies a property of an Object
        //If connect_error (a property of the $dbConnection object) has a value then an error happened
        die( "Could not connect to the database server: " .
            "Error no." . $dbConnection->connect_errno .
            "</body></html>" );
        /*
           The -> operator indicates that the item on the right is a property or method
           of the object on the left. In this case, if connect_error has a value, then
           there was an error.
           die () : quit or exit the program completely after displaying the error number and the actual error
        */
    }
    // Build a SELECT query:
    if($selection!='Select'){
        $query = "SELECT $selection FROM books";

        // Query the database:
        if ( !( $result = $dbConnection->query($query) ) )
        {
            print( "<p>Could not execute query!</p>" );
            die( $dbConnection->error . "</body></html>" );
        }
    }
    else{
        $query = "SELECT books.Title, authors.Name FROM books, authors, books_authors Where books.id = books_authors.bid and authors.id = books_authors.aid And authors.Name='$authorselection'";

        // Query the database:
        if ( !( $result = $dbConnection->query($query) ) )
        {
            echo $authorselection;
            print( "<p> made it here Could not execute query!</p>" );
            die( $dbConnection->error . "</body></html>" );
        }
    }
}		 // end if
/*
 If all went okay, all data returned by MySQL is now stored in the $result object.
*/

if ($displayform){
    ?>
    <!-- end PHP script -->
    <table>
        <caption>Results of <?php print( "$query" ) ?> </caption>

        <?php
        // Fetch each record in the result set by iterating through each record
        while ( $row = $result->fetch_array(MYSQLI_NUM) )
        {
            // build table to display results
            print( "<tr>" );

            foreach ( $row as $value )
                print( "<td>$value</td>" );
            print( "</tr>" );
        }

        /*
            Your options for fetching data - based on the param passed to the fetch_array method:
                MYSQLI_NUM: returned results are stored in a regular array
                MYSQLI_ASSOC: returned results are stored in an associative array
                MYSQLI_BOTH: returned results are stored in either or both types of arrays

            Try:
            $rows = $result->num_rows;
            for ($index = 0 ; $index < $rows ; $index++){
                $result->data_seek($index);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                echo 'Title: ' . $row['Title'] . '<br>';
            }
        */
        ?>
    </table>
    <!-- Display number of rows -->
    <p>Your search yielded
        <?php print( $result->num_rows) ?> results.

        <?php
        //Release the returned data to free mysql resources
        $result->close();

        //Close the database connection - free the memory you have been using
        $dbConnection->close();
        ?>
    </p>
    <?php
}
?>
</body>
</html>

