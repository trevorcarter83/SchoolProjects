<%@ Page Language="C#" AutoEventWireup="true" CodeFile="oldFooterHost.aspx.cs" Inherits="UCMP_FooterHost" %>
<%@ Register TagPrefix="apress" TagName="Footer" Src="~/UCMP/PageFooter.ascx" %>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <h1>A Page With a Footer</h1><hr />
            Static Page Text<br /><br />
            <apress:Footer ID="Footer1" runat="server" />
        </div>
    </form>
</body>
</html>
