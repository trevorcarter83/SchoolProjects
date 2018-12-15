using System;
using System.Data;
using System.Configuration;
using System.Collections;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using System.Web.Configuration;
using System.Data.SqlClient;

public partial class AuthorManager : System.Web.UI.Page
{
    
    //Add a private string variable here that will hold the connection string from Web.Config
    //See Page 451
    private string constring = WebConfigurationManager.ConnectionStrings["Pubs"].ConnectionString;


    protected void Page_Load(object sender, EventArgs e)
    {
        if (!this.IsPostBack)
        {
            FillAuthorList();
        }
    }

    private void FillAuthorList()
    {
        DataTable newTable = AuthorAccess.GetAllAuthorNames();

        foreach (DataRow row in newTable.Rows)
        {
            ListItem newItem = new ListItem();
            newItem.Text = row["au_lname"] + ", " + row["au_fname"];
            newItem.Value = row["au_id"].ToString();
            lstAuthor.Items.Add(newItem);
        }

    }

    protected void lstAuthor_SelectedIndexChanged(object sender, EventArgs e)
    {
        DataTable table = AuthorAccess.GetAuthorInfoByID(lstAuthor.SelectedValue);

        try
        {
            foreach (DataRow row in table.Rows)
            {
                txtID.Text = row["au_id"].ToString();
                txtFirstName.Text = row["au_fname"].ToString();
                txtLastName.Text = row["au_lname"].ToString();
                txtPhone.Text = row["phone"].ToString();
                txtAddress.Text = row["address"].ToString();
                txtCity.Text = row["city"].ToString();
                txtState.Text = row["state"].ToString();
                txtZip.Text = row["zip"].ToString();
                chkContract.Checked = (bool)row["contract"];
                lblResults.Text = "";
            }


        }
        catch (Exception err)
        {
            lblResults.Text = "Error getting author.  " + err.Message;
        }

    }
    protected void cmdNew_Click(object sender, EventArgs e)
    {
        //This method clears the values in the controls so that a new author can be added
        //See page 456
        txtID.Text = "";
        txtFirstName.Text = "";
        txtLastName.Text = "";
        txtPhone.Text = "";
        txtAddress.Text = "";
        txtCity.Text = "";
        txtState.Text = "";
        txtZip.Text = "";
        chkContract.Checked = false;

        lblResults.Text = "Click Insert New to add the completed record.";
    }
    protected void cmdInsert_Click(object sender, EventArgs e)
    {
        AuthorAccess.InsertAuthor(txtID.Text, txtLastName.Text, txtFirstName.Text, txtPhone.Text, txtAddress.Text, txtCity.Text,txtState.Text,txtZip.Text, chkContract.Checked);

    }

    protected void cmdUpdate_Click(object sender, EventArgs e)
    {
        AuthorAccess.UpdateAuthor(txtID.Text, txtLastName.Text, txtFirstName.Text, txtPhone.Text, txtAddress.Text, txtCity.Text, txtState.Text, txtZip.Text, chkContract.Checked);

    }
    protected void cmdDelete_Click(object sender, EventArgs e)
    {
        AuthorAccess.DeleteAuthor(lstAuthor.SelectedValue);
        
    }
}
