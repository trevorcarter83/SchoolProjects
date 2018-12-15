using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Rich_Controls_Rich_Controls : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        

    }

    protected void Selection_Changed(object sender, EventArgs e)
    {
        DateTime bd = DateTime.Parse("10/05/1994");
        DateTime dt = Calendar1.SelectedDate;

        if (dt.Date > bd.Date)
        {
            lblBeforeAfter.Text = "Selected date is "
                + Calendar1.SelectedDate.ToLongDateString()
                + " which is after Trevor's birthday";
        }
        else if (dt.Date == bd.Date)
        {
            lblBeforeAfter.Text = "Selected date is the same day as Trevor's Birthday";
        }
        else
        {
            lblBeforeAfter.Text = "Selected date is "
                + Calendar1.SelectedDate.ToLongDateString()
                + " which is before Trevor's birthday";
        }
    }

    protected void wkDayCalendar_DayRender (object sender, DayRenderEventArgs e)
    {
        e.Day.IsSelectable = !e.Day.IsWeekend;
    }
}