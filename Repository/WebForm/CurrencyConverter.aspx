<%@ Page Language="C#" AutoEventWireup="true" CodeFile="CurrencyConverter.aspx.cs" Inherits="WebForm_CurrencyConverter" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Currency Converter</title>
</head>
<body>
    <form runat="server">

      <div style="border-right: thin ridge; padding-right: 20px; border-top: thin ridge;
            padding-left: 20px; padding-bottom: 20px; border-left: thin ridge; width: 531px;
            padding-top: 20px; border-bottom: thin ridge; font-family: Verdana; height: 211px;
            background-color: #FFFFE8">
        
          Convert:&nbsp;

        <input type="text" id="US" runat="server" />

        &nbsp;U.S. dollars to 

        <select id="Currency" runat="server"></select>

        <br /><br />

        <input type="submit" value="OK" id="Convert" runat="server" OnServerClick="Convert_ServerClick"/>
        <input type="submit" value="Show Graph" id="ShowGraph" OnServerClick="ShowGraph_ServerClick" runat="server" />
        <br /><br />
        <img id="Graph" src="" alt="Currency Graph" runat="server" />
          <br /><br />
        <p style="font-weight: bold" id="Result" runat="server"></p>


          <a href="SecondPage.aspx">Link to SecondPage.aspx</a>
          <input type="submit" value="Response.Redirect to SecondPage.aspx" id="Redir" OnServerClick="Redirect_ServerClick" runat="server" />
          <input type="submit" value="Server.Transfer to SecondPage.aspx" id="transfr" OnServerClick="Transfer_ServerClick" runat="server" />
      </div>
    </form>
  </body>
</html>
