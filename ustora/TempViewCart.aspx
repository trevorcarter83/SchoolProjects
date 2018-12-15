<%@ Page Title="" Language="C#" MasterPageFile="~/ustora.master" AutoEventWireup="true" CodeFile="TempViewCart.aspx.cs" Inherits="TempViewCart" %>

<asp:Content ID="Content1" ContentPlaceHolderID="cphTitle" Runat="Server">
Shopping Cart
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="cphBigTitleArea" Runat="Server">
Shopping Cart
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="cphBody" Runat="Server">
<h4>Items in your cart</h4>
    <asp:GridView ID="gvwCart" runat="server" AutoGenerateColumns="False" CellPadding="4" DataKeyNames="ItemID" ForeColor="#333333" GridLines="None" OnRowDeleting="gvwCart_RowDeleting" OnRowEditing="gvwCart_RowEditing" OnRowCancelingEdit="gvwCart_RowCancelingEdit" OnRowUpdating="gvwCart_RowUpdating">
        <AlternatingRowStyle BackColor="White" ForeColor="#284775" />
        <Columns>
            <asp:BoundField DataField="Name" HeaderText="Item Name" ReadOnly="True" SortExpression="Name" />
            <asp:BoundField DataField="Price" DataFormatString="{0:c}" HeaderText="Price" ReadOnly="True" SortExpression="Price" />
            <asp:TemplateField HeaderText="Quantity" SortExpression="Quantity">
                <EditItemTemplate>
                    <asp:TextBox ID="txtQuantity" runat="server" Text='<%# Bind("Quantity") %>'></asp:TextBox>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:Label ID="lblQuantity" runat="server" Text='<%# Bind("Quantity") %>'></asp:Label>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:BoundField DataField="ExtendedPrice" DataFormatString="{0:c}" HeaderText="Extended Price" ReadOnly="True" SortExpression="ExtendedPrice" />
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="btnDelete" runat="server" CausesValidation="False" CommandName="Delete" Text="Remove"></asp:LinkButton>
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField ShowHeader="False">
                <EditItemTemplate>
                    <asp:LinkButton ID="btnUpdate" runat="server" CausesValidation="True" CommandName="Update" Text="Save Quantity"></asp:LinkButton>
                    &nbsp;<asp:LinkButton ID="btnCancel" runat="server" CausesValidation="False" CommandName="Cancel" Text="Cancel"></asp:LinkButton>
                </EditItemTemplate>
                <ItemTemplate>
                    <asp:LinkButton ID="btnEdit" runat="server" CausesValidation="False" CommandName="Edit" Text="Change Quantity"></asp:LinkButton>
                </ItemTemplate>
            </asp:TemplateField>
        </Columns>
        <EditRowStyle BackColor="#999999" />
        <FooterStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
        <PagerStyle BackColor="#284775" ForeColor="White" HorizontalAlign="Center" />
        <RowStyle BackColor="#F7F6F3" ForeColor="#333333" />
        <SelectedRowStyle BackColor="#E2DED6" Font-Bold="True" ForeColor="#333333" />
        <SortedAscendingCellStyle BackColor="#E9E7E2" />
        <SortedAscendingHeaderStyle BackColor="#506C8C" />
        <SortedDescendingCellStyle BackColor="#FFFDF8" />
        <SortedDescendingHeaderStyle BackColor="#6F8DAE" />
    </asp:GridView>
   <%-- <asp:ListBox ID="lbxCart" runat="server"></asp:ListBox>--%><br />
    <a href="TempShop.aspx">Continue Shopping</a>
</asp:Content>

