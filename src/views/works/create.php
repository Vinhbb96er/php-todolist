<!-- Modal Create -->
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create work</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" class="form-user" action="index.php?a=store">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Work name</label>
                        <input type="text" class="form-control" name="name">
                        <label id="name-error" class="error" for="name"></label>
                    </div>
                    <div class="form-group">
                        <label for="starting_date">Starting date</label>
                        <div class="form-group">
                            <div class="input-group date datetime-picker col-md-6">
                                <input type="text" class="form-control datetime-picker start-date" name="starting_date"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <label id="starting_date-error" class="error" for="starting_date"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ending_date">Ending date</label>
                        <div class="form-group">
                            <div class="input-group date datetime-picker col-md-6">
                                <input type="text" class="form-control datetime-picker end-date" name="ending_date"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <label id="ending_date-error" class="error" for="ending_date"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
