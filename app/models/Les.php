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


        $this->db->query("SELECT Mankement.Id
                                 ,Mankement.AutoId
                                 ,Mankement.Datum
                                 ,Mankement.Mankement
                                 ,Instructeur.Naam
                                 ,Instructeur.Email
                                 ,Auto.Kenteken
                                 ,Auto.Type
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

    public function getTopicsLesson()
    {
        $this->db->query("SELECT *
                          FROM Mankement
                          INNER JOIN Auto
                                 ON Mankement.AutoId = Auto.Id
                                 INNER JOIN Instructeur
                                 ON Auto.InstructeurId = Instructeur.Id
                                 WHERE Instructeur.Id = 2");
      

        $result = $this->db->resultSet();

        return $result;



    }


    public function addTopic($post) 
    {
        $sql = "INSERT INTO Mankement  (AutoId                                        
                                      ,Datum
                                      ,Mankement)
                VALUES                (2
                                       ,'2023-01-09'
                                       ,:Mankement)";

        $this->db->query($sql);
       // $this->db->bind(':lesId', $post['lesId'], PDO::PARAM_INT);
       // $this->db->bind(':topic', $post['topic'], PDO::PARAM_STR);
        $this->db->bind(':Mankement', $post['mankement'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}




