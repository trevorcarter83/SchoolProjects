<%@ Page Language="C#" AutoEventWireup="true" CodeFile="ThemeDemo.aspx.cs" Inherits="ThemeDemo"   %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head runat="server">
    <title>Untitled Page</title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
    
    <br />
     <p class="title">
    Theme Demo
        </p>
        <p>[These themes were downloaded from <a href="http://www.dotnettreats.com/tools/Default.aspx">
                http://www.dotnettreats.com/tools/Default.aspx</a>]</p>
        <p>
            Select the Theme you want to apply:&nbsp;
            <asp:DropDownList ID="DropDownList1" runat="server" AutoPostBack="True" OnSelectedIndexChanged="DropDownList1_SelectedIndexChanged">
                <asp:ListItem>None</asp:ListItem>
                <asp:ListItem>MSN_Blue</asp:ListItem>
                <asp:ListItem>MSN_CherryBlossom</asp:ListItem>
                <asp:ListItem>MSN_Finance</asp:ListItem>
                <asp:ListItem>MSN_Morning</asp:ListItem>
                <asp:ListItem>Msn_Purple</asp:ListItem>
                <asp:ListItem>MSN_Red</asp:ListItem>
                <asp:ListItem>WinXP_Blue</asp:ListItem>
                <asp:ListItem>WinXP_Silver</asp:ListItem>
            </asp:DropDownList></p>
        <hr>
   <br />
    <h1>
        Heading 1
    </h1>
    <p class="bodytextindent1">
    Text
    </p>

    <h2>
        Heading 2<br />
    </h2>
    <p class="bodytextindent1">
    Text
    </p>
    <h3>
        Heading 3</h3>
    <p class="bodytextindent1">
    Text
    </p>
    <h3>
        Sample DetailsView</h3>
        <br />
    <asp:DetailsView ID="DetailsView1" runat="server" SkinID="DetailsView" DataSourceID="SqlDataSource1" AutoGenerateRows="False" DataKeyNames="au_id">
        <Fields>
            <asp:BoundField DataField="au_id" HeaderText="au_id" ReadOnly="True" SortExpression="au_id" />
            <asp:BoundField DataField="au_lname" HeaderText="au_lname" SortExpression="au_lname" />
            <asp:BoundField DataField="au_fname" HeaderText="au_fname" SortExpression="au_fname" />
            <asp:BoundField DataField="phone" HeaderText="phone" SortExpression="phone" />
            <asp:BoundField DataField="address" HeaderText="address" SortExpression="address" />
            <asp:BoundField DataField="city" HeaderText="city" SortExpression="city" />
            <asp:BoundField DataField="state" HeaderText="state" SortExpression="state" />
            <asp:BoundField DataField="zip" HeaderText="zip" SortExpression="zip" />
            <asp:CheckBoxField DataField="contract" HeaderText="contract" SortExpression="contract" />
        </Fields>
    </asp:DetailsView>
        <br />
    <h3>
        Sample GridView</h3>
        <br />
    <asp:GridView ID="GridView1" runat="server" SkinID="GridView" DataSourceID="SqlDataSource1" AutoGenerateColumns="False" DataKeyNames="au_id">
        <Columns>
            <asp:BoundField DataField="au_id" HeaderText="au_id" ReadOnly="True" SortExpression="au_id" />
            <asp:BoundField DataField="au_lname" HeaderText="au_lname" SortExpression="au_lname" />
            <asp:BoundField DataField="au_fname" HeaderText="au_fname" SortExpression="au_fname" />
            <asp:BoundField DataField="phone" HeaderText="phone" SortExpression="phone" />
            <asp:BoundField DataField="address" HeaderText="address" SortExpression="address" />
            <asp:BoundField DataField="city" HeaderText="city" SortExpression="city" />
            <asp:BoundField DataField="state" HeaderText="state" SortExpression="state" />
            <asp:BoundField DataField="zip" HeaderText="zip" SortExpression="zip" />
            <asp:CheckBoxField DataField="contract" HeaderText="contract" SortExpression="contract" />
        </Columns>
    </asp:GridView>
        &nbsp;
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" ConnectionString="<%$ ConnectionStrings:Pubs %>"
            SelectCommand="SELECT * FROM [authors]">
        </asp:SqlDataSource>
        <br />
     <br />
     <h3>
        Sample Calendar</h3>
    <br />
    <asp:Calendar ID="Calendar1" runat="server" SkinID="CalendarView"/>
    <br />
    <h3>Sample FormView Control</h3>
    <br />
    <asp:FormView ID="FormView1" runat="server" SkinID="FormView" DataSourceID="SqlDataSource1" DataKeyNames="au_id">
        <EditItemTemplate>
            au_id:
            <asp:Label ID="au_idLabel1" runat="server" Text='<%# Eval("au_id") %>'></asp:Label><br />
            au_lname:
            <asp:TextBox ID="au_lnameTextBox" runat="server" Text='<%# Bind("au_lname") %>'></asp:TextBox><br />
            au_fname:
            <asp:TextBox ID="au_fnameTextBox" runat="server" Text='<%# Bind("au_fname") %>'></asp:TextBox><br />
            phone:
            <asp:TextBox ID="phoneTextBox" runat="server" Text='<%# Bind("phone") %>'></asp:TextBox><br />
            address:
            <asp:TextBox ID="addressTextBox" runat="server" Text='<%# Bind("address") %>'></asp:TextBox><br />
            city:
            <asp:TextBox ID="cityTextBox" runat="server" Text='<%# Bind("city") %>'></asp:TextBox><br />
            state:
            <asp:TextBox ID="stateTextBox" runat="server" Text='<%# Bind("state") %>'></asp:TextBox><br />
            zip:
            <asp:TextBox ID="zipTextBox" runat="server" Text='<%# Bind("zip") %>'></asp:TextBox><br />
            contract:
            <asp:CheckBox ID="contractCheckBox" runat="server" Checked='<%# Bind("contract") %>' />
            <br />
            <asp:LinkButton ID="UpdateButton" runat="server" CausesValidation="True" CommandName="Update"
                Text="Update"></asp:LinkButton>
            &nbsp;<asp:LinkButton ID="UpdateCancelButton" runat="server" CausesValidation="False" CommandName="Cancel"
                Text="Cancel"></asp:LinkButton>
        </EditItemTemplate>
        <InsertItemTemplate>
            au_id:
            <asp:TextBox ID="au_idTextBox" runat="server" Text='<%# Bind("au_id") %>'></asp:TextBox><br />
            au_lname:
            <asp:TextBox ID="au_lnameTextBox" runat="server" Text='<%# Bind("au_lname") %>'></asp:TextBox><br />
            au_fname:
            <asp:TextBox ID="au_fnameTextBox" runat="server" Text='<%# Bind("au_fname") %>'></asp:TextBox><br />
            phone:
            <asp:TextBox ID="phoneTextBox" runat="server" Text='<%# Bind("phone") %>'></asp:TextBox><br />
            address:
            <asp:TextBox ID="addressTextBox" runat="server" Text='<%# Bind("address") %>'></asp:TextBox><br />
            city:
            <asp:TextBox ID="cityTextBox" runat="server" Text='<%# Bind("city") %>'></asp:TextBox><br />
            state:
            <asp:TextBox ID="stateTextBox" runat="server" Text='<%# Bind("state") %>'></asp:TextBox><br />
            zip:
            <asp:TextBox ID="zipTextBox" runat="server" Text='<%# Bind("zip") %>'></asp:TextBox><br />
            contract:
            <asp:CheckBox ID="contractCheckBox" runat="server" Checked='<%# Bind("contract") %>' />
            <br />
            <asp:LinkButton ID="InsertButton" runat="server" CausesValidation="True" CommandName="Insert"
                Text="Insert"></asp:LinkButton>
            &nbsp;<asp:LinkButton ID="InsertCancelButton" runat="server" CausesValidation="False" CommandName="Cancel"
                Text="Cancel"></asp:LinkButton>
        </InsertItemTemplate>
        <ItemTemplate>
            au_id:
            <asp:Label ID="au_idLabel" runat="server" Text='<%# Eval("au_id") %>'></asp:Label><br />
            au_lname:
            <asp:Label ID="au_lnameLabel" runat="server" Text='<%# Bind("au_lname") %>'></asp:Label><br />
            au_fname:
            <asp:Label ID="au_fnameLabel" runat="server" Text='<%# Bind("au_fname") %>'></asp:Label><br />
            phone:
            <asp:Label ID="phoneLabel" runat="server" Text='<%# Bind("phone") %>'></asp:Label><br />
            address:
            <asp:Label ID="addressLabel" runat="server" Text='<%# Bind("address") %>'></asp:Label><br />
            city:
            <asp:Label ID="cityLabel" runat="server" Text='<%# Bind("city") %>'></asp:Label><br />
            state:
            <asp:Label ID="stateLabel" runat="server" Text='<%# Bind("state") %>'></asp:Label><br />
            zip:
            <asp:Label ID="zipLabel" runat="server" Text='<%# Bind("zip") %>'></asp:Label><br />
            contract:
            <asp:CheckBox ID="contractCheckBox" runat="server" Checked='<%# Bind("contract") %>' Enabled="false" />
            <br />
        </ItemTemplate>
    </asp:FormView>
    <br />
     <h3>
        Sample Login Control</h3>
    <br />
    <asp:Login runat=server ID="Login1" SkinID="LoginView" />
    <br />



    
    </div>
    </form>
</body>
</html>
