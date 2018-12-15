using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class RepeatedDataBinding : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        List<int> arrayInt = new List<int>();
        arrayInt.Add(1);
        arrayInt.Add(2);
        arrayInt.Add(3);
        arrayInt.Add(4);
        arrayInt.Add(5);
        arrayInt.Add(6);
        arrayInt.Add(7);
        arrayInt.Add(8);
        arrayInt.Add(9);
        arrayInt.Add(10);
        lstIntArray.DataSource = arrayInt;

        List<string> foods = new List<string>();
        foods.Add("pizza");
        foods.Add("chicken");
        foods.Add("sandwich");
        foods.Add("burger");
        foods.Add("fish");
        foods.Add("steak");
        foods.Add("cookies");
        foods.Add("ice cream");
        foods.Add("fries");
        foods.Add("noodles");
        cblFoods.DataSource = foods;

        List<string> bands = new List<string>();
        bands.Add("Imagine Dragons");
        bands.Add("Twenty One Pilots");
        bands.Add("Fall Out Boy");
        bands.Add("Panic at the Disco");
        rblBands.DataSource = bands;

        Dictionary<int, string> months = new Dictionary<int, string>();
        months.Add(1,"January");
        months.Add(2,"February");
        months.Add(3,"March");
        months.Add(4,"April");
        months.Add(5,"May");
        months.Add(6,"June");
        months.Add(7,"July");
        months.Add(8,"August");
        months.Add(9,"September");
        months.Add(10,"October");
        months.Add(11,"November");
        months.Add(12,"December");
        ddlMonths.DataSource = months;
        ddlMonths.DataTextField = "Value";
        ddlMonths.DataValueField = "Key";




        DataBind();


    }
}