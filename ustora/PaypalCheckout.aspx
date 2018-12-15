<!-- This web form transfers the shopping cart data to Paypal for payment processing
    See http://www.codeproject.com/Articles/42894/Introduction-to-PayPal-for-C-ASP-NET-developers#WebStandard for more information-->


<%@ Page Language="C#" AutoEventWireup="true" CodeFile="PaypalCheckout.aspx.cs" Inherits="PaypalCheckout" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<!-- Automatically submit the form when the page loads in the client browser -->
<%--<body onload="document.Paypal.submit();"> --%>
    <body>

    <!-- Provide a message indicating that the user is being redirected to Paypal -->
    <p>Redirecting to Paypal <img src="images/wait.gif" height="15px" /></p>
     
   <!-- This form contains hidden input fields with variable names required by the PayPal Payments Standard API 
       (see https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/Appx_websitestandard_htmlvariables/#id08A6HF080O3).
       Unlike most ASP.NET forms, this form does have action and method attributes specified to pass the data in the form to the Paypal website.
       The repeater is used to create the necessary variable names required by the API for each item in the shopping cart (see code behind file) -->
    
    <form id="Paypal" name="Paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" >

        <input type="hidden" name="cmd" value="_cart" />
        <input type="hidden" name="upload" value="1" />

        <!-- replace this with your own sandbox account id -->
        <input type="hidden" name="business" value="kelly.fadel-facilitator@usu.edu" />

        <!-- Each item name must be numbered consecutively starting from 1.  Use the Item Index of the Container (data row) that
            is being bound to the Repeater.  Add 1 to this value, as it is a zero-based index -->
        <asp:Repeater ID="rptItems" runat="server">
           <ItemTemplate>

       

        <input type="hidden" name="item_name_<%# Container.ItemIndex + 1 %>" value="<%# Eval("Name") %>" />
        <input type="hidden" name="quantity_<%# Container.ItemIndex + 1 %>" value="<%# Eval("Quantity") %>" />
        <input type="hidden" name="amount_<%# Container.ItemIndex + 1 %>" value="<%# Eval("Price", "{0:f2}") %>" />

           </ItemTemplate>

       </asp:Repeater>

    <!--Additional (optional) variables relating to shipping, tax, etc., as well as URLs for the user to return to the site (may not work for local development). -->
    <input type="hidden" name="shipping_1" value="5" />
    <input type="hidden" name="handling_1" value="5" />
    <input type="hidden" name="tax_1" value="5" /> 
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="return" value="<%= System.IO.Path.Combine(Request.PhysicalApplicationPath,"ThankYou.aspx") %>" />
    <input type="hidden" name="cancel_return" value="<%=System.IO.Path.Combine(Request.PhysicalApplicationPath,"ViewCart.aspx") %>" />
    
    <!-- provide a button in case the form auto-submit fails -->
    <input type="submit" value="Click here if not automatically redirected..." />

</form>
</body>
</html>
