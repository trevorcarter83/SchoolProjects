using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Summary description for ProductCatalog
/// </summary>
public class ProductCatalog
{
    
    private List<TaxableProduct> products = new List<TaxableProduct>();
    
    public void AddProduct(string name, decimal price, string imageUrl)
    {
        TaxableProduct tp = new TaxableProduct(name, price, imageUrl);
        products.Add(tp);
    }

    public Product GetHighPricedProduct()
    {

        var maxPrice = products.Max(r => r.Price);

        var product = products.Where(x => x.Price == maxPrice).FirstOrDefault();

        return product;

    }

    public string GetCatalogHtml()
    {
        string productHtml = "";

        foreach (var item in products)
        {
            productHtml += item.GetHtml();
        }


        return productHtml;
    }
}