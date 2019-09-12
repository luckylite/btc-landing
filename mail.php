<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'core/PHPMailer/src/Exception.php';
require 'core/PHPMailer/src/PHPMailer.php';
require 'core/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 2;
    $mail->Host       = 'smtp.ffox.site';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'admin@vlad9lucky.ffox.site';
    $mail->Password   = 'abcv1234';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('admin@vlad9lucky.ffox.site', 'BTC Landing');
    $mail->addAddress('clack.logo@gmail.com', 'Директор');

    $mail->isHTML(true);
    $mail->Subject = 'Поступила новая заявка';
    $mail->Body    = '<table style="border-collapse: collapse;font-family: Arial, Tahoma, sans-serif;">
                        <tr>
                            <th style="border: 1px solid #000;padding: 5px;">ФИО</th>
                            <th style="border: 1px solid #000;padding: 5px;">Почта</th>
                            <th style="border: 1px solid #000;padding: 5px;">Телефон</th>
                            <th style="border: 1px solid #000;padding: 5px;">Страна</th>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #000;padding: 5px;">'.$_POST['fio'].'</td>
                            <td style="border: 1px solid #000;padding: 5px;">'.$_POST['email'].'</td>
                            <td style="border: 1px solid #000;padding: 5px;">'.$_POST['phone'].'</td>
                            <td style="border: 1px solid #000;padding: 5px;">'.$_POST['country'].'</td>
                        </tr>
                    </table>';

    $mail->send();
    echo 'ok';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}