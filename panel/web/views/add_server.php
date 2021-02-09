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

    </script>


</head>

<body>



    <div class="main_container">
        <div class="sidebar">
            <div class="sidebar__inner">
                <ul>
                    <li>
                        <a href="#" class="active">
                            <span class="icon"><i class="fas fa-desktop"></i></span><br>
                            <span class="title">サーバー管理</span>
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
        <div class="container">
            <h1>Winserver Controlpanel Share server</h1>

            <form action="" class="form-input">
                <label for="id">契約ID</label>
                <input type="text" id="id" name="id" value="D0000000">
            </form>

            <div class="server">
                <div class="add-server"><span class="">サーバー追加</span></div>
                <div class="server-type">
                    <div class="server-name"><span>共用サーバー</span></div>
                    <div class="server-name">
                        <span>VPSサーバー</span>
                        <div class="tab vps-tab">
                            <button class="tablinks" onclick="vpsSSD()">SSD</button>
                            <button class="tablinks" onclick="vpsHDD()">HDD</button>

                        </div>
                    </div>
                    <div class="server-name">
                        <span>WindowsDesktop</span>
                        <div class="tab wd-tab">
                            <button class="tablinks" id="wd1" onclick="wdSSD()">SSD</button>
                            <button class="tablinks" id="wd2" onclick="wdHDD()">HDD</button>
                        </div>
                    </div>
                    <div class="server-name"><span>専用サーバー</span></div>
                </div>
            </div>






        </div>

    </div>


</body>

</html>