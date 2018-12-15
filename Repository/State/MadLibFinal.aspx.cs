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

public partial class State_MadLibFinal : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

        HttpCookie cookie = Request.Cookies["Entries"];

        if(cookie != null)
        {
            lblVerb1.Text = cookie["txtVerb1"];
            lblVerb2.Text = cookie["txtVerb2"];
            lblVerb3.Text = cookie["txtVerb3"];
            lblVerb4.Text = cookie["txtVerb4"];
            lblVerb5.Text = cookie["txtVerb5"];
            lblVerb6.Text = cookie["txtVerb6"];
            lblVerb7.Text = cookie["txtVerb7"];
            lblVerb8.Text = cookie["txtVerb8"];
        }

        TextBox tb1 = (TextBox)Session["tb1"];
        TextBox tb2 = (TextBox)Session["tb2"];
        TextBox tb3 = (TextBox)Session["tb3"];
        TextBox tb4 = (TextBox)Session["tb4"];
        TextBox tb5 = (TextBox)Session["tb5"];
        TextBox tb6 = (TextBox)Session["tb6"];
        TextBox tb7 = (TextBox)Session["tb7"];
        TextBox tb8 = (TextBox)Session["tb8"];
        TextBox tb9 = (TextBox)Session["tb9"];

        lblNoun1.Text = tb1.Text;
        lblNoun2.Text = tb2.Text;
        lblNoun3.Text = tb3.Text;
        lblNoun4.Text = tb4.Text;
        lblNoun5.Text = tb5.Text;
        lblNoun6.Text = tb6.Text;
        lblNoun7.Text = tb7.Text;
        lblNoun8.Text = tb8.Text;
        lblNoun9.Text = tb9.Text;

        lblAdj1.Text = (string)Session["txtAdj1"];
        lblAdj2.Text = (string)Session["txtAdj2"];
        lblAdj3.Text = (string)Session["txtAdj3"];
        lblAdj4.Text = (string)Session["txtAdj4"];
    }

    protected void Startover_Click(object sender, EventArgs e)
    {
        Session.Abandon();
        Response.Redirect("MadLib1.aspx");
    }


}
