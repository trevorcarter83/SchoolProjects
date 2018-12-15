<%@ Page Language="C#" AutoEventWireup="true" CodeFile="TitleList.aspx.cs" Inherits="DataControls_TitleList" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:SqlDataSource ID="sqlTitle" runat="server" ConnectionString="<%$ ConnectionStrings:Pubs %>" SelectCommand="SELECT [title_id], [title], [price] FROM [titles]"></asp:SqlDataSource>
        
            <asp:ListView ID="lvTitles" runat="server" DataSourceID="sqlTitle" GroupItemCount="3" DataKeyNames="title_id">
                <LayoutTemplate>
                    <table runat="server">
                        <tr runat="server">
                            <td runat="server">
                                <table id="groupPlaceholderContainer" runat="server" border="1" style="background-color: #FFFFFF;border-collapse: collapse;border-color: #999999;border-style:none;border-width:1px;font-family: Verdana, Arial, Helvetica, sans-serif;">
                                    <tr id="groupPlaceholder" runat="server">
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr runat="server">
                            <td runat="server" style="text-align: center;background-color: #5D7B9D;font-family: Verdana, Arial, Helvetica, sans-serif;color: #FFFFFF">
                                <asp:DataPager ID="DataPager1" runat="server" PageSize="12">
                                    <Fields>
                                        <asp:NextPreviousPagerField ButtonType="Button" ShowFirstPageButton="True" ShowLastPageButton="True" />
                                    </Fields>
                                </asp:DataPager>
                            </td>
                        </tr>
                    </table>
                </LayoutTemplate>
                <AlternatingItemTemplate>
                    <td runat="server" style="background-color: #FFFFFF;color: #284775;">
                        <asp:Image ID="imageTitle" runat="server" ImageUrl='<%# Eval("title_id","Images/t{0}.jpg") %>' />
                        <br />
                        title:
                        <a href='TitleDetail.aspx?TitleID=<%# Eval("title_id") %>'> <%# Eval("title") %> </a>
                        <br />
                        price:
                        <asp:Label ID="priceLabel" runat="server" Text='<%# Eval("price","{0:c}") %>' />
                        <br />
                    </td>
                </AlternatingItemTemplate>
                <EditItemTemplate>
                    <td runat="server" style="background-color: #999999;">
                        <asp:Image ID="imageTitle" runat="server" ImageUrl='<%# Eval("title_id","Images/t{0}.jpg") %>' />
                        <br />
                        title:
                        <a href='TitleDetail.aspx?TitleID=<%# Eval("title_id") %>'> <%# Eval("title") %> </a>
                        <br />
                        price:
                        <asp:TextBox ID="priceTextBox" runat="server" Text='<%# Bind("price","{0:c}") %>' />
                        <br />

                    </td>
                </EditItemTemplate>
                <EmptyDataTemplate>
                    <table runat="server" style="background-color: #FFFFFF;border-collapse: collapse;border-color: #999999;border-style:none;border-width:1px;">
                        <tr>
                            <td>No data was returned.</td>
                        </tr>
                    </table>
                </EmptyDataTemplate>
                <EmptyItemTemplate>
                    <td runat="server" />
                </EmptyItemTemplate>
                <GroupTemplate>

                        <tr id="itemPlaceholderContainer" runat="server">
                            <td id="itemPlaceholder" runat="server"></td>
                        </tr>

                    
                </GroupTemplate>
                <InsertItemTemplate>
                    <td runat="server" style="">
                        <asp:Image ID="imageTitle" runat="server" ImageUrl='<%# Eval("title_id","Images/t{0}.jpg") %>' />
                        <br />
                        title:
                        <a href='TitleDetail.aspx?TitleID=<%# Eval("title_id") %>'> <%# Eval("title") %> </a>
                        <br />
                        price:
                        <asp:TextBox ID="priceTextBox" runat="server" Text='<%# Bind("price","{0:c}") %>' />
                        <br />
                        
                    </td>
                </InsertItemTemplate>
                <ItemTemplate>
                    <td runat="server" style="background-color: #E0FFFF;color: #333333;">
                        <asp:Image ID="imageTitle" runat="server" ImageUrl='<%# Eval("title_id","Images/t{0}.jpg") %>' />
                        <br />
                        title:
                        <a href='TitleDetail.aspx?TitleID=<%# Eval("title_id") %>'> <%# Eval("title") %> </a>
                        <br />
                        price:
                        <asp:Label ID="priceLabel" runat="server" Text='<%# Eval("price","{0:c}") %>' />
                        <br />
                    </td>
                </ItemTemplate>
                <SelectedItemTemplate>
                    <td runat="server" style="background-color: #E2DED6;font-weight: bold;color: #333333;">
                        <asp:Image ID="imageTitle" runat="server" ImageUrl='<%# Eval("title_id","Images/t{0}.jpg") %>' />
                        <br />
                        title:
                        <a href='TitleDetail.aspx?TitleID=<%# Eval("title_id") %>'> <%# Eval("title") %> </a>
                        <br />
                        price:
                        <asp:Label ID="priceLabel" runat="server" Text='<%# Eval("price","{0:c}") %>' />
                        <br />
                    </td>
                </SelectedItemTemplate>
            </asp:ListView>


        </div>
    </form>
</body>
</html>
