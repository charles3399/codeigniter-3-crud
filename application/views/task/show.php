<!DOCTYPE html>
<html>
<head>
    <title>Basic Crud operation in Codeigniter 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-right">
              <a class="btn btn-success" href="<?php echo site_url('task'); ?>"> Back</a>
          </div>
      </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <?php echo $task[0]->title; ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <?php echo $task[0]->description; ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <?= $task[0]->is_eotm == 1 ? 'Employee of the month' : 'Regular'; ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <form action="<?php echo site_url('task/setEOTM/'.$task[0]->id)?>" method="post">
                    <select class="form-control col col-lg-3 mb-2" name="employee_of_the_month" id="employee_of_the_month">
                        <option selected>--Select status--</option>
                        <option value=1>Set as Employee of the month</option>
                        <option value=0>Set as regular</option>
                    </select>
                    <button type="submit" class="btn btn-outline-success mt-2">Set</button>
                </form>
            </div>
        </div>
    </div>

  </div>
</body>
</html>