<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php include 'connection.php'; ?>
  </head>
  <body>
    <div class="main-section">
      <div class="add-section">
        <form action="add.php" method="post" autocomplete="off">
          <input type="text"
            name="title"
            placeholder="Judul"
            <?php if(isset($_GET['mess']) && $_GET['mess'] == "error") echo 'style="border-color: #f2dede"'; ?>
            />
          <?php if(isset($_GET['mess']) && $_GET['mess'] == "error") { ?>
            <span id="errorMes">Input tidak boleh kosong</span>
          <?php } ?>
          <button type="submit">Add &nbsp; <span>&#43;</span></button>
        </form>
      </div>
      <?php $list_item = $conn->query("SELECT * FROM list ORDER BY id DESC"); ?>
      <div class="show-todo-section">
        <?php
          if($list_item->num_rows > 0) {
            foreach ($list_item as $item) {
        ?>
              <div class="todo-item">
                <span id="<?= $item['id'] ?>" class="remove-to-do">delete</span>
                <span id="<?= $item['id'] ?>" class="edit-to-do">edit</span>
                <input type="checkbox"
                  data-todo-id="<?= $item['id'] ?>"
                  class="check-box"
                  <?php  if($item['checked']) echo "checked";?>>
                <h2 <?php  if($item['checked']) echo 'class="checked"';?>>
                  <?= $item['title'] ?>
                </h2>
                <small>created: <?= $item['date_time'] ?></small>
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
    </div>

    <script src="./js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.remove-to-do').click(function(){
          const id = $(this).attr('id');
          $.post("remove.php",
            {
              id:id
            }, (data) => {
              $(this).parent().hide(600);
            }
          );
        });

        $('.check-box').click(function(e){
          const id = $(this).attr('data-todo-id');

          $.post("doChecked.php",
            {
              id:id
            }, (data) => {
              if(data != "error"){
                const h2 = $(this).next();
                if(data === '1'){
                  h2.removeClass('checked');
                }else{
                  h2.addClass('checked');
                }
              }
            }
          );
        });
      });
    </script>
  </body>
</html>
