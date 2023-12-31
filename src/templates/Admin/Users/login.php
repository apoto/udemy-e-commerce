<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-6">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">管理者ログイン</h1>
            </div>
            <?= $this->Form->create() ?>
              <div class="form-group">
                <input name="username" class="form-control form-control-user" placeholder="ユーザーネーム">
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="パスワード">
              </div>
              <?= $this->Form->submit('ログイン', ['class' => 'btn btn-primary btn-user btn-block']) ?>
            <?= $this->Form->end() ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</div>
