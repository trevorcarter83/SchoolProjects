using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;


public partial class WebForm_CurrencyConverter : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (this.IsPostBack == false)
        {
            Currency.Items.Add(new ListItem("Euros", "0.85"));
            Currency.Items.Add(new ListItem("Japenese Yen", "110.33"));
            Currency.Items.Add(new ListItem("Canadian Dollars", "1.2"));

            Graph.Visible = false;
        }

    }

    protected void Convert_ServerClick(object sender, EventArgs e)
    {
        double oldAmount;

        bool success = Double.TryParse(US.Value, out oldAmount);

        if(success)
        {
            ListItem item = Currency.Items[Currency.SelectedIndex];

            double newAmount = oldAmount * Double.Parse(item.Value);
            Result.InnerText = oldAmount.ToString() + " U.S. Dollars=";
            Result.InnerText += newAmount.ToString() + " "+item.Text;
        }

        else
        {
            Result.InnerText = "The number was in the incorrect format. Use only numbers";
        }
        //double USAmount = Double.Parse(US.Value);

        Graph.Src = "Pic" + Currency.SelectedIndex.ToString() + ".png";

    }

    protected void ShowGraph_ServerClick(Object sender, EventArgs e)
    {
        Graph.Src = "Pic" + Currency.SelectedIndex.ToString() + ".png";
        Graph.Visible = true;
    }

    protected void Redirect_ServerClick(Object sender, EventArgs e)
    {
        Response.Redirect("http://localhost:54097/WebForm/SecondPage.aspx");
    }

    protected void Transfer_ServerClick(Object sender, EventArgs e)
    {
        Server.Transfer("/WebForm/SecondPage.aspx");
    }
}