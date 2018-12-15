<%@ Page Title="" Language="C#" MasterPageFile="~/ustora.master" AutoEventWireup="true" CodeFile="TempShop.aspx.cs" Inherits="TempShop" %>

<asp:Content ID="Content1" ContentPlaceHolderID="cphTitle" Runat="Server">
Shop
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="cphBigTitleArea" Runat="Server">
Shop
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="cphBody" Runat="Server">
    <asp:SqlDataSource ID="sqlGetProducts" runat="server" ConnectionString="<%$ ConnectionStrings:Toys %>" SelectCommand="SELECT ProductID, ProductName + ' -- $' + CONVERT(nvarchar(20), UnitPrice) AS NamePrice
FROM Products;"></asp:SqlDataSource>
    <h4>Choose a product to add to cart:</h4>
    <asp:DropDownList ID="ddlProducts" runat="server" DataSourceID="sqlGetProducts" DataTextField="NamePrice" DataValueField="ProductID"></asp:DropDownList>
    <asp:Button ID="btnAddToCart" runat="server" Text="Add to Cart" OnClick="btnAddToCart_Click" /><br />
    <a href="TempViewCart.aspx">View Shopping Cart</a>
</asp:Content>

