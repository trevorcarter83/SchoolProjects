<%@ Page Language="C#" AutoEventWireup="true" CodeFile="AuthorTitles.aspx.cs" Inherits="DataControls_AuthorTitles" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:SqlDataSource ID="sqlAuthors" runat="server" ConnectionString="<%$ ConnectionStrings:Pubs %>" DeleteCommand="DELETE FROM [authors] WHERE [au_id] = @au_id" InsertCommand="INSERT INTO [authors] ([au_id], [au_lname], [au_fname], [phone], [address], [city], [state], [zip], [contract]) VALUES (@au_id, @au_lname, @au_fname, @phone, @address, @city, @state, @zip, @contract)" SelectCommand="SELECT 
  a.[au_id]
  , a.[au_lname]
  , a.[au_fname]
  , a.[phone]
  , a.[address]
  , a.[city]
  , a.[state]
  , a.[zip]
  , a.[contract] 
  , COUNT(ta.title_id)  [TitleCount]
FROM [authors] a LEFT JOIN titleauthor ta ON a.au_id = ta.au_id
GROUP BY
  a.[au_id]
  , a.[au_lname]
  , a.[au_fname]
  , a.[phone]
  , a.[address]
  , a.[city]
  , a.[state]
  , a.[zip]
  , a.[contract] " UpdateCommand="UPDATE [authors] SET [au_lname] = @au_lname, [au_fname] = @au_fname, [phone] = @phone, [address] = @address, [city] = @city, [state] = @state, [zip] = @zip, [contract] = @contract WHERE [au_id] = @au_id">
                <DeleteParameters>
                    <asp:Parameter Name="au_id" Type="String" />
                </DeleteParameters>
                <InsertParameters>
                    <asp:Parameter Name="au_id" Type="String" />
                    <asp:Parameter Name="au_lname" Type="String" />
                    <asp:Parameter Name="au_fname" Type="String" />
                    <asp:Parameter Name="phone" Type="String" />
                    <asp:Parameter Name="address" Type="String" />
                    <asp:Parameter Name="city" Type="String" />
                    <asp:Parameter Name="state" Type="String" />
                    <asp:Parameter Name="zip" Type="String" />
                    <asp:Parameter Name="contract" Type="Boolean" />
                </InsertParameters>
                <UpdateParameters>
                    <asp:Parameter Name="au_lname" Type="String" />
                    <asp:Parameter Name="au_fname" Type="String" />
                    <asp:Parameter Name="phone" Type="String" />
                    <asp:Parameter Name="address" Type="String" />
                    <asp:Parameter Name="city" Type="String" />
                    <asp:Parameter Name="state" Type="String" />
                    <asp:Parameter Name="zip" Type="String" />
                    <asp:Parameter Name="contract" Type="Boolean" />
                    <asp:Parameter Name="au_id" Type="String" />
                </UpdateParameters>
            </asp:SqlDataSource>
            <h1>Authors</h1>
            <br /> <br />
            <asp:LinkButton ID="btnAuthorInsert" runat="server" OnClick="btnAuthorInsert_Click">Click to Insert Author</asp:LinkButton>
            <asp:GridView ID="gvwAuthors" runat="server" AutoGenerateColumns="False" DataKeyNames="au_id" OnRowCommand="gvwAuthors_RowCommand" onrowdatabound="gvwAuthors_RowDataBound"  DataSourceID="sqlAuthors" BackColor="White" BorderColor="#999999" BorderStyle="None" BorderWidth="1px" CellPadding="3" GridLines="Vertical">
                <AlternatingRowStyle BackColor="#DCDCDC" />
                <Columns>
                    <asp:TemplateField HeaderText="ID" SortExpression="au_id">
                        <ItemTemplate>
                            <asp:LinkButton ID="lbauid" runat="server" Text='<%# Bind("au_id") %>' CommandName="PassID" CommandArgument='<%# Bind("au_id") %>'></asp:LinkButton>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="au_lname" HeaderText="Last Name" SortExpression="au_lname" />
                    <asp:BoundField DataField="au_fname" HeaderText="First Name" SortExpression="au_fname" />
                    <asp:BoundField DataField="phone" HeaderText="Phone" SortExpression="phone" />
                    <asp:BoundField DataField="address" HeaderText="Address" SortExpression="address" />
                    <asp:BoundField DataField="city" HeaderText="City" SortExpression="city" />
                    <asp:BoundField DataField="state" HeaderText="State" SortExpression="state" />
                    <asp:BoundField DataField="zip" HeaderText="Zip" SortExpression="zip" />
                    <asp:CheckBoxField DataField="contract" HeaderText="Contract" SortExpression="contract" />
                    <asp:BoundField DataField="TitleCount" HeaderText="TitleCount" ReadOnly="True" SortExpression="TitleCount" />
                    <asp:TemplateField ShowHeader="False">
                        <ItemTemplate>
                            <asp:Button ID="Button1" runat="server" CausesValidation="False" CommandName="Delete" Text="Delete" OnClientClick="if ( !confirm('Are you sure you want to delete this author?')) return false;" />
                        </ItemTemplate>
                    </asp:TemplateField>
                </Columns>
                <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
                <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
                <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
                <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
                <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
                <SortedAscendingCellStyle BackColor="#F1F1F1" />
                <SortedAscendingHeaderStyle BackColor="#0000A9" />
                <SortedDescendingCellStyle BackColor="#CAC9C9" />
                <SortedDescendingHeaderStyle BackColor="#000065" />
            </asp:GridView>
            <br /> <br /> 
            <asp:DetailsView ID="dvwInsertAuthor" runat="server" Height="50px" Width="125px" AutoGenerateRows="False" BackColor="White" BorderColor="#999999" BorderStyle="Solid" BorderWidth="1px" CellPadding="3" DataKeyNames="au_id" DataSourceID="sqlAuthors" DefaultMode="Insert" ForeColor="Black" GridLines="Vertical" HeaderText="Insert Author" Visible="False">
                <AlternatingRowStyle BackColor="#CCCCCC" />
                <EditRowStyle BackColor="#000099" Font-Bold="True" ForeColor="White" />
                <Fields>
                    <asp:BoundField DataField="au_id" HeaderText="ID" ReadOnly="True" SortExpression="au_id" />
                    <asp:BoundField DataField="au_lname" HeaderText="Last Name" SortExpression="au_lname" />
                    <asp:BoundField DataField="au_fname" HeaderText="First Name" SortExpression="au_fname" />
                    <asp:BoundField DataField="phone" HeaderText="Phone" SortExpression="phone" />
                    <asp:BoundField DataField="address" HeaderText="Address" SortExpression="address" />
                    <asp:BoundField DataField="city" HeaderText="City" SortExpression="city" />
                    <asp:BoundField DataField="state" HeaderText="State" SortExpression="state" />
                    <asp:BoundField DataField="zip" HeaderText="Zip" SortExpression="zip" />
                    <asp:CheckBoxField DataField="contract" HeaderText="Contract" SortExpression="contract" />
                    <asp:TemplateField>
                        <InsertItemTemplate>
                            <asp:LinkButton ID="btnInsert" ForeColor="white" runat="server" CausesValidation="True" OnClick="btnInsert_Click" CommandName="Insert" Text="Insert"></asp:LinkButton>
                            &nbsp;<asp:LinkButton ID="btnCancel" ForeColor="white" runat="server" CausesValidation="False" OnClick="btnInsert_Click" CommandName="Cancel" Text="Cancel"></asp:LinkButton>
                        </InsertItemTemplate>
                    </asp:TemplateField>
                </Fields>
                <FooterStyle BackColor="#CCCCCC" />
                <HeaderStyle BackColor="Black" Font-Bold="True" ForeColor="White" />
                <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
            </asp:DetailsView>
            <br />
            <asp:SqlDataSource ID="sqlAuthorTitles" runat="server" ConnectionString="<%$ ConnectionStrings:Pubs %>" SelectCommand="SELECT
  t.title
  , t.type
  , p.pub_name
  , t.price
  , t.advance
  , t.royalty
  , t.ytd_sales
  , t.notes
  , t.pubdate
  , t.title_id
  , t.pub_id
