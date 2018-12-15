using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;

public partial class State_MadLib2 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if(PreviousPage != null)
        {
            TextBox tb1 = PreviousPage.TxtNoun1;
            TextBox tb2 = PreviousPage.TxtNoun2;
            TextBox tb3 = PreviousPage.TxtNoun3;
            TextBox tb4 = PreviousPage.TxtNoun4;
            TextBox tb5 = PreviousPage.TxtNoun5;
            TextBox tb6 = PreviousPage.TxtNoun6;
            TextBox tb7 = PreviousPage.TxtNoun7;
            TextBox tb8 = PreviousPage.TxtNoun8;
            TextBox tb9 = PreviousPage.TxtNoun9;

            Session["tb1"] = tb1;
            Session["tb2"] = tb2;
            Session["tb3"] = tb3;
            Session["tb4"] = tb4;
            Session["tb5"] = tb5;
            Session["tb6"] = tb6;
            Session["tb7"] = tb7;
            Session["tb8"] = tb8;
            Session["tb9"] = tb9;
        }
    }

    protected void SendBoxValues_Click(object sender, EventArgs e)
    {
        string url = "MadLib3.aspx?";
        url += "txtAdj1=" + txtAdj1.Text + "&";
        url += "txtAdj2=" + txtAdj2.Text + "&";
        url += "txtAdj3=" + txtAdj3.Text + "&";
        url += "txtAdj4=" + txtAdj4.Text;

        Response.Redirect(url);
    }
}
