<div>
	<form method="POST" action="/cebu_log/shops/post_validation" enctype="multipart/form-data">
		<input type="hidden" name="owner_id" value="1">

        <div>
        	<p>紹介するお店を名前を記入してください</p>
          <?php if (!empty($this->viewErrors['shop_name'])): ?>
          <p style="color: red;">*お店を再度記入してください</p>
          <?php endif ?>

          <?php if (!empty($this->viewErrors['duplicate'])): ?>
          <p style="color: red;">*お店がすでに登録されています</p>
          <?php endif ?>

          <input type="text" name="shop_name">
        </div>


        <div>
        	<p>紹介文を記入してください</p>
          <?php if (!empty($this->viewErrors['intro_shop'])): ?>
          <p style="color: red;">*紹介文を再度記入してください</p>
          <?php endif ?>

          <input type="text" name="intro_shop">
        </div>

        <div>
          <p>住所を記入してください</p>
          <?php if (!empty($this->viewErrors['address'])): ?>
          <p style="color: red;">*住所を再度記入してください</p>
          <?php endif ?>



          <input type="text" name="address">
        </div>

		<div>
		<input type="submit" value="投稿する">	
		</div>

	</form>
</div>