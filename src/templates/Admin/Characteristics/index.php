<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">商品特性</h1>
        </div>
        <div class="col text-right">
            <?= $this->Html->link('<i class = "fas fa-add"></i> 追加', ['action' => 'add'], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>
    


    <!-- DataTales Example -->
    <div class="card shadow my-4">
        <div class="card-body">
            <?php if(!$characteristics->count()) : ?>
                <div class="alert alert-info">
                    商品特性がありません
                </div>

            <?php else : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>特性名</th>
                            <th>作成日</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach($characteristics as $characteristic): ?>
                                <tr>
                                    <td class="align-middle"><?= $characteristic->name ?></td>
                                    <td class="align-middle"><?= $characteristic->created->format('Y/m/d') ?></td>
                                    <td class="text-right">
                                        <?= $this->Html->link('<i class = "fas fa-list"></i>', ['controller' => 'CharacteristicValues', 'action' => 'index', $characteristic->id], ['class' => 'btn btn-primary ', 'escape' => false]) ?>    
                                        <?= $this->Html->link('<i class = "fas fa-edit"></i>', ['action' => 'edit', $characteristic->id], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class = "fas fa-trash"></i>', ['action' => 'delete', $characteristic->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'この特徴を削除してもよろしいですか？']) ?>
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