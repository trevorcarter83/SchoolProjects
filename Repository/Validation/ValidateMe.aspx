<%@ Page Language="C#" AutoEventWireup="true"  CodeFile="ValidateMe.aspx.cs" Inherits="ValidateMe" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head id="Head1" runat="server">
    <title>Validation</title>
</head>
<body>
    <h3 style="font-family:Verdana;">
        Bug Report
    </h3>
    <form runat="server" ID="frmBugs">
        <div>
         <table bgcolor="gainsboro" cellpadding="10">
            <tr valign="top">
               <td colspan="3">               
                  <asp:Label ID="lblMsg" 
                  Text="Please report your bug here" 
                  ForeColor="red" 
                  Font-Size="10" runat="server" />
                  <br />
               </td>
            </tr>
            <tr>
               <td align="right">
                  <font face="Verdana" size="2">Book:</font>
               </td>
               <td>               
                  <asp:DropDownList id="ddlBooks" runat="server">
                     <asp:ListItem>-- Please Pick A Book --</asp:ListItem>
                     <asp:ListItem>Programming ASP.NET</asp:ListItem>
                     <asp:ListItem>Programming .NET Windows Applications</asp:ListItem>
                     <asp:ListItem>Programming C#</asp:ListItem>
                     <asp:ListItem>Programming Visual Basic 2005</asp:ListItem>
                     <asp:ListItem>
                        Teach Yourself C++ In 21 Days
                     </asp:ListItem>
                     <asp:ListItem>
                        Teach Yourself C++ In 24 Hours
                     </asp:ListItem>
                     <asp:ListItem>TY C++ In 10 Minutes</asp:ListItem>
                     <asp:ListItem>TY More C++ In 21 Days</asp:ListItem>
                     <asp:ListItem>C++ Unleashed</asp:ListItem>
                  </asp:DropDownList>
               </td>
               
               <td align="center" rowspan="1">
                 <!-- Validator(s) for the ddlBooks drop down here -->
                   <asp:RequiredFieldValidator id="vldddlBooks" runat="server"     
                       ErrorMessage="You must select a book."     
                       ControlToValidate="ddlBooks" Text="*" />
               </td>
            </tr>
            <tr>
               <td align="right">                 
                  <font face="Verdana" size="2">Edition:</font>
               </td>
               <td>
                  <asp:RadioButtonList id=rblEdition 
                  RepeatLayout="Flow" runat="server">
                     <asp:ListItem>1st</asp:ListItem>
                     <asp:ListItem>2nd</asp:ListItem>
                     <asp:ListItem>3rd</asp:ListItem>
                     <asp:ListItem>4th</asp:ListItem>
                  </asp:RadioButtonList>
               </td>
               
               <td align="center" rowspan="1">
                 <!-- Validator(s) for rblEdition here -->
                   <asp:RequiredFieldValidator ID="vldrblEdition" runat="server"
                       ErrorMessage="You must select an edition."
                       ControlToValidate="rblEdition" Text="*" />
               </td>
            </tr>
            <tr>
                <td align="right">Number purchased:</td>
                <td><asp:TextBox id="txtNumPurch" runat="server" width="50px" /></td>
                <td>
                   <!-- Validator(s) for txtNumPurch here--> 
                    <asp:RequiredFieldValidator ID="vldtxtNumPurch" runat="server"
                        ErrorMessage="You must have a number purchased entered."
                        ControlToValidate="txtNumPurch" Text="*"
                        />
                    <asp:RangeValidator id="vldNumPurchRange" runat="server"
                        ErrorMessage="You must have a number greater than 0."
                        MinimumValue="1" MaximumValue="9999999" Text="*"
                        ControlToValidate="txtNumPurch"
                        />
                </td>
            </tr>

