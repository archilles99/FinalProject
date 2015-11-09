<div class="row hidden-print">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-primary" type="button" onclick="window.print();">Print</button>
    </div>
</div>
<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2>ใบสั่งซื้อสินค้า</h2><h3 class="pull-right">เลขที่ : <?= $headerData['RE_ID'] ?></h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Billed To:</strong><br>
                            <?= $headerData['SUP_NAME'] ?><br>
                            <?= $headerData['SUP_ADD'] ?><br>
                            <?= $headerData['SUP_TEL'] ?><br>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Shipped To:</strong><br>
                            iFootball Studio<br>
                            64/99 ถ.บางนา-ตราด ต.ราชาเทวะ อ.บางพลี จ.สมุทรปราการ<br>
                            082-338-7880<br>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Order Date:</strong><br>
                            <?= $headerData['RE_DATE'] ?><br><br>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>รายการใบสั่งซื้อสินค้า</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>รายการ</strong></td>
                                        <td class="text-center"><strong>จำนวน</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if (count($detailData) > 0) {
                                        $sumtotal = 0;
                                    foreach ($detailData as $row) { 
                                        $totals = $row['PRO_PRICE'] * $row['PRO_QTY'];
                                        $sumtotal += $totals;
                                        $totalprice = $sumtotal + $config['shipping'];
                                    ?>
                                    <tr>
                                        <td><?= $row['BRAND_NAME'].$row['GEN_NAME']." ".$row['PRO_SIZE'] ?></td>
                                        <td class="text-center"><?= $row['PRO_QTY'] ?></td>
                                    </tr>
                                    <?php }
                                    } else { ?>
                                    <tr>
                                        <td colspan="4" class="text-center">ไม่มีข้อมูล</td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <!--<td class="thick-line text-center"><br><strong>Total</strong></td>
                                        <td class="thick-line text-right"><br><u><?= number_format($sumtotal, 2) ?></u></td>-->
                                    </tr>
                                    <!--<tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Shipping</strong></td>
                                        <td class="no-line text-right"><?= number_format($config['shipping'], 2) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Total</strong></td>
                                        <td class="no-line text-right"><?= number_format($totalprice, 2) ?></td>-->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>