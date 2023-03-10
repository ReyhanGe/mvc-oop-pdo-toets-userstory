<?php

class Lessen extends Controller
{

    public function __construct()
    {
        $this->lesModel = $this->model('Les');
    }

    public function index()
    {
        $result = $this->lesModel->getLessons();

        // var_dump($result);
        $rows = '';

        $rows1 = '';

        foreach ($result as $info) {
            $d = new DateTimeImmutable($info->Datum, new DateTimeZone('Europe/Amsterdam'));
            $rows .= "<tr>
                        

                        <td>{$d->format('d-m-Y')}</td>
                        <td>$info->Mankement</td>
                        
                    </tr>";

            $rows1 = " Auto van Instructeur: $info->Naam <br>
                    Email: $info->Email <br>
                    Kenteken: $info->Kenteken <br>
                    Type: $info->Type <br>
        ";
                                                        
        }

        $data = [
            'title' => "Overzicht Mankementen ",
            'rows' => $rows,
            'rows1' => $rows1

        ];
        $this->view('lessen/index', $data);
    }

    function topicsLesson($lesId)
    {
        $result = $this->lesModel->getTopicsLesson($lesId);

        // var_dump($result);

        $rows = "";
        foreach ($result as $mankement) {
            $rows .= "<tr>      
                        <td>$mankement->Mankement</td>
                      </tr>";
        }


        $data = [
            'title' => 'Invoeren Mankement',
            'rows'  => $rows,
            'lesId' => $lesId,

        ];
        $this->view('lessen/topicslesson', $data);
    }

    function addTopic($lesId = NULL)
    {
        $data = [
            'title' => 'Voer In ',
            'lesId' => $lesId,
            'topicError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => 'Voer In ',
                'lesId' => $_POST['lesId'],
                'mankement' => $_POST['mankement'],
                'topicError' => ''
            ];

            $data = $this->validateAddTopicForm($data);

            if (empty($data['topicError'])) {
                $result = $this->lesModel->addTopic($_POST);

                if ($result) {
                    $data['title'] = "<p>???Het nieuwe mankement is toegevoegd</p>";
                } else {
                    echo "<p>???De nieuwe mankement is niet toegevoegd, probeer het opnieuw</p>";
                }
                header('Refresh:3; url=' . URLROOT . '/lessen/index');
            } else {
                header('Refresh:3; url=' . URLROOT . '/lessen/addTopic/' . $data['lesId']);
            }
        }
        $this->view('lessen/addTopic', $data);
    }

    private function validateAddTopicForm($data)
    {
        if (strlen($data['mankement']) > 50) {
            $data['topicError'] = "???Het nieuwe mankement is meer dan 50 tekens lang en is niet toegevoegd,
            probeer het opnieuw.";
        } elseif (empty($data['mankement'])) {
            $data['topicError'] = "U bent verplicht dit veld in te vullen.";
        }

        return $data;
    }
}
