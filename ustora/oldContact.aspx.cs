using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Contact : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void submit_ServerClick(object sender, EventArgs e)
    {
        usermessage.InnerText = "Thank you, " + contact_first_name.Value + " " +
            contact_last_name.Value + " for your contact request.  We will email you at " +
            contact_email.Value + " with regard to your message no later than " +
            DateTime.Today.AddDays(14).ToLongDateString();
    }
}