FROM
  titleauthor ta
  JOIN  titles t ON ta.title_id = t.title_id
  JOIN publishers p ON t.pub_id = p.pub_id
WHERE
  ta.au_id = @au_id">
                <SelectParameters>
                    <asp:SessionParameter Name="au_id" SessionField="SelectedID" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:SqlDataSource ID="sqlPublishers" runat="server" ConnectionString="<%$ ConnectionStrings:Pubs %>" SelectCommand="SELECT [pub_name], [pub_id] FROM [publishers]"></asp:SqlDataSource>
            <asp:Label ID="lblTitlesBy" runat="server" Text="Titles authored by "></asp:Label>
            <asp:GridView ID="grvAuthorTitles" runat="server" AutoGenerateColumns="False" Visible="False" BackColor="White" BorderColor="#999999" BorderStyle="None" BorderWidth="1px" CellPadding="3" DataKeyNames="title_id" DataSourceID="sqlAuthorTitles" GridLines="Vertical" >
                <AlternatingRowStyle BackColor="#DCDCDC" />
                <Columns>
                    <asp:BoundField DataField="title" HeaderText="Title" SortExpression="title" />
                    <asp:BoundField DataField="type" HeaderText="Type" SortExpression="type" />
                    <asp:TemplateField HeaderText="Publisher" SortExpression="pub_name">
                        <EditItemTemplate>
                            <%--<asp:TextBox ID="TextBox1" runat="server" Text='<%# Bind("pub_name") %>'></asp:TextBox>--%>
                            <asp:DropDownList ID="ddlPublishers" runat="server" DataSourceID="sqlPublishers" DataTextField="pub_name" DataValueField="pub_id"></asp:DropDownList>
                        </EditItemTemplate>
                        <ItemTemplate>
                            <asp:Label ID="Label1" runat="server" Text='<%# Bind("pub_name") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Price" SortExpression="price">
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox2" runat="server" Text='<%# Bind("price", "{0:0.00}") %>'></asp:TextBox>
                        </EditItemTemplate>
                        <ItemTemplate>
                            <asp:Label ID="Label2" runat="server" Text='<%# Bind("price", "{0:c}") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Advance" SortExpression="advance">
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox3" runat="server" Text='<%# Bind("advance", "{0:0.00}") %>'></asp:TextBox>
                        </EditItemTemplate>
                        <ItemTemplate>
                            <asp:Label ID="Label3" runat="server" Text='<%# Bind("advance", "{0:c}") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:BoundField DataField="royalty" HeaderText="Royalty" SortExpression="royalty" />
                    <asp:BoundField DataField="ytd_sales" HeaderText="Year-to-date Sales" SortExpression="ytd_sales" />
                    <asp:TemplateField HeaderText="Notes" SortExpression="notes">
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox4" runat="server" Text='<%# Bind("notes") %>' TextMode="MultiLine"></asp:TextBox>
                        </EditItemTemplate>
                        <ItemTemplate>
                            <asp:Label ID="Label4" runat="server" Text='<%# Bind("notes") %>'></asp:Label>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:TemplateField HeaderText="Published Date" SortExpression="pubdate">
                        <EditItemTemplate>
                            <asp:TextBox ID="TextBox5" runat="server" Text='<%# Bind("pubdate") %>'></asp:TextBox>
                        </EditItemTemplate>
                        <ItemTemplate>
                            <%--<asp:Label ID="Label5" runat="server" Text='<%# Bind("pubdate", "{0:d}") %>'></asp:Label>--%>
                            <asp:Calendar ID="Calendar1" runat="server" SelectedDate='<%# Bind("pubdate") %>' VisibleDate='<%# Bind("pubdate") %>' ></asp:Calendar>
                        </ItemTemplate>
                    </asp:TemplateField>
                    <asp:CommandField ShowEditButton="True" />
                    <asp:CommandField ShowDeleteButton="True" />
                </Columns>
                <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
                <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
                <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
                <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
                <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
                <SortedAscendingCellStyle BackColor="#F1F1F1" />
                <SortedAscendingHeaderStyle BackColor="#0000A9" />
                <SortedDescendingCellStyle BackColor="#CAC9C9" />
                <SortedDescendingHeaderStyle BackColor="#000065" />
            </asp:GridView>
        </div>
    </form>
</body>
</html>
