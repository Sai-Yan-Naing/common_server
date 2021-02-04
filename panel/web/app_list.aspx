<%@ Page Language="C#" %>
<%@ Import namespace="System.Collections.Generic" %>
<%@ Import namespace="MySql.Data" %>
<%@ Import namespace="MySql.Data.MySqlClient" %>

<script runat=server>

protected List<string> appcmd(string user)
{
    System.Diagnostics.Process p = new System.Diagnostics.Process();

    // 実行プロセス
    p.StartInfo.FileName = @"c:\windows\system32\inetsrv\appcmd.exe";

    // 引数
    p.StartInfo.Arguments = @"list app /site.name:" + user;

    p.StartInfo.UseShellExecute = false;
    p.StartInfo.RedirectStandardOutput = true;
    p.StartInfo.RedirectStandardInput = false;
    p.StartInfo.CreateNoWindow = true;

    p.Start();

	List<string> results = new List<string>();
	string line;
	while (true) {
		line = p.StandardOutput.ReadLine();
		if (line == null) break;
		System.Text.RegularExpressions.MatchCollection mc = System.Text.RegularExpressions.Regex.Matches(line, "\".+?\"");
		string dir = mc[0].Value.Substring(user.Length + 1).Replace("\"","");
		if (dir == "/") {
			continue;
		}
		results.Add(dir);
	}

    p.WaitForExit();
    p.Close();

    return results;
}

protected string apppoolcmd(string user)
{
    System.Diagnostics.Process p = new System.Diagnostics.Process();

    // 実行プロセス
    p.StartInfo.FileName = @"c:\windows\system32\inetsrv\appcmd.exe";

    // 引数
    p.StartInfo.Arguments = @"list apppool /apppool.name:" + user;

    p.StartInfo.UseShellExecute = false;
    p.StartInfo.RedirectStandardOutput = true;
    p.StartInfo.RedirectStandardInput = false;
    p.StartInfo.CreateNoWindow = true;

    p.Start();
    string results = p.StandardOutput.ReadToEnd();

    p.WaitForExit();
    p.Close();

    return results;
}

