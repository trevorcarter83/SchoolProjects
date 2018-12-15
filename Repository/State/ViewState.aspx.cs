using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class State_ViewState : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void ChangeLabel_Click(object sender, EventArgs e)
    {
        Label1.Text = "Goodbye Cruel World!";
    }

    protected void ChangeLabelColor_Click(object sender, EventArgs e)
    {
        Label1.ForeColor = System.Drawing.Color.Red;
    }

    protected void ChangeTextbox_Click(object sender, EventArgs e)
    {
        TextBox1.Text = "Goodbye box";
    }

    protected void ChangeTextboxReadOnly_Click(object sender, EventArgs e)
    {
        TextBox1.ReadOnly = true;
    }

    protected void ChangeSelectedItem_Click(object sender, EventArgs e)
    {
        DropDownList1.SelectedIndex = 1;
    }

    protected void ChangeDDLColor_Click(object sender, EventArgs e)
    {
        DropDownList1.BackColor = System.Drawing.Color.Yellow;
    }

    protected void PostBackCount_Click(object sender, EventArgs e)
    {
        int counter;
        if(ViewState["Counter"] == null)
        {
            counter = 1;
        }
        else
        {
            counter = (int)ViewState["Counter"] + 1;
        }

        ViewState["Counter"] = counter;
        lblCount.Text = "Counter: " + counter.ToString();
    }
}