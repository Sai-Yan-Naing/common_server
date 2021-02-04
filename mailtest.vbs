ServerIP    = "203.137.92.7"

'メール本文
TextBody  = "バックアップが完了しました " & vbCrLf & ServerIP & vbCrLf & vbCrLf


'受信先メールアドレス
MailTo    = "katakami@japansys.co.jp"
'メール表題
Subject   = "[notice] SQL Server backup log"


Call SendMail(MailTo,Subject,TextBody)


Sub SendMail(strMailTo,strSubject,strTextBody)
    Dim objMsg
    
    Set objMsg = CreateObject("CDO.Message")
 
    objMsg.MimeFormatted = True
    objMsg.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserver") = "127.0.0.1" '送信メールサーバ
    objMsg.Configuration.Fields.Item("http://schemas.microsoft.com/cdo/configuration/smtpserverport") = 25 'ポート番号

    objMsg.Configuration.Fields.Update
    objMsg.From = "notify@panel1.winserver.ne.jp" '送信元メールアドレス
    objMsg.Subject = strSubject 'メールタイトル
    objMsg.TextBody = strTextBody 'メール本文

    objMsg.To = strMailTo '送信先メールアドレス
    objMsg.Send '送信

    Set objMsg = Nothing
End Sub