<?php require_once('views/partials/header.php') ?>
<br>
<h2 class="text-center">List works</h2>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-info"><i class="fa fa-plus"></i> Create</button>
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
                        <button class="btn btn-primary">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
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
<?php require_once('views/partials/footer.php') ?>
