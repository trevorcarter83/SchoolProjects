﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class UCMP_MasterPage : System.Web.UI.MasterPage
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    public string AdFile
    {
        get { return adRotator1.AdvertisementFile; }
        set { adRotator1.AdvertisementFile = value; }
    }
}
