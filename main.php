<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To-do List</title>
  <!-- Minified Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="./css/style-main.css">
  <?php
    include 'connection.php';
    session_start();
  ?>
</head>
<body>
  <div class="container">
    <div class="row" style="margin-top: 30px">
      <!-- task-menu-start -->
      <?php
        $task_item = $conn->query("SELECT * FROM task ORDER BY id DESC");
        if(isset($_SESSION['id_task'])){
          echo "session id task : ".$_SESSION['id_task'];
        }else{
          echo "session id task : kosong";
          $task_item_row = $task_item->fetch_row();
          $_SESSION['id_task'] = $task_item_row[0];
        }
      ?>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <?php
          if($task_item->num_rows > 0) {
            $active = 1;
            foreach ($task_item as $menu) {

          ?>
            <li role="presentation"
              id="<?= $menu['id'] ?>"
              <?php
              if ($menu['id'] == $_SESSION['id_task']) {
                echo 'class="active"';
                $active = 0;
              }
              ?>
              >
              <a>
                <?php
                  echo $menu['title'];
                  $sqlNotif = "SELECT count(l.id) list from task t join list l on t.id=l.id_task WHERE l.checked=0 and t.id=".$menu['id']." group by t.id;";
                  $res = $conn->query($sqlNotif);
                  if($res){
                    $result = $res->fetch_row();
                    if(!empty($result[0])){
                ?>
                      <span class="badge"><?= $result[0] ?></span>
                <?php
                    }
                  }
                ?>
                <span id="<?= $menu['id'] ?>" class="remove-task">X</span>
                <span id="<?= $menu['id'] ?>" class="edit-task">E</span>
              </a>
            </li>
          <?php
            }
          }
          ?>
        </ul>
        <form action="addTask.php" method="post" autocomplete="off" style="margin-top: 8px">
          <div class="form-group">
            <input type="text"
              name="title"
              placeholder="Nama task baru"
              class ="form-control"
              <?php if(isset($_GET['messT']) && $_GET['messT'] == "error") echo 'style="border-color: #f2dede"'; ?>
              />
            <?php if(isset($_GET['messT']) && $_GET['messT'] == "error") { ?>
              <span id="errorMes">Input tidak boleh kosong</span>
            <?php } ?>
          </div>
          <button class="btn btn-primary" id="btn-add-task" type="submit" >
            Add Task &nbsp; <span class="glyphicon glyphicon-plus"></span>
          </button>
        </form>
      </div>
      <!-- task-menu-end -->
      <!-- list-start -->
      <div class="col-md-6">
        <div class="main-todo-section">
          <!-- add-list-start -->
          <div class="add-todo-section">
            <form action="add.php" method="post" autocomplete="off">
              <div class="form-group">
                <input type="text"
                  name="title"
                  placeholder="Judul"
                  class ="form-control"
                  <?php if(isset($_GET['mess']) && $_GET['mess'] == "error") echo 'style="border-color: #f2dede"'; ?>
                  />
                <?php if(isset($_GET['mess']) && $_GET['mess'] == "error") { ?>
                  <span id="errorMes">Input tidak boleh kosong</span>
                <?php } ?>
              </div>
              <div class="form-group">
                <div class="input-group" id="datetimepicker">
                  <input type="text" class="form-control" name="deadline" placeholder="Deadline">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
              <input type="hidden" id="id-task-list" value="<?= $_SESSION['id_task'] ?>" name="idtask"/>
              <button type="submit">Add List &nbsp; <span class="glyphicon glyphicon-plus"></span></button>
            </form>
          </div>
          <!-- add-list-end -->
          <!-- list-view-start -->
          <?php $list_item = $conn->query("SELECT * FROM list WHERE id_task=".$_SESSION['id_task']." ORDER BY id DESC"); ?>
          <div class="show-todo-section" id="todo-list-section">
            <?php
              if($list_item->num_rows > 0) {
                foreach ($list_item as $item) {
            ?>
                  <div class="todo-item">
                    <span id="<?= $item['id'] ?>" class="remove-to-do">Delete</span>
                    <span id="<?= $item['id'] ?>" class="edit-to-do">Edit</span>
                    <input type="checkbox"
                      data-todo-id="<?= $item['id'] ?>"
                      class="check-box"
                      <?php  if($item['checked']) echo "checked";?>>
                    <h2 <?php  if($item['checked']) echo 'class="checked"';?>><?= $item['title'] ?></h2>
                    <small>
                      Deadline: <?= $item['date_time_end'] ?>
                    </small>
                    <input type="hidden" id="result-deadline" value="<?= $item['date_time_end'] ?>">
                  </div>
            <?php
                }
              } else {
            ?>
              <div class="todo-item">
                <div class="empty">
                  <h2>Data Kosong</h2>
                </div>
              </div>
            <?php } ?>
          </div>
          <!-- list-view-end -->
        </div>
      </div>
      <!-- list-end -->
      <!-- user-nav-start -->
      <div class="col">
        bisa dibuat foto user, update profile, dan logout
      </div>
      <!-- user-nav-end -->
    </div>

    <!-- Modal Edit Task -->
    <div class="modal fade" id="editListModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <form action="updateList.php" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit List</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>List name :</label>
                <input type="text"
                  name="edit-title"
                  placeholder="Nama list baru"
                  class ="form-control"
                  id="edit-list-title"
                  <?php if(isset($_GET['messT']) && $_GET['messT'] == "error") echo 'style="border-color: #f2dede"'; ?>
                  />
                <?php if(isset($_GET['messT']) && $_GET['messT'] == "error") { ?>
                  <span id="errorMes">Input tidak boleh kosong</span>
                <?php } ?>
              </div>
              <div class="form-group">
                <label>Deadline : </label>
                <div class="input-group" id="datetimepicker1">
                  <input type="text" name="edit-deadline" class="form-control" placeholder="Deadline" id="edit-list-deadline">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
                <input type="hidden" name="list-id" value="" id="edit-list-id">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="button">Save</button>
            </div>
          </form>
        </div>

      </div>
    </div>
    <!-- Modal Edit Task End -->
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="./js/main.js"></script>
</body>

</html>
