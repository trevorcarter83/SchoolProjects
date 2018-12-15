using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;


public partial class UCMP_ChangeMaster : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void Update_Click(object sender, EventArgs e)
    {
        

        if(RadioButtonList1.SelectedIndex == 1)
        {
            UCMP_MasterPage master = (UCMP_MasterPage)this.Master;
            master.AdFile = "NewAdvertisements.xml";
        }

        else
        {
            UCMP_MasterPage master = (UCMP_MasterPage)this.Master;
            master.AdFile = "RichControlsAdRotator.xml";
        }
    }
}