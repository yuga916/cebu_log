<div>
	<form method="POST" action="/cebu_log/pictures/create" enctype="multipart/form-data">
		<input type="hidden" name="id" value="1">
		<div>
			<p>写真投稿を行ってください</p>
			<input type="file" name="picture_path">
		</div>
          <?php if(isset($error['picture_path'])&&$error['picture_path']=='type'): ?>
          <p style="color: red;">*画像は「jpg」「png」「gif」の画像を指定してください</p>
          <?php endif; ?>

          <?php if(!empty($error)): ?>
          <p style="color: red;">*画像を再度選択してください</p>
          <?php endif; ?>

		<div>
		<input type="submit" value="投稿する">	
		</div>

	</form>
</div>