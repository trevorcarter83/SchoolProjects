using System;
using System.Collections.Generic;


/// <summary>
/// This class represents a shopping cart with a list of CartItem objects
/// </summary>
public class Cart
{

    // items: a private generic list of CartItem objects that represents the items stored in the cart
    private List<CartItem> items = new List<CartItem>();

    // Items: a public property to access (get only) the items list
    public List<CartItem> Items
    {
        get { return items; }
    }

    // HasItems: a boolean property indicating whether the cart has items in it (count of items > 0)
   public bool HasItems
    {
        get
        {
           if (items.Count > 0)
            {
                return true;
            }
           else
            {
                return false;
            }

        }
    }

    // AddItem:  public method that adds a CartItem to the items list
    // Should return void and take four parameters:  id, name, price, quantity (values for the product to be added)
    // ****IMPORTANT*** If the product already exists in the items list, just update the quantity by one 
   public void AddItem(int id, string name, decimal price, int quantity)
    {
        //check to see whether item already exists in items list

        bool isInCart = false;
        CartItem item = null;

        foreach (CartItem c in items)
        {
            if (c.ItemId == id)
            {
                isInCart = true;
                item = c;
            }
        }

        //if the item is in the cart, update the quantity by one
        if (isInCart)
        {
            item.Quantity += quantity;
        }
        else //item does not already exist in cart
        {
            //instantiate a new CartItem object
            CartItem ci = new CartItem(id, name, price, quantity);
            //Add the new CartItem object to the list
            Items.Add(ci);
        }
           

    }


    // AddItem:  public method that adds a CartItem to the items list
    // Should return void and take four parameters:  id, name, price, quantity (values for the product to be added)
    // ****IMPORTANT*** If the product already exists in the items list, just update the quantity by one 
    public void AddItem(int id, string name, decimal price, int quantity, string imagePath)
    {
        //check to see whether item already exists in items list

        bool isInCart = false;
        CartItem item = null;

        foreach (CartItem c in items)
        {
            if (c.ItemId == id)
            {
                isInCart = true;
                item = c;
            }
        }

        //if the item is in the cart, update the quantity by one
        if (isInCart)
        {
            item.Quantity += quantity;
        }
        else //item does not already exist in cart
        {
            //instantiate a new CartItem object
            CartItem ci = new CartItem(id, name, price, quantity, imagePath);
            //Add the new CartItem object to the list
            Items.Add(ci);
        }


    }

    // RemoveItem:  public method that removes a CartItem from the items list
    // Should return void and take one parameter: id (the id of the product to be removed)

    public void RemoveItem(int id)
    {
        //Create a CartItem variable to store the item to be removed
        CartItem itemToRemove = null;

        //Loop through the Items List to find the one with the id passed in
        foreach (CartItem ci in Items)
        {
            if (ci.ItemId == id)
                itemToRemove = ci;
                
        }

        if (itemToRemove != null)
            Items.Remove(itemToRemove);
    }
   
    // UpdateQuantity: public method that updates the  quantity of an CartItem the items list. 
    // Should return void and take two parameters:  id, newQuantity (the id of the product and the new quantity)
   public void UpdateQuantity(int id, int newQuantity)
    {
        //Create a CartItem variable to store the item to be updated
        CartItem itemToUpdate = null;

        //Loop through the Items List to find the one with the id passed in
        foreach (CartItem ci in Items)
        {
            if (ci.ItemId == id)
                itemToUpdate = ci;

        }

        if (itemToUpdate != null)
            itemToUpdate.Quantity = newQuantity;
    }

    // GetSubtotal: public method that returns the subtotal amount for all products the cart
    // The subtotal is the sum of price * quantity for each item
    public decimal GetSubTotal()
    {
        decimal subtotal = 0;
        foreach (CartItem ci in Items)
        {
            subtotal += ci.ExtendedPrice;
        }
        return subtotal;

    }


    // GetShipping: public method that returns the shipping amount for all products the cart
    // Assume that the shipping amount is 15% of the cart subtotal
    public decimal GetShipping()
    {
        return GetSubTotal() * 0.15M;
    }
   

    // GetTotal: public method that returns the total amount for all products the cart
    // The total is the subtotal plus shipping
    public decimal GetTotal()
    {
        return GetSubTotal() + GetShipping();

    }
   

    // Empty constructor
    public Cart()
    {

    }




}
