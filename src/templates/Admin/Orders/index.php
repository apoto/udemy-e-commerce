<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Order</h1>
        </div>

        <div class="col text-right">
            <?= $this->Html->link('csv出力', ['action' => 'export'], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>
    


    <!-- DataTales Example -->
    <div class="card shadow my-4">
        <div class="card-body">
            <?php if(!$orders->count()) : ?>
                <div class="alert alert-info">
                    注文がありません
                </div>

            <?php else : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach($orders as $order): ?>
                                <tr>
                                    <td class="align-middle"><?= $order->full_name ?></td>
                                    <td class="align-middle"><?= $order->created->format('Y/m/d') ?></td>
                                    <td class="text-right">
                                        <?= $this->Html->link('<i class = "fas fa-search"></i>', ['controller' => 'Orders', 'action' => 'view', $order->id], ['class' => 'btn btn-primary ', 'escape' => false]) ?>    
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