protected List<string> dircmd(string user, string sub_dir = "")
{
    System.Diagnostics.Process p = new System.Diagnostics.Process();

    // 実行プロセス
    p.StartInfo.FileName = @"cmd";

    // 引数
    p.StartInfo.Arguments = @"/c dir /b /ad E:\webroot\LocalUser\" + user + @"\web" + sub_dir;

    p.StartInfo.UseShellExecute = false;
    p.StartInfo.RedirectStandardOutput = true;
    p.StartInfo.RedirectStandardInput = false;
    p.StartInfo.CreateNoWindow = true;

    p.Start();
    List<string> results = new List<string>();
	string line;
	while (true) {
		line = p.StandardOutput.ReadLine();
		if (line == null) break;
		results.Add(line);
	}

    p.WaitForExit();
    p.Close();

    return results;
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

<%
	validate(); 
	string user = getAcount();

	string sub_dir = "";
	if (Page.Request.QueryString.Get("sub_dir") != null) {
		sub_dir = HttpUtility.UrlDecode(Page.Request.QueryString.Get("sub_dir")).Replace("/", "\\");
	}

	List<string> app_list = appcmd(user);
	List<string> dir_list = dircmd(user);
	string app_ver = apppoolcmd(user);
%>

<!-- #include file ="views/header.php" -->


<h1 class="captionL">アプリケーションの管理</h1>

<% if (Page.Request.QueryString.Get("is_ver") == "1") { %>
<p class="notice">.NET Frameworkのバージョンを変更しました。</p>
<% } %>

<% string is_app = Page.Request.QueryString.Get("is_app"); %>

<% if (is_app == "1") { %>
<p class="notice">アプリケーションプールを起動しました。</p>
<% } else if (is_app == "2") { %>
<p class="notice">アプリケーションプールを停止しました。</p>
<% } else if (is_app == "3") { %>
<p class="notice">アプリケーションプールをリサイクルしました。</p>
<% } else if (is_app == "4") { %>
<p class="notice">アプリケーションを追加しました。</p>
<% } else if (is_app == "5") { %>
<p class="notice">アプリケーションを削除しました。</p>
<% } %>

<p>
	<%
	string v2 = "";
	string v4 = "";
	if (app_ver.Contains("MgdVersion:v4.0")) { %>
		.NET Frameworkのバージョンは<span class='attention'>&nbsp;4.0 / 4.5&nbsp;</span>です。
		<%
		v4 = "selected";
	} else if(app_ver.Contains("MgdVersion:v2.0")) { %>
		.NET Frameworkのバージョンは<span class='attention'>&nbsp;2.0 / 3.5&nbsp;</span>です。
		<%
		v2 = "selected";
	} else { %>
		Application pool error
	<%
	}
	%>
</p>
<form action="change_appver.aspx" method="post">

<select name="v">
	<option value="v2.0" <% Response.Write(v2); %> />
	
	.Net Framework 2.0 / 3.5
	
	</option>
	<option value="v4.0" <% Response.Write(v4); %> />
	
	.Net Framework 4.0 / 4.5
	
	</option>
</select>
<input type="submit" value="バージョン変更" class="inputBtn" />
</form>

<p>現在、アプリケーションプールは<font color="#FF0000">
	<%
	if (app_ver.Contains("Stopped")) {
		Response.Write("停止中");
	} else if(app_ver.Contains("Started")) {
		Response.Write("起動中");
	} else {
		Response.Write("何らかのエラー状態");
	}
	%>
	</font> です。</p>
<table id="appPool">
	<tr>
		<td><form action="app_stop.aspx" method="post" />
			
			<input type="submit" value="アプリケーションプールを停止する" class="inputBtn" />
			</form></td>
		<td><form action="app_start.aspx" method="post" />
			
			<input type="submit" value="アプリケーションプールを起動する" class="inputBtn" />
			</form></td>
		<td><form action="app_recycle.aspx" method="post" />
			
			<input type="submit" value="アプリケーションプールをリサイクルする" class="inputBtn" />
			</form></td>
	</tr>
</table>
<p> 特定のディレクトリ下でASP.NETのアプリケーションを利用するには、<br />
	アプリケーションプールに仮想ディレクトリを追加する必要がございます。<br />
	アプリケーションの追加と削除は、ディレクトリを指定して実施してください。 </p>


<% if(app_list.Count != 0) { %>
<table class="appListTable">
	<caption>登録済アプリケーション一覧</caption>
		<% foreach (string app_row in app_list) { %>
	<tr>
		<th><% Response.Write(app_row); %></th>
		<td><form action="app_remove.aspx" method="post">
			
			<input type="hidden" name="current" value="<% Response.Write(sub_dir); %>" />
			<input type="hidden" name="path" value="<% Response.Write(app_row); %>" />
			<input type="submit" value="アプリケーション削除" class="inputBtn" />
			</form></td>
	</tr>
		<% } %>
</table>

<% } %>
<%
	sub_dir = sub_dir.Replace("\\", "/");
	int prev_length = sub_dir.IndexOf("/");
	if (prev_length == -1) prev_length = 0;
	string prev_dir = sub_dir.Substring(0, prev_length);
	string current_dir = "";
	if (sub_dir ==  "") {
		current_dir = "ディレクトリ一覧";
	} else {
		current_dir = sub_dir + " 以下のディレクトリ一覧";
	}
%>

<table class="appListTable">
	<caption><% Response.Write(current_dir); %></caption>
	<tr>
		<th colspan="2"><a href="app_list.aspx">ルートディレクトリに戻る</a></th>
	</tr>
	<tr>
		<th colspan="2"><a href="app_list.aspx?sub_dir=<% Response.Write(HttpUtility.UrlEncode(prev_dir)); %>">▲1つ上のディレクトリに戻る</a></th>
	</tr>
	<% foreach (string dir_row in dir_list) { %>
	<tr>
		<th><%
	string rep = "E:\\webroot\\LocalUser\\$user\\web";
	string dir_l = sub_dir + "/" + dir_row.Replace(rep,"").Replace("\\", "/");
	%>
			<a href="app_list.aspx?sub_dir=<% Response.Write(HttpUtility.UrlEncode(dir_l)); %>" /><% Response.Write(dir_l); %></a></th>
		<td><form action="app_add.aspx" method="post">
			
			<input type="hidden" name="current" value="<% Response.Write(sub_dir); %>" />
			<input type="hidden" name="path" value="<% Response.Write(dir_l); %>" />
			<input type="submit" value="アプリケーション追加" class="inputBtn" />
			</form></td>
	<tr>
		<% } %>
</table>


<!-- #include file ="views/footer.php" -->
