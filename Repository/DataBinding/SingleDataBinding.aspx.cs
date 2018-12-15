using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class DataBinding_SingleDataBinding : System.Web.UI.Page
{
    protected string SystemTime;
    protected string URL;
    protected void Page_Load(object sender, EventArgs e)
    {
        SystemTime = DateTime.Now.ToShortTimeString();
        URL = "~/WebControls/birthday.png";


        DataBind();
    }
}