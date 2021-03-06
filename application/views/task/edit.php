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
                <h2>Update Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo site_url('task')?>"> Back</a>
            </div>
        </div>
    </div>
    <form method="post" action="<?php echo site_url('task/update/'.$task->id)?>">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" value="<?php echo $task->title; ?>">
                    <?php
                      if (isset($this->session->flashdata('errors')['title'])){
                          echo '<div class="alert alert-danger mt-2">';
                          echo $this->session->flashdata('errors')['title'];
                          echo "</div>";
                      }
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea name="description" class="form-control"><?php  echo $task->description; ?></textarea>
                    <?php
                      if (isset($this->session->flashdata('errors')['description'])){
                          echo '<div class="alert alert-danger mt-2">';
                          echo $this->session->flashdata('errors')['description'];
                          echo "</div>";
                      }
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

  </div>
</body>
</html>