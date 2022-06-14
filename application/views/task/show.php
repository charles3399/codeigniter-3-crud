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
          <div class="pull-left">
              <h2>Codeigniter 3 CRUD Example from scratch with <a href="https://codingdriver.com/">Coding Driver</a></h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-success" href="<?php echo site_url('task'); ?>"> Back</a>
          </div>
      </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <?php echo $task->title; ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <?php echo $task->description; ?>
            </div>
        </div>
    </div>

  </div>
</body>
</html>