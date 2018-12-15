using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Configuration;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class ManageContacts : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void ddlSelectContact_SelectedIndexChanged(object sender, EventArgs e)
    {
        //Call retrieve contact to get the contact info for the record
        //selected in the DropDownList
        RetrieveContact();
    }

    protected void submit_ServerClick(object sender, EventArgs e)
    {

        //Call PostResponse to record the response and flag the message
        //as RespondedTo
        PostResponse();

        //Refresh the DropDownList so that it no longer shows the message
        //just responded to
        ddlSelectContact.DataBind();
    }

    private void RetrieveContact()
    {

        //get the connection string from Web.Config
        string constring = WebConfigurationManager.ConnectionStrings["Toys"].ConnectionString;

        string selectcommand = "SELECT * FROM Contact WHERE ContactID = @ContactID";

        //instantiate a SQLConnection object to connect to the database
        SqlConnection con = new SqlConnection(constring);


        //instantiate a SqlCommand object to execute the query
        SqlCommand cmd = new SqlCommand(selectcommand, con);


        //attach the parameters to the command
        SqlParameter param = cmd.CreateParameter();
        param.ParameterName = "@ContactID";
        param.Value = ddlSelectContact.SelectedValue;
        cmd.Parameters.Add(param);

        //Instantiate a SqlDataReader and DataTable for storing the data
        SqlDataReader reader;
        DataTable table = new DataTable() ;
        //attempt to connect to the database and execute the command
        try
        {
            //open the connection
            con.Open();

            //execute the command
            //Because it is a select, use ExecuteReader
            reader = cmd.ExecuteReader();

            //Load the contents into an in-memory DataTable so we can
            //close the connection.
            table.Load(reader);
        }
        catch (Exception err)
        {
            //have exception handling here
            usermessage.InnerText += err.Message;
        }
        finally
        {
            //close the connection
            con.Close();
        }

        //make sure we have data in the datatable
        //Then, update the controls on the page.
        if (table.Rows.Count > 0)
        {

            contact_first_name.Value = table.Rows[0]["FirstName"].ToString();
            contact_last_name.Value = table.Rows[0]["LastName"].ToString();
            contact_company.Value = table.Rows[0]["CompanyName"].ToString();
            contact_email.Value = table.Rows[0]["Email"].ToString();
            message.Value = table.Rows[0]["Message"].ToString();


            
        }



    }

    private void PostResponse()
    {

        //get the connection string from Web.Config
        string constring = WebConfigurationManager.ConnectionStrings["Toys"].ConnectionString;

        string updatecommand = "UPDATE Contact SET Response = @Response, " +
            "RespondedTo = @RespondedTo, " +
            "ResponseDate = @ResponseDate " +
            "WHERE ContactID = @ContactID";

        //instantiate a SQLConnection object to connect to the database
        SqlConnection con = new SqlConnection(constring);


        //instantiate a SqlCommand object to execute the query
        SqlCommand cmd = new SqlCommand(updatecommand, con);




        //shorter way
        cmd.Parameters.AddWithValue("@Response", response.Value);
        cmd.Parameters.AddWithValue("@ResponseDate", DateTime.Today.Date);
        cmd.Parameters.AddWithValue("@RespondedTo", true);
        cmd.Parameters.AddWithValue("@ContactID", ddlSelectContact.SelectedValue);
       

        int rowsAffected = 0;
        //attempt to connect to the database and execute the command
        try
        {
            //open the connection
            con.Open();

            //execute the command
            //Because it is an insert, use ExecuteNonQuery
            rowsAffected = cmd.ExecuteNonQuery();
        }
        catch (Exception err)
        {
            //have exception handling here
            usermessage.InnerText += err.Message;
        }
        finally
        {
            //close the connection
            con.Close();
        }

        //report that the insert succeeded
        if (rowsAffected > 0)
        {
            usermessage.InnerText += "Message response recorded successfully.";
        }



    }

  
}