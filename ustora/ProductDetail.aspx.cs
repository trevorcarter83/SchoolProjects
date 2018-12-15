using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class ProductDetail : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void fvwProductDetail_ItemCommand(object sender, FormViewCommandEventArgs e)
    {
        //make sure that this method is firing in response to the AddToCart event
        if (e.CommandName == "AddToCart")
        {
            //Retrieve the ID, Name, and Price of the item to be added
            //from the DropDownList

            //pull the ID out of the DataKeys collection of the Formview
            int id = Convert.ToInt16(fvwProductDetail.DataKey.Value);

            //pull the ProductName out of the Literal control
            Literal l1 = (Literal)fvwProductDetail.FindControl("ltrProductName");
            string name = l1.Text;

            //pull the price out of the Literal control
            HiddenField h1 = (HiddenField)fvwProductDetail.FindControl("hfPrice");
            decimal price = Convert.ToDecimal(h1.Value);

            //pull the quantity out of the Textbox control
            TextBox t1 = (TextBox)fvwProductDetail.FindControl("txtQty");
            int quantity = Convert.ToInt16(t1.Text);

            //pull the image path from the imgThumb Image control
            Image i1 = (Image)fvwProductDetail.FindControl("imgThumb");
            string imagePath = i1.ImageUrl;

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

            c.AddItem(id, name, price, quantity, imagePath);


            //Put the cart (back) into the session

            Session["Cart"] = c;
        }
    }
}