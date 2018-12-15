//Import any necessary namespaces from the .NET framework
using System;

//Declare the class.  The "public" access modifier means other classes can interact with this class.
//This class is a blueprint for an object called "Product".
public class Product
{
    //Private member variables.  These are the variables that make up the identity of an instance of the class.
    //In this case, every product can have a name, a price, and an imageURL
    //The variables are private, meaning other classes cannot access or change these values directly
    private string name;
    private decimal price;
    private string imageUrl;


    //Public properties.  The public properties provide controlled access to the class's private member variables.
    //Other classes may retrieve the value of each variable using the get accessor, which returns the value of the private member variable.
    //Example:  string name = myProduct.Name;
    //Other classes may set the value of each variable using the set accessor
    //Example:  myProduct.Name = "New Name";
    public string Name
    {
        get
        { return name; }
        set
        { name = value; }
    }

   public decimal Price
    {
        get
        { return price; }
        set
        { price = value;}
    }

    public string ImageUrl
    {
        get
        { return imageUrl; }
        set
        { imageUrl = value; }
    }

    
    //Public Method.  Methods represent the class's behavior, or the things that an instance of this class can do.
    //This method simply returns a string consisting of HTML code with the values of the instance's private member
    //variables.  The "virtual" keyword means that the method can be overridden by an inheriting class.
    public virtual string GetHtml()
    {
        string htmlString;
        htmlString = "<h1>" + name + "</h1><br>";
        htmlString += "<h3>Costs: " + price.ToString() + "</h3><br>";
        htmlString += "<img src='" + imageUrl + "' />";
        htmlString += "<hr />";
        return htmlString;
    }


    //Constructor.  This is a special method whose purpose is to instantiate objects of this class.
    //Constructors look like methods but have the same name as the class and no return type.
    //In this case, to instantiate the Product class, three arguments must be supplied:  name, price, and ImageURL
    //Another class could instantiate the product class by invoking the constructor as follows:
    //Product myProduct = new Product("Smart Phone", 200, "smartphone.jpg")
    public Product(string name, decimal price, string imageUrl)
    {
        Name = name;
        Price = price;
        ImageUrl = imageUrl;
    }
}

