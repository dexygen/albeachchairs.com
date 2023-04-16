<?php
require_once('../jrmvc.lib.php');

class ContactEmailController extends AbstractJrMvcController {  
    function applyInputToModel() {
        require_once('../_inc_property_details.php');
        $payload = json_decode(file_get_contents('php://input'), true);
        
        $name = $payload["name"];
        $email = $payload["email"];
        $property = $payload["property"];
        $startDate = $payload["startDate"];
        $duration = $payload["duration"];
        $other = $payload["other"];

        if (array_key_exists("delivery", $payload)) {
            $serviceType = "DELIVERY";
        }
        elseif ($property) {
            # only reach this if $property is not zero, the "placeholder"
            # $abcPropertyNamesAll had value unshifted onto front 
            # for properties select menu, so subtract 1 for correct index
            $serviceType = $abcPropertyNamesAll[$property - 1];
        }
        else {
            $serviceType = "Neither indicated";
        }

        $to = "jemptymethod@gmail.com";
        $subject = "Inquiry from albeachchairs.com from: $name";
        
        $messageLines = Array(
            "Email: $email",
            "Service: $serviceType",
            "Start Date: $startDate",
            "Duration: $duration",
            "Other: $other"
        );

        $message = join("\n", $messageLines);
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

ContactEmailController::sendResponse(new ContactEmailController());
?>