<%@ Page Language="C#" AutoEventWireup="true" CodeFile="TitleDetail.aspx.cs" Inherits="DataControls_TitleDetail" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:SqlDataSource ID="sqlTitleDetail" runat="server" ConnectionString="<%$ ConnectionStrings:Pubs %>" SelectCommand="SELECT
  t.title_id, t.title, t.type, p.pub_name, t.price, t.advance, t.royalty, t.ytd_sales, t.notes, t.pubdate
FROM
  titles t JOIN publishers p ON t.pub_id = p.pub_id
WHERE
 t.title_id = @TitleID">
                <SelectParameters>
                    <asp:QueryStringParameter Name="TitleID" QueryStringField="TitleID" />
                </SelectParameters>
            </asp:SqlDataSource>

            <asp:FormView ID="fvTitleDetails" runat="server" DataSourceID="sqlTitleDetail">
                <ItemTemplate>
                    <asp:Image ID="imageTitleBig" runat="server" ImageUrl='<%# Eval("title_id","Images/{0}.jpg") %>' /><br />
                    <asp:Label ID="Title1" runat="server" Text='<%# Eval("title") %>'></asp:Label><br />
                    <asp:Label ID="Type1" runat="server" Text='<%# Eval("type") %>'></asp:Label><br />
                    <asp:Label ID="Publisher1" runat="server" Text='<%# Eval("pub_name") %>'></asp:Label><br />
                    <asp:Label ID="Price1" runat="server" Text='<%# Eval("price","{0:c}") %>'></asp:Label><br />
                    <asp:Label ID="Advance1" runat="server" Text='<%# Eval("advance","{0:c}") %>'></asp:Label><br />
                    <asp:Label ID="Royalty1" runat="server" Text='<%# Eval("royalty") %>'></asp:Label><br />
                    <asp:Label ID="Ytd1" runat="server" Text='<%# Eval("ytd_sales") %>'></asp:Label><br />
                    <asp:Label ID="Notes1" runat="server" Text='<%# Eval("notes") %>'></asp:Label><br />
                    <asp:Label ID="PubDate1" runat="server" Text='<%# Eval("pubdate","{0:d}") %>'></asp:Label><br /><br /><br />
                </ItemTemplate>
                


            </asp:FormView>

            <a href="TitleList.aspx">TitleList.aspx</a>
        </div>
    </form>
</body>
</html>
