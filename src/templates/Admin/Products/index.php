<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">商品</h1>
        </div>
        <div class="col text-right">
            <?= $this->Html->link('<i class = "fas fa-add"></i> 追加', ['action' => 'add'], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>
    


    <!-- DataTales Example -->
    <div class="card shadow my-4">
        <div class="card-body">
            <?php if(!$products->count()) : ?>
                <div class="alert alert-info">
                    商品がありません
                </div>

            <?php else : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>カテゴリー</th>
                            <th>商品名</th>
                            <th>価格</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach($products as $product): ?>
                                <tr>
                                    <td class="align-middle"><?= $product->category->name ?></td>
                                    <td class="align-middle"><?= $product->name ?></td>
                                    <td class="align-middle"><?= $this->Number->currency($product->price) ?></td>
                                    <td class="text-right">
                                        <?= $this->Html->link('<i class = "fas fa-list"></i>', ['controller' => 'Photos', 'action' => 'index', $product->id], ['class' => 'btn btn-primary ', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class = "fas fa-edit"></i>', ['action' => 'edit', $product->id], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class = "fas fa-trash"></i>', ['action' => 'delete', $product->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'この商品を削除してもよろしいですか？']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <nav class="d-inline-block">
                    <ul class="pagination">
                    <?= $this->Paginator->first('<<') ?>
                    <?= $this->Paginator->prev('<') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('>') ?>
                    <?= $this->Paginator->last('>>') ?>
                    </ul>
                </nav>
                
            <?php endif; ?>
        </div>
    </div>
</div>