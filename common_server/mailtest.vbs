ServerIP    = "203.137.92.7"

'���[���{��
TextBody  = "�o�b�N�A�b�v���������܂��� " & vbCrLf & ServerIP & vbCrLf & vbCrLf


'��M�惁�[���A�h���X
MailTo    = "katakami@japansys.co.jp"
'���[���\��
Subject   = "[notice] SQL Server backup log"


Call SendMail(MailTo,Subject,TextBody)


Sub SendMail(strMailTo,strSubject,strTextBody)
    Dim objMsg
    
    Set objMsg = CreateObject("CDO.Message")
 
    objMsg.MimeFormatted = True
    objMsg.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserver") = "127.0.0.1" '���M���[���T�[�o
    objMsg.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserverport") = 25 '�|�[�g�ԍ�

    objMsg.Configuration.Fields.Update
    objMsg.From = "notify@panel1.winserver.ne.jp" '���M�����[���A�h���X
    objMsg.Subject = strSubject '���[���^�C�g��
    objMsg.TextBody = strTextBody '���[���{��

    objMsg.To = strMailTo '���M�惁�[���A�h���X
    objMsg.Send '���M

    Set objMsg = Nothing
End Sub