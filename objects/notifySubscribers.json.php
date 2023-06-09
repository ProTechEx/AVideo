<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

global $global, $config;
if (!isset($global['systemRootPath'])) {
    require_once '../videos/configuration.php';
}
require_once $global['systemRootPath'] . 'objects/user.php';

if (!User::canUpload()) {
    header("Location: {$global['webSiteRootURL']}?error=" . __("You can not notify"));
    exit;
}
$user_id = User::getId();
// if admin bring all subscribers
if (User::isAdmin()) {
    $user_id = '';
}

require_once 'subscribe.php';
setRowCount(10000);
header('Content-Type: application/json');
$Subscribes = Subscribe::getAllSubscribes($user_id);

$obj = new stdClass();
//Create a new PHPMailer instance
$mail = new \PHPMailer\PHPMailer\PHPMailer();
setSiteSendMessage($mail);
//Set who the message is to be sent from
$mail->setFrom($config->getContactEmail());
//Set who the message is to be sent to
//$mail->addAddress($config->getContactEmail());
foreach ($Subscribes as $value) {
    $mail->addBCC($value["email"]);
}
$obj->total = count($Subscribes);
//Set the subject line
$mail->Subject = 'Message From Site ' . $config->getWebSiteTitle();
$mail->msgHTML($_POST['message']);

//send the message, check for errors
if (!$mail->send()) {
    $obj->error = __("Message could not be sent") . " " . $mail->ErrorInfo;
} else {
    $obj->success = __("Message sent");
}

$json = json_encode($obj);

_error_log('NotifySubscribers emails: '.$json);

echo $json;
