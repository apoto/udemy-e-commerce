<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1><?= $category->name ?></h1>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->



<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Categories</div>
					<ul class="main-categories">
                        <?php
                        foreach ($categories as $idCategory => $category) { ?>
                        <li>
                            <?= $this->Html->link($category, ['controller' => 'Products', 'action' => 'index', $idCategory], ['class' => 'nav-link']) ?>
                        </li>
                        <?php
                        } ?>
					</ul>
				</div>

                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'submitOnChange']) ?>
                    <div class="sidebar-filter mt-50">
                        <div class="top-filter-head">フィルター</div>
                        <div class="common-filter border-0 pb-5">
                            <div class="head">サイズ</div>
                            <?= $this->Form->select('filter_size', $sizes, ['label' => false, 'empty' => '選択してください']) ?>
                        </div>

                        <hr />

                        <div class="common-filter border-0">
                            <div class="head">カラー</div>
                            <?= $this->Form->select('filter_color', $colors, ['label' => false, 'empty' => '選択してください']) ?>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<?php // 商品一覧
						foreach ($products as $product) { ?>
							<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="img/product/p1.jpg" alt="">
									<?= $this->Html->image('photos/file_name/' . $product->photos[0]->file_dir . '/' . $product->photos[0]->file_name) ?>
									<div class="product-details">
										<h6><?= $this->Html->link($product->name, ['controller' => 'Products', 'action' => 'view', $product->id]) ?></h6>
										<div class="price">
											<h6><?= $product->price ?></h6>
										</div>
									</div>
								</div>
							</div>
						<?php
						} ?>
						
					</div>
				</section>
				<!-- End Best Seller -->
			</div>
		</div>
	</div>
