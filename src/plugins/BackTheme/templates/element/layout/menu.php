<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Ecommerce <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <?= $this->Html->link('<i class="fas fa fa-shop"></i> 注文', [
      'controller' => 'Orders', 'action' => 'index'], ['class' => 'nav-link' ,'escape' => false]) ?>

    <?= $this->Html->link('<i class="fas fa fa-list"></i> カテゴリー', [
      'controller' => 'Categories', 'action' => 'index'], ['class' => 'nav-link' ,'escape' => false]) ?>

    <?= $this->Html->link('<i class="fas fa fa-cogs"></i> 特徴', [
      'controller' => 'Characteristics', 'action' => 'index'], ['class' => 'nav-link' ,'escape' => false]) ?>

    <?= $this->Html->link('<i class="fas fa fa-shopping-cart"></i> 商品', [
        'controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link' ,'escape' => false]) ?>

    <?= $this->Html->link('<i class="fas fa fa-user"></i> ログアウト', [
        'controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link' ,'escape' => false]) ?>
  </li>

</ul>
<!-- End of Sidebar -->