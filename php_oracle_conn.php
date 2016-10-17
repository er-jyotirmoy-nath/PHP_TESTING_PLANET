<?php
    $user='root'; // Enter your DB User Name.
    $pass=''; // Enter your DB Password.
    $dataBaseName='webexpertdeveloper'; // Enter your Database Name.
    $dbh = new PDO('OCI:dbname='.$dataBaseName.'charset=UTF-8', $user, $pass);
    echo "Connection Successful";
?>

//or

<?php
    try
    {
        $user='root'; // Enter your DB User Name.
        $pass=''; // Enter your DB Password.
        $dataBaseName='webexpertdeveloper'; // Enter your Database Name.
        $dbh = new PDO('OCI:dbname='.$dataBaseName.'charset=UTF-8', $user, $pass);
        echo "Connection Successful";
    }
    catch (PDOException $e)
    {
        print "Error!: " . $e->getMessage() . "
";
        die();
    }
?>

//or

<?php
    try
    {
        $user='root'; // Enter your DB User Name.
        $pass=''; // Enter your DB Password.
        $dataBaseName='webexpertdeveloper'; // Enter your Database Name.
        $dbh = new PDO('OCI:dbname='.$dataBaseName.'charset=UTF-8', $user, $pass,);
        echo "Connection Successful";
                $dbh = null; // It Will Close the connection
    }
    catch (PDOException $e)
    {
        print "Error!: " . $e->getMessage() . "
";
        die();
    }
?>
