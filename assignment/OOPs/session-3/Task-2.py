class Product:
    def __init__(self, productName, price, rating):
        self.productName = productName
        self.price = price
        self.rating = rating

    def displayInfo(self):
        print("Product Name:", self.productName)
        print("Price:", self.price)
        print("Rating:", self.rating)


# Create product object
product1 = Product("Samsung Galaxy M15", 14999, 4.5)

product1.displayInfo()