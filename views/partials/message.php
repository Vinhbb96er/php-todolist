<?php
    require_once('commons/session.php');
    $session = new SessionManager;
?>
<div class="message-block">
    <?php if (isset($session) && $session->has('success')) { ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <span class="glyphicon glyphicon-ok-sign"></span>
            <?php
                echo $session->get('success');
                $session->remove('success');
            ?>
        </div>
    <?php } ?>
    <?php if (isset($session) && $session->has('error')) { ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <span class="glyphicon glyphicon-warning-sign"></span>
            <?php
                echo $session->get('error');
                $session->remove('error');
            ?>
        </div>
    <?php } ?>
</div>
