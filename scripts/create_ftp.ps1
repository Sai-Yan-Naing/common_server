$USER_NAME=$Args[0]
$USER_PASSWORD=$Args[1]
$FOLDER=$Args[2]
$PERMISSION=$Args[3]
$TYPE=$Args[4]

if( $TYPE -eq "new" )
{

	$computer = [ADSI]"WinNT://."
	$user = $computer.Create("user", $USER_NAME)
	$user.SetPassword($USER_PASSWORD)
	$user.SetInfo()
	$user.FullName = $USER_NAME
	$user.Description = $USER_NAME
	$user.UserFlags = 0x10000 #ƒpƒXƒ[ƒh‚ð–³ŠúŒÀ‚ÉÝ’è
	$user.SetInfo()

	# ƒNƒI[ƒ^‚ÌÝ’è
	fsutil quota modify E: 10737418240 10737418240 $USER_NAME

	# ƒ[ƒJƒ‹ƒOƒ‹[ƒv‚Éƒ[ƒJƒ‹ƒ†[ƒU[‚ð’Ç‰Á

	net localgroup Users $USER_NAME /add

	cacls E:\webroot\LocalUser\$FOLDER /T /E /G "${USER_NAME}:${PERMISSION}"

}elseif( $TYPE -eq "edit" ){

	$NewPassword = ConvertTo-SecureString $USER_PASSWORD -AsPlainText -Force
	Set-LocalUser -Name $USER_NAME -Password $NewPassword

	cacls E:\webroot\LocalUser\$FOLDER /T /E /P "${USER_NAME}:${PERMISSION}"

}else{
	 $acl=get-acl E:\webroot\LocalUser\$FOLDER
	 $accessrule = New-Object system.security.AccessControl.FileSystemAccessRule($USER_NAME,"Read",,,"Allow")
	 $acl.RemoveAccessRuleAll($accessrule)
	 Set-Acl -Path "E:\webroot\LocalUser\$FOLDER" -AclObject $acl
	 Remove-LocalUser -Name $USER_NAME
}

pause