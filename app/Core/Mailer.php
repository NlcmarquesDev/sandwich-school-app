<?php

declare(strict_types=1);

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;





class Mailer
{
    public $phpmailer;

    public function __construct()
    {
        $this->phpmailer = new PHPMailer();
        $this->phpmailer->isSMTP();
        $this->phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $this->phpmailer->SMTPAuth = true;
        $this->phpmailer->Port = 2525;
        $this->phpmailer->Username = '5119476a853dc6';
        $this->phpmailer->Password = 'cf10744255e4da';


        $this->phpmailer->isHTML(true);
    }


    public function buildEmail($from, $to)
    {
        // dd($params);
        $this->phpmailer->setFrom($from);
        $this->phpmailer->addAddress($to);
    }
    public function forResetPassword($params = array())
    {
        $this->phpmailer->Subject = 'Vdab Broodjes App - Reset Password';
        $this->phpmailer->Body    = '
        Hallo,
        <br/><br/><br/>
        Your new password is <b>' . $params['newPass'] . '</b>
        <br/><br/><br/>
         Click <a href="http://localhost:8888/broodjes_app/reset-password?token=' . $params['resetToken'] . '">here</a> to confirm your new password
        ';
    }

    public function forValidateRegistration($params = array())
    {
        $this->phpmailer->Subject = 'Vdab Broodjes App - Validation Email';
        $this->phpmailer->Body    = '
        Hallo,
        <br/><br/><br/>
         Click <a href="http://localhost:8888/broodjes_app/validate-email?token=' . $params['token'] . '">here</a> to confirm your email address
        ';
    }
    public function send()
    {
        $this->phpmailer->send();
    }
    public function errors()
    {
        return $this->phpmailer->ErrorInfo;
    }
}
