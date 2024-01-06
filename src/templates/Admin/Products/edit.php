<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">商品</h1>
        </div>
    </div>
    


    <!-- DataTales Example -->
    <div class="card shadow my-4">
    <?= $this->Form->create($product) ?> 
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">商品編集</h6>
        </div>
        <div class="card-body">
           <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('category_id', ['label' => 'カテゴリー', 'class' => 'form-control', 'options' => $categories, 'class' => 'select2 d-block w-100']) ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('name', ['label' => '商品名', 'class' => 'form-control']) ?>
                </div>                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('description', ['label' => '説明', 'class' => 'form-control']) ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('price', ['label' => '価格', 'class' => 'form-control']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <?= $this->Form->control('characteristic_values._ids', ['label' => '商品特性', 'class' => 'form-control select2 d-block w-100', 'options' => $characteristicValues]) ?>

                </div>           
            </div>
        </div>
        <div class="card-footer">
        <?= $this->Form->submit('保存', ['class' => 'btn btn-success']) ?>
        
        </div>
    <?= $this->Form->end() ?> 
    </div>
</div>