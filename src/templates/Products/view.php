<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1><?= $product->name ?></h1>
                <nav class="d-flex align-items-center">
                    <?= $this->Html->link('ホーム<span class="lnr lnr-arrow-right"></span>', ['controller' => 'Pages', 'action' => 'index'], ['escape' => false]) ?>
                    <?= $this->Html->link($product->category->name, ['controller' => 'Products', 'action' => 'index', $product->category->id]) ?>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area mb-5">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <?php
                    foreach ($product->photos as $photo) { ?>
                        <div class="single-prd-item">
                            <?= $this->Html->image('photos/file_name/' . $photo->file_dir . '/' . $photo->file_name, ['class' => 'img-fluid']) ?>
                            <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <?= $this->Form->create() ?>
                        <h3><?= $product->name ?></h3>
                        <h2>¥ <?= $product->price ?></h2>
                        <ul class="list">
                            <li>Category : <?= $this->Html->link($product->category->name, ['controller' => 'Products', 'action' => 'index', $product->category->id], ['class' => 'a']) ?></li>
                            
                            <?php //商品特徴を生成
                            foreach ($product->characteristic_values as $characteristic_value) { ?>
                                <li> <?= $characteristic_value->characteristic->name ?> : <?= $characteristic_value->name ?></li>
                            <?php
                            } ?>
                        </ul>
                        <p><?= $product->description ?></p>
                        <div class="product_count">
                            <label>数量:</label><br/>
                            <?= $this->Form->select('quantity', [1 => 1, 2 => 2, 3 => 3 ]) ?>
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <?= $this->Form->submit('カートに追加', ['class' => 'primary-btn']) ?>
                        </div>
                    <?= $this->form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->
