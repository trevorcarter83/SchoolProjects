using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using Microsoft.AspNet.Identity;
using Microsoft.AspNet.Identity.EntityFramework;
using Microsoft.Owin.Security;
using IdentityEF;
using System.Web.Configuration;
using System.Data.SqlClient;
using System.Data;

public partial class Admin_ManageRoles : System.Web.UI.Page
{
    
    protected void Page_Load(object sender, EventArgs e)
    {
      
    }



    protected void btnNewRole_Click(object sender, EventArgs e)
    {
        string constring = WebConfigurationManager.ConnectionStrings["IdentityDB"].ConnectionString;

        SqlConnection con = new SqlConnection(constring);
        SqlCommand cmd = new SqlCommand("RoleInsert", con);
        cmd.CommandType = CommandType.StoredProcedure;
        cmd.Parameters.AddWithValue("Name", txtNewRole.Text);
        if(txtNewRole.Text != "")
        {
            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();
        }
        

    }



    protected void btnUser_Click(object sender, EventArgs e)
    {
        string constring = WebConfigurationManager.ConnectionStrings["IdentityDB"].ConnectionString;

        SqlConnection con = new SqlConnection(constring);
        SqlCommand cmd = new SqlCommand("UserRoleInsert", con);
        cmd.CommandType = CommandType.StoredProcedure;


        con.Open();
        foreach (ListItem item in cblRoles.Items)
        {
            if (item.Selected)
            {
                cmd.Parameters.AddWithValue("UserID", ddlUsers.SelectedValue);
                cmd.Parameters.AddWithValue("RoleID", cblRoles.SelectedValue);
                cmd.ExecuteNonQuery();
                cmd.Parameters.Clear();
            }
            
        }
        con.Close();
    }
}