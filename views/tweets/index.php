<!--  Tweet：つぶやきフォーム -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
<body>
<!-- 新規投稿入力 -->
      <div class="msg">
        <form method="post" action="/cebu_log/tweets/create" class="form-horizontal" role="form">
            <div class="col-md-9">
              <textarea name="body" class="form-control" cols="30" rows="5"></textarea>
            </div>
          <div class="form-group pull-right">
<!--  Tweet：プルダウン内容選択「food・shop」-->
              <select name="option">
                <option value="food" id="food">food</option>
                <option value="shop" id="shop">shop</option>
                <option value="other" id="other">other</option>
              </select>
<!-- 新規投稿ボタン -->
              <!-- <p><a href="/cebu_log/tweets/create" class="btn btn-info">新規投稿</a></p> -->
              <br>
              <input type="submit" value="新規投稿">
          </div><br><br>
        </form>
      </div>

<!-- 降順Tweet本文 -->
    <div class="msg">
      <?php foreach($this->viewOptions as $viewOption): ?>
          <p><a href="show/<?php echo $viewOption['tweet_id']; ?>">
              <?php echo $viewOption['tweet']; ?></a></p>
          <p class="day"><?php echo $viewOption['created']; ?></p>
<!-- 編集 削除 -->
          [<a href="edit/<?php echo $viewOption['tweet_id']; ?>" style="color: #00994C;">返信</a>]
          [<a href="delete/<?php echo $viewOption['tweet_id']; ?>" style="color: #F33;">削除</a>]
        </div>
      <?php endforeach; ?>
</body>
</html>
