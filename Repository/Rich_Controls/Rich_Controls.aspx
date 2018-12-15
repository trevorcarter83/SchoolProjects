<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Rich_Controls.aspx.cs" Inherits="Rich_Controls_Rich_Controls" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        
        <div>
            <asp:Calendar ID="Calendar1" OnDayRender="wkDayCalendar_DayRender" OnSelectionChanged="Selection_Changed" runat="server">
                
                <SelectedDayStyle BackColor="DodgerBlue" />
            </asp:Calendar>
            <br /><br />
            <p>Trevor's Birthday is 10/05/1994</p>
            <br /><br />
            <asp:Label ID="lblBeforeAfter" runat="server"></asp:Label>
            <br /><br />
            <asp:AdRotator ID="adRotator1" Target="_blank" AdvertisementFile="RichControlsAdRotator.xml" runat="server" />
        </div>
    </form>
</body>
</html>
