using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class C_Sharp_ProductCatalogTest : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        ProductCatalog productCatalog = new ProductCatalog();

        productCatalog.AddProduct("Microwave", 12, "http://localhost:54097/C-Sharp/microwave.jpg");
        productCatalog.AddProduct("Mixer", 120, "http://localhost:54097/C-Sharp/mixer.jpg");
        productCatalog.AddProduct("Toaster", 2, "http://localhost:54097/C-Sharp/toaster.jpg");

        Response.Write(productCatalog.GetCatalogHtml());

        Response.Write("The highest priced item is: " + productCatalog.GetHighPricedProduct().Name
            +" "+productCatalog.GetHighPricedProduct().Price) ;


    }
}