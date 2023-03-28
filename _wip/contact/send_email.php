<?php
require_once('../jrmvc.lib.php');

class ContactEmailController extends AbstractJrMvcController {  
    function applyInputToModel() {
        $mto = new class(JrMvcMTO::NULL_TPL) extends JrMvcMTO {
            function onNullTemplate() {
                echo json_encode($this->model);
            }
        };

        $payload = json_decode(file_get_contents('php://input'), true);
        $name = $payload["name"];
        $email = $payload["email"];

        $to = "albeachchairs@gmail.com, jemptymethod@gmail.com";
        $subject = "Inquiry from albeachchairs.com from $name";
        $message = "Email: $email";

        $mail_success = mail($to, $subject, $message);
        $mto->setModelValue("mail_success", $mail_success ? 1 : 0);
        return $mto;
    }
}

ContactEmailController::sendResponse(new ContactEmailController());
?>