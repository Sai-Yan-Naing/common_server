<?php 

$password = $_COOKIE["p"];
$domain = $_COOKIE["d"];

?>
<?php require("views/dheader.php") ?>
<!-- Start of Wrapper  -->
    <div class="wrapper">

        <?php require("views/sidebar_menu.php") ?>
        
        <!-- Start of Page Content  -->
        <div id="content" class="contract_information"  style="margin-top: 87px;">
            <div class="row">
                <div class="col-sm-2">
                    <div class="icon-align"><span class="domain-icon"><i class="fas fa-desktop"></i></span></div><br>
                    <div class="icon-align"><span class="text-center"><?php echo $_COOKIE['d']; ?></span></div><br>
                    <div class="m-40"><span>ドメイン</span></div><br>
                    <div class="m-40"><a href="#"><span>ご契約情報</span></a></div><br>
                    <div class="m-40"><a href="mail_information.php"><span >ドメイン</span></a></div><br>
                    <div class="m-40"><a href="#"><span>自動バックアップ</span></a></div><br>
                </div>
                <div class="col-sm-10">
                    <h6 class="wserver">Winserver Controlpanel Share server</h6>
                    <div class="contract">
                        <div class="server-info">
                            <h6 class="6">サーバー情報</h6>
                            
                            <form action="" method="post" id="server-information" />

                                <div class="text-label-align">
                                    基本情報
                                </div>
                                <div class="form-group row">
                                    <label for="con-server" class="col-sm-3 col-form-label">接続サーバー</label>
                                    <div class="col-sm-8"><span class="col-form-label"> サイトが収納されているＩＰアドレスを表示 </span></div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">ステータス</label>
                                    <div class="col-sm-2"><span class="col-form-label"> 起動中 </span></div>
                                    <div class="col-sm-6"><input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm"> </div>
                                </div>
                                <div class="form-group row">
                                    <label for="app-pool" class="col-sm-3 col-form-label">アプリケーションプール</label>
                                    <div class="col-sm-2"><span class="col-form-label"> 起動中 </span></div>
                                    <div class="col-sm-6"><input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="ON" data-off="OFF" data-size="sm"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="capacity-used" class="col-sm-3 col-form-label">使用ディスク容量</label>
                                    <div class="col-sm-4" id="chartContainer" style="height: 300px; width: 100%;"> </div>
                                    <div class="col-sm-4"><span class="gb"> 〇〇ＧＢ </span></div>
                                </div>
                            
                                <div class="text-label-align mt-5">
                                    ＤＮＳ情報
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">タイプ</div>
                                    <div class="col-sm-2 col-form-label text-center">ホスト名</div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label">ＩＰアドレス/ドメイン名</div>
                                    <div class="col-sm-1"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="mail" readonly></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_address" name="ip-address" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#" data-toggle="modal" data-target="#ipAddressNameModal"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="www" readonly></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_address" name="ip-address" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#" data-toggle="modal" data-target="#ipAddressNameModal"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="" readonly></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_address" name="ip-address" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#" data-toggle="modal" data-target="#ipAddressNameModal"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 col-form-label">A</div>
                                    <div class="col-sm-2 col-form-label"><input type="text" class="form-control" id="hostname" name="hostname" value="" readonly></div>
                                    <div class="col-sm-2 col-form-label">ドメイン名</div>
                                    <div class="col-sm-3 col-form-label text-center"><input type="text" class="form-control" id="ip_address" name="ip-address" value="ＩＰアドレス" readonly></div>
                                    <div class="col-sm-1 mt-2"><a href="#" data-toggle="modal" data-target="#ipAddressNameModal"><i class="fas fa-pencil-alt"></i> </a></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 text-center">
                                        <button type="reset" class="btn btn-outline-dark text-dark">キャンセル</button>
                                        <button type="submit" class="btn btn-outline-dark text-dark">保存</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>


            <!--Start IP Address Name Modal -->
            <div class="modal fade" id="ipAddressNameModal" tabindex="-1" role="dialog" aria-labelledby="ipAddressNameModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-less">
                            <h5 class="modal-title" id="ipAddressNameModalTitle">Change Status Code and URL</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" id="edit-server-information" />
                            <div class="modal-body border-less">
                                <div class="model-line-spacing form-group row">
                                    <label for="hostname" class="col-sm-7 col-form-label">ホスト名</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="hostname" name="hostname" value="mail">    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ip-address" class="col-sm-7 col-form-label">ＩＰアドレス/ドメイン名</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="ip-address" name="ip_address" value="ＩＰアドレス">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group modal-footer border-less">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--End IP Address Name Modal -->
        </div>
        <!--End of Page Content  -->
    </div>
    <!-- End of Wrapper  -->

    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
            {
            axisY: {
                maximum: 1000,
                minimum:100
            },
            data: [
            {
                type: "bar",
                showInLegend: true,
                legendText: "Data Usage",
                color: "blue",
                dataPoints: [
                { y: 957, label: "Disk capacity used"},
        
                ]
            }
            ]
            });

        chart.render();
        }
    </script>

<?php require("views/footer.php") ?>