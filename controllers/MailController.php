<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous que l'autoload de Composer est inclus

class MailController
{
    private $mail;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/mail.php';
        $this->mail = new PHPMailer(true);

        // Configuration du serveur
        $this->mail->isSMTP();
        $this->mail->Host = $config['host'];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $config['username'];
        $this->mail->Password = $config['password'];
        $this->mail->SMTPSecure = $config['encryption'];
        $this->mail->Port = $config['port'];

        // Configuration de l'expéditeur
        $this->mail->setFrom($config['from_email'], $config['from_name']);
    }

    public function sendMail($to, $subject, $body)
    {
        try {
            // Destinataire
            $this->mail->addAddress($to);

            // Contenu de l'e-mail
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            // Envoi de l'e-mail
            $this->mail->send();
            echo 'L\'e-mail a été envoyé avec succès.';
        } catch (Exception $e) {
            echo "L'e-mail n'a pas pu être envoyé. Erreur: {$this->mail->ErrorInfo}";
        }
    }
}
