using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.IO;

public partial class ReportError : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Submit_ServerClick(object sender, EventArgs e)
    {
        if (ErrorScreenshot.HasFile)
        {
            try
            {
                string filename = Path.GetFileName(ErrorScreenshot.FileName);
                ErrorScreenshot.SaveAs(Server.MapPath("~/ErrorScreenshots/") + filename);

                usermessage.Text = "Thank you, " + FirstName.Text + " " + LastName.Text + ", for your report. You will receive a confirmation email at " + EmailAddress.Text + " for the error you encountered" +
                " on " + DateEncountered.SelectedDate.ToLongDateString();
            }
            catch (Exception ex)
            {
                usermessage.Text = "Upload status: The file could not be uploaded. The following error occured: " + ex.Message;
            }
        }
        
    }
}
