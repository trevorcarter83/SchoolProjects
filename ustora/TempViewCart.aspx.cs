using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class TempViewCart : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //pull the Cart out of the session
        Cart c = (Cart)Session["Cart"];

        //populate the ListBox with a list of items in the cart
        if (c != null)
        {

            gvwCart.DataSource = c.Items;
            //if (!IsPostBack)
            //    gvwCart.DataBind();
            //lbxCart.DataSource = c.Items;
            //lbxCart.DataTextField = "Name";
            //lbxCart.DataValueField = "ItemId";
            //lbxCart.DataBind();
        }
    }

    //Fires AFTER all other control events
    //unlinke Page_Load which fires BEFORE all other control events
    protected void Page_PreRender(object sender, EventArgs e)
    {
        //Bind the Gridview
        gvwCart.DataBind();
    }

    protected void gvwCart_RowDeleting(object sender, GridViewDeleteEventArgs e)
    {
        //retrieve the id of the item to be deleted
        //get this id from the DataKeys collection

        //this statement uses the e object to retrieve the key value
        int id = Convert.ToInt16(e.Keys[0]);

        //Alternate way using the DataKeys property
        //int id = Convert.ToInt16(gvwCart.DataKeys[e.RowIndex].Value);

        //pull the cart out of the session if it exists
        Cart c = (Cart)Session["Cart"];

        if (c != null)
        {
            //call the removeItem method
            c.RemoveItem(id);
        }

        //put the cart back into the session
        Session["Cart"] = c;

        //Rebind the Gridview
        gvwCart.DataBind();

    }

    protected void gvwCart_RowEditing(object sender, GridViewEditEventArgs e)
    {
        //put the GridView into edit mode by setting the EditIndex
        //to the index # of the row that was clicked
        gvwCart.EditIndex = e.NewEditIndex;

        //Rebind the Gridview
        gvwCart.DataBind();
    }

    protected void gvwCart_RowCancelingEdit(object sender, GridViewCancelEditEventArgs e)
    {
        //reset the EditIndex back to -1
        gvwCart.EditIndex = -1;

        //Rebind the GridView
        gvwCart.DataBind();
    }

    protected void gvwCart_RowUpdating(object sender, GridViewUpdateEventArgs e)
    {
        //get the id of the product to be updated from DataKeys
        int id = Convert.ToInt16(e.Keys[0]);

        //get the quantity from the texbox in the Gridview
        //Use the FindControl method to retrieve the TextBox control containing the quantity
        TextBox txtQty = (TextBox)gvwCart.Rows[e.RowIndex].FindControl("txtQuantity");
        int quantity = Convert.ToInt16(txtQty.Text);

        //pull the cart out of the session if it exists
        Cart c = (Cart)Session["Cart"];

        if (c != null)
        {
            //call the UpdateQuantity method
            c.UpdateQuantity(id, quantity);
        }

        //put the cart back into the session
        Session["Cart"] = c;

        //reset the EditIndex back to -1
        gvwCart.EditIndex = -1;

        //Rebind the Gridview
        gvwCart.DataBind();


    }
}