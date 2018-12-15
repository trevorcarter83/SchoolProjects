using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class DataControls_AuthorTitles : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void gvwAuthors_RowDataBound(object sender, GridViewRowEventArgs e)
    {
        if (e.Row.RowType == DataControlRowType.DataRow)
        {           
            int TitleCount = (int)DataBinder.Eval(e.Row.DataItem, "TitleCount");
            if (TitleCount > 1)
            {
                e.Row.BackColor = System.Drawing.Color.Yellow;
            }
        }
    }

    protected void btnAuthorInsert_Click(object sender, EventArgs e)
    {
        btnAuthorInsert.Visible = false;
        gvwAuthors.Visible = false;
        dvwInsertAuthor.Visible = true;
    }

    protected void btnInsert_Click(object sender, EventArgs e)
    {
        btnAuthorInsert.Visible = true;
        gvwAuthors.Visible = true;
        dvwInsertAuthor.Visible = false;
    }

    //protected void IdSelected_Click(object sender, EventArgs e)
    //{
    //    btnAuthorInsert.Visible = false;
    //    gvwAuthors.Visible = false;
    //    grvAuthorTitles.Visible = true;
    //    LinkButton lnkBtn = (LinkButton)e.CommandSource;

    //    if(gvwAuthors.SelectedDataKey.Value != null)
    //    {
    //        string idKey = gvwAuthors.SelectedDataKey.Value.ToString();

    //        Session["SelectedID"] = idKey;
    //    }

    //}

    protected void gvwAuthors_RowCommand(object sender, GridViewCommandEventArgs e)
    {
        if(e.CommandName == "PassID")
        {
            btnAuthorInsert.Visible = false;
            gvwAuthors.Visible = false;
            grvAuthorTitles.Visible = true;

            string xauthor = e.CommandArgument.ToString();

            Session["SelectedID"] = xauthor;
        }
    }
}