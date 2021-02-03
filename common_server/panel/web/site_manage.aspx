<%@ Page Language="C#" %>
<%@ Import namespace="MySql.Data" %>
<%@ Import namespace="MySql.Data.MySqlClient" %>

<script runat=server>

protected void appcmd()
{
    System.Diagnostics.Process p = new System.Diagnostics.Process();

    // 実行プロセス
    p.StartInfo.FileName = @"c:\windows\system32\inetsrv\appcmd.exe";

    // 引数
    string user = getAcount();
    p.StartInfo.Arguments = @"list site /site.name:" + user;

    p.StartInfo.UseShellExecute = false;
    p.StartInfo.RedirectStandardOutput = true;
    p.StartInfo.RedirectStandardInput = false;
    p.StartInfo.CreateNoWindow = true;

    p.Start();
    string results = p.StandardOutput.ReadToEnd();

    p.WaitForExit();
    p.Close();

    if (results.Contains("state:Started")) {
		Response.Write("起動中");
	} else {
		Response.Write("停止中");
	}

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

</script>

<% validate(); %>

<!-- #include file ="views/header.php" -->

<h1 class="captionL">サイトの管理</h1>

<% if(Page.Request.QueryString.Get("site") == "on") { %>
<p class="notice">サイトを起動しました。</p>
<% } else if(Page.Request.QueryString.Get("site") == "off") { %>
<p class="notice">サイトを停止しました。</p>
<% } %>

<p class="mb20">サイトは現在「<span class="attention"><% appcmd(); %>&nbsp;</span>」です。</p>

<div id="siteManage">
<form action="site_on_confirm.aspx" method="post" />
<input type="submit" value="サイト起動" class="inputBtn" /><br>
</form>
<form action="site_off_confirm.aspx" method="post" />
<input type="submit" value="サイト停止" class="inputBtn" /><br>
</form>
</div>

<!-- #include file ="views/footer.php" -->
