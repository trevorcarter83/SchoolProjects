<%@ Page Title="" Language="C#" MasterPageFile="~/UCMP/MasterPage.master" AutoEventWireup="true" CodeFile="FooterHost.aspx.cs" Inherits="UCMP_FooterHost" %>
<%@ Register TagPrefix="apress" TagName="Footer" Src="~/UCMP/PageFooter.ascx" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    Footer Host
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="cphTitle" Runat="Server">
    Footer Host
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="cphHeader" Runat="Server">
    <h1>A Page With a Footer</h1><hr />
    Static Page Text<br /><br />
    <apress:Footer ID="Footer1" runat="server" />
</asp:Content>

