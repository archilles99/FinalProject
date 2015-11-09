<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><b><u>ใบสั่งซื้อวัตถุดิบ</b></u></h3>
        </div>
        <form action="" method="post" class="form-inline" role="form">
            <div class="form-group pull-right col-xs-12 col-sm-6 col-md-6 col-lg-5">
                <input type="hidden" name="p" value="product">	
            </div>
        </form>
        <div class="panel-body">
            <center>
                <table id="box"  width="555" border="0" cellpadding="0" cellspacing="0" bordercolor="#999999" bordercolordark="#FFFFFF" ononload="window.print();">
                    <tr>
                        <td height="21" colspan="2" align="center" >
                            <table width="656" height="487" border="0" cellpadding="0" cellspacing="0" bordercolor="#999999" bordercolordark="#FFFFFF" ononload="window.print();">
                                <tr>
                                    <td width="121" height="95" rowspan="4" align="left" bgcolor="#FFFFFF"><img src="image/logo_2_re.jpg" alt="" width="150" height="90" /></td>
                                    <td width="304" rowspan="4" align="left" valign="bottom" bgcolor="#FFFFFF"><p>iFootball Studio</p>
                                        <p>64/99 หมู่ 1 นครทอง ซ.2 ถ.บางนา-ตราด ต.ราชาเทวะ อ.บางพลี สมุทรปราการ 10540 โทรศัพท์ : 082-338-7880</p>
                                    </td>
                                    <td width="231" height="18" align="center" bgcolor="#FFFFFF"><U>ใบสั่งซื้อวัตถุดิบ</U></td>
                    </tr>
                    <tr>
                        <td height="18" align="right" >&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="12" align="right" >&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="12" align="center" >&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="2" colspan="3"><hr /></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center" bgcolor="#FFFFFF"><strong>รายละเอียดการสั่งซื้อวัตถุดิบ</td>
                    </tr>  	
                    <?php
                    $newid = $_GET['new_id'];
                    $sql = "SELECT * 
                        FROM receive_detail rd
                        LEFT JOIN receive_product rp ON rp.RE_ID = rd.RE_ID
                        LEFT JOIN product p ON rd.PRO_ID = p.PRO_ID
                        LEFT JOIN supplier s ON s.SUP_ID = rd.SUP_ID
                        WHERE rd.RE_ID = 'new_id'";
                    $saleq = mysql_query($sql);
                    $datasale = mysql_fetch_assoc($saleq);
                    ?>
                    <tr>
                        <td colspan="3" align="right" bgcolor="#FFFFFF"><strong>วันที่:<?php
                    list($y, $m, $d) = explode("-", $datasale['RE_DATE']);
                    echo "$d / $m / $y";
                    ?></strong></td>
                    </tr>
                    <tr>
                        <td height="24" colspan="3" align="left" bgcolor="#FFFFFF"><strong> เลขที่:<?php echo $datasale['RE_ID']; ?></strong></td>
                    </tr>
                    <tr>
                        <td height="11" colspan="3" bgcolor="#FFFFFF"><strong>ผู้สั่งซื้อ:&nbsp;&nbsp;<? echo 'นาย ณัฐพล ประสานเชื้อ';  ?></strong></td>
                    </tr>
                    <tr>
                        <td height="3" colspan="3" bgcolor="#FFFFFF"><strong>ตัวแทนจำหน่าย: </strong><?php echo $datasale['SUP_NAME'] ?><?php echo $datasale['SUP_ADD']; ?></td>
                    </tr>
                    <tr>
                        <td height="6" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
                    </tr>

                    <tr>
                        <td height="9" colspan="3" align="center" valign="top" bgcolor="#FFFFFF">
                            <table width="638" border="0" cellpadding="0" cellspacing="0" bordercolor="#999999" bordercolordark="#FFFFFF">
                                <tr>
                                    <td width="39" align="center">
                                        <hr /> #<hr />
                                    </td>
                                    <td width="200" align="center">
                                        <hr />รหัสวัตถุดิบ<hr />
                                    </td>
                                    <td width="200" align="center">
                                        <hr />รายการ<hr />
                                    </td>
                                    <td width="200" align="center">
                                        <hr />สี<hr />
                                    </td>
                                    <td width="33" align="center">
                                        <hr />จำนวน(ชิ้น)<hr />
                                    </td>
                                </tr>
                                <?php
                                $k = 1;

                                $sql = "SELECT * 
                                FROM receive_detail rd
                                LEFT JOIN receive_product rp ON rp.RE_ID = rd.RE_ID
                                LEFT JOIN product p ON rd.PRO_ID = p.PRO_ID
                                LEFT JOIN supplier s ON s.SUP_ID = rp.SUP_ID
                                WHERE rd.RE_ID = '$_GET[new_id]'";
                                // echo $sql;
                                $saledata = mysql_query($sql);
                                while ($salerow = mysql_fetch_assoc($saledata)) {
                                    ?>

                                <tr>
                                    <td align="center"><? echo $k ;?> </td>
                                    <td align="center"><? echo $salerow['raw_id']; ?></td>
                                    <td align="center"><? echo $salerow['raw_desc']; ?></td>
                                    <td align="center"><? echo $salerow['color_name']; ?></td>
                                    <td align="right"><? echo ($salerow['rrd_amount']); ?></td>

                                </tr><? $k++ ;} ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="9" colspan="3" align="right" valign="top" >&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="2" colspan="3" valign="top" ></td>
                    </tr>
                    <tr>
                        <td height="13" colspan="3" >&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="14" colspan="2" align="center" >&nbsp;</td>
                        <td height="14" align="center" >&nbsp;&nbsp; <? echo " วรพงษ์ คงประเสริฐ" ; ?></td>
                    </tr>
                    <tr>
                        <td height="13" colspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                        <td height="13" align="center" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________</td>
                    </tr>
                    <tr>
                        <td height="14" >&nbsp;</td>
                        <td height="14" >&nbsp;</td>
                        <td height="14" align="center" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้สั่งซื้อ</td>
                    </tr>
                    <tr>
                        <td height="27" colspan="3">&nbsp;</td>
                    </tr>
                </table>
                </td>
                </tr>
                </table>
                <p><a class="btn btn-default"href="index.php">กลับสู่หน้าหลัก</a></p>
            </center>