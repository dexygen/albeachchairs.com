<?php
require_once('../jrmvc.lib.php');

class ReservationFormController extends AbstractJrMvcController {  
    function applyInputToModel() {
        $payload = json_decode(file_get_contents('php://input'), true);
		
        $to = "albeachchairs@gmail.com, jemptymethod@gmail.com";
        $subject = "Inquiry from albeachchairs.com from: " . $payload["firstName"];

        $message = print_r($payload, true);
        $mail_success = mail($to, $subject, $message);

        $mto = new class(JrMvcMTO::NULL_TPL) extends JrMvcMTO {
            function onNullTemplate() {
                echo json_encode($this->model);
            }
        };
		
		$mto->setModelValue("mail_success", $mail_success ? 1 : 0);
		return $mto;
    }
}

ReservationFormController::sendResponse(new ReservationFormController());