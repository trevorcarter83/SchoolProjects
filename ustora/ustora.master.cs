using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class ustora : System.Web.UI.MasterPage
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void Page_PreRender(object sender, EventArgs e)
    {
        //update the cart totals after the ListView has been bound and all other events have occurred.
        //pull the cart out of the session if it exists
        Cart c = (Cart)Session["Cart"];

        if (c != null)
        {
            lblAmount.Text = String.Format("{0:c}", c.GetTotal());
            lblNumItems.Text = c.Items.Count.ToString();
        }
    }
}
