using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Configuration;
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
            contact_last_name.Value + " for contacting us.  We will respond to you at " +
            contact_email.Value + " no later than " + DateTime.Today.AddDays(14).ToShortDateString() +
            ".";

        InsertContact();
    }

    private void InsertContact()
    {

        //get the connection string from Web.Config
        string constring = WebConfigurationManager.ConnectionStrings["Toys"].ConnectionString;

        string insertcommand = "INSERT INTO Contact (FirstName, LastName, CompanyName, Email, Message, MessageDate) " +
            "VALUES (@FirstName, @LastName, @CompanyName, @Email, @Message, @MessageDate)";

        //instantiate a SQLConnection object to connect to the database
        SqlConnection con = new SqlConnection(constring);


        //instantiate a SqlCommand object to execute the query
        SqlCommand cmd = new SqlCommand(insertcommand, con);


        //attach the parameters to the command
        SqlParameter param = cmd.CreateParameter();
        param.ParameterName = "@FirstName";
        param.Value = contact_first_name.Value;
        cmd.Parameters.Add(param);

        //shorter way
        cmd.Parameters.AddWithValue("@LastName", contact_last_name.Value);
        cmd.Parameters.AddWithValue("@CompanyName", contact_company.Value);
        cmd.Parameters.AddWithValue("@Email", contact_email.Value);
        cmd.Parameters.AddWithValue("@Message", message.Value);
        cmd.Parameters.AddWithValue("@MessageDate", DateTime.Today.Date);

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
            usermessage.InnerText += "Message inserted successfully.";
        }



    }
}