<tr>
                <td align="right">Date purchased:</td>
                <td><asp:TextBox id="txtDatePurch" runat="server" width="106px" /></td>
                <td>
                    <!-- Validator(s) for txtDatePurch here-->  
                    <asp:RequiredFieldValidator ID="vldtxtDatePurch" runat="server"
                        ErrorMessage="You must have a date purchased entered."
                        ControlToValidate="txtDatePurch" Text="*"
                        />
                    <asp:RangeValidator ID="vldDatePurchRange" runat="server"
                        ErrorMessage="This is not a valid date." Type="Date"
                        MinimumValue="01-01-2000" 
                        ControlToValidate="txtDatePurch" Text="*"
                        />
                </td>
            </tr>

             <tr>
               <td align="right" style="HEIGHT: 97px">
                  <font face="Verdana" size="2">Bug:</font>
               </td>             
               <td style="HEIGHT: 97px">
                  <asp:TextBox id="txtBug" runat="server" width="183px" 
                  textmode="MultiLine" height="68px"/>
               </td>
                           
               <td style="HEIGHT: 97px">
                 <!-- Validator(s) for txtBug here-->  
                   <asp:RequiredFieldValidator ID="vldtxtBug" runat="server"
                       ErrorMessage="Please enter something for the bug."
                       ControlToValidate="txtBug" Text="*" />
               </td>
             </tr>

            <tr>
               <td>
               </td>
               <td>
                  <asp:Button id="btnSubmit"
                  text="Submit Bug" runat="server" />
               </td>
               <td>
               </td>
            </tr>
           
            <tr>
                <td align="right">Enter your password:</td>
                <td>
                <asp:TextBox id="txtPasswd1"
                runat="server"
                TextMode="Password"
                Width="80"></asp:TextBox>
                </td>
                <td>
                <!-- Validator(s) for txtPasswd1 here-->  
                    <asp:RequiredFieldValidator ID="vldtxtPasswd1" runat="server"
                        ErrorMessage="Please enter your password."
                        ControlToValidate="txtPasswd1" Text="*" />
                </td>
            </tr>
                
         
            <tr>
                <td align="right">Re-enter your password:</td>
                <td>
                <asp:TextBox id="txtPasswd2"
                    runat="server"
                    TextMode="Password"
                    Width="80"></asp:TextBox>
                </td>
                
                <td>
                <!-- Validator(s) for txtPasswd2 here--> 
                    <asp:RequiredFieldValidator ID="vldtxtPasswd2" runat="server"
                        ErrorMessage="Please re-enter your password."
                        ControlToValidate="txtPasswd2" />
                    <asp:CompareValidator ID="vldCompare" runat="server"
                        ErrorMessage="Please make sure the passwords match."
                        ControlToCompare="txtPasswd1" ControlToValidate="txtPasswd2" Text="*" />
                </td>
            </tr>    
            <tr>
               <td>
               </td>
               <td>
                  <asp:Button id="btnLogin"                    
                  text="Login" runat="server" />
               </td>
               <td>
               </td>
            </tr>        
             <tr>
                <td align="right">
                                
                    <font face="Verdana" size="2">Display Errors</font>
                </td>
                <td>
                    <asp:DropDownList id="lstDisplay" 
                    AutoPostBack="true"                     
                    runat="server" >
                            <asp:ListItem Selected ="true">Summary</asp:ListItem>
                            <asp:ListItem>Msg. Box</asp:ListItem>
                    </asp:DropDownList>
                </td>
                <td>
                &nbsp;
                </td>
             </tr>
             <tr>
                <td align="right">
                        <font face=Verdana size=2>Display Report</font>
                </td>
                <td>
                    <asp:DropDownList id="lstFormat" 
                    AutoPostBack="true"                     
                    runat="server" >
                        <asp:ListItem>List</asp:ListItem>
                        <asp:ListItem Selected="true">Bulleted List</asp:ListItem>
                        <asp:ListItem>Single Paragraph</asp:ListItem>
                    </asp:DropDownList>
                </td>
                </tr>
         </table>
         <!-- Validation Summary controls here -->
            <asp:ValidationSummary id="Errors" runat="server" ForeColor="Red" />
            </div>
    </form>
</body>
</html>
