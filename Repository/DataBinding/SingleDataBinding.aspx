<%@ Page Language="C#" AutoEventWireup="true" CodeFile="SingleDataBinding.aspx.cs" Inherits="DataBinding_SingleDataBinding" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:Label ID="lblTimeBrowser" runat="server">
                The current time is <%# SystemTime %>
                 and the browser is: <%# Request.Browser.Browser %>
            </asp:Label>
            <br />
            <asp:Label ID="lblDynamic" runat="server"><%# URL %></asp:Label>
            <br />
            <asp:CheckBox ID="chkDynamic" runat="server" Text="<%# URL %>" />
            <br />
            <asp:HyperLink ID="lnkDynamic" runat="server" Text="Click Here" NavigateUrl="<%# URL %>"></asp:HyperLink>
            <br />
            <asp:Image ID="imgDynamic" ImageUrl="<%# URL %>" runat="server" />
            
        </div>
    </form>
</body>
</html>
