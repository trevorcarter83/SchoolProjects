<%@ Page Language="C#" AutoEventWireup="true" CodeFile="ViewState.aspx.cs" Inherits="State_ViewState" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:Label ID="Label1" runat="server" Text="Hello World" EnableViewState="True"></asp:Label>
            <br />
            <asp:TextBox ID="TextBox1" runat="server" EnableViewState="True" Text="Hello Box"></asp:TextBox>
            <br />
            <asp:DropDownList ID="DropDownList1" runat="server" EnableViewState="True">
                <asp:ListItem>CLU</asp:ListItem>
                <asp:ListItem>Tron</asp:ListItem>
                <asp:ListItem>Flynn</asp:ListItem>
            </asp:DropDownList>
            <br />
            <asp:Button ID="Button1" runat="server" Text="Change the Label" OnClick="ChangeLabel_Click" />
            <br />
            <asp:Button ID="Button2" runat="server" Text="Change the Label Color" OnClick="ChangeLabelColor_Click" />
            <br />
            <asp:Button ID="Button3" runat="server" Text="Change the Textbox" OnClick="ChangeTextbox_Click" />
            <br />
            <asp:Button ID="Button4" runat="server" Text="Change the Textbox Read Only" OnClick="ChangeTextboxReadOnly_Click" />
            <br />
            <asp:Button ID="Button5" runat="server" Text="Change to the Second List Item" OnClick="ChangeSelectedItem_Click" />
            <br />
            <asp:Button ID="Button6" runat="server" Text="Change the DDL Color" OnClick="ChangeDDLColor_Click" />
            <br />
            <asp:Button ID="Button7" runat="server" Text="Post Back" OnClick="PostBackCount_Click" />
            <br />
            <asp:Label ID="lblCount" runat="server" Text="Label"></asp:Label>
        </div>
    </form>
</body>
</html>
