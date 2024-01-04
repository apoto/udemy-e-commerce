<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Photos</h1>
        </div>
        <div class="col text-right">
            <?= $this->Html->link('<i class = "fas fa-add"></i> 追加', ['action' => 'add', $productId], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>
    


    <!-- DataTales Example -->
    <div class="card shadow my-4"> 
        <div class="card-body">
            <?php if(!$photos->count()) : ?>
                <div class="alert alert-info">
                    写真がありません
                </div>

            <?php else : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>ALT</th>
                            <th>Created</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach($photos as $photo): ?>
                                <tr>
                                    <td class="align-middle text-center">
                                        <?= $this->Html->image('photos/file_name/' . $photo->file_dir . '/' . $photo->file_name, ['style' => 'width: 100px']) ?>
                                    </td>
                                    <td class="align-middle"><?= $photo->alt ?></td>
                                    <td class="align-middle"><?= $photo->created ?></td>
                                    <td class="align-middle text-right">
                                        <?= $this->Html->link('<i class = "fas fa-edit"></i>', ['action' => 'edit', $photo->id], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                                        <?= $this->Html->link('<i class = "fas fa-trash"></i>', ['action' => 'delete', $photo->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'この写真を削除してもよろしいですか？']) ?>
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