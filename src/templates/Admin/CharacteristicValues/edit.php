<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">商品特性オプション</h1>
        </div>
    </div>
    


    <!-- DataTales Example -->
    <div class="card shadow my-4">
    <?= $this->Form->create($characteristicValue) ?> 
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">特徴オプション編集</h6>
        </div>
        <div class="card-body">
            <?= $this->Form->control('name', ['label' => '名前', 'class' => 'form-control']) ?>

        </div>
        <div class="card-footer">
        <?= $this->Form->submit('保存', ['class' => 'btn btn-success']) ?>
        
        </div>
    <?= $this->Form->end() ?> 
    </div>
</div>