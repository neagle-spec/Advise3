<?php

class DataLayer
{
    /** This field represents our database connection object
     * @var PDO
     */
    private $_dbh;

    /** DataLayer constructor
     *
     */
    function __construct()
    {
        //TODO: Move try-catch from config.php to here
        require_once $_SERVER['DOCUMENT_ROOT'].'/../config.php';
        // connect to the db
       //require '../config.php';
        $this->_dbh = $dbh;
        $this->_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    /**
     * Accepts student object and inserts its fields into database
     * @param $student
     * @return false|string
     */
    function insertStudent($student)
    {
        var_dump($student);

        //1. define the query
        $sql = "INSERT INTO student(id, advisor, quarter, year)
                VALUES(:id, :advisro, :quarter, :year)";

        //2. prepare statement
        $statement = $this->_dbh->prepare($sql);

        //3. bind parameters
        $id = $student->getID();
        $advisor = $student->getAdvisor();
        $quarter = $student->getQuarter();
        $year = $student->getYear();

        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        $statement->bindParam(':advisor', $advisor, PDO::PARAM_STR);
        $statement->bindParam(':quarter',$quarter, PDO::PARAM_STR);
        $statement->bindParam(':year',$year, PDO::PARAM_STR);

        //4. Execute the prepared statement
        $statement->execute();

        //5. Process the result
        $id = $this->_dbh->lastInsertId();
        echo "Row inserted: $id";
        return $id;
    }

    /**
     * gets students from database
     * @return array|false
     */
    function getID()
    {
        //1. Define the query
        $sql = "SELECT * FROM student";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the prepared statement
        $statement->execute();

        //5. Process the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        var_dump($result);
    }

    /**
     * Get member from database by id
     * @param $member_id
     * @return array|false
     */
    function getAdvisor($studentID)
    {
        //1. define the query
        $sql = "SELECT * FROM members WHERE id = $studentID";

        //2. prepare statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the prepared statement
        $statement->execute();

        //5. Process the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        var_dump($result);
    }

    /**
     * get quarter from database
     * @param $studentID
     * @return array|false
     */
    function getQuarter($studentID)
    {
        //1. define the query
        $sql = "SELECT age FROM members WHERE id = $studentID";

        //2. prepare statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the prepared statement
        $statement->execute();

        //5. Process the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        var_dump($result);
    }
}