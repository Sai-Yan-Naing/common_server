if ($Args.count -ne 1){
    echo "引数が足りません"
    exit 1
}

net user $Args /active:yes
C:\\Windows\\System32\\inetsrv\\appcmd.exe start apppool /apppool.name:$Args
C:\\Windows\\System32\\inetsrv\\appcmd.exe start site /site.name:$Args
php restart_server.php $Args