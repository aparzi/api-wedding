<?php


namespace controller;

use dto\Partecipazione;
use dto\Result;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use service\ConfigurazioneService;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use utils\JsonUtils;

class MailController
{

    private $email;
    private $configurazioneService;

    /**
     * MailController constructor.
     * @param $configurazioneService
     */
    public function __construct(ConfigurazioneService $configurazioneService)
    {
        $this->configurazioneService = $configurazioneService;
        $this->email = new PHPMailer(true);
    }

    public function sendEmail(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();
        $partecipazione = new Partecipazione($body['fullname'],$body['reply'],$body['description']);
        try {
            $this->configSmtp();

            //From and Recipients
            $this->email->setFrom($this->configurazioneService->getValoreByChiave("smtp.username.gmail"));
            $recipients = $this->configurazioneService->getValoreByChiave("email.recipients");
            foreach (explode(";", $recipients) as $recipient)
            {
                $this->email->addAddress($recipient);

            }

            // Content
            $this->email->isHTML(true); // Set email format to HTML
            $this->email->Subject = 'Wedding - Partecipazione: ' . $partecipazione->getFullname();
            $this->email->Body = 'Una nuova risposta di partecipazione è arrivta, di seguito i dettagli: <br><br>
                                <b>Nome e Cognome</b>: ' . $partecipazione->getFullname() . '<br>
                                <b>Risposta</b>: ' . $partecipazione->getReply() . '<br>
                                <b>Dettagli Aggiuntivi</b>: ' . $partecipazione->getDescription();

            $this->email->send();
            return JsonUtils::buildJsonResponse($response, new Result(true, 'OK'));
        } catch (Exception $e) {
            return JsonUtils::buildJsonResponse($response, new Result(false, $e->getMessage()));
        }
    }

    private function configSmtp()
    {
        // $this->email->SMTPDebug = 2; // Enable verbose debug output
        $this->email->isSMTP();  // Set mailer to use SMTP
        $this->email->SMTPAuth = true;  // Enable SMTP authentication
        $this->email->Host = $this->configurazioneService->getValoreByChiave("host.smtp.gmail"); // Specify main and backup SMTP servers
        $this->email->SMTPSecure = $this->configurazioneService->getValoreByChiave("smtp.secure.gmail"); // Enable TLS encryption, `ssl` also accepted
        $this->email->Username = $this->configurazioneService->getValoreByChiave("smtp.username.gmail"); // SMTP username
        $this->email->Password = $this->configurazioneService->getValoreByChiave("smtp.password.gmail"); // SMTP password
        $this->email->Port = $this->configurazioneService->getValoreByChiave("smtp.port"); // TCP port to connect to

        return $this->email;
    }

}