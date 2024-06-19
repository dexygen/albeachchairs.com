<?php
require_once('../jrmvc.lib.php');

class ReservationFormController extends AbstractJrMvcController {  
    function applyInputToModel() {
        $payload = json_decode(file_get_contents('php://input'), true);
		
        $to = "albeachchairs@gmail.com, jemptymethod@gmail.com";
        $subject = "Inquiry from albeachchairs.com from: " . $payload["firstName"];

        $message = print_r($payload, true);
        $mail_success = mail($to, $subject, $message);



		$confTo = $payload["email"];
        $confSubject = "Your reservation with Alabama Beach Chairs!";
		
		$confReservationType = " ";
		$confCondoSuffix = "";
		
		if ($payload["reservationType"] == "DELIVERY") {
			$confReservationType .= "delivery ";
		}
		else if ($payload["reservationType"] == "CONDO") {
			$confCondoSuffix = " at " . $payload["condominium"];
		}
		
		$confirmMailMsg = <<<MSG
Thank you for your upcoming{$confReservationType}reservation with Alabama Beach Chairs{$confCondoSuffix}!

You will soon receive a secure link to pay for and confirmirm your reservation. 
We accept all major credit or debit cards, Apple Pay, Google Pay or Cash App! 
If reserving late in the evening, your link will be sent to you first thing the next morning. 

PLEASE DO NOT REPLY TO THIS EMAIL. 

Thanks again for your reservation request and we'll be in touch soon! 
MSG;
		
		$conf_mail_success = mail($payload["email"], "Your upcoming reservation with Alabama Beach Chairs", $confirmMailMsg);
		
		
		
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