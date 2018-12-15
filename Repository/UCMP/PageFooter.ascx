<%@ Control Language="C#" AutoEventWireup="true" CodeFile="PageFooter.ascx.cs" Inherits="UCMP_PageFooter" %>


<asp:RadioButtonList ID="RadioButtonList1" runat="server">
    <asp:ListItem>Long Date</asp:ListItem>
    <asp:ListItem>Short Time</asp:ListItem>
</asp:RadioButtonList>
<asp:Button ID="refresh" Text="Refresh" OnClick="Refresh_click" runat="server" />
<br /><br />
<asp:Label ID="lblFooter" runat="server"></asp:Label>
