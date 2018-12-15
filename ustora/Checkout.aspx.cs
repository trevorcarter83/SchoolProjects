using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.Configuration;
using System.Web.UI;
using System.Web.UI.WebControls;
using Microsoft.AspNet.Identity;

public partial class Checkout : System.Web.UI.Page
{
    //Declare a UserManager and ApplicationUser variable that will be used on this page.
    IdentityEF.UserManager usermanager;
    IdentityEF.ApplicationUser user;

    protected void Page_Load(object sender, EventArgs e)
    {
        //Set the UserManager variable declared above to a new instance of the IdentityEF.UserManager class
        usermanager = new IdentityEF.UserManager();

        //Call the FindByName method of the UserManager to set the ApplicationUser variable to the user that is currently logged in
        user = usermanager.FindByName(User.Identity.Name);

        BindCart();
    }

    protected void Page_PreRender(object sender, EventArgs e)
    {

        //If the user is not null, set the values of the TextBoxes to the user's profile variables
        
        if (user != null)
        {
            billing_first_name.Value = user.FirstName;
            billing_last_name.Value = user.LastName;
            billing_email.Value = user.Email;
            billing_company.Value = user.CompanyName;
            billing_address_1.Value= user.Address1;
            billing_address_2.Value = user.Address2;
            billing_city.Value = user.City;
            billing_state.Value = user.State;
            billing_postcode.Value = user.Zip;
            billing_country.Value = user.Country;
        }
    }

   

    protected void cbxShipToBilling_CheckedChanged(object sender, EventArgs e)
    {
        if (cbxShipToBilling.Checked)
        {
            shipping_first_name.Value = billing_first_name.Value;
            shipping_last_name.Value = billing_last_name.Value;
            shipping_company.Value = billing_company.Value;
            shipping_address_1.Value = billing_address_1.Value;
            shipping_address_2.Value = billing_address_2.Value;
            shipping_city.Value = billing_city.Value;
            shipping_state.Value = billing_state.Value;
            shipping_postcode.Value = billing_postcode.Value;
            shipping_country.Value = billing_country.Value;
        }
    }

    private void BindCart()
    {
        //pull the Cart out of the session
        Cart c = (Cart)Session["Cart"];

        //populate the ListView with a list of items in the cart
        if (c != null)
        {

            lvwOrderSummary.DataSource = c.Items;

            //Only bind here when the page loads for the first time
            if (!IsPostBack)
                lvwOrderSummary.DataBind();

            //update subtotal, shipping, and total

            //retrieve labels from ListView
            Label lSubtotal = (Label)lvwOrderSummary.FindControl("lblSubtotal");
            Label lShipping = (Label)lvwOrderSummary.FindControl("lblShipping");
            Label lTotal = (Label)lvwOrderSummary.FindControl("lblTotal");

            //update cart totals
            lSubtotal.Text = String.Format("{0:c}", c.GetSubTotal());
            lShipping.Text = String.Format("{0:c}", c.GetShipping());
            lTotal.Text = String.Format("{0:c}", c.GetTotal());
        }
    }

    protected void btnPlaceOrder_Click(object sender, EventArgs e)
    {
        //retrieve the values needed to create an order

        //grab the cart total values from the session
        Cart c = (Cart)Session["Cart"];
        decimal subtotal = 0, shipping = 0, total = 0;
        DataTable items = new DataTable();
        if (c!= null)
        {
            subtotal = c.GetSubTotal();
            shipping = c.GetShipping();
            total = c.GetTotal();

            items.Columns.Add("ProductID", typeof(int));
            items.Columns.Add("Quantity", typeof(int));
            items.Columns.Add("UnitPrice", typeof(decimal));

            //loop thorugh items in cart
            foreach(CartItem i in c.Items)
            {
                //add a row to table
                items.Rows.Add(new object[] { i.ItemId, i.Quantity, i.Price });
            }
        }

        //get the username of the user from the User property of the page
        string username = User.Identity.Name;

        //To be continued....

        //instantiate necesary ado.net objects
        string constring = WebConfigurationManager.ConnectionStrings["Toys"].ConnectionString;
        SqlConnection con = new SqlConnection(constring);
        SqlCommand cmd = new SqlCommand("InsertOrder", con);
        cmd.CommandType = CommandType.StoredProcedure;

        //attach all parameters to command
        cmd.Parameters.AddWithValue("@OrderDate", DateTime.Today);
        cmd.Parameters.AddWithValue("@Username", username);
        cmd.Parameters.AddWithValue("@BillFirstName", billing_first_name.Value);
        cmd.Parameters.AddWithValue("@BillLastName", billing_last_name.Value);
        cmd.Parameters.AddWithValue("@BillCompanyName", billing_company.Value);
        cmd.Parameters.AddWithValue("@BillAddress1", billing_address_1.Value);
        cmd.Parameters.AddWithValue("@BillAddress2", billing_address_2.Value);
        cmd.Parameters.AddWithValue("@BillCity", billing_city.Value);
        cmd.Parameters.AddWithValue("@BillState", billing_state.Value);
        cmd.Parameters.AddWithValue("@BillZipCode", billing_postcode.Value);
        cmd.Parameters.AddWithValue("@BillCountry", billing_country.Value);
        cmd.Parameters.AddWithValue("@BillPhone", billing_phone.Value);
        cmd.Parameters.AddWithValue("@BIllEmail", billing_email.Value);
        cmd.Parameters.AddWithValue("@ShipFirstName", shipping_first_name.Value);
        cmd.Parameters.AddWithValue("@ShipLastName", shipping_last_name.Value);
        cmd.Parameters.AddWithValue("@ShipCompanyName", shipping_company.Value);
        cmd.Parameters.AddWithValue("@ShipAddress1", shipping_address_1.Value);
        cmd.Parameters.AddWithValue("@ShipAddress2", shipping_address_2.Value);
        cmd.Parameters.AddWithValue("@ShipCity", shipping_city.Value);
        cmd.Parameters.AddWithValue("@ShipState", shipping_state.Value);
        cmd.Parameters.AddWithValue("@ShipZipCode", shipping_postcode.Value);
        cmd.Parameters.AddWithValue("@ShipCountry", shipping_country.Value);
        cmd.Parameters.AddWithValue("@SubTotal", subtotal);
        cmd.Parameters.AddWithValue("@Shipping", shipping);
        cmd.Parameters.AddWithValue("@Total", total);
        cmd.Parameters.AddWithValue("@OrderNotes", order_comments.Value);
        cmd.Parameters.AddWithValue("@OrderDetails", items);


        int rowsAffected = 0;

        try
        {
            con.Open();
            rowsAffected = cmd.ExecuteNonQuery();
        }
        catch(Exception err)
        {
            lblConfirm.Text = err.Message;
        }
        finally
        {
            con.Close();
        }

        if (rowsAffected > 0)
        {
            //report success
            lblConfirm.Text = "Order Placed Successfully!";
        }
        Response.Redirect("PaypalCheckout.aspx");
    }
}