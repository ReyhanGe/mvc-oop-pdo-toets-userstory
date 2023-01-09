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
       
        
       $this->db->query("SELECT instructeur.Naam
                                ,instructeur.Email
                                ,auto.Kenteken
                                ,mankement.Datum
                                ,mankement.Mankement
                          FROM auto
                          INNER JOIN auto
                          ON instructeur.Id = auto.InstructeurId
                          INNER JOIN mankement
                          ON auto.Id =mankement.AutoId
                          WHERE auto.Id = :Id
                          
                          ORDER BY Datum DESC
                          ");
        
        $this->db->bind(':Id', 2);

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