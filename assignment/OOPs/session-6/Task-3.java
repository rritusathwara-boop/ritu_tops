abstract class Product {

    abstract void upload();
}

class Electronics extends Product {

    @Override
    void upload() {
        System.out.println("Electronics product uploaded to Flipkart.");
    }
}

class Clothing extends Product {

    @Override
    void upload() {
        System.out.println("Clothing product uploaded to Flipkart.");
    }
}

public class ProductDemo {
    public static void main(String[] args) {

        Product electronics = new Electronics();
        Product clothing = new Clothing();

        electronics.upload();
        clothing.upload();
    }
}