using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

//Return following on submit
//Thank you <<First Name>> <<Last Name>> for reaching out, we will contact you at <<email>> regarding your message no later than <<2 weeks from date>>.

public partial class Contact : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        
    }
    
    protected void submit_Click(object sender, EventArgs e)
    {
        usermessage.Text = "Thank you " + contact_first_name.Text + " " + contact_last_name.Text + " for your contact request. We will email you at ";
        usermessage.Text += contact_email.Text + " with regard to your message no later than " + DateTime.Today.AddDays(14).ToLongDateString();
    }
}