<?php

class Les
{ 
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }    

    public function getLessons()
    {


        $this->db->query("SELECT Mankement.Id, 
                                 Mankement.AutoId, 
                                 Mankement.Datum, 
                                 Mankement.Mankement, 
                                 Instructeur.Naam AS INNA, Instructeur.Email 
                                 AS EM, Auto.Kenteken 
                                 AS AK, Auto.Type AS AT
                                 FROM Mankement 
                                 INNER JOIN Auto
                                 ON Mankement.AutoId = Auto.Id
                                 INNER JOIN Instructeur
                                 ON Auto.InstructeurId = Instructeur.Id
                                 WHERE Instructeur.Id = 2

                                 ORDER BY Datum DESC;");

       

        $result = $this->db->resultSet();

        return $result;
    }

    public function getTopicsLesson($lessonId)
    {
        $this->db->query("SELECT *
                          FROM Onderwerp
                          INNER JOIN Les
                          ON Les.Id = Onderwerp.LesId
                          WHERE LesId = :lessonId");
        $this->db->bind(':lessonId', $lessonId);

        $result = $this->db->resultSet();

        return $result;



    }

    public function addTopic($post) 
    {
        $sql = "INSERT INTO Onderwerp (LesId
                                      ,Onderwerp)
                VALUES                (:lesId
                                      ,:topic)";

        $this->db->query($sql);
        $this->db->bind(':lesId', $post['lesId'], PDO::PARAM_INT);
        $this->db->bind(':topic', $post['topic'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}