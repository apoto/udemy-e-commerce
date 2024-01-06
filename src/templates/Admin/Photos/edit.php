<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">商品画像</h1>
        </div>
    </div>
    


    <!-- DataTales Example -->
    <div class="card shadow my-4">
    <?= $this->Form->create($photo, ['type' => 'file']) ?> 
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">商品画像編集</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?= $this->Form->control('alt', ['label' => 'ALT', 'class' => 'form-control']) ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->control('file_name', ['label' => 'ファイル', 'class' => 'form-control', 'type' => 'file']) ?>
                </div>
            </div>

        </div>
        <div class="card-footer">
        <?= $this->Form->submit('保存', ['class' => 'btn btn-success']) ?>
        
        </div>
    <?= $this->Form->end() ?> 
    </div>
</div>