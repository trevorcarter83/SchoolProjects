using System;
using System.Collections;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Web;
using System.Web.SessionState;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls;

namespace GreetingCardMaker
{

	public partial class GreetingCardMaker : System.Web.UI.Page
	{
		// Page_Load will initalize all of the controls on the left side of the page which will
        // allow the user to configure the greeting card.
        protected void Page_Load(object sender, System.EventArgs e)
		{
			// Only take the following steps to initialize the controls if the page is being loaded
            // for the first time (meaning the IsPostback property of the page = false)
            if (this.IsPostBack == false)
			{
                // Set color options in the lstBackColor DropDownList.
                //lstBackColor.Items.Add("White");
                //lstBackColor.Items.Add("Red");
                //lstBackColor.Items.Add("Green");
                //lstBackColor.Items.Add("Blue");
                //lstBackColor.Items.Add("Yellow");
				
                // Set font options in the lstFontName DropDownList.
				lstFontName.Items.Add("Times New Roman");
				lstFontName.Items.Add("Arial");
				lstFontName.Items.Add("Verdana");
				lstFontName.Items.Add("Tahoma");

                // Set border style options of the lstBorder RadioButtonList by adding a series of
                // ListItem objects.  This will allow us to set a different text and value for each ListItem
                // because we will pull the values from the .NET WebControls.BorderStyle enumeration, which is a list of acceptable 
                // border styles defined in the .NET framework.  (see https://msdn.microsoft.com/en-us/library/system.web.ui.webcontrols.borderstyle(v=vs.110).aspx)
                // Each value of the enumeration is identified by
                // both a name (e.g., Dotted) and a number (e.g., 1).  We will show the name as the text of each
                // ListItem and store the number as the value
                ListItem item = new ListItem();

                // The item text indicates the name of the option.
                item.Text = BorderStyle.None.ToString();

                // The item value records the corresponding integer
                // from the enumeration. To obtain this value, you
                // must cast the enumeration value to an integer,
                // and then convert the number to a string so it
                // can be placed in the HTML page.
                item.Value = ((int)BorderStyle.None).ToString();

                // Add the item.
                lstBorder.Items.Add(item);

                // Now repeat the process for two other border styles (we will only use three of the available options).
                item = new ListItem();
                item.Text = BorderStyle.Double.ToString();
                item.Value = ((int)BorderStyle.Double).ToString();
                lstBorder.Items.Add(item);

                item = new ListItem();
                item.Text = BorderStyle.Solid.ToString();
                item.Value = ((int)BorderStyle.Solid).ToString();
                lstBorder.Items.Add(item);
			
				// Select the first border option.
				lstBorder.SelectedIndex = 0;

				
			}
		}
        protected void ControlChanged(object sender, EventArgs e)
        {
            UpdateCard();
        }
		// This method will fire when the Update button is clicked.  It will update the card itself, which
        // is found on the right side of the page in a Panel called pnlCard
        protected void cmdUpdate_Click(object sender, System.EventArgs e)
		{
            UpdateCard();
		}

        private void UpdateCard()
        {
            // Update the color.
            pnlCard.BackColor = Color.FromName(lstBackColor.SelectedItem.Text);

            // Update the font.
            lblGreeting.Font.Name = lstFontName.SelectedItem.Text;

            try
            {
                if (Int32.Parse(txtFontSize.Text) > 0)
                {
                    lblGreeting.Font.Size =
                        FontUnit.Point(Int32.Parse(txtFontSize.Text));
                    lblName.Font.Size =
                        FontUnit.Point(Int32.Parse(txtFontSize.Text));
                }
            }
            catch
            {
                // Use error handling to ignore invalid value.
            }

            // Update the border style.
            pnlCard.BorderStyle = (BorderStyle)Int32.Parse(lstBorder.SelectedItem.Value);

            // Update the pictures.

            foreach (ListItem item in ListBox1.Items)
            {
                System.Web.UI.WebControls.Image myImg = new System.Web.UI.WebControls.Image();

                myImg.ImageUrl = item.Value;

                if (item.Selected)
                {
                    myImg.Visible = true;
                    pnlCard.Controls.Add(myImg);
                }


            }

            // Set the text.
            lblGreeting.Text = txtGreeting.Text;
            lblName.Text = "From: " + txtName.Text;
        }
	}
}
