using System;


/// <summary>
/// This is a simple class representing an item that can be added to the shopping cart.
/// </summary>
public class CartItem
{

    //4 private member variables:  id, name, price, quantity.  Use appropriate data types.
    private int itemId;
    private string name;
    private decimal price;
    private int quantity;
    private string imagePath;

    //4 public properties (one for each private member variable): ID, Name, Price, Quantity.
    //Quantity should have both get and set accessors; all others should have get accessors only.
    public int ItemId
    {
        get { return itemId; }
    }

    public string Name
    {
        get { return name; }
    }

    public decimal Price
    {
        get { return price; }
    }

    public int Quantity
    {
        get { return quantity; }
        set { if (value >= 1) quantity = value; }
    }

    public string ImagePath
    {
        get { return imagePath; }
    }
    //1 public property ExtendedPrice (get only) that returns the extended price (price * quantity)
    public decimal ExtendedPrice
    {
        get { return price * quantity; }
    }
    
    //1 constructor that accepts four parameters and sets the private member variables to these parameter values
    public CartItem(int paramID, string paramName, decimal paramPrice, int paramQuantity)
    {
        this.itemId = paramID;
        this.name = paramName;
        this.price = paramPrice;
        this.Quantity = paramQuantity;
    }

    public CartItem(int paramID, string paramName, decimal paramPrice, int paramQuantity, string paramImage)
    {
        this.itemId = paramID;
        this.name = paramName;
        this.price = paramPrice;
        this.Quantity = paramQuantity;
        this.imagePath = paramImage;
    }
}
