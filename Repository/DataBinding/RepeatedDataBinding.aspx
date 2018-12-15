<%@ Page Language="C#" AutoEventWireup="true" CodeFile="RepeatedDataBinding.aspx.cs" Inherits="RepeatedDataBinding" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>

            <asp:ListBox ID="lstIntArray" runat="server"></asp:ListBox>
            <br />
            <asp:CheckBoxList ID="cblFoods" runat="server"></asp:CheckBoxList>
            <br />
            <asp:RadioButtonList ID="rblBands" runat="server"></asp:RadioButtonList>
            <br />
            <asp:DropDownList ID="ddlMonths" runat="server"></asp:DropDownList>

        </div>
    </form>
</body>
</html>
