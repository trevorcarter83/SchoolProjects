<%@ Page language="c#" Inherits="GreetingCardMaker.GreetingCardMaker" CodeFile="NewGreetingCardMaker.aspx.cs" %>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Greeting Card Maker</title>
    </head>
	<body>
		<form runat="server">
		  <div>
			<div style="BORDER-RIGHT: thin ridge; PADDING-RIGHT: 20px; BORDER-TOP: thin ridge; PADDING-LEFT: 20px; FONT-SIZE: x-small; PADDING-BOTTOM: 20px; BORDER-LEFT: thin ridge; WidTH: 293px; PADDING-TOP: 20px; BORDER-BOTTOM: thin ridge; FONT-FAMILY: Verdana; HEIGHT: 486px; BACKGROUND-COLOR: lightyellow">Choose 
				a background color:<br />
				<asp:dropdownlist id="lstBackColor" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="22px" Width="194px">
                    <asp:ListItem>White</asp:ListItem>
                    <asp:ListItem>Red</asp:ListItem>
                    <asp:ListItem>Green</asp:ListItem>
                    <asp:ListItem>Blue</asp:ListItem>
                    <asp:ListItem>Yellow</asp:ListItem>
				</asp:dropdownlist>
				<br /><br />
				Choose a font:<br />
				<asp:dropdownlist id="lstFontName" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="22px" Width="194px"></asp:dropdownlist>
				<br /><br />
				Specify a numeric font size:<br />
				<asp:textbox id="txtFontSize" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server"></asp:textbox>
				<br /><br />
				Choose a border style:<br />
				<asp:radiobuttonlist id="lstBorder" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="59px" Width="177px" Font-Size="X-Small"></asp:radiobuttonlist>
				<br /><br />
				<!--<asp:checkbox id="chkPicture" runat="server" Text="Add the Default Picture"></asp:checkbox>-->
                <asp:ListBox ID="ListBox1" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" Runat="server" SelectionMode="multiple">
                   <asp:ListItem Value="birthday.png">Birthday</asp:ListItem>
                   <asp:ListItem Value="christmas.png">Christmas</asp:ListItem>
                   <asp:ListItem Value="get_well.gif">Get Well</asp:ListItem>
                   <asp:ListItem Value="graduation.jpg">Graduation</asp:ListItem>
                   <asp:ListItem Value="valentine.jpg">Valentines</asp:ListItem>
                </asp:ListBox>
				<br /><br />
				Enter the greeting text below:<br />
				<asp:textbox id="txtGreeting" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="85px" Width="240px" TextMode="MultiLine"></asp:textbox>
				<br /><br />
                From: <asp:textbox id="txtName" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server"></asp:textbox>
                <br /><br />
				<asp:button id="cmdUpdate" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="24px" Width="71px" Text="Update" onclick="cmdUpdate_Click"></asp:button>
			</div>
			<asp:panel id="pnlCard" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" style="Z-INDEX: 101; LEFT: 350px; POSITION: absolute; TOP: 16px" runat="server" 
			Height="507px" Width="339px" HorizontalAlign="Center"><br />&nbsp; 
			    <asp:Label id="lblGreeting" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server" Height="150px" Width="256px"></asp:Label>
			    <br /><br /><br />
			    <asp:Label id="lblName" AutoPostBack="true" OnSelectedIndexChanged="ControlChanged" runat="server"></asp:Label>
                <br /><br />
		    </asp:panel>
	      </div>
		</form>
	</body>
</html>
