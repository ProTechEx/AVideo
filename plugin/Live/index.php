<?php
require_once '../../videos/configuration.php';
require_once $global['systemRootPath'] . 'objects/user.php';
$isLive = 1;
global $doNotFullScreen;
$doNotFullScreen = 1;
$p = AVideoPlugin::loadPlugin("Live");
$obj = $p->getDataObject();
if (!empty($_GET['c'])) {
    $user = User::getChannelOwner($_GET['c']);
    if (!empty($user)) {
        $_GET['u'] = $user['user'];
    }
}
if (!empty($_GET['c'])) {
    $user = User::getChannelOwner($_GET['c']);
    if ($user['status'] !== 'a') {
        header("Location: {$global['webSiteRootURL']}");
    }
}

if (!empty($_GET['u']) && isAVideoMobileApp()) {
    $_GET['embed'] = 1;
}

if (!empty($_GET['u'])) {
    $livet = LiveTransmition::getFromRequest();
    $live_servers_id = Live::getLiveServersIdRequest();
    $live_index = @$_REQUEST['live_index'];
    //var_dump($live_servers_id);exit;
    $info = Live::getInfo($livet['key'], $live_servers_id, $live_index, '', false);
    //var_dump($info);exit;
    if (!$info['isLive'] && empty($info['live_schedule_id'])) {
        if (!empty($info['otherLivesSameUser'])) {
            $link = LiveTransmitionHistory::getLinkToLive($info['otherLivesSameUser'][0]['id']);
            //var_dump($link, $info['otherLivesSameUser'][0]);exit;
            //var_dump($link,$info['users_id'], $info['otherLivesSameUser']);exit;
            header("Location: {$link}");
            exit;
            /*
            if (count($info['otherLivesSameUser']) == 1) {
                
            } else {
                // list all lives available
            }
             * 
             */
        }
    }

    setLiveKey($livet['key'], $live_servers_id, $live_index);
    Live::checkIfPasswordIsGood($livet['key']);

    if (!empty($_GET['embedv2'])) {
        include $global['systemRootPath'] . 'plugin/Live/view/videoEmbededV2.php';
    } elseif (!empty($_GET['embed'])) {
        include $global['systemRootPath'] . 'plugin/Live/view/videoEmbeded.php';
    } else {
        include $global['systemRootPath'] . 'plugin/Live/view/modeYoutubeLive.php';
    }
    exit;
} else {
    if (!User::isLogged()) {
        gotToLoginAndComeBackHere("");
        exit;
    } elseif (!User::canStream()) {
        forbiddenPage(__($obj->streamDeniedMsg));
    }
}

require_once $global['systemRootPath'] . 'objects/userGroups.php';
require_once $global['systemRootPath'] . 'objects/functions.php';
require_once $global['systemRootPath'] . 'plugin/Live/Objects/LiveTransmition.php';

$users_id = User::getId();
if (!empty($_GET['users_id']) && User::isAdmin()) {
    $users_id = intval($_GET['users_id']);
}

// if user already have a key
$trasnmition = LiveTransmition::createTransmitionIfNeed($users_id);
$getLiveKey = ['key' => $trasnmition['key'], 'live_servers_id' => Live::getLiveServersIdRequest()];
setLiveKey($trasnmition['key'], Live::getLiveServersIdRequest(), @$_REQUEST['live_index']);
if (!empty($_GET['resetKey'])) {
    LiveTransmition::resetTransmitionKey($users_id);
    header("Location: {$global['webSiteRootURL']}plugin/Live/");
    exit;
}

$trans = new LiveTransmition($trasnmition['id']);
$groups = $trans->getGroups();

