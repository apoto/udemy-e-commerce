<h2>こんにちは、<?= $order->last_name ?> <?= $order->first_name ?>さん、</h2>

<p>注文概要：</p>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>商品名</th>
            <th>単価</th>
            <th>個数</th>
            <th class="text-right">合計金額</th>
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

<table class="partie">
    <tr>
        <td align="center">
            <h3>またのご購入をお待ちしております！</h3>
            <p align="left">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </td>
    </tr>
</table>


<p>リンク付きテキスト：<a href="https://monlien.com">リンク</a></p>

<p align="center"><a href="#" class="button">ボタン</a></p>