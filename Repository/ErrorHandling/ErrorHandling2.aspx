﻿<%@ Page Language="C#" AutoEventWireup="true" CodeFile="ErrorHandling2.aspx.cs" Inherits="ErrorHandling_ErrorHandling1" Trace="true" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            <asp:Button ID="Button1" runat="server" OnClick="Button1_Click" Text="Button" />
            <asp:Label ID="Label1" runat="server" ></asp:Label>
        </div>
    </form>
</body>
</html>