//check if channel name exists
$channelName = User::getUserChannelName();
if (empty($channelName)) {
    $channelName = uniqid();
    $user = new User($users_id);
    $user->setChannelName($channelName);
    $user->save();
}
$global['ignoreChat2'] = 1;
$col1Class = "col-md-12 col-lg-12";
$col2Class = "hidden";
$chat2 = AVideoPlugin::getObjectDataIfEnabled("Chat2");
if (!empty($chat2) && !empty($chat2->useStaticLayout)) {
    $col1Class = "col-md-8 col-lg-8";
    $col2Class = "col-md-4 col-lg-4";
}
$global['doNotLoadPlayer'] = 1;
?>
<!DOCTYPE html>
<html lang="<?php echo getLanguage(); ?>">
    <head>
        <title><?php echo __("Live") . $config->getPageTitleSeparator() . $config->getWebSiteTitle(); ?></title>
        <link href="<?php echo getURL('node_modules/video.js/dist/video-js.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <?php
        include $global['systemRootPath'] . 'view/include/head.php';
        ?>
        <script src="<?php echo getCDN(); ?>plugin/Live/view/swfobject.js" type="text/javascript"></script>
        <?php
        include $global['systemRootPath'] . 'view/include/video.min.js.php';
        ?>
        <link href="<?php echo getCDN(); ?>view/js/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo getCDN(); ?>view/js/bootstrap-fileinput/js/fileinput.min.js" type="text/javascript"></script>
        <style>
            .krajee-default.file-preview-frame .kv-file-content {
                width: auto;
                height: auto;
            }
            #live .panel-body {
                height: calc(100vh - 220px);
            }
            #live .panel-body > div, #mainVideo{
                height: -webkit-fill-available;
                width:  -webkit-fill-available;
            }
            <?php
            /*
            if (AVideoPlugin::isEnabledByName('Chat2')) {
                ?>
                @media (max-width: 769px) {
                    #live .panel-body {
                        height: calc(50vh - 200px);
                    }
                }
                <?php
            }
             * 
             */
            ?>
        </style>
    </head>
    <body class="<?php echo $global['bodyClass']; ?>">
        <?php
        include $global['systemRootPath'] . 'view/include/navbar.php';
        ?>
        <div class="container-fluid">

            <div class="panel panel-default">
                <div class="panel-heading tabbable-line">
                    <ul class="nav nav-tabs">
                        <?php
                        $activeServerFound = false;
                        if (!$obj->useLiveServers) {
                            $liveStreamObject = new LiveStreamObject($trasnmition['key'], 0, @$_REQUEST['live_index'], 0);
                            $key = $liveStreamObject->getKeyWithIndex(true);
                            $activeServerFound = true;
                            $_REQUEST['live_servers_id'] = 0;
                            ?>
                            <li class="active <?php echo getCSSAnimationClassAndStyle('animate__fadeInLeft', 'menu'); ?>">
                                <a href="<?php echo $global['webSiteRootURL']; ?>plugin/Live/?live_servers_id=0">
                                    <i class="fas fa-broadcast-tower"></i> <?php echo __("Local Server"); ?>
                                </a>
                            </li>
                            <?php
                        } else {
                            $servers = Live::getAllServers();
                            $activeFound = false;
                            foreach ($servers as $index => $value) {
                                $liveStreamObject = new LiveStreamObject($trasnmition['key'], $value['id'], @$_REQUEST['live_index'], 0);
                                $key = $liveStreamObject->getKeyWithIndex(true);
                                $active = "";
                                if (!empty($_REQUEST['live_servers_id'])) {
                                    if ($_REQUEST['live_servers_id'] == $value['id']) {
                                        $activeServerFound = true;
                                        $active = "active";
                                    }
                                } elseif ($index == 0) {
                                    $_REQUEST['live_servers_id'] = $value['id'];
                                    $activeServerFound = true;
                                    $active = "active";
                                }
                                ?>
                                <li class="<?php echo $active; ?>  <?php echo getCSSAnimationClassAndStyle('animate__fadeInLeft', 'menu'); ?>">
                                    <a href="<?php echo $global['webSiteRootURL']; ?>plugin/Live/?live_servers_id=<?php echo $value['id']; ?>">
                                        <i class="fas fa-broadcast-tower"></i> <?php echo $value['name']; ?>
                                    </a>
                                </li>
                                <?php
                            }
                            if (User::isAdmin()) {
                                ?>
                                <button onclick="avideoModalIframeFullScreen(webSiteRootURL + 'plugin/Live/view/editor.php');" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Edit Live Servers</button>
                                <?php
                            }
                        }
                        if (Live::canStreamWithMeet()) {
                            ?>
                            <button onclick="avideoModalIframeFullScreen(webSiteRootURL + 'plugin/Meet/');" class="btn btn-default pull-right">
                                <i class="fas fa-comments"></i> <span class="hidden-md hidden-sm hidden-xs"><?php echo __("Start a Live Stream Meeting"); ?></span><span class="hidden-lg"><?php echo __("Meeting"); ?></span>
                            </button>
                            <?php
                        }
                        if (Live::canStreamWithWebRTC()) {
                            ?>
                            <button onclick="avideoModalIframeFullScreen(webSiteRootURL + 'plugin/Live/webcamFullscreen.php?avideoIframe=1');" class="btn btn-default pull-right" data-toggle="tooltip" title=<?php printJSString(__("Go Live With Webcam")); ?>>
                                <i class="fas fa-camera"></i> <span class="hidden-md hidden-sm hidden-xs"><?php echo __("Go Live With Webcam"); ?></span><span class="hidden-lg"><?php echo __("Webcam"); ?></span>
                            </button>
                            <?php
                        }
                        if (empty($activeServerFound)) {
                            if (!empty($servers[0])) {
                                $_REQUEST['live_servers_id'] = $servers[0]['id'];
                            } else {
                                ?>
                                <li>
                                    <a href="<?php echo $global['webSiteRootURL']; ?>plugin/Live/view/editor.php" class="btn btn-danger">
                                        <i class="fas fa-exclamation-triangle"></i> <?php echo __("Server not found or inactive"); ?>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        $_REQUEST['live_servers_id'] = Live::getLiveServersIdRequest();
                        $getLiveKey['live_servers_id'] = $_REQUEST['live_servers_id'];
                        $getLiveKey['live_index'] = @$_REQUEST['live_index'];
                        $poster = Live::getPosterImage(User::getId(), $_REQUEST['live_servers_id']);
                        ?>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="col-lg-6" id="indexCol1">
                        <div class="row">
                            <div class="<?php echo $col1Class; ?>">
                                <?php
                                include $global['systemRootPath'] . 'plugin/Live/indexCol1.php';
                                ?>
                            </div>
                            <div class="<?php echo $col2Class; ?>" id="yptRightBar">
                                <?php
                                include $global['systemRootPath'] . 'plugin/Live/indexCol2.php';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 " id="indexCol2">
                        <?php
                        include $global['systemRootPath'] . 'plugin/Live/indexCol3.php';
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <?php
        $p->getChat($trasnmition['key']);
        ?>
        <?php
        include $global['systemRootPath'] . 'view/include/footer.php';
        ?>
        <script>
            var flashvars = {server: "<?php echo Live::getRTMPLinkWithOutKeyFromKey($trasnmition['key']); ?>", stream: "<?php echo $trasnmition['key']; ?>"};
            var params = {};
            var attributes = {};
            function amIOnline() {
                $.ajax({
                    url: '<?php echo $global['webSiteRootURL']; ?>plugin/Live/stats.json.php?checkIfYouOnline',
                    data: {"name": "<?php echo $streamName; ?>"},
                    type: 'post',
                    success: function (response) {
                        offLine = true;
                        if (response.applications) {
                            for (i = 0; i < response.applications.length; i++) {
                                if (response.applications[i].key === "<?php echo $trasnmition['key']; ?>") {
                                    offLine = false;
                                    break;
                                }
                            }
                        }
                        // you online do not show webcam
                        if (!offLine) {
                            $('#webcam').find('.alert').text("<?php echo __("You are online now, web cam is disabled"); ?>");
                        } else {
                            $('#webcam').find('.alert').text("<?php echo __("You are not online, loading webcam..."); ?>");
                            swfobject.embedSWF("<?php echo $global['webSiteRootURL']; ?>plugin/Live/view/webcam.swf", "webcam", "100%", "100%", "9.0.0", "expressInstall.swf", flashvars, params, attributes);
                        }
                    }
                });
            }

            function saveStream() {
                modal.showPleaseWait();

                var selectedUserGroups = [];
                $('.userGroups:checked').each(function () {
                    selectedUserGroups.push($(this).val());
                });

                $.ajax({
                    url: '<?php echo $global['webSiteRootURL']; ?>plugin/Live/saveLive.php',
                    data: {
                        "title": $('#title').val(),
                        "description": $('#description').val(),
                        "categories_id": $('select[name="categories_id"]').val(),
                        "key": "<?php echo $trasnmition['key']; ?>",
                        "listed": $('#listed').is(":checked"),
                        "saveTransmition": $('#recordLive').is(":checked"),
                        "userGroups": selectedUserGroups,
                        users_id: '<?php echo $users_id; ?>',
                        password: $('#password_livestream').val()
                    },
                    type: 'post',
                    success: function (response) {
                        modal.hidePleaseWait();
                    }
                });
            }
            $(document).ready(function () {
                $('#removePoster').click(function () {
                    modal.showPleaseWait();
                    $.ajax({
                        url: webSiteRootURL + "plugin/Live/removePoster.php?live_servers_id=<?php echo $_REQUEST['live_servers_id']; ?>",
                        success: function (response) {
                            modal.hidePleaseWait();
                            if (response.error) {
                                avideoAlert("<?php echo __("Sorry!"); ?>", response.msg, "error");
                            } else {
                                $('#mainVideo video').attr('poster', webSiteRootURL + response.newPoster);
                                $('#mainVideo .vjs-poster').css('background-image', 'url("' + webSiteRootURL + response.newPoster + '")');
                                $('.kv-file-content img').attr('src', '<?php echo $global['webSiteRootURL']; ?>' + response.newPoster);
                            }
                        }
                    });
                });
                $('.btnSaveStream').click(function () {
                    saveStream();
                });
                $('#enableWebCam').click(function () {
                    amIOnline();
                });

<?php
echo PlayerSkins::getStartPlayerJS("", "", true);
?>
            });
        </script>
    </body>
</html>
<?php include_once $global['systemRootPath'] . 'objects/include_end.php'; ?>