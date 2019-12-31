<input type="hidden" name="id" value="<?php echo $work['id'] ?>">
<div class="form-group">
    <label for="name">Work name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $work['name'] ?>">
    <label id="name-error" class="error" for="name"></label>
</div>
<div class="form-group">
    <label for="starting_date">Starting date</label>
    <div class="form-group">
        <div class="input-group date datetime-picker col-md-6">
            <input type="text" class="form-control datetime-picker" name="starting_date" value="<?php echo $work['starting_date'] ?>"/>
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
            <input type="text" class="form-control datetime-picker" name="ending_date" value="<?php echo $work['ending_date'] ?>"/>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
        <label id="ending_date-error" class="error" for="ending_date"></label>
    </div>
</div>
