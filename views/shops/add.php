<div>
	<form method="POST" action="/cebu_log/shops/post_validation" enctype="multipart/form-data">
		<input type="hidden" name="owner_id" value="1">

        <div>
        	<p>紹介するお店を名前を記入してください</p>
          <input type="text" name="shop_name">
        </div>

        <div>
        	<p>紹介文を記入してください</p>
          <input type="text" name="intro_shop">
        </div>

        <div>
          <p>住所を記入してください</p>
          <input type="text" name="address">
        </div>

		<div>
		<input type="submit" value="投稿する">	
		</div>

	</form>
</div>