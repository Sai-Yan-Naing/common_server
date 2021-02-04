<%@ Page Language="C#" %>
<%@ Import namespace="MySql.Data" %>
<%@ Import namespace="MySql.Data.MySqlClient" %>

<script runat=server>

protected void appcmd(string user)
{
    System.Diagnostics.Process p = new System.Diagnostics.Process();

    // 実行プロセス
    p.StartInfo.FileName = @"c:\windows\system32\inetsrv\appcmd.exe";

    // 引数
    p.StartInfo.Arguments = @"start apppool /apppool.name:" + user;

    p.StartInfo.UseShellExecute = false;
    p.StartInfo.RedirectStandardOutput = true;
    p.StartInfo.RedirectStandardInput = false;
    p.StartInfo.CreateNoWindow = true;

    p.Start();
    string results = p.StandardOutput.ReadToEnd();

    p.WaitForExit();
    p.Close();


}

protected void validate()
{
    if (Request.Cookies["p"] == null || Request.Cookies["d"] == null) {
        Response.Redirect("~/login.php");
        return;
    }
    
    string connstr = ConfigurationManager.AppSettings["MySqlString"];
    var conn = new MySqlConnection(connstr);
    MySqlCommand cmd = conn .CreateCommand();
    cmd.CommandText = "SELECT COUNT(domain) as cnt FROM web_account WHERE `domain` = @domain and `password` = @pass";
    cmd.Parameters.Add(new MySqlParameter("domain", Request.Cookies["d"].Value));
    cmd.Parameters.Add(new MySqlParameter("pass", Request.Cookies["p"].Value));
	cmd.Connection.Open();
	// 実行
	MySqlDataReader reader = cmd.ExecuteReader();
	int result = 0;
	while (reader.Read())
	{
		result = reader.GetInt32(0);
	}
	// クローズ
	reader.Close();
	cmd.Connection.Clone();

	if (result == 0)
	{
		Response.Redirect("~/login.php");
	}
	Request.Cookies["d"].Expires = DateTime.Now.AddMinutes(60);
	Request.Cookies["p"].Expires = DateTime.Now.AddMinutes(60);
    return;
}

protected string getAcount()
{
    string connstr = ConfigurationManager.AppSettings["MySqlString"];
    var conn = new MySqlConnection(connstr);
    MySqlCommand cmd = conn .CreateCommand();
    cmd.CommandText = "SELECT user FROM web_account WHERE `domain` = @domain and `password` = @pass";
    cmd.Parameters.Add(new MySqlParameter("domain", Request.Cookies["d"].Value));
    cmd.Parameters.Add(new MySqlParameter("pass", Request.Cookies["p"].Value));
	cmd.Connection.Open();
	// 実行
	MySqlDataReader reader = cmd.ExecuteReader();
	string user = "";
	while (reader.Read())
	{
		user = reader.GetString(0);
	}
	// クローズ
	reader.Close();
	cmd.Connection.Clone();

	return user;
}

</script>

<% validate(); %>

<% string user = getAcount(); %>
<% if (user == ""){ %>
<!-- #include file ="views/header.php" -->

<p>不正なユーザー名です。</p>

<!-- #include file ="views/footer.php" -->

<% } %>

<% appcmd(user); %>

<% Response.Redirect("~/app_list.aspx?is_app=1"); %>
