<!--  tweet：つぶやきフォーム -->

<!-- 新規投稿ボタン -->
<p><a href="/cebu_log/tweets/create" class="btn btn-info">新規投稿</a></p>
    <?php foreach($this->viewOptions as $viewOption) ?>
<!-- 新規tweet本文 -->
    <div class="msg">
          <p><a href="show/<?php echo $viewOption['id']; ?>"><?php echo $viewOption['title']; ?></a></p>
          <p class="day"><?php echo $viewOption['created']; ?></p>
        </div>
      <?php endforeach; ?>
<!--  // tweet：プルダウン内容選択「food・shop」
      // 編集
      // 削除 -->
