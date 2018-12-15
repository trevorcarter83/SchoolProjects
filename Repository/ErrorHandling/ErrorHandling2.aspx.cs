using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class ErrorHandling_ErrorHandling1 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void Button1_Click(object sender, EventArgs e)
    {
        try
            {
            decimal a, b, result;
            a = Decimal.Parse(TextBox1.Text);
            b = Decimal.Parse(TextBox2.Text);
            Trace.Warn();
            result = DivideNumbers(a,b);
            Trace.Warn();
            Label1.Text = result.ToString();
            Label1.ForeColor = System.Drawing.Color.Black;
            }
        catch (Exception err) {
            Label1.Text = "<b>Message:</b> " + err.Message;
            Label1.Text += "<br /><br />";
            Label1.Text += "<b>Source:</b> " + err.Source;
            Label1.Text += "<br /><br />";
            Label1.Text += "<b>Stack Trace:</b> " + err.StackTrace;
            Label1.ForeColor = System.Drawing.Color.Red;
        }
    }
    private decimal DivideNumbers(decimal number, decimal divisor)
    {
        Trace.Warn();
        if (divisor == 0)
        {
            DivideByZeroException err = new DivideByZeroException("You supplied 0 for the divisor parameter. You must be stopped.");
            throw err;
        }
        else
        {
            return number / divisor;
        }
    }
}