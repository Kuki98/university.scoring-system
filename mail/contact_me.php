<?php
require_once('mail/class.phpmailer.php');
require_once('mail/class.smtp.php');
require_once('_custom/_init.php');

class Mail
{
    private $contactMail = "ivank@curbsoft.com";
    //private $contactMail = "sales@curbsoft.com";
    
 
    function sendMailToUs($company,$title,$phoneCode,$phone,$email,$bilAddr,$city,$stRegProv,$postalCode,$country,$bilEmail,$prefURL){
        $to = $this->contactMail;
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Debugoutput = 'html';
        $mail->Host = CUSTOMER_MAIL_HOST;
        $mail->Port = 25;
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Username = CUSTOMER_MAIL_USERNAME;
        $mail->Password = CUSTOMER_MAIL_PASSWORD;
        $mail->setFrom('no-reply@curbsoft.com', 'Customer portral');
        $mail->addReplyTo($email);
        $mail->addAddress($to, 'Sales Curbsoft');
        $mail->Subject = 'Curbsoft Web Mailer new Demo Request';
        $mail->msgHTML('<table>
                        <tr>
                            <td> Company: ' . $company . '</td>
                        </tr>
                        <tr>
                            <td> Title: ' .  $title . '</td>
                        </tr>
                        <tr>
                            <td> Phone: ' . $phoneCode . ' ' . $phone . '</td>
                        </tr>
                        <tr>
                            <td> Email: ' . $email . '</td>
                        </tr>
                        <tr>
                            <td> Billing Address: ' . $bilAddr . '</td>
                        </tr>
                        <tr>
                            <td> City: ' . $city . '</td>
                        </tr>
                        <tr>
                            <td> State / Region / Provice: ' . $stRegProv . '</td>
                        </tr>
                        <tr>
                            <td> Postal: ' . $postalCode . '</td>
                        </tr>
                        <tr>
                            <td> Country: ' . $country . '</td>
                        </tr>
                        <tr>
                            <td> Billing Email: ' . $bilEmail . '</td>
                        </tr>
                        <tr>
                            <td> Preference URL: ' . $prefURL . '</td>
                        </tr>
                        <tr>
                            <td><br></td>
                        </tr>                  
                        </table>');
        $mail->AltBody = 'To view theexample message, please use an HTML compatible email viewer!';
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else { }
    }
    function sendCredentialsToClient($email, $password){
        $contactUs = $this->contactMail;
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Debugoutput = 'html';
        $mail->Host = CUSTOMER_MAIL_HOST;
        $mail->Port = 25;
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Username = CUSTOMER_MAIL_USERNAME;
        $mail->Password = CUSTOMER_MAIL_PASSWORD;
        $mail->setFrom('no-reply@curbsoft.com', 'Customer portral');
        $mail->addReplyTo($contactUs);
        $mail->addAddress($email);
        $mail->Subject = 'Welcome to Curbsoft';
        $mail->msgHTML('
            <table>
                <tr>
                    <td> Your account credentials </td>
                </tr>
                <tr>
                    <td> Email: ' . $email . '</td>
                </tr>
                <tr>
                    <td> Password: ' . $password . '</td>
                </tr>
                <tr>
                    <td>Link to login page: </td>
                </tr>
            </table>'
        );
        $mail->AltBody = 'To view the example message, please use an HTML compatible email viewer!';
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else { }
    } 
} //end class
