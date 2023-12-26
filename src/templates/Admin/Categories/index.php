<div class="container-fluid mt-5">
<h1 class="h3 mb-2 text-gray-800">Categories</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">カテゴリーリスト</h6>
  </div>
  <div class="card-body">
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
          <tr>
            <?php foreach($categories as $category): ?>
                <td class="align-middle"><?= $category->name ?></td>
                <td class="align-middle"><?= $category->created->format('Y/m/d') ?></td>
                <td class="text-right">
                    <?= $this->Html->link('<i class = "fas fa-edit"></i>', ['action' => 'edit'], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class = "fas fa-trash"></i>', ['action' => 'delete'], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'このカテゴリーを削除してもよろしいですか？']) ?>
                </td>
            <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>