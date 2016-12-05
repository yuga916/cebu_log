<div>
	<form method="POST" action="/cebu_log/pictures/create" enctype="multipart/form-data">
		<input type="hidden" name="id" value="1">

        <div>
        	<p>紹介するお店を名前を指定してください</p>
        	<table>
	          <thead>
	            <tr>
	              <th><div>お店の名前</div></th>
	            </tr>
	          </thead>


        	<input type="hidden" name="s_id" value="1">
        	</table>
        </div>

        <div>
        	<p>写真のカテゴリを指定してください</p>
        <table>
        　<thead>
            <tr>
              <th><div>カテゴリ</div></th>
            </tr>
          </thead>

            <tr>
              <th><div></div></th>
            </tr>

        	<input type="hidden" name="categoly" value="1">
          </table>
        </div>

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