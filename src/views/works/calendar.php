<?php require_once('src/views/partials/header.php') ?>
<br>
<h2 class="text-center">Calendar works</h2>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php require_once('src/views/partials/message.php') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="index.php" class="btn btn-warning">Back list</a>
        </div>
    </div>
    <br>
    <div class="col-md-12 no-padding">
        <div id="calendar"></div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit work</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="form-user" action="index.php?a=update">
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('src/views/works/create.php') ?>

<?php require_once('src/views/partials/footer.php') ?>
