<%@ Page Title="" Language="C#" MasterPageFile="~/UCMP/MasterPage.master" AutoEventWireup="true" CodeFile="ChangeMaster.aspx.cs" Inherits="UCMP_ChangeMaster" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    Change Master
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="cphTitle" Runat="Server">
    Change Master
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="cphHeader" Runat="Server">
    <asp:RadioButtonList ID="RadioButtonList1" runat="server">
        <asp:ListItem>Rich Controls Advertisements</asp:ListItem>
        <asp:ListItem>New Advertisements</asp:ListItem>
    </asp:RadioButtonList>
    <br />
    <asp:Button ID="Update" OnClick="Update_Click" Text="Update" runat="server"  />
</asp:Content>

