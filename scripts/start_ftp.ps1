#
# �ϐ��錾
#

if ($Args.count -lt 3){
    echo "����������܂���"
    exit 1
}
if ($Args.count -gt 4){
    echo "�������������܂�"
    exit 1
}

$USER_NAME = $Args[1]
$USER_PASSWORD = $Args[2]

$IP = "203.137.93.207"
if ($Args.length -gt 3) {
  $IP = $Args[3]
  netsh interface ip add address name="�C�[�T�l�b�g 3" addr=$IP mask=255.255.252.0
}

#
# ���[�J�����[�U�[�쐬
#
$computer = [ADSI]"WinNT://."
$user = $computer.Create("user", $USER_NAME)
$user.SetPassword($USER_PASSWORD)
$user.SetInfo()
$user.FullName = $USER_NAME
$user.Description = $USER_NAME
$user.UserFlags = 0x10000 #�p�X���[�h�𖳊����ɐݒ�
$user.SetInfo()

# �N�I�[�^�̐ݒ�
fsutil quota modify E: 10737418240 10737418240 $USER_NAME

# ���[�J���O���[�v�Ƀ��[�J�����[�U�[��ǉ�

net localgroup Users $USER_NAME /add
copy-item tmpl E:\webroot\LocalUser\$USER_NAME -Recurse

# echo y | cacls E:\webroot\LocalUser\$USER_NAME /T /G "Users:R"

# IIS�ݒ�����邽�߂̃��W���[����ǂݍ���
import-module  WebAdministration

#
# IIS�ݒ菉������
#
