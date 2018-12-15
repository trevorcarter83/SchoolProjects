using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class TempShop : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void btnAddToCart_Click(object sender, EventArgs e)
    {
        //Retrieve the ID, Name, and Price of the item to be added
        //from the DropDownList
        int id = Convert.ToInt16(ddlProducts.SelectedValue);
        string nameprice = ddlProducts.SelectedItem.Text;
        string[] separators = { " -- $" };
        string[] values = nameprice.Split(separators, StringSplitOptions.None);
        string name = values[0];
        decimal price = Convert.ToDecimal(values[1]);


        //Instantiate a new Cart or retrieve the existing Cart from the Session
        Cart c;

        //if Cart exists in the session, pull it out
        if (Session["Cart"] != null)
        {
            c = (Cart)Session["Cart"];
        }
        //if Cart does not exist in session, create a new one
        else
        {
            c = new Cart();
        }


        //Add the item to the Cart using the AddItem method

        c.AddItem(id, name, price, 1);


        //Put the cart (back) into the session

        Session["Cart"] = c;
    }
}