#db�̃p�X���[�h��ύX

if ($Args.count -ne 3) {
    echo "������3�ł͂���܂���"
    exit 1
}
php change_password.php $Args[0] $Args[1] $Args[2]

#Windows�̃p�X���[�h��ύX

net user $Args[1] $Args[2]