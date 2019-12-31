<?php require_once('views/partials/header.php') ?>
<br>
<h2 class="text-center">List works</h2>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php require_once('views/partials/message.php') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-info" data-toggle="modal" data-target="#create-modal"><i class="fa fa-plus"></i> Create</button>
        </div>
        <div class="col-md-6 text-right">
            <form class="form-search" method="GET" action="index.php?a=index">
                <input type="text" name="keyword" class="form-control" value="<?php echo(isset($_GET['keyword']) ? $_GET['keyword'] : null) ?>">
                <button class="btn btn-default btn-search"><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
    </div>
    <br>
    <table class="table table-bordered text-center table-work">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th>Name</th>
                <th width="20%">Starting Date</th>
                <th width="20%">Ending Date</th>
                <th width="10%">Status</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($works as $key => $work) { ?>
                <tr>
                    <td><?php echo ($key + 1) ?></td>
                    <td><?php echo $work['name'] ?></td>
                    <td><?php echo $work['starting_date'] ?></td>
                    <td><?php echo $work['ending_date'] ?></td>
                    <th width="10%">
                        <label class="label label-<?php echo $work['status'] ?>">
                            <?php echo (Work::getWorkStatusText($work['status'])) ?>
                        </label>
                    </th>
                    <td class="text-center">
                        <button class="btn btn-primary btn-edit" data-toggle="modal" data-target="#edit-modal" data-work="<?php echo $work['id'] ?>">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <form action="index.php?a=delete" method="POST" class="form-delete">
                            <input type="hidden" name="id" value="<?php echo $work['id'] ?>">
                            <button class="btn btn-danger btn-delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <?php if (!count($works)) { ?>
                <tr>
                    <td colspan="6" class="text-center">Empty Data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
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

<?php require_once('views/works/create.php') ?>

<?php require_once('views/partials/footer.php') ?>
