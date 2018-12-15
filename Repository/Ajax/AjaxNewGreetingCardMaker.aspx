<%@ Page Language="c#" Inherits="GreetingCardMaker.GreetingCardMaker" CodeFile="AjaxNewGreetingCardMaker.aspx.cs" %>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Greeting Card Maker</title>
</head>
<body>
    <form runat="server">
        <asp:ScriptManager ID="ScriptManager1" runat="server"></asp:ScriptManager>
        <div>
            <div style="border-right: thin ridge; padding-right: 20px; border-top: thin ridge; padding-left: 20px; font-size: x-small; padding-bottom: 20px; border-left: thin ridge; width: 293px; padding-top: 20px; border-bottom: thin ridge; font-family: Verdana; height: 486px; background-color: lightyellow">
                Choose 
				a background color:<br />
                <asp:DropDownList ID="lstBackColor" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="22px" Width="194px">
                    <asp:ListItem>White</asp:ListItem>
                    <asp:ListItem>Red</asp:ListItem>
                    <asp:ListItem>Green</asp:ListItem>
                    <asp:ListItem>Blue</asp:ListItem>
                    <asp:ListItem>Yellow</asp:ListItem>
                </asp:DropDownList>
                <br />
                <br />
                Choose a font:<br />
                <asp:DropDownList ID="lstFontName" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="22px" Width="194px"></asp:DropDownList>
                <br />
                <br />
                Specify a numeric font size:<br />
                <asp:TextBox ID="txtFontSize" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server"></asp:TextBox>
                <br />
                <br />
                Choose a border style:<br />
                <asp:RadioButtonList ID="lstBorder" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="59px" Width="177px" Font-Size="X-Small"></asp:RadioButtonList>
                <br />
                <br />
                <!--<asp:checkbox id="chkPicture" runat="server" Text="Add the Default Picture"></asp:checkbox>-->
                <asp:ListBox ID="ListBox1" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" SelectionMode="multiple">
                    <asp:ListItem Value="birthday.png">Birthday</asp:ListItem>
                    <asp:ListItem Value="christmas.png">Christmas</asp:ListItem>
                    <asp:ListItem Value="get_well.gif">Get Well</asp:ListItem>
                    <asp:ListItem Value="graduation.jpg">Graduation</asp:ListItem>
                    <asp:ListItem Value="valentine.jpg">Valentines</asp:ListItem>
                </asp:ListBox>
                <br />
                <br />
                Enter the greeting text below:<br />
                <asp:TextBox ID="txtGreeting" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="85px" Width="240px" TextMode="MultiLine"></asp:TextBox>
                <br />
                <br />
                From:
                <asp:TextBox ID="txtName" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server"></asp:TextBox>
                <br />
                <br />
                <asp:Button ID="cmdUpdate" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="24px" Width="71px" Text="Update" OnClick="cmdUpdate_Click"></asp:Button>
            </div>
            <asp:UpdatePanel ID="UpdatePanel1" runat="server">
                <ContentTemplate>
                    <asp:Panel ID="pnlCard" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" Style="z-index: 101; left: 350px; position: absolute; top: 16px" runat="server"
                        Height="507px" Width="339px" HorizontalAlign="Center">
                        <br />
                        &nbsp; 
			            <asp:Label ID="lblGreeting" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="150px" Width="256px"></asp:Label>
                        <br />
                        <br />
                        <br />
                        <asp:Label ID="lblName" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server"></asp:Label>
                        <br />
                        <br />
                    </asp:Panel>
                </ContentTemplate>
                <Triggers>
                    <asp:AsyncPostBackTrigger ControlID="lstBackColor" EventName="SelectedIndexChanged" />
                    <asp:AsyncPostBackTrigger ControlID="lstFontName" EventName="SelectedIndexChanged" />
                    <asp:AsyncPostBackTrigger ControlID="txtFontSize" EventName="TextChanged" />
                    <asp:AsyncPostBackTrigger ControlID="lstBorder" EventName="SelectedIndexChanged" />
                    <asp:AsyncPostBackTrigger ControlID="ListBox1" EventName="SelectedIndexChanged" />
                    <asp:AsyncPostBackTrigger ControlID="txtGreeting" EventName="TextChanged" />
                    <asp:AsyncPostBackTrigger ControlID="txtName" EventName="TextChanged" />
                    <%--<asp:AsyncPostBackTrigger  ControlID="cmdUpdate" EventName="SelectedIndexChanged"/>--%>
                </Triggers>
            </asp:UpdatePanel>
            <br />
            <asp:UpdateProgress ID="updateProgress1" runat="server">
                <ProgressTemplate>
                    <div style="font-size: xx-small">Contacting Server … < img src = "wait.gif" alt = "Waiting…" />  </div>
                </ProgressTemplate>
            </asp:UpdateProgress>

        </div>
    </form>
</body>
</html>
