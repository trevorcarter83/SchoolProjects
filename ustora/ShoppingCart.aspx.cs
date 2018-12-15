using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class ShoppingCart : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //pull the Cart out of the session
        Cart c = (Cart)Session["Cart"];

        //populate the ListView with a list of items in the cart
        if (c != null)
        {

            lvwCart.DataSource = c.Items;

            //Only bind here when the page loads for the first time
            if (!IsPostBack)
                lvwCart.DataBind();
        }
    }

    protected void lvwCart_ItemDeleting(object sender, ListViewDeleteEventArgs e)
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
        lvwCart.DataBind();

    }

    protected void txtQty_TextChanged(object sender, EventArgs e)
    {
        //get a reference to the txtQty textbox
        TextBox txtQuantity = (TextBox)sender;

        //get a reference to the parent control (the ListViewItem) of the Textbox
        ListViewItem lvItem = (ListViewItem)txtQuantity.Parent;

        //get the index of the item to be updated
        int index = lvItem.DataItemIndex;

        //get the ID of the CartItem to be updated
        int ItemID = Convert.ToInt16(lvwCart.DataKeys[index].Value);

        //get the new quantity
        int newQuantity = Convert.ToInt16(txtQuantity.Text);

        //pull the cart out of the session if it exists
        Cart c = (Cart)Session["Cart"];

        if (c != null)
        {
            //call the removeItem method
            c.UpdateQuantity(ItemID, newQuantity);
        }

        //put the cart back into the session
        Session["Cart"] = c;

        //Rebind the Gridview
        lvwCart.DataBind();

    }

    protected void Page_PreRender(object sender, EventArgs e)
    {
        //update the cart totals after the ListView has been bound and all other events have occurred.
        //pull the cart out of the session if it exists
        Cart c = (Cart)Session["Cart"];

        if (c != null)
        {
            //Call the methods to report subtotal, shipping, and total
            lblSubtotal.Text = String.Format("{0:c}", c.GetSubTotal());
            lblShipping.Text = String.Format("{0:c}", c.GetShipping());
            lblTotal.Text = String.Format("{0:c}", c.GetTotal());
        }
    }

    protected void btnCheckout_Click(object sender, EventArgs e)
    {
        Response.Redirect("Checkout.aspx");
    }
}