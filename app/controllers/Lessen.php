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
        foreach ($result as $info) {

            $rows .= "<tr>
                        <td>$info->Naam</td>
                        <td>$info->Naam</td>
                        <td><a href='" . URLROOT . "/lessen/topicslesson/{$info->Id}'><img src='" . URLROOT . "/img/b_snewtbl.png' alt='topiclist'></a></td>
                    </tr>";
        }

        $data = [
            'title' => "Overzicht Mankementen ",
            'rows' => $rows,

        ];
        $this->view('lessen/index', $data);
    }

    function topicsLesson($lesId)
    {
        $result = $this->lesModel->getTopicsLesson($lesId);

        // var_dump($result);

        $rows = "";
        foreach ($result as $topic) {
            $rows .= "<tr>      
                        <td>$topic->Onderwerp</td>
                      </tr>";
        }


        $data = [
            'title' => 'Invoeren Kilometerstand',
            'rows'  => $rows,
            'lesId' => $lesId,

        ];
        $this->view('lessen/topicslesson', $data);
    }

    function addTopic($lesId = NULL)
    {
        $data = [
            'title' => 'Voer In Kilometerstand',
            'lesId' => $lesId,
            'topicError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => 'Voer In Kilometerstand',
                'lesId' => $_POST['lesId'],
                'topic' => $_POST['topic'],
                'topicError' => ''
            ];

            $data = $this->validateAddTopicForm($data);

            if (empty($data['topicError'])) {
                $result = $this->lesModel->addTopic($_POST);

                if ($result) {
                    $data['title'] = "<p>De nieuwe kilometerstand is toegevoegd</p>";
                } else {
                    echo "<p>“De nieuwe kilometerstand is niet toegevoegd, probeer het opnieuw</p>";
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
        if (strlen($data['topic']) > 255) {
            $data['topicError'] = "Het nieuwe onderwerp bevat meer dan 255 letters.";
        } elseif (empty($data['topic'])) {
            $data['topicError'] = "U bent verplicht dit veld in te vullen.";
        }

        return $data;
    }
}
