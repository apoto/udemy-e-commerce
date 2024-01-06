<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Order</h1>
        </div>

        <div class="col text-right">
            <?= $this->Html->link('< 戻る', ['action' => 'index'], ['class' => 'btn btn-primary', 'escape' => false]) ?>
        </div>
    </div>
    


    <!-- DataTales Example -->
    <div class="card shadow my-4">
        <div class="card-body">
            <h4><?= $order->full_name  ?></h4>
            <p><?= $order->email ?></p>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach($order->order_lines as $order_line):
                            $total += $order_line->quantity * $order_line->product->price ?>
                            <tr>
                                <td class="align-middle"><?= $order_line->product->name ?></td>
                                <td class="align-middle"><?= $order_line->product->price ?></td>
                                <td class="align-middle"><?= $order_line->quantity ?></td>
                                <td class="align-middle text-right font-weight-bold"><?= $this->Number->currency($order_line->quantity * $order_line->product->price) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" class="text-right font-weight-bold"><?= $this->Number->currency($total) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>