<div>
	<form method="POST" action="/cebu_log/pictures/post_vadation" enctype="multipart/form-data">
		<input type="hidden" name="id" value="1">

        <div>
        	<p>紹介するお店を名前を指定してください</p>
            <select name="s_id">
              <?php while($shops=mysqli_fetch_assoc($this->viewsoptions_shops)): ?>
              <option value="<?php echo($shops['shop_id']) ?>"><?php echo($shops['shop_name']); ?></option>
            <?php endwhile ?>
            </select>
        </div>

        <div>
        	<p>写真のカテゴリを指定してください</p>
            <select name="categoly">          
              <?php while($categoly=mysqli_fetch_assoc($this->viewsoptions_categoly)): ?>
              <option value="<?php echo($categoly['categoly_id']);?>"><?php echo($categoly['categoly']);?></option>                              
          <?php endwhile ?>
        </div>

		<div>
		<div>
			<p>写真投稿を行ってください</p>
			<input type="file" name="picture_path">
		</div>
          <?php if(isset($this->viewerrors['picture_path'])&&$this->viewerrors['picture_path']=='type'): ?>
          <p style="color: red;">*画像は「jpg」「png」「gif」の画像を指定してください</p>
          <?php endif; ?>

          <?php if(!empty($this->viewerrors)): ?>
          <p style="color: red;">*画像を再度選択してください</p>
          <?php endif; ?>

		<div>
		<input type="submit" value="投稿する">	
		</div>

	</form>
</div>