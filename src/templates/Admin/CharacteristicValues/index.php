<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">商品特性オプション</h1>
        </div>
        <div class="col text-right">
            <?= $this->Html->link('<i class = "fas fa-add"></i> 追加', ['action' => 'add', $characteristicId], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>
    


    <!-- DataTales Example -->
    <div class="card shadow my-4">
        <div class="card-body">
            <?php if(!$characteristicValues->count()) : ?>
                <div class="alert alert-info">
                    商品特性オプションがありません
                </div>

            <?php else : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>オプション名</th>
                            <th>作成日</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach($characteristicValues as $characteristicValue): ?>
                                <tr>
                                    <td class="align-middle"><?= $characteristicValue->name ?></td>
                                    <td class="align-middle"><?= $characteristicValue->created->format('Y/m/d') ?></td>
                                    <td class="text-right">
                                        <?= $this->Html->link('<i class = "fas fa-edit"></i>', ['action' => 'edit', $characteristicValue->id], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class = "fas fa-trash"></i>', ['action' => 'delete', $characteristicValue->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'この特徴を削除してもよろしいですか？']) ?>
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