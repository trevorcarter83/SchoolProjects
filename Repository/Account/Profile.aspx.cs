﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using Microsoft.AspNet.Identity;
using Microsoft.AspNet.Identity.EntityFramework;
using Microsoft.Owin.Security;


public partial class Account_Profile : System.Web.UI.Page
{
    //Declare a UserManager and ApplicationUser variable that will be used on this page.
    IdentityEF.UserManager userManager;
    IdentityEF.ApplicationUser user;

    protected void Page_Load(object sender, EventArgs e)
    {
        //Set the UserManager variable declared above to a new instance of the IdentityEF.UserManager class
        userManager = new IdentityEF.UserManager();

        //Call the FindByName method of the UserManager to set the ApplicationUser variable to the user that is currently logged in
        user = usermanager.FindByName(User.Identity.Name);
    }

    protected void btnUpdateProfile_Click(object sender, EventArgs e)
    {

        //If the user is not null, update the user's profile variables to the variables entered in the textboxes.
        //The BirthDate will need to be converted to a DateTime (be sure to check for nulls).
        //Be sure to also set the Email address, which is already included in the user's profile.
        //Report any error messages in the StatusMessage control on the page.

        if (user != null)
        {
            user.FirstName = txtFirstName.Text;
            user.LastName = txtLastName.Text;
            user.Email = txtEmail2.Text;
            user.BirthDate = Convert.ToDateTime(txtBirthDate.Text);
            user.StreetAddress = txtStreet.Text;
            user.City = txtCity.Text;
            user.State = txtState.Text;
            user.ZipCode = txtZip.Text;
            user.Country = txtCountry.Text;

            IdentityResult result = usermanager.Update(user);

            if (!result.Succeeded)
            {
                StatusMessage.Text = result.Errors.FirstOrDefault();
            }

        }

    }

    protected void Page_PreRender(object sender, EventArgs e)
    {

        //If the user is not null, set the values of the TextBoxes to the user's profile variables
        //This is done in Page_PreRender so as to happen after any updates that take place in the btnUpdateProfile_Click event handler method

        if (user != null)
        {
            txtFirstName.Text = user.FirstName;
            txtLastName.Text = user.LastName;
            txtEmail.Text = user.Email;
            txtEmail2.Text = user.Email;
            txtStreet.Text = user.Address1;
            txtBirthDate.Text = user.BirthDate.ToString();
            txtCity.Text = user.City;
            txtState.Text = user.State;
            txtZip.Text = user.ZipCode;
            txtCountry.Text = user.Country;
        }

    }
       
}

