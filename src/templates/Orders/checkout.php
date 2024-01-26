<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>カート</h1>
            </div>
        </div>
    </div>
</section>

<section class="checkout_area section_gap">
    <div class="container">
        <?= $this->Form->create($order) ?>
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>購入者情報</h3>
                            <div class="row contact_form">
                                <div class="col-md-6 form-group">
                                    <label for="last_name">苗字</label>
                                    <?= $this->Form->input('last_name', ['class' => 'form-control']) ?>
                                    <span class="placeholder" data-placeholder="苗字"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="first_name">名前</label>
                                    <?= $this->Form->input('first_name', ['class' => 'form-control']) ?>
                                    <span class="placeholder" data-placeholder="名前"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">メールアドレス</label>
                                    <?= $this->Form->input('email', ['class' => 'form-control']) ?>
                                    <span class="placeholder" data-placeholder="メールアドレス"></span>
                                </div>
                            </div>
                        <?= $this->form->end() ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>商品一覧</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>

                                <?php
                                $total = 0;
                                foreach($listProducts as $product) {
                                    $total += $product['product']['price'] * $product['quantity']
                                    ?>
                                    <li><a href="#"><?= $product['product']['name'] ?> <span class="middle">x  <?= $product['quantity'] ?></span> <span class="last"><?= $product['product']['price'] * $product['quantity'] ?></span></a></li>
                                <?php
                                } ?>
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Total <span>¥<?= $total ?></span></a></li>
                            </ul>
                            <?= $this->Form->submit('購入する', ['class' => 'primary-btn']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?= $this->form->end() ?>
    </div>
</section>
