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

public partial class State_MadLib3 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        Session["txtAdj1"] = Request.QueryString["txtAdj1"];
        Session["txtAdj2"] = Request.QueryString["txtAdj2"];
        Session["txtAdj3"] = Request.QueryString["txtAdj3"];
        Session["txtAdj4"] = Request.QueryString["txtAdj4"];
    }

    protected void NewCookies_Click(object sender, EventArgs e)
    {
        HttpCookie cookie = new HttpCookie("Entries");

        cookie["txtVerb1"] = txtVerb1.Text;
        cookie["txtVerb2"] = txtVerb2.Text;
        cookie["txtVerb3"] = txtVerb3.Text;
        cookie["txtVerb4"] = txtVerb4.Text;
        cookie["txtVerb5"] = txtVerb5.Text;
        cookie["txtVerb6"] = txtVerb6.Text;
        cookie["txtVerb7"] = txtVerb7.Text;
        cookie["txtVerb8"] = txtVerb8.Text;

        Response.Cookies.Add(cookie);

        Response.Redirect("MadLibFinal.aspx");

    }
}
