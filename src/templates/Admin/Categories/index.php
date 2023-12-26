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
            <th>Num</th>
            <th>Created Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach($categories as $category): ?>
                <td><?= $category->id ?></td>
                <td><?= $category->name ?></td>
            <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>