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
          <div>
              <h2>Codeigniter 3 CRUD Example from scratch with</h2>
          </div>
          <div class="mb-2">
              <a class="btn btn-success" href="<?php echo site_url('task/create'); ?>"> Create New Item</a>
          </div>
      </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th width="220px">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($tasks as $task) { ?>
            <tr>
                <td><?php echo $task->title; ?></td>
                <td><?php echo $task->description; ?></td>
            <td>
              <form class="d-flex justify-content-between" method="DELETE" action="<?php echo site_url('task/delete/'.$task->id);?>">
                <a class="btn btn-info" href="<?php echo site_url('task/show/'.$task->id) ?>"> Show</a>
               <a class="btn btn-primary" href="<?php echo site_url('task/edit/'.$task->id) ?>"> Edit</a>
                <button type="submit" class="btn btn-danger"> Delete</button>
              </form>
            </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  </div>
</body>
</html>