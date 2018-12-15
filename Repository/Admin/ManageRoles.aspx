<%@ Page Title="Manage User Roles" Language="C#" MasterPageFile="~/Site.master" AutoEventWireup="true" CodeFile="ManageRoles.aspx.cs" Inherits="Admin_ManageRoles" %>

<asp:Content ID="Content1" ContentPlaceHolderID="MainContent" runat="Server">

    <h2><%: Title %></h2>
    <p class="text-danger">
        <asp:Literal runat="server" ID="StatusMessage" />
    </p>

    <div class="form-horizontal">
        <div class="row">
            <div class="col-md-6">
                <div class="well">
                    <h2>Add New Role</h2>
                    <!-- Add a textbox and button here to allow the admin to add a new role to the identity database -->
                    <asp:TextBox ID="txtNewRole" runat="server"></asp:TextBox>
                    <asp:Button ID="btnNewRole" runat="server" Text="Add Role" OnClick="btnNewRole_Click"/>
                  
                </div>
                <div class="well">
                    <h2>View/Update Roles</h2>
                    <!-- Add a GridView here to allow the admin to change the name or delete an existing role -->
                    <asp:SqlDataSource ID="sqlAdminRoles" runat="server" ConnectionString="<%$ ConnectionStrings:IdentityDB %>" DeleteCommand="DELETE FROM [AspNetRoles] WHERE [Id] = @Id" InsertCommand="INSERT INTO [AspNetRoles] ([Id], [Name]) VALUES (@Id, @Name)" SelectCommand="SELECT * FROM [AspNetRoles]" UpdateCommand="UPDATE [AspNetRoles] SET [Name] = @Name WHERE [Id] = @Id">
                        <DeleteParameters>
                            <asp:Parameter Name="Id" Type="String" />
                        </DeleteParameters>
                        <InsertParameters>
                            <asp:Parameter Name="Id" Type="String" />
                            <asp:Parameter Name="Name" Type="String" />
                        </InsertParameters>
                        <UpdateParameters>
                            <asp:Parameter Name="Name" Type="String" />
                            <asp:Parameter Name="Id" Type="String" />
                        </UpdateParameters>
                    </asp:SqlDataSource>
                    <asp:GridView ID="gvAdminRoles" runat="server" AutoGenerateColumns="False" DataKeyNames="Id" DataSourceID="sqlAdminRoles">
                        <Columns>
                            <asp:BoundField DataField="Id" HeaderText="Id" ReadOnly="True" SortExpression="Id" />
                            <asp:BoundField DataField="Name" HeaderText="Name" SortExpression="Name" />
                            <asp:CommandField ShowDeleteButton="True" ShowEditButton="True" />
                        </Columns>
                    </asp:GridView>
                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="well">
                    <h2>View/Update User Roles</h2>
                    <!--Add a DropDownList, CheckBoxList, and Button here to allow the admin to view and update user role assignments.
                        The DropDownList should contain a list of all users, and the CheckBoxList should contain a list of all roles.
                        Any role that the user selected in the DropDownList belongs to should be checked in the CheckBoxList.
                        The admin can check or uncheck roles for the selected user and update the role assignments for that user by 
                        pressing the button to save changes. -->
                    <asp:SqlDataSource ID="sqlUsers" runat="server" ConnectionString="<%$ ConnectionStrings:IdentityDB %>"  SelectCommand="SELECT [Id], [UserName] FROM [AspNetUsers]"></asp:SqlDataSource>
                    <asp:DropDownList ID="ddlUsers" runat="server" AutoPostBack="True" DataSourceID="sqlUsers" DataTextField="UserName" DataValueField="Id"></asp:DropDownList>
                    <asp:SqlDataSource ID="sqlUserRoles" runat="server" ConnectionString="<%$ ConnectionStrings:IdentityDB %>" SelectCommand="SELECT [Id], [Name] FROM [AspNetRoles]"></asp:SqlDataSource>
                    <asp:CheckBoxList ID="cblRoles" runat="server" DataSourceID="sqlUserRoles" DataTextField="Name" DataValueField="Id"></asp:CheckBoxList>
                    <asp:Button ID="btnUser" runat="server" Text="Update" OnClick="btnUser_Click" />

                   
                </div>
            </div>
        </div>
    </div>

</asp:Content>

