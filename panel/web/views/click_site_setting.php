<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SideBar Menu</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        function get(obj) {
            return document.getElementById(obj);
        }

        function tabOne() {
            get("tab1").style.background = "#f5f5f5";
            get("tab2").style.background = "#fff";
            get("tab3").style.background = "#fff";
            get("install-app").style.display = "block";
            get("basic-setting").style.display = "none";
            get("app-setting").style.display = "none";
        }

        function tabTwo() {
            get("tab1").style.background = "#fff";
            get("tab2").style.background = "#f5f5f5";
            get("tab3").style.background = "#fff";
            get("install-app").style.display = "none";
            get("basic-setting").style.display = "block";
            get("app-setting").style.display = "none";
        }

        function tabThree() {
            get("tab1").style.background = "#fff";
            get("tab2").style.background = "#fff";
            get("tab3").style.background = "#f5f5f5";
            get("install-app").style.display = "none";
            get("basic-setting").style.display = "none";
            get("app-setting").style.display = "block";
        }
    </script>

</head>

<body>



    <div class="main_container">
        <div class="sidebar">
            <div class="sidebar__inner">

                <ul>
                    <li>
                        <a href="#" class="active">
                            <span class="icon"><i class="fas fa-server"></i></span><br>
                            <span class="title">サーバー設定</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fas fa-envelope"></i></span><br>
                            <span class="title">ＭＡＩＬ設定</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fas fa-cog"></i></span><br>
                            <span class="title">各種設定</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fas fa-file-alt"></i></span><br>
                            <span class="title">マニュアル</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container site_setting">


            <div class="left-view">
                <div><span class="icon domain-icon"><i class="fas fa-desktop"></i></span></div>
                <div><span class="text-center">a.com</span></div>
                <div><span class="text-center">ドメイン</span></div>
                <div><span class="icon"><i class="fas fa-laptop-code"></i></span><a href="#"><span class="title">サイト設定</span></a></div>
                <div><span class="icon"><i class="fas fa-cogs"></i></span><a href="#"><span class="title">サイトセキュリティ</span></a></div>
                <div><span class="icon"><i class="fas fa-database"></i></span><a href="#"><span class="title">データベース</span></a></div>
                <div><span class="icon"><i class="fas fa-laptop-code"></i></span><a href="#"><span class="title">FTP</span></a></div>
                <div><span class="icon"><i class="fas fa-folder"></i></span><a href="#"><span class="title">ファイルマネージャー</span></a></div>
                <div><span class="icon"><i class="fas fa-chart-pie"></i></span><a href="#"><span class="title">アクセス解析</span></a></div>
            </div>
            <div class="right-view">
                <span>Winserver Controlpanel Share server</span>
                <ul class="tab-bar">
                    <li class="tabs" id="tab1" onclick="tabOne()">アプリケーションインストール</li>
                    <li class="tabs" id="tab2" onclick="tabTwo()">基本設定</li>
                    <li class="tabs" id="tab3" onclick="tabThree()">応用設定</li>
                    <div class="panel" id="install-app">
                        <form action="" class="install-app">
                            <div class="app">
                                <span class="application">アプリケーション</span>
                                <input type="radio" id="wordpress" name="app" value="wordpress"><label for="wordpress">Wordpress</label>
                                <input type="radio" id="ECCUBE" name="app" value="ECCUBE"><label for="ECCUBE">ECCUBE</label>
                            </div>
                            <br>
                            <div>
                                <span class="install-method">インストール方法</span>
                                <span>新規インストール</span>
                            </div><br>
                            <div class="ver">
                                <span class="version">バージョン</span>
                                <input type="radio" id="ver-4" name="version" value="4.9.12"><label for="version">4.9.12</label>
                                <input type="radio" id="ver-5" name="version" value="ECCUBE"><label for="version">5.5.0s</label>
                            </div> <br>
                            <div>
                                <span class="url"><label for="url">URL</label></span><input type="text" id="url" name="url" value="" placeholder="http(s)://ドメイン名/入力は任意"><br>
                            </div><br>
                            <div>
                                <span class="s-name"><label for="site-name">サイト名</label></span><input type="text" id="site-name" name="site-name" value="" placeholder="サイト名"><br>
                            </div><br>
                            <div>
                                <span class="user"><label for="user-name">ユーザー名</label></span><input type="text" id="user-name" name="user-name" value="" placeholder="1～255文字、半角英数小文字と_-.@"><br>
                            </div><br>
                            <div>
                                <span class="mail"><label for="mail">メールアドレス</label></span><input type="email" id="mail" name="mail" value="" placeholder="support@winserver.ne.jp"><br>
                            </div><br>
                            <div>
                                <span class="pass"><label for="password">パスワード</label></span><input type="password" id="password" name="user-name" value="" placeholder="8～70文字、半角英数記号の組み合わせ"><br>
                            </div><br>
                            <div>
                                <span class="db">データベース</span>
                                <span class="db-name"><label for="database-name">データベース名</label></span><input type="text" id="database-name" name="database-name" value="" placeholder="データベース名"><br>
                            </div><br>
                            <div>
                                <span class="db-row"></span>
                                <span class="db-user"><label for="database-user">ユーザー名</label></span><input type="text" id="database-user" name="database-user" value="" placeholder="ユーザー名"><br>
                            </div><br>
                            <div>
                                <span class="db-row"></span>
                                <span class="db-pass"><label for="database-pass">パスワード</label></span><input type="text" id="database-pass" name="database-pass" value="" placeholder="8～70文字、半角英数字記号"><br>
                            </div><br>
                            <div class="button">
                                <input type="reset" class="clear" value="クリア">
                                <input type="button" class="insert" value="インストール">
                            </div>
                        </form>
                    </div>
                    <div class="panel" id="basic-setting">
                        <h3>基本設定</h3>

                    </div>
                    <div class="panel" id="app-setting">
                        <h3>応用設定</h3>

                    </div>
                </ul>


            </div>




        </div>

    </div>


</body>

</html>